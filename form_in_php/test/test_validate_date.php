<?php

require "./form_in_php/class/validator/Validable.php";
require "./form_in_php/class/validator/ValidateDate.php";


$date = [
    [
        'input' => '24/10/1995 ',
        'expected' => '24/10/1995'
    ],
    [
        'input' => ' 24/10/1995 ',
        'expected' => '24/10/1995'
    ],
    [
        'input' => ' 24/10/1995',
        'expected' => '24/10/1995'
    ],
    [
        'input' => '32/10/1995',
        'expected' => false
    ],
    [
        'input' => '24/100/1995',
        'expected' => false
    ],
    [
        'input' => '',
        'expected' => false
    ],
    [
        'input' => 'cc/10/1995',
        'expected' => false
    ],
    [
        'input' => '24-10-1995',
        'expected' => false
    ]
];

foreach ($date as $key => $test){
    $input = $test['input'];
    $expected =$test['expected'];

    $c = new ValidateDate();
    if($c -> isValid($input) != $expected){
        echo "\ntest numero $key non superato mi aspettavo:";
        var_dump($expected);
        echo "\nma ho trovato:";
        var_dump($c->isValid($input));
    };
}
