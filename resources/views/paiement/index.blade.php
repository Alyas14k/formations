@extends('backend.dash.main')
@section('content')
<div class="rounded p-4">
        <hr class="header-separator">
        <div class="sub-header">
            <h4>Liste des paiements</h2>
            <hr class="sub-header-separator">
        </div>
       
                <div>
                        <!-- <a href="{{route('paiement.create')}}" class="btn btn-outline-success me-2" data-bs-whatever=""> <i class="fa fa-plus"></i> Paiement</a> -->
                        <button type="button" class="btn btn-outline-success me-2" data-bs-toggle="modal" data-bs-target="#payer" data-bs-whatever=""> <i class="fa fa-plus"></i> Paiement</button>                        

                </div>
                
</div>                       
<table id="example" class="table table-striped">
                                <thead>
                                <tr class="table_color">
                                    <th>N°</th>
                                    <th>Statut</th>
                                    <th class="col-2">Code</th>
                                    <th>Montant</th>
                                    <th>Reste</th>
                                    <th class="col-3">Nom & Prénom</th>
                                    <th>Formation</th>                                                                  
                                    <th>Date</th>
                                    <th class="col-2">Action</th>                   
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                        $i=0; 
                                    @endphp
                                    @foreach ($paiements as $paiement)
                                            @php
                                            $i++;
                                            @endphp
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>@if(getinscrit($paiement->inscrit_id)['statut']==1) Tranche
                                        @elseif(getinscrit($paiement->inscrit_id)['statut']==2) Payé
                                        @endif
                                    </td>
                                    <td>{{$paiement->code}}</td>
                                    <td>{{$paiement->montant}}</td>
                                    <td>{{$paiement->reste}}</td> 
                                    <td>{{getinscrit($paiement->inscrit_id)['nom']}} {{getinscrit($paiement->inscrit_id)['prenom']}}</td>
                                    <td>{{getformation(getinscrit($paiement->inscrit_id)['formation'])['titre']}}</td>         
                                    <td>{{$paiement->created_at}}</td> 
                                    <td>                                                                                          
                             
                                        <!-- <a href="#" class="btn btn-outline-success" title="Afficher les détais"> <i class="fa fa-eye"></i></a> -->
                                        <a href="#" class="btn btn-outline-danger" title="Afficher les détais"> <i class="fa fa-pen"></i></a>
                                        <a href="{{route('payer.recu', $paiement->id)}}" class="btn btn-outline-danger" title="Afficher les détais"> Reçu</a>
                                        
                                    </td>                    
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>N°</th>
                                    <th>Statut</th>
                                    <th>Code</th>
                                    <th>Montant</th>
                                    <th>Reste</th>
                                    <th class="col-3">Nom & Prénom</th>
                                    <th>Formation</th>                                                                  
                                    <th>Date</th>
                                    <th class="col-2">Action</th>   
                                </tr>
                                </tfoot>
                            </table>
            <!-- Form End -->
@endsection
<div class="modal fade" id="payer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nouveau Paiement</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('payer.create')}}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="modal-body">
                <div class="row g-4">
                        <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Choisir le candidat</label>
                                    <input type="hidden" value="" name="id">
                                        <select  class="form-select mb-3" id="candidat" name="inscrit" autofocus>                                                
                                               <option>Choisir</option>
                                               @foreach ($inscrits as $inscrit)
                                               <option value="{{$inscrit->id}}">{{$inscrit->nom}} - {{$inscrit->prenom}} - {{$inscrit->type_formation}}</option>
                                               @endforeach
                                        </select>
                                </div>               
                            </div>
                                   
                </div>                                   
        </div>
      <center>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
        <input type="submit" class="btn btn-success" value="Valider">     
      </div>
      </center>
      </form>
    </div>
  </div>
</div>


