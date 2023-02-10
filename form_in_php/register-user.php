<?php
// print_r($_POST);

$first_name = filter_input(INPUT_POST,'first_name',FILTER_SANITIZE_SPECIAL_CHARS);

var_dump($first_name);