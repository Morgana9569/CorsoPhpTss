<?php
require "./form_in_php/class/validator/ValidateDate.php";

$date = [
    'gg/mm/aaaa',
    '   ',
];

public function validateDate($date)

foreach ($format as $formato) {
    
    $d = DateTime:: ValidateDate($date);

    if($v->isValid($date)== false) {
        echo "test superato per $date\n";
    }else{
        echo"test numero $index non superato per [$date]\n";
    };
    //$v->getMessage();
}
