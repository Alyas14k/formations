@extends('backend.partials.main')
@section('css')

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
    hr{
    height:10px;
    border-width:0;
    color:#009636;
    /* background-color:#009636 */
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
<style>
    .affect.active .subaffect {
        display: block; /* Affiche le sous-menu si l'élément parent est actif */
    }

    .subaffect-link.active {
        background-color: blue; /* Par exemple, pour mettre en évidence le lien actif */
        color: white;
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
            <h4>LISTE DES VALEURS</h2>
            <hr class="sub-header-separator">
        </div>
       
                <div>
                        <button type="button" class="btn btn-outline-success me-2" data-bs-toggle="modal" data-bs-target="#addvaleur" data-bs-whatever=""> <i class="fa fa-plus"></i> Valeur</button>                        
                </div>     
                
</div>
                            <div class="table-responsive">
                                <table id="example" class="table table-striped" style="width:100%">
                                <div class="card-header">                                    
                                    <thead class="thead-table">
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
<div class="modal fade" id="addvaleur" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nouvelle Valeur</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="stor" action="{{route('valeur.store')}}" method="POST">
        @csrf
        <div class="modal-body">        
                <div class="row g-4">                    
                        <div class="col-md-6">                        
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Paramètre</label>
                                    <select  class="form-select mb-3" id="parent" name="parametre" required autofocus>
                                            <option></option>
                                            @foreach($parametres as $parametre)
                                                <option value="{{ $parametre->id }}">{{ $parametre->libelle }}</option>
                                            @endforeach
                                    </select>
                            </div>                   
                        </div>
                        <div class="col-md-6">                     
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Valeur Parent</label>
                                    <select  class="form-select mb-3" id="parent" name="parent" autofocus>
                                            <option></option>
                                            @foreach($valeurs as $valeur)
                                                <option value="{{ $valeur->id }}">{{ $valeur->libelle }}</option>
                                            @endforeach
                                    </select>
                            </div>                      
                        </div>                
                </div>
                <div class="row g-4">                    
                        <div class="col-md-6">                        
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Libéllé</label>
                                <input type="text" name="libelle" class="form-control" value="{{ old('libelle') }}" id="" required>
                            </div>                   
                        </div>
                        <div class="col-md-6">                     
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Description</label>
                                <input type="text" name="description" class="form-control" value="{{ old('description') }}" id="">
                            </div>               
                        </div>                
                </div>
                <div class="row g-4">
                        <div class="col-md-6">                     
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Code</label>
                                <input type="text" name="code" class="form-control" value="{{ old('code') }}" id="">
                            </div>                      
                        </div>                           
                </div>                

      </div>
      <center>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
        <input type="submit" class="btn btn-success" value="Enregistrer">
        <!-- <button type="button" id="saveButton" class="btn btn-success"></button> -->       
      </div>
      </center>
      </form>
    </div>
  </div>
</div>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/fr_fr.json"
            }
        });
    });
</script>