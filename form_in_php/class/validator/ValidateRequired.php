<?php

/**
 * - Preservare il valore iniziale valido del campo di testo.
 * - Visualizzare il messaggio di errore per il singolo campo.
 *      - Sapere se c'è un errore **isValid**
 *      - Ripulire e controllare i valori (sicurezza)
 *      - Ogni validazione ha il suo messaggio di errore
 *      - Impostare la classe di boostrap is-invalid 
 */

class ValidateRequired
{
    public function isValid($value)
    {
        $valueWidoutSpace = trim(strip_tags($value));
        if ($valueWidoutSpace == '') {
            return false;
        }
        return $valueWidoutSpace;
    }
}

?>