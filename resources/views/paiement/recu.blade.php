<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
 
    <title>Detail sur le dossier de souscription</title>

    <style type="text/css">
    table, td, th {
   /* border: 1px solid;  */
}
.fond{
        /* background: url("{{asset('img/folem.JPG')}}");            */
        height: 35%;
        width: 25%;
        margin-bottom: -7%;
        /* margin-top: -10%; */
         background-position: center;
         margin-left:10%;
         background-repeat: no-repeat;
         background-size: cover;
         opacity: 0.2;
         filter: alpha(opacity=50);
        }
/* .image{
        margin-top: -35%;
} */
 .paiement, td, th{
    border: 1px solid;
 }
table {
  width: 100%;
  /* margin-top: -45%; */
  border-collapse: collapse;
  margin-bottom: 20px;
}
hr{
        height: 5px;
        background-color: #0b9e44;
        border: none;
        margin-top: 10px;
}
        .enteteGauche{
            float: left;
            width: 50%;
            text-align: center;
            margin-right: 120px;
        }
        .entetedroite{
           margin-left: 60%;
           margin-top: -100px;
            width: 50%;
            text-align: center;
        }
        .logo{
            
            margin-left: 600px;
            width: 50%;
            text-align: center;
        }
        .entete{
            margin-top:50px;
            text-align: center;
            color:red;
            font-weight: blod;
            margin-bottom: 55px;
        }
        .titre{
            position:relative;
            margin-left:20px;
            width:50%;
            border:solid 2px black;
            padding-right:10px;
            text-align:center;

        }
        .contenu{
            position:relative;
            margin-right:20px;
            width:40%;
            text-align:center;
            padding-left:10px;
            display:inline-block;
        }
        .labdetail{
        font-weight: bold;
        }
      
    </style>
</head>
<body>

        <!-- <div class="enteteGauche" style="margin: left -50px">Cercle d'Etude de Recherche<br>
        et de Formation Islamique <br>  (CERFI)<br>------------<br>
        Chevalier de l'ordre du mérite <br>  national
        </div> -->
        
         <div><img style="width: 130px; margin: left 30px; margin-top:auto;" src="{{asset('theme/img/logo.JPG')}}" alt="Logo CERFI"></div> 
        <!-- <div class="entetedroite">Burkina Faso <br>Unité-Progrès-Justice <br>           <br> Au Nom d'Allah, Clément <br> et Miséricordieux</div> -->
        <!-- <div class="entetedroite">Burkina Faso <br> -----------  <br> Unité-Progres-Justice </div> -->
        <!-- <div class="entete"> Recepisse d'inscription au SENAFID 2023 N°: <hr> </div> -->
            <!-- <h3>Enregistrement du dossier (réservée à la Maison de l’Entreprise du Burkina Faso)</h3>
    <table>
        <tr>
            <td>Dossier N° : </td>
            <td>Date d'enregistrement : </td>
        </tr>
    </table> --> 
    <div style="margin-top: 30px;">
        <hr>
        <!-- <img style="margin: left -270px; margin-top: 10px;" src="{{asset('img/fiche.jpg')}}" alt="Fiche"> -->
    </div> 
    <div style="margin-top:-100px;">
    <Center><h2 style="color: green; margin-top:50px;"><u>FORMATIC</u></h2></Center>
    <Center><h4 style="margin-top: -10px">FORUM DU LEADERSHIP ET DE L'ENTREPRENEURIAT MUSULMANS</h4>
    <h4 style="margin-top: -13px">Du 31 octobre au 02 novembre 2024 à Ouagadougou dans l’amphi PSUT de l’Université Joseph Ki-Zerbo</h4>
    </Center>
        
    </div>       
    <!-- <p style="background-color: red;">Du 20 au 28 Aôut à Bobo Dioulasso </p>  -->
        
           <center> <p style="color: red;"><u> Fiche de Paiement N°:  </u> </p></center>
           <!-- <img src="{{asset('theme/img/logo.JPG')}}" class="fond" alt=""> -->
       <table id="">
            
            <tr>
                <td><strong> Nom et Prenom :</strong></td>
                <td> {{$inscrit->nom}} {{$inscrit->prenom}}</td>
            </tr>            
            <tr>
                <td><strong>Sexe :</strong></td>
                <td> @if($inscrit->sexe==0) Masculin @else Feminin @endif</td>
            </tr>
            <tr>
                <td><strong>Contact :</strong></td>
                <td>{{$inscrit->mobile_1}} / {{$inscrit->email}} </td>
            </tr>
            <tr>
                <td><strong>Type Formation :</strong></td>
                <td>@if($inscrit->type_formation==0) Présentielle @else En Ligne @endif </td>
            </tr>
        </table> <br>

        <table> 
            <tr>
                <td><strong>Montant Payé : </strong></td>
                <td>{{$last->montant}} FCFA</td>
            </tr> 
            <tr>
                <td><strong>Reste à Payer : </strong></td>
                <td>{{$last->reste}} FCFA</td>
            </tr>        
        </table>
        @if(countPaiement($paiements)>1)
        <h3>Paiements Anterieurs:</h3>
        <table class="paiement">
            <thead>
                <tr>
                    <tr style="background-color:#0b9e44; color:white">
                    <th>N°</th>
                    <th>Code</th>
                    <th>Montant Payé</th>
                    <th>Reste à Payer</th>
                    <th>Date Paiement</th>       
                </tr>
            </thead>
            <tbody>
                    @php
                        $i=0; 
                    @endphp
                    @foreach ($paiements as $paiement)
                    @php
                        $i++;
                    @endphp
                                    
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$paiement->code}}</td>
                    <td>{{$paiement->montant}}</td>
                    <td>{{$paiement->reste}}</td>
                    <td>{{$paiement->created_at}}</td>
                </tr>                
                @endforeach
                <tr>
                    <td>Total Paye</td>
                    <td></td>
                    <td>8765</td>
                </tr>
            </tbody>
        </table>
        @endif

        

<div>
<p>Directeur</p>
    <!-- <img style="width: 90px; height: 30px;" src="{{asset('img/CERFI.PNG')}}" alt="Cachet"></div>  -->
        <!-- <p style="font-size: 15px;  text-align: justify;">Les frais d'inscription s'élèvent à FCFA</p> -->
        <i><p style="font-size: 13px;">NB: Cette fiche est strictement personnelle, elle vous sera demandée lors du forum </p></i>
       <p style="font-size: 13px;"> Pour toute information contactez nous au : <span style="font-weight: bold;">+226 57 47 67 59 - 65 60 29 03 - 60 71 96 34</span></p></i><br>
        <span style="width: 40%; float: right;">Fait à Ouagadougou le <span style="font-weight: bold;"></span> </span> <br>
       <img src="data:image/png;base64" alt="Code QR">
       
</div>

</body>
</html>