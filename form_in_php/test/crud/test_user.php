<?php

use crud\UserCRUD;
use models\User;

include "config.php";
include "form_in_php/test/test_autoload.php";

(new PDO (DB_DSN,DB_USER,DB_PASSWORD))->query("TRUNCATE TABLE user;");
$crud = new UserCRUD();
$user = new User();
//
$user->first_name = "Sasso";
$user->last_name = "Sissi";
$user->birth_city = "Torino";
$user->birthday = "2017-01-01";
$user->gender = "M";
$user->id_regione = "9";
$user->id_provincia = "56";
$user->username = "Sasso@Sissi.com";
$user->password = md5("Password");

$crud->create($user);

$result = $crud->read();
if(count($result)== 1){
    echo "test utente inserito ok\n";
}

//print_r($result);

try {
    $crud->create($user);
} catch (\Throwable $th) {
    if($th->getCode() == "23000")
    echo "test superato";
}












