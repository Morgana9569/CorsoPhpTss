<?php

use validator\ValidateDate;
use validator\ValidateMail;
use validator\ValidateRequired;

spl_autoload_register(function($classname){
    echo "\nsto cercando $classname\n";
    //validator\ValidateMail;

    $classname = str_replace('\\','/',$classname);

    require "./form_in_php/class/".$classname.".php";

    echo "\n\n\n\n\n";
});

new ValidateMail();
new ValidateDate();
new ValidateRequired();