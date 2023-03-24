<?php

use Registry\italia\Provincia;

require "./config.php";
require "./form_in_php/class/Registry/italia/Provincia.php";

$province = Provincia::all();

print_r($province);