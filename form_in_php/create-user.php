<?php

error_reporting(E_ALL); //serve a visualizzare gli errori

require "./class/validator/ValidateRequired.php";
require "./class/validator/Validable.php";

// print_r($_SERVER['REQUEST_METHOD']);

$validator_name = new ValidateRequired('','Il nome è obbligatorio');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  //echo "dati inviati adesso li devo controllare";
  $validatedName = $validator_name->isValid($_POST['first_name']);
  //come associo la validazione ad un campo/input/controllo
  //nome -> required
  //birthday -> required | validDate

  //<?= equivale a scrivere l'echo con apertura di php

  //$isValidNameClass = $validator_name->isValid($_POST['first_name']) ? '' : 'is-invalid';

  $validator_surname = new ValidateRequired();
  $validatedSurname = $validator_surname->isValid($_POST['last_name']);
  $isValidSurnameClass = $validator_surname->isValid($_POST['last_name']) ? '' : 'is-invalid';

  $validator_date = new ValidateRequired();
  $validatedDate = $validator_date->isValid($_POST['birthday']);
  $isValidDateClass = $validator_date->isValid($_POST['birthday']) ? '' : 'is-invalid';

  $validator_birth_place = new ValidateRequired();
  $validatedBirthPlace = $validator_birth_place->isValid($_POST['birth_place']);
  $isValidBirthPlaceClass = $validator_birth_place->isValid($_POST['birth_place']) ? '' : 'is-invalid';

  $validator_sex = new ValidateRequired();
  $gender = !isset($_POST['gender']) ? '' : $_POST['gender'];
  $validatedSex = $validator_sex->isValid($gender);
  //$isValidSexClass = $validator_sex->isValid($_POST['gender']) ? '' : 'is-invalid';

  $validator_username = new ValidateRequired();
  $validatedUsername = $validator_username->isValid($_POST['username']);
  $isValidUsernameClass = $validator_username->isValid($_POST['username']) ? '' : 'is-invalid';

  $validator_password = new ValidateRequired();
  $validatedPassword = $validator_password->isValid($_POST['password']);
  $isValidPasswordClass = $validator_password->isValid($_POST['password']) ? '' : 'is-invalid';

  var_dump($_POST);


/*Questo script viene eseguito quando visualizzo per la prima volta il form*/
}if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $isValidNameClass = '';
  $validatedSex = 'ciao';
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
  <header class="bg-light p-1">
    <h1 class="display-6">Applicazione demo</h1>
  </header>
  <main class="container">

    <section class="row">
      <div class="col-sm-4">

      </div>
      <div class="col-sm-4">

        <form class="mt-1 mt-md-5" action="create-user.php" method="POST">

          <div class="mb-3">
            <label for="first_name" class="form-label">Nome</label>
            <input type="text" value="<?= $validator_name->getValue() ?>"
            class="form-control <?php !$validator_name->getValid() ? 'is-invalid':'' ?>" name="first_name" id="first_name">
            <?php
            if ($validator_name->getValid()) { ?>

              <div class="invalid-feedback">
                <?php echo $validator_name->getMessage(); ?>
              </div>

            <?php } ?>


          </div>

          <div class="mb-3">
            <label for="last_name" class="form-label">Cognome</label>
            <input type="text" class="form-control <?php echo $isValidSurnameClass ?>" name="last_name" id="last_name">
            <?php
            if (isset($validatedSurname) && !$validatedSurname) { ?>

              <div class="invalid-feedback">
                Il cognome è obbligatorio
              </div>

            <?php } ?>
          </div>

          <div class="mb-3">
            <label for="birthday" class="form-label">Data di nascita</label>
            <input type="date" class="form-control <?php echo $isValidDateClass ?>" name="birthday" id="birthday">
            <?php
            if (isset($validatedDate) && !$validatedDate) { ?>

            <div class="invalid-feedback">
              La data di nascita è obbligatoria
            </div>
            
            <?php } ?>

          </div>

          <div class="mb-3">
            <label for="birth_place" class="form-label">Luogo di nascita</label>
            <input type="text" class="form-control <?php echo $isValidBirthPlaceClass ?>" name="birth_place" id="birth_place">
            <?php
            if (isset($validatedBirthPlace) && !$validatedBirthPlace) { ?>
            
            <div class="invalid-feedback">
              Il luogo di nascita è obbligatorio
            </div>

            <?php } ?>

          </div>

          <div class="mb-3">
            <span>Genere</span>
            <div class="form-check">
              <!-- TODO: METTERE IS- INVALID SU TUTTI I GENERI -->
              <input class="form-check-input <?php echo !$validatedSex ? 'is-invalid' : '' ?>" type="radio" name="gender" value="M" id="gender_M">
              <label class="form-check-label" for="gender_M">Maschile</label>
            </div>
            <div class="form-check">
              <input class="form-check-input <?php echo !$validatedSex ? 'is-invalid' : '' ?>" type="radio" name="gender" value="F" id="gender_F">
              <label class="form-check-label" for="gender_F">Femminile</label>
            </div>
            <div class="form-check">
              <input class="form-check-input <?php echo !$validatedSex ? 'is-invalid' : '' ?>" type="radio" name="gender" value="A" id="gender_A">
              <label class="form-check-label" for="gender_A">Altro</label>

              <?php
            if (!$validatedSex) : ?>
              <div class="invalid-feedback">Il genere è obbligatorio</div>

            </div>

            <?php endif ?>

          </div>

          <div class="mb-3">
            <label for="username" class="form-label">Nome utente</label>
            <input type="text" class="form-control <?php echo $isValidUsernameClass ?>" name="username" id="username">
            <?php
            if (isset($validatedUsername) && !$validatedUsername) { ?>
            
            <div class="invalid-feedback">
              Il nome utente è obbligatorio
            </div>

            <?php } ?>

          </div>

          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control <?php echo $isValidPasswordClass ?>" name="password" id="password">
            <?php
            if (isset($validatedPassword) && !$validatedPassword) { ?>
            
            <div class="invalid-feedback">
              La password è obbligatoria
            </div>

            <?php } ?>
          </div>


          <button class="btn btn-primary btn-sm" type="submit"> Crea </button>
        </form>
      </div>

      <div class="col-sm-4">
      </div>
    </section>
  </main>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>