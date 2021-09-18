<?php
    // connect to mysql server
	
    if(!$con=mysqli_connect(SERVER_NAME, SERVER_USER, SERVER_PASS, SERVER_DB)){    
        header("HTTP/1.1 500 SERVER ERROR");        
        include_once '404.php';
        //die($ROOT);        
    }   
	mysqli_set_charset($con, 'utf8mb4');    
?>