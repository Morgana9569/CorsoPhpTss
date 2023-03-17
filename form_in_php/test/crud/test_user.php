<?php

use crud\UserCRUD;
use models\User;

include "config.php";
include "form_in_php/test/test_autoload.php";

$crud = new UserCRUD();
$user = new User();

$user->first_name = "Luigi";
$user->last_name = "Verdi";
$user->first_name = "Luigi";
$user->birth_city = "Torino";
$user->birthday = "2017-01-01";
$user->gender = "M";
$user->id_regione = "9";
$user->id_provincia = "56";
$user->username = "Luigi@verdi.com";
$user->password = md5("Password");

$crud->create($user);


