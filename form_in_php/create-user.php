<?php

use crud\UserCRUD;
use models\User;
use Registry\italia\Provincia;
use Registry\italia\Regione;
use validator\ValidateDate;
use validator\ValidateMail;
use validator\ValidateRequired;
use validator\ValidatorRunner;

require "../config.php";
require "./autoload.php";

//error_reporting(E_ALL); serve a visualizzare gli errori

// print_r($_SERVER['REQUEST_METHOD']);



$validatorRunner = new ValidatorRunner([
  'first_name' => new ValidateRequired('', 'Il Nome è obblicatorio'),
  'last_name'  => new ValidateRequired('', 'Il Cognome è obblicatorio'),
  'birthday'  => new ValidateDate('', 'La data di nascità non è valida'),
  'birthday'  => new ValidateRequired('', 'La data di nascità è obbligatoria'),
  'birth_city'  => new ValidateRequired('', 'La città è obbligatoria'),
  'id_regione'  => new ValidateRequired('', 'La regione è obbligatoria'),
  'id_provincia'  => new ValidateRequired('', 'La provincia è obbligatoria'),
  'gender'  => new ValidateRequired('', 'Il genere è obbligatorio'),
  'username'  => new ValidateRequired('', 'Username è obbligatorio'),
  //'username_email'  => new ValidateMail('','Formato email non valido'),
  'password'  => new ValidateRequired('', 'Password è obbligatorio'),
]);

extract($validatorRunner->getValidatorList());

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $validatorRunner->isValid();

  if ($validatorRunner->getValid()) {
    //i dati mi arrivano da un array, ma il crud lavora con oggetto 
    // $user = (object) $_POST;
    $user = User::arrayToUser($_POST);

    $crud = new UserCRUD();
    //il create del crud vuole un oggetto di tipo user
    $crud->create($user);

    //redirect
    header("location: index-user.php");
  }
}

// $first_name->isValid($_POST['first_name']);
// $last_name->isValid($_POST['last_name']);
// $birth_place->isValid($_POST['birth_place']);
// $gender->isValid($_POST['gender']);
// $username_email->isValid($_POST['username']);
// $username->isValid($_POST['username']);
// $password->isValid($_POST['password']);

//runner per la validazione
// if($first_name->getValid() && $last_name->getValid() && $gender->getValid()){
//   //invio i dati al server sql per memorizzarli
// }

// $isValid= true;
// foreach (ValidatorRunner::getAll() as $istanza_di_validazione) {
//   $isValid = $istanza_di_validazione->getValid() && $isValid;
// }



// Usato per il caso dei radio
// $value = isset($_POST['gender']) ? $_POST['gender'] :'';
// $gender->isValid($value);
// }


?>
<?php require "./class/views/head-view.php" ?>

