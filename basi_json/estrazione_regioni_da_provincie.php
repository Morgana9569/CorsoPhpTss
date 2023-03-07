<?php

$province_string = file_get_contents('province.json');
$province_object = json_decode($province_string);

//var_dump($province_object);


$regioni_array = array_map(function($provincia){
    return $provincia->regione;
},$province_object);

$regioni_unique = array_unique($regioni_array);
sort($regioni_unique);


print_r($regioni_unique);
