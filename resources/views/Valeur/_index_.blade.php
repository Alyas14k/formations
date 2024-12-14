@extends('admin.partials.main')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script> -->
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet"> -->
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css" rel="stylesheet"> -->

<style>
        .p-divider {
        border-bottom: 3px solid var(--marron);
    }
        table {
    width: 100%;
    border-collapse: collapse;
    }

    td, th {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
    word-wrap: break-word;
    white-space: normal;
    }

    td {
    max-width: 150px; /* Ajuste cette valeur pour définir une largeur maximale pour chaque cellule */
    }

    th {
    background-color: #f2f2f2;
    font-weight: bold;
    }

    tr:nth-child(even) {
    background-color: #f9f9f9;
    }
</style>
<style>
        .field {
            margin-bottom: 10px;
        }
        .remove-btn {
            margin-left: 10px;
            background-color: red;
            color: white;
            border: none;
            cursor: pointer;
        }
</style>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css"></script>
<!-- <script src="https://use.fontawesome.com/releases/v5.0.0/js/all.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"></script>

<script>
        $(document).ready(function () {
            //Enable Tooltips
            var tooltipTriggerList = [].slice.call(
                document.querySelectorAll('[data-bs-toggle="tooltip"]')
            );
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });

            //Advance Tabs
            $(".next").click(function () {
                // Vérifier si tous les champs obligatoires de l'onglet actif sont remplis
                var currentTab = $(".tab-pane.active");
                var allValid = true;

                currentTab.find("input[required], select[required], textarea[required]").each(function () {
                    if (!$(this).val()) {
                        allValid = false;
                        $(this).addClass("is-invalid"); // Ajouter une classe pour indiquer l'erreur
                    } else {
                        $(this).removeClass("is-invalid"); // Enlever la classe si le champ est valide
                    }
                });

                // Si tous les champs sont valides, passer à l'onglet suivant
                if (allValid) {
                    const nextTabLinkEl = $(".nav-tabs .active")
                        .closest("li")
                        .next("li")
                        .find("a")[0];
                    const nextTab = new bootstrap.Tab(nextTabLinkEl);
                    nextTab.show();
                } else {
                    alert("Veuillez remplir tous les champs obligatoires avant de continuer.");
                }
            });

            $(".previous").click(function () {
                const prevTabLinkEl = $(".nav-tabs .active")
                    .closest("li")
                    .prev("li")
                    .find("a")[0];
                const prevTab = new bootstrap.Tab(prevTabLinkEl);
                prevTab.show();
            });
        });

    $(function(){
    $('#datepicker').datepicker();
    });

        $(document).ready(function() {
                $('#type_transport').change(function() {
                    var type_trans = $(this).val();
                    if (type_trans == 7655 || type_trans == 7656) {        
                        $('#compagnie').prop('required', true);
                        $('.compagnie_obligatoire').show();
                    }
                    else if(type_trans == 7654) {        
                        $('#moyen_transport').prop('required', true);
                        $('#compagnie').prop('required', false);
                        $('.compagnie_obligatoire').hide();
                    }                       
                });        
            });

    $(document).ready(function() {
        $('#moyen_transport').change(function() {
            var moyen_trans = $(this).val();
            if (moyen_trans == 7653) {        
                $('#trans_commun').prop('required', true);
                $('.trans_commun_obligatoire').show();
            }
            else if (moyen_trans==7652){
                $('#marque_modele').prop('required', true);
                $('#immatriculation').prop('required', true);
                $('#trans_commun').prop('required', false);
                $('.trans_commun_obligatoire').hide();
            }
            else if (moyen_trans==7651){
                $('#vehicule_mebf').prop('required', true);
                $('#marque_modele').prop('required', false);
                $('#immatriculation').prop('required', false);
                $('#trans_commun').prop('required', false);
                $('.trans_commun_obligatoire').hide();
            }
            else {     
                $('#marque_modele').prop('required', false);
                $('#immatriculation').prop('required', false);   
                $('#trans_commun').prop('required', false);
                $('.trans_commun_obligatoire').hide();
            }            
        });        
    });      
</script>
<script>
        $( '#multiple-select-field' ).select2( {
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        placeholder: $( this ).data( 'placeholder' ),
        closeOnSelect: false,
    } );
</script>
@endsection
@section('content')

<div class="rounded p-4">


        <hr class="header-separator">

        <div class="sub-header">
            <h4>LISTE DES AFFECTATIONS</h2>
            <hr class="sub-header-separator">
        </div>
                <!-- <h5><strong>Liste des Affectations</strong></h5>
                
                <hr>
                <div class="p-divider"></div> -->
                @if (url()->current() == route('affectation.index'))
                <!-- @if (Request::is('chemin/partiel/*')) 
                 @endif-->
        <!-- Le code à afficher si l'URL correspond à la route -->
                <div>
                        <button type="button" class="btn btn-outline-success me-2" data-bs-toggle="modal" data-bs-target="#addaffect" data-bs-whatever="">Nouvelle Affectation</button>                        
                </div>
                @endif
                
</div>

                        <!-- <button type="button" class="btn btn-outline-success me-2" data-bs-toggle="modal" data-bs-target="#addaffect" data-bs-whatever="">Nouvelle Affectation</button> -->
                        <a href="{{ route('valeur.create') }}" class="btn btn-outline-success me-2" data-bs-whatever="">Ajouter Valuer</a>                        
                           
                            <div class="table-responsive">
                                <table id="example" class="table table-striped" style="width:100%">
                                <div class="card-header">
                                    <thead>
                                        <tr>
                                            <th>N°</th>
                                            <th>Nom</th>
                                            <th>Description</th> 
                                            <th>Code</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    </div> 
                                    <tbody id="body_table">
                                        @php
                                            $i=0; 
                                        @endphp
                                        @foreach ($valeurs as $valeur)
                                                @php
                                                $i++;
                                                @endphp
                                        <tr>
                                            <td>{{$i}}</td> 
                                            <td>{{$valeur->libelle}}</td> 
                                            <td>{{$valeur->description}}</td>      
                                            <td>{{$valeur->code}}</td>                    
                                            <td><a href="#" class="btn btn-success" title="Afficher les détais"> <i class="fa fa-eye"></i></a></td>   
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
            <!-- Form End -->

@endsection