<section class="row">
  <div class="col-sm-4">

  </div>
  <div class="col-sm-4">

    <form class="mt-1 mt-md-5" action="create-user.php" method="POST">

      <div class="mb-3">
        <label for="first_name" class="form-label">Nome</label>
        <input type="text" value="<?= $first_name->getValue() ?>" class="form-control <?php echo !$first_name->getValid() ? 'is-invalid' : '' ?>" name="first_name" id="first_name">
        <?php
        if (!$first_name->getValid()) { ?>

          <div class="invalid-feedback">
            <?php echo $first_name->getMessage(); ?>
          </div>

        <?php } ?>


      </div>

      <div class="mb-3">
        <label for="last_name" class="form-label">Cognome</label>
        <input type="text" id="last_name" value="<?= $last_name->getValue() ?>" name="last_name" class="form-control <?php echo !$last_name->getValid() ? 'is-invalid' : '' ?>">
        <?php
        if (!$last_name->getValid()) { ?>

          <div class="invalid-feedback">
            <?php echo $last_name->getMessage(); ?>
          </div>

        <?php } ?>
      </div>

      <div class="mb-3">
        <label for="birthday" class="form-label">Data di nascita</label>
        <input type="date" value="<?= $birthday->getValue() ?>" class="form-control <?php echo !$birthday->getValid() ? 'is-invalid' : '' ?>" name="birthday" id="birthday">
        <?php
        if (!$birthday->getValid()) { ?>

          <div class="invalid-feedback">
            <?php echo $birthday->getMessage(); ?>
          </div>

        <?php } ?>

      </div>

      <div class="mb-3">
        <div class="row">
          <div class="col">
            <label for="birth_city" class="form-label">Città</label>
            <input type="text" class="form-control <?php echo !$birth_city->getValid() ? 'is-invalid' : '' ?>" name="birth_city" id="birth_city">
            <?php if (!$birth_city->getValid()) : ?>
              <div class="invalid-feedback">
                <?php echo $birth_city->getMessage() ?>
              </div>
            <?php endif ?>
          </div>

          <div class="col">
            <label for="birth_region" class="form-label">Regione</label>
            <select id="birth_region" class="form-select <?php echo !$id_regione->getValid() ? 'is-invalid' : '' ?>" name="id_regione">
              <option value="">Seleziona</option>
              <?php foreach (Regione::all() as $regione) : ?>
                <option <?php echo $id_regione->getValue() == $regione->id_regione ? 'selected':'' ?> value="<?= $regione->id_regione ?>"><?= $regione->nome ?></option>
              <?php endforeach;  ?>
            </select>
            <?php if (!$id_regione->getValid()) : ?>
              <div class="invalid-feedback">
                <?php echo $id_regione->getMessage() ?>
              </div>
            <?php endif; ?>
          </div>

          <div class="col">
            <label for="birth_province" class="form-label">Province</label>
            <select id="birth_province" class="form-select <?php echo !$id_provincia->getValid() ? 'is-invalid' : '' ?>" name="id_provincia">
              <option value="">Seleziona</option>
              <!-- select, voglio ottenere l'elenco province -->
              <?php foreach (Provincia::all() as $provincia) : ?>
                <option <?php echo $id_provincia->getValue() == $provincia->id_provincia ? 'selected':'' ?> value="<?= $provincia->id_provincia ?>"><?= $provincia->nome ?></option>
              <?php endforeach; ?>
            </select>
            <?php if (!$id_provincia->getValid()) : ?>
              <div class="invalid-feedback">
                <?php echo $id_provincia->getMessage() ?>
              </div>
            <?php endif ?>
          </div>

          <div class="mb-3">
            <!-- <h1><?php echo $gender->getValue() == 'M' ? 'AA' : 'BB' ?></h1> -->
            <label for="gender" class="form-label">Genere</label>
            <select name="gender" class="form-select <?php echo !$gender->getValid() ? 'is-invalid' : '' ?>" id="gender">
              <option value=""></option>
              <option <?php echo $gender->getValue() == 'M' ? 'selected' : ''  ?> value="M">M</option>
              <option <?php echo $gender->getValue() == 'F' ? 'selected' : ''  ?> value="F">F</option>
              <option <?php echo $gender->getValue() == 'A' ? 'selected' : ''  ?> value="A">Altro</option>
            </select>
            <?php
            if (!$gender->getValid()) : ?>
              <div class="invalid-feedback">
                <?php echo $gender->getMessage() ?>
              </div>
            <?php endif; ?>

          </div>

          <div class="mb-3">
            <label for="username" class="form-label">Nome utente</label>
            <input type="text" class="form-control 
            <?php echo (!$username->getValid() && !$username->getValid()) ? 'is-invalid' : '' ?>" name="username" id="username">
            <?php // if (!$username_email->getValid()) { ?>

            <div class="invalid-feedback">
              <?php //echo $username_email->getMessage();?>
            </div>
            <!-- } -->
            <?php ?>
            <?php
            if (!$username->getValid()) : ?>
              <div class="invalid-feedback">
                <?php echo $username->getMessage() ?>
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


<?php require "./class/views/footer-view.php" ?>