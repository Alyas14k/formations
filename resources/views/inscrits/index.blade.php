@extends('backend.dash.main')
@section('content')
<div class="rounded p-4">
        <hr class="header-separator">
        <div class="sub-header">
            <h4>Liste des Inscrits</h2>
            <hr class="sub-header-separator">
        </div>
       
                <div>
                        <button type="button" class="btn btn-outline-success me-2" data-bs-toggle="modal" data-bs-target="#addinscrit" data-bs-whatever=""> <i class="fa fa-plus"></i> Inscrit</button>                        
                </div>
                
</div>                       
<table id="example" class="table table-striped">
                                <thead>
                                <tr style="background-color:#0b9e44; color:white">
                                    <th>N°</th>
                                    <th>Statut</th>
                                    <th class="col-2">Nom & Prénom</th>
                                    <th>Formation</th>
                                    <th>Type</th>
                                    <th>Mobile</th>
                                    <th class="col-2">Action</th>                   
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                        $i=0; 
                                    @endphp
                                    @foreach ($inscrits as $inscrit)
                                            @php
                                            $i++;
                                            @endphp
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>@if($inscrit->statut==0) Non Payé @elseif($inscrit->statut==1) Tranche @else Payé @endif</td>
                                    <td>{{$inscrit->nom}} {{ $inscrit->prenom}}</td> 
                                    <td>{{getformation($inscrit->formation_id)['titre']}}</td>
                                    <td>@if($inscrit->type==0) Gestionnaire @else Candidat @endif</td>
                                    <td>{{ $inscrit->mobile_1}} - {{ $inscrit->mobile_2}}</td>
                                    <td>
                                        @if($inscrit->statut==0 || $inscrit->statut==1 )   
                                        
                                        <a href="{{ route('inscrit.payer',$inscrit->id)}}" class="btn btn-outline-danger" title="Afficher les détais">Payer</a>

                                        
                                        <!-- <button type="button" class="btn btn-outline-danger me-2" data-bs-toggle="modal" data-bs-target="#payer" data-bs-whatever=""
                                            data-id="{{ $inscrit->id }}"
                                            data-total="{{gettotal($inscrit->id)}}"
                                            data-reste="{{getreste($inscrit->id)}}"                                            
                                        > 
                                             
                                        Payer</button> -->
                                        @else
                                        <a href="{{route('payer.recu', $inscrit->id)}}" class="btn btn-outline-success" title="Afficher les détais">Reçu</a>
                                        @endif
                                        <a href="" class="btn btn-outline-success"  title="Afficher les détais"> <i class="fa fa-eye"></i></a>
                                        <a href="{{route('inscrit.edit', $inscrit->id)}}" class="btn btn-outline-warning"  title="Afficher les détais"> <i class="fa fa-pen"></i></a>


                                    </td>                    
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>N°</th>
                                    <th>Statut</th>
                                    <th>Nom & Prénom</th>
                                    <th>Formation</th>
                                    <th>Type</th>
                                    <th>Mobile</th>
                                    <th class="col-2">Action</th> 
                                </tr>
                                </tfoot>
                            </table>
            <!-- Form End -->
