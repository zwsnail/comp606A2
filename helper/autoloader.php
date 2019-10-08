<?php

require_once "../database/connection.php";

spl_autoload_register(function ($class_name) {
    include '../classes/'.$class_name.'.php';
});

?>