<?php
//$files = scandir(".");
//print_r($files);

require "./form_in_php/class/validator/Validable.php";
require "./form_in_php/class/validator/ValidateMail.php";


$emails = [
    'a',
    '   ',
    'a@',
    'mario',
];

$v = new ValidateMail();

//v.isValid('a')

foreach ($emails as $email) {

    if($v->isValid($email)== false) {
        echo "test superato per $email\n";
    }else{
        echo"test numero $index non superato per [$email]\n";
    };
    //$v->getMessage();
}
