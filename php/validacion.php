<?php
    include("conexion.php");
    session_start();
    $customer = $_POST['name'];
    $pass= $_POST['password'];
    $qry = "SELECT * FROM customers WHERE u_name = '$customer' AND u_passwd = '$pass';";
    $res = $mysqlConn->query($qry);
    $row = $res->fetch_assoc();
    if($row['u_name'] == $customer && $row['u_passwd'] == $pass){
        $_SESSION['user'] = $customer;
        header('location: productos.php');
    }else{
        echo '<div class="alert alert-warning">
        <strong>Error!</strong> Revisa los datos e intentalo de nuevo.
        </div>';
    }
?>