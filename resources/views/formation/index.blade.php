@extends('backend.dash.main')
@section('content')
<div class="rounded p-4">
        <hr class="header-separator">
        <div class="sub-header">
            <h4>Liste des formation</h2>
            <hr class="sub-header-separator">
        </div>
        @can('permission', 'Creer-Formation')
                <div>
                        <button type="button" class="btn btn-outline-success me-2" data-bs-toggle="modal" data-bs-target="#addformation" data-bs-whatever=""> <i class="fa fa-plus"></i> formation</button>                        
                </div>
                @endcan
                
</div>                       
<table id="example" class="table table-striped">
                                <thead>
                                <tr class="table_color">
                                    <th>N°</th>
                                    <th>Titre</th>
                                    <th>Description</th>
                                    <th>Prix</th>
                                    <th>Début</th>
                                    <th>Fin</th>
                                    <th>Lieu</th>
                                    <th>Place</th>
                                    <th>Action</th>                   
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                        $i=0; 
                                    @endphp
                                    @foreach ($formations as $formation)
                                            @php
                                            $i++;
                                            @endphp
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$formation->titre}}</td> 
                                    <td>{{ $formation->description}}</td>
                                    <td>{{ $formation->prix}}</td>
                                    <td>{{ $formation->date_debut}}</td>
                                    <td>{{ $formation->date_fin}}</td>
                                    <td>{{ $formation->lieu}}</td>
                                    <td>{{ $formation->place}}</td>
                                    <td>
                                    @can('permission', 'Editer Formation')
                                        <!-- <a href="#" class="btn btn-outline-success" title="Afficher les détais"> <i class="fa fa-eye"></i></a> -->
                                    <a href="{{route('formation.edit', $formation->id)}}" class="btn btn-outline-danger"  title="Modifier"> <i class="fa fa-pen"></i></a>
                                    @endcan
                                </td>
                                                       
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>N°</th>
                                    <th>Titre</th>
                                    <th>Description</th>
                                    <th>Prix</th>
                                    <th>Début</th>
                                    <th>Fin</th>
                                    <th>Lieu</th>
                                    <th>Place</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
            <!-- Form End -->
@endsection
<div class="modal fade" id="addformation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nouvelle Formation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('formation.store')}}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="modal-body">        
                <div class="row g-4">                    
                        <div class="col-md-6">                        
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Titre (<span class="text-danger">*</span>)</label>
                                <input type="text" name="titre" class="form-control" value="{{ old('libelle') }}" id="" required>
                            </div>               
                        </div>
                        <div class="col-md-6">                        
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Description (<span class="text-danger">*</span>)</label>
                                <textarea class="form-control" col="2" rows="2" name="description" placeholder="Saisir..." id="floatingTextarea" required></textarea>
                            </div>
                        </div>                        
                </div>
                <div class="row g-4">                    
                        <div class="col-md-6">                        
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Date Début (<span class="text-danger">*</span>)</label>
                                <input type="date" name="debut" class="form-control"  id="" required>
                            </div>               
                        </div>
                        <div class="col-md-6">                        
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Date Fin (<span class="text-danger">*</span>)</label>
                                <input type="date" name="fin" class="form-control" id="" required>
                                
                            </div>
                        </div>                        
                </div>
                <div class="row g-4">                    
                        <div class="col-md-6">                        
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Frais de Participation (<span class="text-danger">*</span>)</label>
                                <input type="number" name="prix" class="form-control"  id="" required>
                            </div>
                        </div>
                        <div class="col-md-6">                        
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nombre de Place (<span class="text-danger">*</span>)</label>
                                <input type="number" name="place" class="form-control" id="" required>                                
                            </div>
                        </div>                                               
                </div>
                <div class="row g-4">                    
                        <div class="col-md-6">                        
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Lieu</label>
                                <input type="text" name="lieu" class="form-control" id="">                                
                            </div>
                        </div> 
                        <div class="col-md-6">                        
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Formateur (<span class="text-danger">*</span>)</label>
                                    <select  class="form-select mb-3" id="parent" name="formateur" required autofocus>
                                            <option></option>
                                            @foreach ($formateurs as $formateur)
                                            <option value="{{$formateur->id}}">{{$formateur->nom}} - {{$formateur->prenom}}</option>
                                            @endforeach           
                                    </select>
                                
                            </div>
                        </div>
                        <div class="col-md-6">                        
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Image (<span class="text-danger">*</span>)</label>
                                <input type="file" name="image" class="form-control" accept="image/png, image/jpeg, image/jpg" id="" required>
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