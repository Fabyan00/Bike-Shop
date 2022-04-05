<?php
    session_start();
    $userID = '';
    if ($userID!="") {
        $userID = $_SESSION['u_id'];
        echo "<script language='JavaScript'>";
        echo "location = '../index.php'";
        echo "</script>";
      }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inicio de Sesion</title>
        <!--Fuentes Google -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400&family=Playfair+Display&display=swap" rel="stylesheet">
        <!--Recursos BootStrap, JQuery, JavaScript, CSS -->
        <link rel="stylesheet" href="../css/inicio.css">
        <link rel="stylesheet" href="../css/sesion.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    </head>

    <body class="fondito">
    <!--Codigo PHP-->
       <?php 
            $error = '';
       ?>
    <!--Fin PHP-->
        <header class="headerMenu">    
        <nav class="navMenu">
            <div class="logo"><a class="logoLink" href="../index.php"><img src="../imagenes/bicycle_50px.png" alt="LogoBike"> The Classic Ride Style</a></div>
            <ul class="menu">
            <li><a href="../index.php">Home</a></li>
            <li><a href="../php/registro.php">Registrarse</a></li>
            <li><a href="../html/about.html">Nosotros</a></li>
            <li><a href="#"><img src="../imagenes/shopping_cart_30px.png" alt="Carrito"></a></li>               
            </ul>
        </nav>
        </header>
        
        <div class="mensaje">
            <h3>Iniciar Sesión</h3>
            <p>Hola de nuevo, esperemos que encuentres lo que estas buscando.
            Porfavor, ingresa tus datos de usuario.</p>
        </div>
        <div class="login">
            <article class="fondo">
                <img src="../imagenes/Bicycle Graphic Design.jpg" alt="User">
                <h3>Login</h3>
                <form id="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <input class="inp" type="text" name="usuario" placeholder="Usuario"><br>
                    <span><?php echo $error; ?></span>
                    <input class="inp" type="password" name="password" placeholder="Contraseña"><br>
                    <input class="boton" type="submit" name="inicio" value="Iniciar Sesión">
                    <a href="../php/registro.php" class="he">No tengo una cuenta, registrarme</a>
                </form>
            </article>
        </div>
        <?php
            $userName = '';
            $userPass = '';
            $mysqlConn = mysqli_connect("localhost", "root", "BasesDatosAvanzadas", "finalDaw", "3306");
            if($_SERVER["REQUEST_METHOD"] = "POST"){
                $userName = $_POST['usuario'];
                $userPass = $_POST['password'];
                if($userName != '' && $userPass != ''){
                    $qry = "SELECT * FROM customers WHERE u_nick = '$userName' AND u_passwd = '$userPass';";
                    $res = $mysqlConn->query($qry);
                    while($row = mysqli_fetch_array($res)) {
                        $validacion = $row[0];
                        $nombre = $row[1];
                        $sex = $row[3];
                    }
                    if($validacion != ''){
                        $_SESSION['u_id'] = $validacion;
                        $_SESSION['nombre'] = $nombre;
                        $_SESSION['sexo'] = $sex;
                        if($nombre == "Admin"){
                            echo "<script language='JavaScript'>";
                            echo "location = 'admin.php'";
                            echo "</script>";    
                        }
                        echo "<script language='JavaScript'>";
                        echo "location = 'productos.php'";
                        echo "</script>";
                    }
                }else{
                    echo "<div class='alert alert-danger alert-dismissible fade in'>
                    <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>Error!</strong> No fue posible iniciar sesion, verifique e intente de nuevo.
                  </div>";
                }
            }
        ?>
    </body>
</html>