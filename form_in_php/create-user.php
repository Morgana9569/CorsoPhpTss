<?php

use Registry\italia\Provincia;
use Registry\italia\Regione;
use validator\ValidateDate;
use validator\ValidateMail;
use validator\ValidateRequired;

require "../config.php";
require "./autoload.php";

//error_reporting(E_ALL); serve a visualizzare gli errori

// print_r($_SERVER['REQUEST_METHOD']);

$first_name = new ValidateRequired('','Il Nome è obblicatorio');
$last_name  = new ValidateRequired('','Il Cognome è obblicatorio');
$birtday  = new ValidateDate('','La data di nascità non è valida');
$birth_place  = new ValidateRequired('','Il Luogo di nascita è obbligatorio');
$gender  = new ValidateRequired('','Il Genere è obbligatorio');

$username_required  = new ValidateRequired('','Username è obbligaztorio');
$username_email  = new ValidateMail('','Formato email non valido');

$password  = new ValidateRequired('','Password è obbligatorio');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $first_name->isValid($_POST['first_name']);
    $last_name->isValid($_POST['last_name']);
    $birth_place->isValid($_POST['birth_place']);
    $gender->isValid($_POST['gender']);
    $username_email->isValid($_POST['username']);
    $username_required->isValid($_POST['username']);
    $password->isValid($_POST['password']);

    if($first_name->getValid() && $last_name->getValid()){
        
    }
    // Usato per il caso dei radio
    // $value = isset($_POST['gender']) ? $_POST['gender'] :'';
    // $gender->isValid($value);
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
            <input type="text" value="<?= $first_name->getValue() ?>"
            class="form-control <?php echo !$first_name->getValid() ? 'is-invalid':'' ?>" name="first_name" id="first_name">
            <?php
            if (!$first_name->getValid()) { ?>

              <div class="invalid-feedback">
                <?php echo $first_name->getMessage(); ?>
              </div>

            <?php } ?>


          </div>

          <div class="mb-3">
            <label for="last_name" class="form-label">Cognome</label>
            <input type="text" id="last_name" value="<?= $last_name->getValue() ?>" name="last_name" 
            class="form-control <?php echo !$last_name->getValid() ? 'is-invalid':'' ?>"
            >
            <?php
            if (!$last_name->getValid()) { ?>

              <div class="invalid-feedback">
              <?php echo $last_name->getMessage(); ?>
              </div>

            <?php } ?>
          </div>

          <div class="mb-3">
            <label for="birthday" class="form-label">Data di nascita</label>
            <input type="date" value="<?= $birtday->getValue() ?>"
            class="form-control <?php echo !$birtday ->getValid() ? 'is-invalid':'' ?>" name="birthday" id="birthday">
            <?php
            if (!$birtday->getValid()) { ?>

            <div class="invalid-feedback">
            <?php echo $birtday->getMessage(); ?>
            </div>
            
            <?php } ?>

          </div>

          <div class="mb-3">
            <label for="birth_place" class="form-label">Luogo di nascita</label>
            <input type="text" value="<?= $birth_place->getValue() ?>"
            class="form-control <?php echo !$birth_place->getValid() ? 'is-invalid':'' ?>" name="birth_place" id="birth_place">
            <?php
            if (!$birth_place->getValid()) { ?>
            
            <div class="invalid-feedback">
            <?php echo $birth_place->getMessage(); ?>
            </div>

            <?php 
            } 
            ?>

          </div>

          <div class="mb-3">
            <div class="row">
            <div class="col">
              <label for="birth_city" class="form-label">Città</label>
              <input type="text" class="form-control" name="birth_city" id="birth_city">
            </div>

            <div class="col">
            <label for="birth_region" class="form-label">Regione</label>
            <select class="birth_region form-select" name="birth_region" id="birth_region">
              <option value=""></option>

            <?php foreach (Regione::all() as $regione) : ?>
              <option value="<?= $regione->id_regione ?>"><?= $regione->nome?></option>
              <?php endforeach; ?>
            </select>
            </div>

            <div class="col">
            <label for="birth_province" class="form-label">Provincia</label>
            <select class="birth_province form-select" name="birth_province" id="birth_province">
            <option value=""></option>
            <?php foreach (Provincia::all() as $province) : ?>
              <option value="<?= $province->id_provincia ?>"><?= $province->nome?></option>
              <?php endforeach; ?>
            </select>
            
            </div>
          </div>
          </div>

          <div class="mb-3">
            <span>Genere</span>
            <div class="form-check">
              <!-- TODO: METTERE IS- INVALID SU TUTTI I GENERI -->
              <input value="<?= $gender->getValue() ?>" 
              class="form-check-input <?php echo !$gender->getValid() ? 'is-invalid' : '' ?>" type="radio" name="gender" value="M" id="gender_M">
              <label class="form-check-label" for="gender_M">Maschile</label>
            </div>
            <div class="form-check">
              <input value="<?= $gender->getValue() ?>"
              class="form-check-input <?php echo !$gender->getValid() ? 'is-invalid' : '' ?>" type="radio" name="gender" value="F" id="gender_F">
              <label class="form-check-label" for="gender_F">Femminile</label>
            </div>
            <div class="form-check">
              <input value="<?= $gender->getValue() ?>"
              class="form-check-input <?php echo !$gender->getValid() ? 'is-invalid' : '' ?>" type="radio" name="gender" value="A" id="gender_A">
              <label class="form-check-label" for="gender_A">Altro</label>

              <?php
            if (!$gender->getValid()) : ?>
              <div class="invalid-feedback">
              <?php echo $gender->getMessage() ?>
              </div>

            </div>

            <?php endif ?>

          </div>

          <div class="mb-3">
            <label for="username" class="form-label">Nome utente</label>
            <input type="text" class="form-control 
            <?php echo (!$username_email->getValid() && !$username_required->getValid()) ? 'is-invalid':'' ?>" name="username" id="username">
            <?php
            if (!$username_email->getValid()) { ?>
            
            <div class="invalid-feedback">
            <?php echo $username_email->getMessage(); ?>
            </div>

            <?php } ?>
            <?php
                        if (!$username_required->getValid()) : ?>
                            <div class="invalid-feedback">
                            <?php echo $username_required->getMessage() ?>
                            </div>
                        <?php endif ?>

          </div>

          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="text" id="password" name="password" class="form-control <?php echo !$password->getValid() ? 'is-invalid' : ''  ?>">
                        <?php
                        if (!$password->getValid()) : ?>
                            <div class="invalid-feedback">
                               <?php echo $password->getMessage() ?>
                            </div>
                        <?php endif ?>
                    </div>


          <button class="btn btn-primary btn-sm" type="submit"> Registrati </button>
        </form>
      </div>

      <div class="col-sm-4">
      </div>
    </section>
  </main>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>