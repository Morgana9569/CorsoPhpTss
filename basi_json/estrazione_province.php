<?php
include "config.php";
//apro il file json
$province_string = file_get_contents('province.json');

$province_object = json_decode($province_string);

$dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;

try {
    $conn = new PDO($dsn,DB_USER,DB_PASSWORD);
    $conn->query('TRUNCATE TABLE provincia');
    foreach($province_object as $provincia) {
        $regione = $provincia->regione;
        $nome_provincia = addslashes($provincia->nome);
        $sigla = addslashes($provincia->sigla);
        $regione = $conn->query("SELECT id_regione FROM regione WHERE nome =\"$regione\"")->fetchColumn();
        $sql = "INSERT INTO provincia (nome,sigla,id_regione) VALUES('$nome_provincia','$sigla','$regione');";
        echo $sql ."\n";
        $conn->query($sql);
    }
} catch (\Throwable $th) {
    throw $th;
}