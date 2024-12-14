
@extends('backend.dash.main')
@section('content')
<div class="container-fluid pt-4 px-4">
<center><h4 style="background:#ffc833" class="text-center">Modification de l'utilisateur {{$user->name}} {{$user->prenom}}<strong></strong></h4></center>

    <div class="card">    
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                <form action="{{route('user.update', $user)}}" enctype="multipart/form-data" method="POST">
                @csrf
                {{ method_field('PUT') }}
                    <div class="row g-4">   
                            <div class="col-md-6">
                                <input type="hidden" name="id" value="{{$user->id}}">               
                               
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nom</label>
                                    <input type="text" name="nom" value="{{$user->name}}" class="form-control montant" id="reste">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Prenom</label>
                                    <input type="text" name="prenom" value="{{$user->prenom}}" class="form-control montant" id="reste">
                                </div>
                            </div>
                                                                                
                    </div>
                    <div class="row g-4">                    
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email</label>
                                    <input type="email" name="email" value="{{$user->email}}" class="form-control montant" id="reste">                                   
                                </div>               
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Mot de Passe</label>
                                    
                                    <input type="password" name="password" class="form-control montant" id="reste">
                                </div>
                            </div>                                              
                    </div>
                    <div class="row g-4">                    
                            <div class="col-md-6">
                            @foreach ($roles as $role)
                                <div class="mb-3">
                                <label><input type="checkbox"name='roles[]' value="{{ $role->id }}"
                                                @foreach ($user->roles as $user_role )
                                                    @if ($user_role->id==$role->id)
                                                        checked
                                                    @endif
                                                @endforeach
                                        > {{ $role->nom }}</label>
                                </div>
                                @endforeach               
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