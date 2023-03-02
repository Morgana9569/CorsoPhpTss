<?php

/**
 * - Preservare il valore iniziale valido del campo di testo.
 * - Visualizzare il messaggio di errore per il singolo campo.
 *      - Sapere se c'è un errore **isValid**
 *      - Ripulire e controllare i valori (sicurezza)
 *      - Ogni validazione ha il suo messaggio di errore
 *      - Impostare la classe di boostrap is-invalid 
 */

class ValidateRequired implements Validable
{
/** @var string rappresenta il valore immesso nel form ripulito */
private $value;
private $message;
private $hasMessage;
/** se il valore è valido e se devo visualizzare il messaggio */
private $valid;

public function __construct($default_value='',$message='è obbligatorio') {
    $this->value = $default_value;
    $this->valid =true;
    $this->message = $message;

}


    public function isValid($value)
    {
        $strip_tags= strip_tags($value);
        $valueWidoutSpace = trim($strip_tags);

        if ($valueWidoutSpace == '') {
            $this->valid =false;
            return false;
        }
        $this->valid = true;
        $this->value = $valueWidoutSpace;
        return $valueWidoutSpace;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getValid()
    {
        return $this->valid;
    }







}

?>