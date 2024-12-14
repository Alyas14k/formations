
@extends('backend.dash.main')
@section('content')
<div class="container-fluid pt-4 px-4">
<center><h4 style="background:#ffc833" class="text-center">Modification de la permission<strong></strong></h4></center>

    <div class="card">    
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                <form action="{{route('permissions.update', $permission)}}" enctype="multipart/form-data" method="POST">
                @csrf
                {{ method_field('PUT') }}
                    <div class="row g-4">                    
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Libellé permission</label>
                                    <input type="text" name="nom" value="{{$permission->name}}" class="form-control" id="" required>
                                </div>                   
                            </div>
                    </div>
                    <div class="row g-4">
                            <div class="col-md-6">
                                    <label>Module</label>
                                        <select id="" name="module" class="form-select mb-3" value="{{old("module")}}" required>
                                            <option value="{{$permission->for}}">{{$permission->for}}</option>
                                            <option value="administration">Administration</option>
                                            <option value="inscription">Inscription</option>
                                        </select>                                               
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