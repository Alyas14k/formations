<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formatique - Connexion</title>
  <link rel="stylesheet" href="{{asset('theme/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('theme/css/style.css')}}">

  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
</head>
<body>
  
  <div class="container">
    <div class="login-card">
      <div class="logo">
        <img src="{{asset('theme/img/logo.png')}}" alt="Scientia Logo">
        <h2>Connexion</h2>
      </div>
      <form action="{{ route('login') }}" method="POST">
      @csrf
        <div class="form-group">
          <label for="email">E-mail</label>
          <input type="email" id="email" name="email" placeholder="scientia@gmail.com" required>
        </div>
        <div class="form-group">
          <label for="password">Mot de passe</label>
          <input type="password" id="password" name="password" placeholder="****" required>
        </div>
        <button type="submit" class="btn">Se Connecter</button>
      </form>
    </div>
    <div class="info-card">
      <img src="{{asset('theme/img/connexion.png')}}" alt="Person Image">
    </div>
  </div>
</body>
</html>
