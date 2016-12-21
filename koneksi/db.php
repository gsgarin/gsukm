<?php

    $database['server'] = "localhost";
    $database['name'] = "ukm";
    $database['username'] = "root";
    $database['password'] = "";
    
    $db = new PDO("mysql:host=".$database['server'].";dbname=".$database['name']."", "".$database['username']."", "".$database['password']."");
?> 