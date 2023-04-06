<?php

use validator\ValidateRequired;

require "./form_in_php/class/validator/ValidateRequired.php";
require "./form_in_php/class/validator/Validable.php";

$testCases = [
    [
        'input' => '     ',
        'expected' => false
    ],
    [
        'input' => 'ciao ',
        'expected' => 'ciao'
    ],
    [
        'input' => ' ciao ',
        'expected' => 'ciao'
    ],
    [
        'input' => 'ciao ',
        'expected' => 'ciao'
    ],
    [
        'input' => '',
        'expected' => false
    ],
    [
        'input' => '<h1>ciao</h1>',
        'expected' => 'ciao'
    ],
    [
        'input' => '<b>    </b>',
        'expected' => false
    ],
    [
        'input' => '<b></b>',
        'expected' => false
    ],
    [
        'input' => 'ciao</b> ',
        'expected' => 'ciao'
    ],
    [
        'input' => '<b>ciao',
        'expected' => 'ciao'
    ],
    [
        'input' => 20,
        'expected' => 20
    ],
    [
        'input' => 0,
        'expected' => 0
    ]
];

foreach ($testCases as $key => $test){
    $input = $test['input'];
    $expected =$test['expected'];

    $v = new ValidateRequired();
    if($v -> isValid($input) != $expected){
        echo "\ntest numero $key non superato mi aspettavo:";
        var_dump($expected);
        echo "\nma ho trovato:";
        var_dump($v->isValid($input));
    };
}
