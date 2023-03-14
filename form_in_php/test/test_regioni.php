<?php
#php form_in_php/test/test_regioni.php
require "./config.php";
require "./form_in_php/class/Registry/italia/Regione.php";


// $regioni = new Regioni();
// $regioni->all(); //Array di (stdClass) regioni

//Metodo Statico può essere utilizzato senza creare un istanza
Regione::all();



//$ clear && php form_in_php/test/test_regioni.php 
?>