<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulaire d'inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      body {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #f8f9fa;
        margin: 0;
      }
      .form-container {
        width: 300%;
        max-width: 400px;
        background: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      }
      .form-title {
        text-align: center;
        margin-bottom: 20px;
        color: #007bff;
      }
      .btn-submit {
        width: 100%;
        margin-top: 20px;
      }
    </style>
  </head>
  <body>
    <div class="form-container mt-5">
        <h1 class="form-title">Formulaire d'inscription</h1>
        <form method="POST" action="{{ route('inscrits.store') }}">
            @csrf
            <input type="hidden" name="formation_id" value="{{ $formation_id }}">

            <!-- Champ Nom -->
            <div class="mb-3">
                <label for="nom" class="form-label">Nom :</label>
                <input type="text" id="nom" name="nom" class="form-control" value="{{ old('nom') }}" required placeholder="Entrez votre nom">
                @error('nom') <div class="text-danger mt-1">{{ $message }}</div> @enderror
            </div>

            <!-- Champ Prénom -->
            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom :</label>
                <input type="text" id="prenom" name="prenom" class="form-control" value="{{ old('prenom') }}" required placeholder="Entrez votre prénom">
                @error('prenom') <div class="text-danger mt-1">{{ $message }}</div> @enderror
            </div>

            <!-- Champ Sexe -->
            <div class="mb-3">
                <label for="sexe" class="form-label">Sexe :</label>
                <select id="sexe" name="sexe" class="form-select" required>
                    <option value="0" {{ old('sexe') == '0' ? 'selected' : '' }}>Masculin</option>
                    <option value="1" {{ old('sexe') == '1' ? 'selected' : '' }}>Féminin</option>
                </select>
                @error('sexe') <div class="text-danger mt-1">{{ $message }}</div> @enderror
            </div>

            <!-- Champ Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email :</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Entrez votre email">
                @error('email') <div class="text-danger mt-1">{{ $message }}</div> @enderror
            </div>

            <!-- Champ Mobile -->
            <div class="mb-3">
                <label for="mobile_1" class="form-label">Mobile 1 :</label>
                <input type="text" id="mobile_1" name="mobile_1" class="form-control" value="{{ old('mobile_1') }}" required placeholder="Entrez votre mobile principal">
                @error('mobile_1') <div class="text-danger mt-1">{{ $message }}</div> @enderror
            </div>

            <!-- Champ Mobile 2 -->
            <div class="mb-3">
                <label for="mobile_2" class="form-label">Mobile 2 (facultatif) :</label>
                <input type="text" id="mobile_2" name="mobile_2" class="form-control" value="{{ old('mobile_2') }}" placeholder="Entrez un second numéro (facultatif)">
                @error('mobile_2') <div class="text-danger mt-1">{{ $message }}</div> @enderror
            </div>

            <!-- Champ Objectif -->
            <div class="mb-3">
                <label for="objectif" class="form-label">Objectif :</label>
                <textarea id="objectif" name="objectif" class="form-control" placeholder="Décrivez votre objectif ici">{{ old('objectif') }}</textarea>
                @error('objectif') <div class="text-danger mt-1">{{ $message }}</div> @enderror
            </div>

            <!-- Champ Statut -->
            <div class="mb-3">
                <label for="statut" class="form-label">Statut :</label>
                <select id="statut" name="statut" class="form-select" required>
                    <option value="0" {{ old('statut') == '0' ? 'selected' : '' }}>Non payé</option>
                    <option value="1" {{ old('statut') == '1' ? 'selected' : '' }}>Payé par tranche</option>
                    <option value="2" {{ old('statut') == '2' ? 'selected' : '' }}>Tout payé</option>
                </select>
                @error('statut') <div class="text-danger mt-1">{{ $message }}</div> @enderror
            </div>

            <!-- Champ Type -->
            <div class="mb-3">
                <label for="type" class="form-label">Type :</label>
                <select id="type" name="type" class="form-select" required>
                    <option value="0" {{ old('type') == '0' ? 'selected' : '' }}>Présentiel</option>
                    <option value="1" {{ old('type') == '1' ? 'selected' : '' }}>En ligne</option>
                </select>
                @error('type') <div class="text-danger mt-1">{{ $message }}</div> @enderror
            </div>

            <!-- Bouton de soumission -->
            <button type="submit" class="btn btn-primary btn-submit">Soumettre</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
