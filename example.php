<?php

use NikParser\NikParser;
require __DIR__.'/vendor/autoload.php';

try {
    $nikParser = new NikParser("3509211202010006");
    
    var_dump($nikParser->getAll());

} catch (\Exception $e) {
    echo $e->getMessage();
}
