<?php
    session_start();
    http_response_code(404);   
    include('../../404/index.php'); 
    die();
?>