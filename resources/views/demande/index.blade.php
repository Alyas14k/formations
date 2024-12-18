@extends('backend.dash.main')
@section('content')
<div class="rounded p-4">
        <hr class="header-separator">
        <div class="sub-header">
            <h4>Liste des Demandes de Formation</h2>
            <hr class="sub-header-separator">
        </div>
       
                <!-- <div>
                        <button type="button" class="btn btn-outline-success me-2" data-bs-toggle="modal" data-bs-target="#adddemande" data-bs-whatever=""> <i class="fa fa-plus"></i> demande</button>                        
                </div> -->
                
</div>                       
<table id="example" class="table table-striped">
                                <thead>
                                <tr class="table_color">
                                    <th>N°</th>                            
                                    <th class="col-3">Nom & Prénom</th>
                                    <th>Sexe</th>
                                    <th class="col-3">Formation</th>
                                    <th>Objectif</th>
                                    <th class="col-2">Mobile</th>
                                    <th class="col-2">Date</th>
                                    <th>Action</th>                   
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                        $i=0; 
                                    @endphp
                                    @foreach ($demandes as $demande)
                                            @php
                                            $i++;
                                            @endphp
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$demande->nom}} {{ $demande->prenom}}</td> 
                                    <td>@if($demande->sexe==0 ) Masculin @else Féminin @endif </td>
                                    <td>{{$demande->libelle}}</td>
                                    <td>{{$demande->objectif}}</td>
                                    <td>{{ $demande->mobile_1}} - {{ $demande->mobile_2}}</td>
                                    <td>{{ date("d-m-Y à H:i", strtotime($demande->created_at)) }}</td>

                                    <td>
                                       
                                                                                
                                        <a href="" class="btn btn-outline-success"  title="Afficher les détais"> <i class="fa fa-eye"></i></a>
                                        <!-- <a href="{{route('demande.edit', $demande->id)}}" class="btn btn-outline-danger"  title="Afficher les détais"> <i class="fa fa-pen"></i></a> -->


                                    </td>                    
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>N°</th>
                                    <th class="col-3">Nom & Prénom</th>
                                    <th>Sexe</th>
                                    <th class="col-3">Formation</th>
                                    <th>Objectif</th>
                                    <th class="col-2">Mobile</th>
                                    <th class="col-2">Date</th>
                                    <th>Action</th> 
                                </tr>
                                </tfoot>
                            </table>
            <!-- Form End -->
@endsection
