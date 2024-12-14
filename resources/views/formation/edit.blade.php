
@extends('backend.dash.main')
@section('content')
<div class="container-fluid pt-4 px-4">
<center><h4 style="background:#ffc833" class="text-center">Modification de la formation {{$formation->titre}}<strong></strong></h4></center>

    <div class="card">    
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                <form action="{{route('formation.update', $formation)}}" enctype="multipart/form-data" method="POST">
                @csrf
                {{ method_field('PUT') }}
                        <div class="row g-4">                    
                                <div class="col-md-6">                        
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Titre</label>
                                        <input type="text" name="titre" class="form-control" value="{{$formation->titre}}" id="">
                                    </div>               
                                </div>
                                <div class="col-md-6">                        
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Description</label>
                                        <textarea class="form-control" col="2" rows="2" name="description" placeholder="Saisir..." id="floatingTextarea">{{$formation->description}}</textarea>
                                    </div>
                                </div>                        
                        </div>
                        <div class="row g-4">                    
                                <div class="col-md-6">                        
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Date Début</label>
                                        <input type="date" name="debut" class="form-control" value="{{ old('date_debut', $formation->date_debut ?? '') }}" id="" required>
                                    </div>               
                                </div>
                                <div class="col-md-6">                        
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Date Fin</label>
                                        <input type="date" name="fin" class="form-control" value="{{ old('date_debut', $formation->date_fin ?? '') }}" id="" required>
                                        
                                    </div>
                                </div>                        
                        </div>
                        <div class="row g-4">                    
                                <div class="col-md-6">                        
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Frais de Participation</label>
                                        <input type="number" name="prix" class="form-control" value="{{$formation->prix}}" id="" >
                                    </div>
                                </div>
                                <div class="col-md-6">                        
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Nombre de Place</label>
                                        <input type="number" name="place" class="form-control" id="" value="{{$formation->place}}">                                
                                    </div>
                                </div>                                               
                        </div>
                        <div class="row g-4">                    
                                <div class="col-md-6">                        
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Lieu</label>
                                        <input type="text" name="lieu" class="form-control" value="{{$formation->lieu}}" id="">                                
                                    </div>
                                </div> 
                                <div class="col-md-6">                        
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Formateur</label>
                                            <select  class="form-select mb-3" id="parent" name="formateur" required autofocus>
                                                    <option value="{{getformateur($formation->id)['id']}}">{{getformateur($formation->id)['nom']}} {{getformateur($formation->id)['prenom']}}</option>
                                                    @foreach ($formateurs as $formateur)
                                                    <option value="{{$formateur->id}}">{{$formateur->nom}} - {{$formateur->prenom}}</option>
                                                    @endforeach                                            
                                            </select>
                                        
                                    </div>
                                </div>                        
                        </div>          
                    <br><br>       
                    <center>
                        <input type="submit" class="btn btn-outline-success me-2 save" value="Enregistrer">
                        <!-- <button type="submit" style="margin-left:10px;" id="declaration_edit"  data-toggle="modal" class="btn btn-outline-success me-2 save" > <i class="fas fa-save"></i> Enregistrer </button> -->
                    <button type="button" class="btn btn-outline-danger me-2 cancel" onclick="history.back()"><i class="fas fa fa-ban"></i> Annuler</button>
                    <!-- <a  style="margin-left:10px;" id="declaration_edit" data-toggle="modal" class="btn btn-outline-danger me-2 cancel" > <i class="fas fa fa-ban"></i> Annuler</a> -->
                    </center>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
<script>
    
    function modalite(){
      //alert('bon');
      var mode=$('#modes').val();

      if(mode==0){
        //alert('mode');
        $('#montant_restant').show();
        $('#montant_paye').hide();
      }
      else{
        $('#montant_restant').hide();
        $('#montant_paye').show();
      }

    }
</script>