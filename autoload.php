<?php

// spl_autoload_register(function ($class_name) {
//     include 'classes/'.$class_name.'.php';
// });


function my_autoload ($pClassName) {
    include(__DIR__ . "/" ."classes/".$pClassName . ".php");
}
spl_autoload_register("my_autoload");


?>