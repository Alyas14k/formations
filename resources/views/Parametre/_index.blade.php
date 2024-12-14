@extends('backend.partials.main')
@section('content')
<div class="rounded p-4">
        <hr class="header-separator">
        <div class="sub-header">
            <h4>LISTE DES PARAMETRES</h2>
            <hr class="sub-header-separator">
        </div>
       
                <div>
                        <button type="button" class="btn btn-outline-success me-2" data-bs-toggle="modal" data-bs-target="#addparametre" data-bs-whatever=""> <i class="fa fa-plus"></i> parametre</button>                        
                </div>
                
</div>                       
<table id="example" class="table table-striped">
                                <thead>
                                <tr style="background-color:#0b9e44; color:white">
                                    <th>N°</th>
                                    <th>ID</th>
                                    <th>Nom</th>
                                    <th>Description</th> 
                                    <th>Action</th>                   
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                        $i=0; 
                                    @endphp
                                    @foreach ($parametres as $parametre)
                                            @php
                                            $i++;
                                            @endphp
                                <tr>    
                                    <td>{{$i}}</td> 
                                    <td>{{$parametre->id}}</td> 
                                    <td>{{$parametre->libelle}}</td> 
                                    <td>{{$parametre->description}}</td>                              
                                    <td><a href="#" class="btn btn-success" title="Afficher les détais"> <i class="fa fa-eye"></i></a></td>                    
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                <th>N°</th>
                                    <th>Nom</th>
                                    <th>Description</th> 
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
            <!-- Form End -->
@endsection
<div class="modal fade" id="addparametre" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nouveau Parametre</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="stor" action="{{route('parametre.store')}}" method="POST">
        @csrf
        <div class="modal-body">        
                <div class="row g-4">                    
                        <div class="col-md-6">                        
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Paramètre parent</label>
                                    <select  class="form-select mb-3" id="parent" name="parametre" autofocus>
                                            <option></option>
                                            @foreach($parametres as $parametre)
                                                <option value="{{ $parametre->id }}">{{ $parametre->libelle }}</option>
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
                                <input type="text" name="description" class="form-control" value="{{ old('description') }}" id="" required>
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