@endsection
<div class="modal fade" id="addinscrit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nouvelle inscrit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('admin.store')}}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="modal-body">        
                <div class="row g-4">                    
                        <div class="col-md-6">                        
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nom</label>
                                <input type="text" name="nom" class="form-control" value="{{ old('nom') }}" id="" required>
                            </div>               
                        </div>
                        <div class="col-md-6">                        
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Prenom</label>
                                <input type="text" name="prenom" class="form-control" value="{{ old('prenom') }}" id="" required>
                            </div>
                        </div>                        
                </div>
                <div class="row g-4">                    
                        <div class="col-md-6">                        
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Sexe</label>
                                <select id="sexe" name="sexe" class="form-select" required>
                                    <option value="0" {{ old('sexe') == '0' ? 'selected' : '' }}>Masculin</option>
                                    <option value="1" {{ old('sexe') == '1' ? 'selected' : '' }}>Féminin</option>
                                </select>
                            </div>               
                        </div>
                        <div class="col-md-6">                        
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}" id="" required>                                
                            </div>
                        </div>                        
                </div>
                <div class="row g-4">                    
                        <div class="col-md-6">                        
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Mobile 1</label>
                                <input type="text" id="mobile_1" name="mobile_1" class="form-control" value="{{ old('mobile_1') }}" required placeholder="Entrez votre mobile principal">
                                @error('mobile_1') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">                        
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Mobile 2</label>
                                <input type="text" id="mobile_2" name="mobile_2" class="form-control" value="{{ old('mobile_2') }}" placeholder="Entrez un second numéro (facultatif)">
                            </div>
                        </div>                                                                      
                </div>
                <div class="row g-4">                    
                        <div class="col-md-6">                        
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Objectif</label>
                                <textarea id="objectif" name="objectif" class="form-control" placeholder="Décrivez votre objectif ici">{{ old('objectif') }}</textarea>
                                @error('objectif') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">                        
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Type</label>
                                <select id="type" name="type" class="form-select" required>
                                    <option value="0" {{ old('type') == '0' ? 'selected' : '' }}>Présentiel</option>
                                    <option value="1" {{ old('type') == '1' ? 'selected' : '' }}>En ligne</option>
                                </select>
                                @error('type') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">                        
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Formation</label>
                                <select id="type" name="formation" class="form-select" required>
                                    <option></option>
                                    @foreach ($formations as $formation)
                                    <option value="{{$formation->id}}">{{$formation->titre}} - {{$formation->prix}} FCFA</option>
                                    @endforeach
                                </select>
                                @error('type') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                            </div>
                        </div>                                       
                </div>           
        </div>
      <center>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
        <input type="submit" class="btn btn-success" value="Enregistrer">     
      </div>
      </center>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="payer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nouveau Paiement</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('paiement.store')}}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="modal-body">
            Total à Payer: <span id="ModalTotal"></span><br>
            Reste à Payer: <span id="ModalReste"></span>     
            <input type="hidden" name="reste" class="reste">
            <input type="hidden" name="id" class="modalId">
            <input type="hidden" name="total" class="total">

                <div class="row g-4">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Modalite</label>
                                <select id="mode" name="mode" onchange="modalite();" class="form-select" required>
                                    <option></option>
                                    <option value="0">Tout Payé</option>
                                    <option value="1">Par Tranche</option>
                                </select>
                            </div>               
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Montant</label>
                                <input type="number" name="montant" style="display:none;" class="form-control montant" id="montant_cache" disabled>
                                <input type="number" name="montant" min="0" class="form-control" id="montant_visible">
                            </div>
                        </div>
                        <div class="col-md-6">    
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Reste à Payer</label>
                                <input type="text" name="reste" class="form-control reste" id="" disabled>
                            </div>
                        </div>                       
                </div>                                   
        </div>
      <center>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
        <input type="submit" class="btn btn-success" value="Enregistrer">     
      </div>
      </center>
      </form>
    </div>
  </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const detailModal = document.getElementById('payer');
        
        
        detailModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const reste_payer=0;

            const id = button.getAttribute('data-id');
              const total = parseFloat(button.getAttribute('data-total')) ;
              const reste = parseFloat(button.getAttribute('data-reste')) ;
              //const mode = document.getElementById('mode').value || 2;

               // console.log("Mode value:", mode);
               // Injecter les données dans le modal
           // detailModal.querySelector('#modalId').textContent = id;
           detailModal.querySelector('#ModalTotal').textContent = total;
            detailModal.querySelector('#ModalReste').textContent = reste;

            const montant=  detailModal.querySelector('#montant_visible').value;
             var int=$('#montant_visible').val();
             console.log("Mode value:", int);
            
            
        });
        
    });
</script>