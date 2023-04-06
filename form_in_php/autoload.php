<?php

spl_autoload_register(function($classname){
    
    $classname = str_replace('\\','/',__DIR__."/class/".$classname.".php");
    require $classname;
});

