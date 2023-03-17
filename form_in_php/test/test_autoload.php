<?php

use Registry\italia\Provincia;
use Registry\italia\Regione;
use validator\ValidateDate;
use validator\ValidateMail;
use validator\ValidateRequired;

require_once "./config.php";

spl_autoload_register(function($classname){
    //echo "\nsto cercando $classname\n";
    $classname = str_replace('\\','/',$classname);
    require "./form_in_php/class/".$classname.".php";
});

// new ValidateMail();
// new ValidateDate();
// new ValidateRequired();

// Regione::all();
// Provincia::all();