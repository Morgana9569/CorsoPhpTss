<?php

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
