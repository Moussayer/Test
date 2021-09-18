<?php

    //database configuration
    $host       = "localhost";
    $user       = "akl";
    $pass       = "2#$!95Hm";
    $database   = "admin_aklsari3";

    $connect = new mysqli($host, $user, $pass, $database);

    if (!$connect) {
        die ("connection failed: " . mysqli_connect_error());
    } else {
        $connect->set_charset('utf8mb4');
    }
	
	$GLOBALS['config'] = $connect;


    $ENABLE_RTL_MODE = 'false';

?>