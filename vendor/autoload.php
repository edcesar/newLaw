<?php

const DS = DIRECTORY_SEPARATOR;

function goLawAutoload($class)
{
    $class = str_replace('\\', DS, $class);
   
    $class = str_replace('GoLaw', '', $class);
    
     require_once __DIR__ . '/../src/'. $class . '.php';		
}



spl_autoload_register('goLawAutoload');
