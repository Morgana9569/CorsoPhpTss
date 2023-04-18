<?php

use crud\UserCRUD;

require "./config.php";
require "./autoload.php";

//print_r($_GET);

$id_user = filter_input(INPUT_GET,'id_user', FILTER_VALIDATE_INT);
//var_dump($id_user);
if ($id_user) {
    (new UserCRUD)->delete($id_user);
    header("location: index-user.php");
} else {
    echo 'problemi';
}