@extends('backend.dash.main')
@section('content')
<div class="rounded p-4">
        <hr class="header-separator">
        <div class="sub-header">
            <h4>Liste des Formateurs</h2>
            <hr class="sub-header-separator">
        </div>
       
                <div>
                        <button type="button" class="btn btn-outline-success me-2" data-bs-toggle="modal" data-bs-target="#addformateur" data-bs-whatever=""> <i class="fa fa-plus"></i> Formateur</button>                        
                </div>
                
</div>                       
<table id="example" class="table table-striped">
                                <thead>
                                <tr style="background-color:#0b9e44; color:white">
                                    <th>N°</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Matière</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Action</th>                   
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                        $i=0; 
                                    @endphp
                                    @foreach ($formateurs as $formateur)
                                            @php
                                            $i++;
                                            @endphp
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$formateur->nom}}</td> 
                                    <td>{{ $formateur->prenom}}</td>
                                    <td>{{ $formateur->matiere}}</td>
                                    <td>{{ $formateur->email}}</td>
                                    <td>{{ $formateur->mobile}}</td>
                                    <td><a href="#" class="btn btn-success" title="Afficher les détais"> <i class="fa fa-eye"></i></a></td>                    
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>N°</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Matière</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Action</th> 
                                </tr>
                                </tfoot>
                            </table>
            <!-- Form End -->
@endsection
<div class="modal fade" id="addformateur" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nouvelle formateur</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('formateur.store')}}" enctype="multipart/form-data" method="POST">
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
                                <label for="exampleInputEmail1" class="form-label">Matière</label>
                                <input type="text" name="matiere" class="form-control" value="{{ old('matiere') }}" id="" required>
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
                                <label for="exampleInputEmail1" class="form-label">Mobile</label>
                                <input type="text" name="mobile" class="form-control" value="{{ old('mobile') }}" id="" required>
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