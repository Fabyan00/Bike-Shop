<?php
    $mysqlConn = new mysqli("localhost", "root", "BasesDatosAvanzadas", "finalDaw");
    if($mysqlConn->connect_error){
        die("Error al conectar a la base de datos: " . $mysqlConn->connect_error);
    }
    
?>