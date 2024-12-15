@extends('backend.dash.main')
@section('content')

<div class="container-fluid pt-4 px-4">
        <!-- <div class="row g-4">
                
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Graphique Matériel</h6>
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Single Bar Chart</h6>
                            <canvas id="bar-chart"></canvas>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6" style="display:none;">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Single Line Chart</h6>
                            <canvas id="line-chart"></canvas>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6" style="display:none;">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Multiple Line Chart</h6>
                            <canvas id="salse-revenue"></canvas>
                        </div>
                    </div>                    
                    <div class="col-sm-12 col-xl-6" style="display:none;">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Multiple Bar Chart</h6>
                            <canvas id="worldwide-sales"></canvas>
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-xl-6" style="display:none;">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Doughnut Chart</h6>
                            <canvas id="doughnut-chart"></canvas>
                        </div>
                    </div>                    
        </div> -->

        <div class="row g-4">
                                        <!-- Définir une classe de couleur en fonction du type de matériel -->
                                            <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4 stat-box">
                            <i class="fa fa-graduation-cap fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Formation</p>
                                <h5 class="mb-0">{{$formation}}</h5>
                                <!-- <p class="mb-2">Materiel</p>
                                <h5 class="mb-0">26</h5> -->
                            </div>
                        </div>
                    </div>
                                        <!-- Définir une classe de couleur en fonction du type de matériel -->
                                            <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4 stat-box">
                            <i class="fa fa-user-plus fa-3x text-success"></i>
                            <div class="ms-3">
                                <p class="mb-2">Inscrits Paye</p>
                                <h5 class="mb-0">{{$paye}}</h5>
                                <!-- <p class="mb-2">Materiel</p>
                                <h5 class="mb-0">26</h5> -->
                            </div>
                        </div>
                    </div>
                                        <!-- Définir une classe de couleur en fonction du type de matériel -->
                                            <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4 stat-box">
                            <i class="fa fa-times fa-3x text-danger"></i>
                            <div class="ms-3">
                                <p class="mb-2">Non Paye</p>
                                <h5 class="mb-0">{{$non_paye}}</h5>
                                <!-- <p class="mb-2">Materiel</p>
                                <h5 class="mb-0">26</h5> -->
                            </div>
                        </div>
                    </div>
                                        <!-- Définir une classe de couleur en fonction du type de matériel -->
                                            <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4 stat-box">
                            <i class="fa fa fa-qrcode fa-3x text-warning"></i>
                            <div class="ms-3">
                                <p class="mb-2">Tranche</p>
                                <h5 class="mb-0">{{$tranch}}</h5>
                                <!-- <p class="mb-2">Materiel</p>
                                <h5 class="mb-0">26</h5> -->
                            </div>
                        </div>
                    </div>
                                        <!-- Définir une classe de couleur en fonction du type de matériel -->
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4 stat-box">
                            <i class="fa fa-users fa-3x text-info"></i>
                            <div class="ms-3">
                                <p class="mb-2">Formateurs</p>
                                <h5 class="mb-0">{{$formateur}}</h5>
                                <!-- <p class="mb-2">Materiel</p>
                                <h5 class="mb-0">26</h5> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4 stat-box">
                            <i class="fa fa-file-invoice-dollar fa-3x text-danger"></i>
                            <div class="ms-3">
                                <p class="mb-2">Paiements</p>
                                <h5 class="mb-0">{{$formateur}}</h5>
                                <!-- <p class="mb-2">Materiel</p>
                                <h5 class="mb-0">26</h5> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4 stat-box">
                            <i class="fa fa fa-question fa-3x text-danger"></i>
                            <div class="ms-3">
                                <p class="mb-2">Demandes</p>
                                <h5 class="mb-0">{{$formateur}}</h5>
                                <!-- <p class="mb-2">Materiel</p>
                                <h5 class="mb-0">26</h5> -->
                            </div>
                        </div>
                    </div>
    </div>
    <br>

    <div class="row g-4">
                
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Inscrit Par Formation</h6>
                            <table class="table table-striped">
                                <thead>
                                    <tr class="table_color">
                                        <th class="col-1">N°</th>
                                        <th class="col-4">Formation</th>
                                        <th class="col-2">Payé</th>
                                        <th class="col-2">Non Payé</th>
                                        <th class="col-2">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i=0; 
                                    @endphp
                                    @foreach ($formation_tabs as $formation)
                                            @php
                                            $i++;
                                            @endphp
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$formation->titre}}</td>
                                        <td>{{$formation->inscrits_payes_count}}</td>
                                        <td>{{$formation->inscrits_non_payes_count}}</td>
                                        <td>{{$formation->inscrits_count}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Formateur Par Formation</h6>
                            <table class="table table-striped">
                                <thead>
                                    <tr class="table_color">
                                        <th class="col-1">N°</th>
                                        <th class="col-4">Nom et Prénom</th>
                                        <th class="col-2">Formation</th>
                                        <th class="col-2">Prix</th>                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i=0; 
                                    @endphp
                                    @foreach ($formateur_tabs as $tab)
                                            @php
                                            $i++;
                                            @endphp
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$tab->formateur->nom}} {{$tab->formateur->prenom ?? 'N/A' }}</td>
                                        <td>{{$tab->formation->titre ?? 'N/A' }}</td>
                                        <td>{{$tab->formation->prix ?? 'N/A' }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--<div class="col-sm-12 col-xl-6" style="display:none;">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Single Line Chart</h6>
                            <canvas id="line-chart"></canvas>
                        </div>
                    </div>                                         -->
        </div>

</div>
                    
@endsection
