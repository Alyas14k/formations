@extends('backend.partials.main')
@section('administration', 'menu-open')
@section('user', 'active')
@section('content')
<div class="container">
    <div class="row">
                <div class="card card-success col-md-12 col-md-offset-2">
                    <div class="card-header">
                      <h3 class="card-title">Créer un utilisateur</h3>
                    </div>
                    <div class="card-body">
                        <form id="form-validation" method="POST"  action="{{route('user.store')}}" class="form-horizontal form-bordered">
                            {{ csrf_field() }}
                        <fieldset>
                            <legend><i class="fa fa-angle-right"></i> Informations personnelles</legend>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label" for="val_username">Nom<span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                            <input id="nome" type="text" class="form-control" name="nom" value="{{ old('nom') }}" required autofocus>
                                        <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                    </div>
                                    @if ($errors->has('nom'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nom') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('prename') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label" for="prenom">Prenom <span class="text-danger">*</span></label>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                                <input id="prenom" type="text" class="form-control" name="prenom" value="{{ old('prenom') }}" required autofocus>
                                                <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                        </div>
                                        @if ($errors->has('prenom'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('prenom') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                            </div>                    
                            <div class="form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label" for="masked_phone">Telephone<span class="text-danger">*</span></label>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <input type="text" id="masked_phone" name="telephone" class="form-control" value="{{ old('telephone') }}" placeholder="(+226) 99-99-99-99" required autofocus>
                                            <span class="input-group-addon"><i class="gi gi-earphone"></i></span>
                                        </div>
                                    </div>
                                    @if ($errors->has('telephone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telephone') }}</strong>
                                    </span>
                                    @endif
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label" for="email">Email <span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                        <div class="input-group">
                                                <input id="email" name="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="test@example.com">
                                                <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
                                        </div>
                                        @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Employe</label>
                                <div class="col-md-6">
                                    <select  class="form-control" name="employe" id=""> 
                                        <option value=""></option>
                                            @foreach ($employes as $employe)
                                            <option value="{{$employe->id}}">{{$employe->nom}} - {{$employe->prenom}} - {{$employe->direction}} - {{$employe->service}}</option>    
                                            @endforeach 
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3" style="margin-top: 30px;">                           
                                    <a href="#addemploye" id="addemploye" data-toggle="modal" class="btn btn-md btn-success titre_de_propriete_edit" >Ajouter Employer</a>
                                </div>
                            </div>
    
                        </fieldset>
                        <fieldset>
                            <legend><i class="fa fa-angle-right"></i> Roles</legend>
    
                            <div class="form-group">
                                @foreach ($roles as $role)
                                    <div class="col-lg-3 checkbox">
                                       <label><input type="checkbox" name='roles[]' value="{{ $role->id }}"> {{ $role->nom }}</label>
                                    </div>
                                @endforeach
                            </div>
    
                        </fieldset>
                        <div class="form-group form-actions">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-sm btn-sucess"><i class="fa fa-arrow-right"></i> Submit</button>
                                <a href="{{ route('user.index') }}" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Annuler</a>
                            </div>
                        </div>
    
                    </form>
                    </div>
                    <!-- /.card-body -->
                  </div>
                
                <!-- END Form Validation Example Content -->

    </div>
</div>

@endsection
<div id='addemploye'class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Enregistrer un Employé</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                    {{ csrf_field() }}
                    <div class="row">
                            <div class="col-sm-5">
                            <!-- text input -->
                                <div class="form-group">
                                    <label>Nom (<span class="text-danger">*</span>)</label>
                                    <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrer le nom" value="{{ old('nom') }}" required autofocus>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label>Prenom (<span class="text-danger">*</span>)</label>
                                    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Entrer le prenom" value="{{ old('nom') }}" required autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-sm-5">
                                <div class="form-group">
                                    <label>Direction (<span class="text-danger">*</span>)</label>
                                    <select name="directions" id="directions" class="form-control select2" value="" onchange="changeValue('directions','services')" required autofocus>
                                        <option value=""></option>
                                        @foreach($directions as $direction)
                                        <option value="{{$direction->id}}">{{getlibelle($direction->id)}}</option>
                                        @endforeach
                                    </select>
                                    <!-- <input type="text" class="form-control" name="direction" placeholder="Entrer le prenom" value="{{ old('nom') }}" required autofocus> -->
                                </div>
                            </div>
                            <div class="col-sm-5">       
                                <div class="form-group">
                                    <label>Service (<span class="text-danger">*</span>)</label>
                                    <select id="services" data-placeholder="Choisir Service" class="form-control select2" name="service" style="width: 100%;" required>
											<option  value="{{ old('') }}" {{ old('service') == old('service') ? 'selected' : '' }}>{{ getlibelle(old('')) }}</option>
									</select>
                                    <!-- <input type="text" class="form-control"  placeholder="Entrer le nom" > -->
                                </div>
                            </div>                            
                        </div>
                        <div class="row">
                            <div class="col-sm-5">                            
                                <div class="form-group">
                                    <label>Poste (<span class="text-danger">*</span>)</label>
                                    <select name="poste" class="form-control select2" id="poste" value="" required autofocus>
                                        <option value=""></option>
                                        @foreach($postes as $poste)
                                        <option value="{{$poste->id}}">{{getlibelle($poste->id)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label>N°Identité (<span class="text-danger">*</span>)</label>
                                    <input type="text" class="form-control" id="numero_piece" name="numero_piece" placeholder="Entrer le numéro de la pièce" value="{{ old('numero_piece') }}" required autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">                            
                                <div class="form-group">
                                    <label>Téléphone (<span class="text-danger">*</span>)</label>
                                    <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Entrer le numéro" value="{{ old('telephone') }}" required autofocus>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label>Ressource (<span class="text-danger">*</span>)</label>
                                    <select name="projet" id="projet" class="form-control select2 projet" value="" onchange="moyens();" required>
                                        <option value=""></option>
                                        @foreach($projets as $projet)
                                        <option value="{{$projet->id}}">{{getlibelle($projet->id)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-sm-5 structure" style="display:none;">                            
                                <div class="form-group">
                                    <label>Structure (<span class="text-danger">*</span>)</label>
                                    <input type="text" class="form-control" id="structure" name="structure" placeholder="Entrer le numéro" value="{{ old('structure') }}" autofocus>
                                </div>
                            </div>                                        
                        </div>                                              
                        <div class="form-group form-actions">
                            <div class="col-md-8 col-md-offset-4">
                                <!-- <button type="submit" class="btn btn-sm btn-sucess"><i class="fa fa-arrow-right"></i> Valider</button> -->
                                <center>
                                <input type="button" data-dismiss="modal"  class="btn btn-sm btn-danger"  value="Fermer">
                                <!-- <input  type="submit" id="submit" class="btn btn-sm btn-success" value="Valider"> -->
                                <a onclick="addEmploye();"
                                            class="btn btn-success btn-sm" 
                                            data-toggle="modal"            
                                            id="submit">
                                            Submit
                                </a>
                                </center>
                            </div>
                        </div>            
        </div>
        </div>
    </div>
</div>
<script type="text/javascript">

        function addEmploye(){
    $("#submit").click(function(){
      //alert('ok');
      var nom=$('#nom').val();
      var prenom=$('#prenom').val();
      var directions=$('#directions').val();
      var service=$('#services').val();
      var poste=$('#poste').val();
      var identite=$('#numero_piece').val();
      var telephone=$('#telephone').val();
      var projet=$('#projet').val();
      var structure=$('#structure').val();

      var url= "{{ route('emp.store') }}";
      $.ajax({
        url:url,
        type:'GET',
        dataType: 'json',
        data: {nom:nom, prenom:prenom, direction:directions, service:service, poste:poste, identite:identite,telephone:telephone, projet:projet, structure:structure},
        error:function(data){alert("Erreur");},
        success:function (data){
          if(data.status=='200'){
         $('#addemploye').modal('hide');
          }
          else{
            alert('nonOk');
          }
        }
      });
      //alert(projet);
    });
  }
  </script>