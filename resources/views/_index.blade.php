<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formatic Template</title>
  <link rel="stylesheet" href="{{asset('theme/css/styleindex.css')}}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>
  <header class="navbar navbar-dark bg-dark">
    <div class="container d-flex justify-content-between align-items-center">
      <div class="navbar-brand text-white d-flex align-items-center">
        <img src="{{asset('theme/img/logo.png')}}" alt="Logo" class="logo mr-2"> <!-- Remplacez "logo.png" par l'image de votre logo -->
        <span>FORMATIC</span>
      </div>
      <a href="#" target="_blank" class="btn btn-light">Accueil</a>
      <a href="#" target="_blank" class="btn btn-light">Nos formations</a>
      <a href="{{route('login')}}" target="_blank" class="btn btn-primary">Se Connecter</a>
    </div>
  </header>

  <div class="container mt-4">
    <h1 style="font-family: arial; font-weight: bold; font-size: 60px">Enseigner à l’ère d’Internet signifie que nous devons enseigner Les compétences de demain
        <span style="color:rgb(49, 178, 135);"> aujourd’hui</span>.
    </h1>
  </div><br><br>
  <div class="row" style="text-align: center; margin-left: 500px">
    <h1 style=" color: #007BFF; font-weight: bold; font-size: 40px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Nos formations</h1>
</div>
  <main class="container mt-4">

    <div class="row">
        <div class="card" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Formation1</h5>
              <p class="card-text">Description de la formation</p>
              <p class="card-text">Prix:</p>
              <a href="{{ route('inscrits.create', ['formation_id' => 1]) }}" class="btn btn-primary btn-lg px-5">
                S'inscrire
            </a>
            </div>
          </div>
          <div class="card" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Formation2</h5>
              <p class="card-text">Description de la formation</p>
              <p class="card-text">Prix:</p>
              <a href="#" class="btn btn-primary">S'inscrire</a>
            </div>
          </div>
          <div class="card" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Formation3</h5>
              <p class="card-text"> Description de la formation</p>
              <p class="card-text">Prix:</p>
              <a href="#" class="btn btn-primary">S'inscrire</a>
            </div>
          </div>
          <div class="card" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Formation4</h5>
              <p class="card-text">Description de la formation</p>
              <p class="card-text">Prix:</p>
              <a href="#" class="btn btn-primary">S'inscrire</a>
            </div>
          </div>
          <div class="card" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Formation5</h5>
              <p class="card-text">Description de la formation</p>
              <p class="card-text">Prix:</p>
              <a href="#" class="btn btn-primary">S'inscrire</a>

            </div>
          </div>
          <div class="card" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Formation6</h5>
              <p class="card-text">Description de la formation</p>
              <p class="card-text">Prix:</p>
              <a href="#" class="btn btn-primary">S'inscrire</a>
            </div>
          </div>
    </div>
  </main>

  <footer class="bg-dark text-center text-white py-3">
    © 2024 FORMATIC. Tous droits réservés.
  </footer>
</body>
</html>
