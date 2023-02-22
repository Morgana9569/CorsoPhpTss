<?php

class ValidateDate implements Validable
{
    public function isValid($value)
    {
        $valueWidoutSpace = trim($value);


        // if ($valueWidoutSpace == '') {
        //     return false;
        // }
        // return $valueWidoutSpace;

        $d = DateTime::createFromFormat('d/n/Y', $valueWidoutSpace);
        // print_r($d);
        // die(); //interrompe l'esecuzione
       

        if ($d && $d->format('d/n/Y') === $valueWidoutSpace) {
            return $d->format('d/n/Y');
        } else {
            return false;
        }
    }
    public function message()
    {

        return 'Data non valida';
    }
}
