<?php

class ValidateDate implements Validable {
    public function isValid($value){
        $valueWidoutSpace = trim($value);

        if ($valueWidoutSpace == '') {
            return false;
        }
        return $valueWidoutSpace;

        $d = DateTime:: createFromFormat('j/n/o', $valueWidoutSpace);
        if ($d) {
            return $d->format('j/n/o');
        }else{
            return $d;
        }
        
    }
    public function message(){

        return 'Data non valida';
    }
}
