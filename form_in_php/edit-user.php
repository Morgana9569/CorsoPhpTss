<?php

use crud\UserCRUD;
use models\User;
use Registry\italia\Provincia;
use Registry\italia\Regione;
use validator\ValidateDate;
use validator\ValidateRequired;
use validator\ValidatorRunner;

require "./config.php";
require "./autoload.php";

$id_user = filter_input(INPUT_GET, 'id_user', FILTER_VALIDATE_INT);
//var_dump($id_user);
//if ($id_user) {
$crud = (new UserCRUD);
$user = $crud->read($id_user);

print_r($_POST);

$validatorRunner = new ValidatorRunner([
    'first_name' => new ValidateRequired($user->first_name, 'Il Nome è obblicatorio'),
    'last_name'  => new ValidateRequired($user->last_name, 'Il Cognome è obblicatorio'),
    'birthday'  => new ValidateDate($user->birthday, 'La data di nascità non è valida'),
    'birthday'  => new ValidateRequired($user->birthday, 'La data di nascità è obbligatoria'),
    'birth_city'  => new ValidateRequired($user->birth_city, 'La città è obbligatoria'),
    'id_regione'  => new ValidateRequired($user->id_regione, 'La regione è obbligatoria'),
    'id_provincia'  => new ValidateRequired($user->id_provincia, 'La provincia è obbligatoria'),
    'gender'  => new ValidateRequired($user->gender, 'Il genere è obbligatorio'),
    //'username'  => new ValidateRequired($user->username, 'Username è obbligatorio'),
    //'username_email'  => new ValidateMail('','Formato email non valido'),
    //'password'  => new ValidateRequired('', 'Password è obbligatorio'),
]);
extract($validatorRunner->getValidatorList());


//header("location: index-user.php");
// }else {
//     echo 'problemi con l aggiornamento';
// }
#-----------------------------------------------------------------------------------------------------------
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo 'sono dentro update';

    $validatorRunner->isValid();

    if ($validatorRunner->getValid()) {
        //i dati mi arrivano da un array, ma il crud lavora con oggetto 
        // $user = (object) $_POST;
        $user = User::arrayToUser($_POST);

        $crud = new UserCRUD();
        $user->id_user = filter_input(INPUT_GET,'id_user', FILTER_VALIDATE_INT);
        //il create del crud vuole un oggetto di tipo user
        $crud->update($user);

        //redirect
        header("location: index-user.php");
    }
}
?>
<?php require "./class/views/head-view.php" ?>

<section class="row">
    <div class="col-sm-4">

    </div>
    <div class="col-sm-4">

        <form class="mt-1 mt-md-5" action="edit-user.php?id_user=<?=$user->id_user ?>" method="POST">

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
                        <input type="text" value="<?= $birth_city->getValue() ?>" class="form-control <?php echo !$birth_city->getValid() ? 'is-invalid' : '' ?>" name="birth_city" id="birth_city">
                        <?php if (!$birth_city->getValid()) : ?>
                            <div class="invalid-feedback">
                                <?php echo $birth_city->getMessage() ?>
                            </div>
                        <?php endif ?>
                    </div>

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

                    <button class="btn btn-primary btn-sm" type="submit"><span class="fa-solid fa-pen"></span> Aggiorna </button>
        </form>
    </div>

    <div class="col-sm-4">
    </div>
</section>


<?php require "./class/views/footer-view.php" ?>