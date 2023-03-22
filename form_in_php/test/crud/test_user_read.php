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

$result = $crud->read();
if ($result === false) {
    echo "\ndatabase iniziale vuoto\n";
}
print_r($result);

$crud->create($user);
$result = $crud->read(1);
if(class_exists(User::class)&& get_class($result) == User::class){
    echo "\nread utente esistente test superato\n";
}

print_r($result);

$result = $crud->read(2);
if ($result === false) {
   echo "\nutente non esistente superato\n";
}
print_r($result);

$result = $crud->read();
if (is_array($result)&& count($result)===1) {
    echo "\nutente non esistente superato\n";
}
print_r($result);


$crud->delete(1);
$result = $crud->read(1);
if ($result === false) {
    echo "\nutente con id 1 è stato eliminato\n";
}