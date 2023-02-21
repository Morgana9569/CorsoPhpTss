<?php

require "./form_in_php/class/validator/ValidateDate.php";

$date = [
    [
        'input' => '     ',
        'expected' => false
    ],
    [
        'input' => 'dd/mm/yyyy ',
        'expected' => 'dd/mm/yyyy'
    ],
    [
        'input' => ' dd/mm/yyyy ',
        'expected' => 'dd/mm/yyyy'
    ],
    [
        'input' => ' dd/mm/yyyy',
        'expected' => 'dd/mm/yyyy'
    ],
    [
        'input' => '',
        'expected' => false
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
