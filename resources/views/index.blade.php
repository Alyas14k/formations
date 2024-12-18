<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formatic Template</title>
  <link rel="stylesheet" href="{{ asset('theme/css/styleindex.css') }}">
  <link rel="stylesheet" href="{{ asset('theme/css/custom.css') }}"> <!-- Fichier CSS personnalisé -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .custom-alert {
        background-color: green;
        color: white;
        width: 40%;
        text-align: center;
        padding: 5px;
        border-radius: 10px;
        margin: 5px 0;
    }
  </style>
</head>
<body>
  <!-- Header -->
  <header class="navbar navbar-dark bg-dark">
    <div class="container d-flex justify-content-between align-items-center">
      <div class="navbar-brand text-white d-flex align-items-center">
        <img src="{{ asset('theme/img/logo.png') }}" alt="Logo de Formatic" class="logo mr-2"> <!-- Logo -->
        <span>FORMATIC</span>
      </div>
      <nav>
        <a href="#Accueil" class="btn btn-light">Accueil</a>
        <a href="#NosFormations" class="btn btn-light">Nos formations</a>
        <a href="{{ route('demande.create') }}" class="btn btn-light">Faire une Demande</a>
        <a href="{{ route('login') }}" target="_blank" class="btn btn-primary">Se Connecter</a>
      </nav>
    </div>
    
  </header>
  @if(session('message'))
                    <center><div class="custom-alert" style="color: white;">
                        {{ session('message') }}
                    </div>
                    </center>
    @endif
  <!-- Section Accueil -->
  <div class="container mt-4" id="Accueil">
    <h1 style="font-family: Arial, sans-serif; font-weight: bold; font-size: 60px; text-align: center;">
      Enseigner à l’ère d’Internet signifie que nous devons enseigner les compétences de demain
      <span style="color:rgb(49, 178, 135);"> aujourd’hui</span>.
    </h1>
  </div>

  <!-- Section Nos Formations -->
  <div id="NosFormations" class="container mt-5">
    <h1 class="text-primary font-weight-bold text-center mb-4" style="font-size: 40px;">Nos formations</h1>
    <div class="row">
        @if(isset($formations) && $formations->isNotEmpty())
      @foreach($formations as $formation)
      <div class="col-12 col-md-6 col-lg-4 mb-4">
        <div class="card" style="width: 100%;">
          <div class="card-body">
            <img src="{{ Storage::url($formation->url) }}" width="100%" height="100%" alt="">
            <h5 class="card-title">{{ $formation->titre }}</h5>
            <p class="card-text">{{ Str::limit($formation->description, 100) }}</p>
            <p class="card-text"><strong>Prix :</strong> {{ number_format($formation->prix, 0, ',', ' ') }} FCFA</p>
            <a href="{{ route('inscrits.create', ['formation_id' => $formation->id]) }}" class="btn btn-primary btn-lg px-5" aria-label="S'inscrire à {{ $formation->titre }}">
              S'inscrire
            </a>
          </div>
        </div>
      </div>
      @endforeach
      @else
            <p class="text-center text-muted">Aucune formation disponible pour le moment.</p>
        @endif
    </div>


  </div>

  <!-- Footer -->
  <footer class="bg-dark text-center text-white py-3">
    &copy; 2024 FORMATIC. Tous droits réservés.
  </footer>

  <!-- JavaScript pour le défilement fluide -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script>
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
          behavior: 'smooth'
        });
      });
    });
  </script>
  <script>
    $(document).ready(function(){
        // Le message disparaît après 5 secondes (5000 ms)
        setTimeout(function() {
            $(".custom-alert").fadeOut("slow", function() {
                $(this).remove();
            });
        }, 5000); // 5000 ms = 5 secondes
    });
</script>
</body>
</html>
