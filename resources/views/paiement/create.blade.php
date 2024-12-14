
@extends('backend.dash.main')
@section('content')
<div class="container-fluid pt-4 px-4">
<center><h4 style="background:#ffc833" class="text-center">Effectuer un paiement <strong></strong></h4></center>

    <div class="card">    
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                <form action="{{route('payer.store')}}" enctype="multipart/form-data" method="POST">
                @csrf
                    <div class="row g-4">                    
                            <div class="col-md-6">
                                <input type="hidden" name="id" value="{{$inscrit->id}}">
                                <input type="hidden" name="ins" value="{{$ins}}">
                                <input type="hidden" name="formation" value="{{$inscrit->formation_id}}">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Candidat</label>
                                    <input type="text" name="inscrit" value="{{$inscrit->nom}} {{$inscrit->prenom}}" class="form-control montant" id="reste" disabled>
                                </div>               
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Reste à Payer</label>
                                    <input type="text" name="reste" value="{{getreste($inscrit->id)}} FCFA" class="form-control montant" id="reste" disabled>
                                </div>
                            </div>                          
                                                                                
                    </div>
                    <div class="row g-4">                    
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Type Formation</label>
                                    <input type="text" name="inscrit" value="@if($inscrit->type_formation==0) Presentiel @else Ligne @endif" class="form-control montant" id="reste" disabled>
                                </div>               
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Formation</label>
                                    <!-- <textarea name="" col="3" row="4" readonly id="" class="form-control" disabled>{{getformation($inscrit->formation_id)['titre']}}</textarea> -->
                                    <input type="text" name="reste" value="{{getformation($inscrit->formation_id)['titre']}}" class="form-control montant" id="reste" disabled>
                                </div>
                            </div>                          
                                                                                
                    </div>
                    <div class="row g-4">

                        <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Modalite</label>
                                    <select id="modes" name="mode" onchange="modalite();" class="form-select" required>
                                        <option></option>
                                        <option value="0">Tout Payé</option>
                                        <option value="1">Par Tranche</option>
                                    </select>
                                </div>               
                            </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Montant</label>
                                <input type="number" name="montant_1" min="0" max="{{getreste($inscrit->id)}}" class="form-control montant" id="montant_paye" >
                                <input type="number" name="montant_2" style="display:none;" min="0" value="{{getreste($inscrit->id)}}" readonly class="form-control" id="montant_restant">
                            </div>
                        </div>                          
                            
                    </div>             
                    <br><br>       
                    <center>
                        <input type="submit" class="btn btn-outline-success me-2 save" value="Payer">
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