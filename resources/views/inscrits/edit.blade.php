
@extends('backend.dash.main')
@section('content')
<div class="container-fluid pt-4 px-4">
<center><h4 style="background:#ffc833" class="text-center">Modification du candidat {{$inscrit->nom}} {{$inscrit->prenom}}<strong></strong></h4></center>

    <div class="card">    
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                <form action="{{route('inscrit.update', $inscrit)}}" enctype="multipart/form-data" method="POST">
                @csrf
                {{ method_field('PUT') }}
                    <div class="row g-4">   
                            <div class="col-md-6">
                                <input type="hidden" name="id" value="{{$inscrit->id}}">                               
                                <input type="hidden" name="formation" value="{{$inscrit->formation_id}}">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nom</label>
                                    <input type="text" name="nom" value="{{$inscrit->nom}}" class="form-control montant" id="reste">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Prenom</label>
                                    <input type="text" name="prenom" value="{{$inscrit->prenom}}" class="form-control montant" id="reste">
                                </div>
                            </div>
                                                                                
                    </div>
                    <div class="row g-4">                    
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Sexe</label>
                                    <select id="modes" name="sexe" class="form-select" required>
                                        <option value="{{$inscrit->sexe}}">@if ($inscrit->sexe==0) Masculin @else Féminin @endif</option>
                                        <option value="0">Masculin</option>
                                        <option value="1">Feminin</option>
                                    </select>                                   
                                </div>               
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email</label>
                                    <!-- <textarea name="" col="3" row="4" readonly id="" class="form-control" disabled>{{getformation($inscrit->formation_id)['titre']}}</textarea> -->
                                    <input type="text" name="email" value="{{$inscrit->email}}" class="form-control montant" id="reste">
                                </div>
                            </div>                          
                                                                                
                    </div>
                    <div class="row g-4">

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Formation</label>
                                    <select id="modes" name="formation" class="form-select">
                                        <option value="{{$inscrit->formation_id}}">{{getformation($inscrit->formation_id)['titre']}}</option>
                                        @foreach ($formations as $formation)
                                        <option value="{{$formation->id}}">{{$formation->titre}}</option>
                                        @endforeach
                                    </select>                                    
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Type Formation</label>
                                    <select id="modes" name="type" class="form-select" required>
                                        <option value="{{$inscrit->type_formation}}">@if($inscrit->type_formation==0)Presentiel @else En Ligne @endif</option>
                                        <option value="0">Présentiel</option>
                                        <option value="1">En Ligne</option>
                                    </select>
                                </div>               
                            </div>                   
                    </div>
                    <div class="row g-4">

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Mobile 1</label>
                                    <!-- <textarea name="" col="3" row="4" readonly id="" class="form-control" disabled>{{getformation($inscrit->formation_id)['titre']}}</textarea> -->
                                    <input type="text" name="mobile_1" value="{{$inscrit->mobile_1}}" class="form-control montant" id="reste">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Mobile 2</label>
                                    <!-- <textarea name="" col="3" row="4" readonly id="" class="form-control" disabled>{{getformation($inscrit->formation_id)['titre']}}</textarea> -->
                                    <input type="text" name="mobile_2" value="{{$inscrit->mobile_2}}" class="form-control montant" id="reste">
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