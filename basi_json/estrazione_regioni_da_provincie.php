<?php
include "config.php";
//apro il file json
$province_string = file_get_contents('province.json');
//lo trasformo in oggetto
$province_object = json_decode($province_string);
//trasformo il mio array, in un altro solo con quello che mi serve
$regioni_array = array_map(function($provincia){
    return $provincia->regione;
},$province_object);
//tolgo i duplicati dall'array
$regioni_unique = array_unique($regioni_array);
//ordino le regioni in ordine alfabetico
sort($regioni_unique);

//richiamo le variabili globali nel file config.php per connettermi al DB
$dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;

try {
    $conn = new PDO($dsn,DB_USER,DB_PASSWORD);
    //svuoto i dati della tabella ogni volta che rilancio la query
    $conn->query('TRUNCATE TABLE regione');
    foreach ($regioni_unique as $regione) {
        //con addslashes aggiungo uno slash per concatenare le virgolette
        //che danno errore in val d'aosta
        $regione = addslashes($regione);
        //Query
        $sql = "INSERT INTO regione (Nome) VALUES('$regione');";
        echo $sql."\n";
        $conn->query($sql);
    }
} catch (\Throwable $th) {
    throw $th;
}



//print_r($regioni_unique);