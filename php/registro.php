<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registro</title>
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
         $validarN = $validarNN = $validarA = $validarG = $validarF = $validarM = $validarPwd = $validarC = $validarP = false;
         $name = $nickName = $lastName = $gender = $mail = $pwd = $credit = $fecha = $number = "";
         //Variables necesarias que almacenan mensaje de error
         $nameErr = $nickErr = $lastNameErr = $genderErr = $mailErr = $pwdErr = $creditErr = $fechaErr = $numberErr = "";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            //Validar Nombre
            if(empty($_POST["name"])){
                $validarN = false;
                $nameErr = "Nombre necesario";
            }else{
                $name = test_input($_POST["name"]);
                if (!preg_match("/^[a-zA-Z ]*$/",$name)){
                    $validarN = false;
                    $nameErr = "Solo letras";
                }else{
                    $validarN = true;
                }
            }
            //Validar Apellido
            if(empty($_POST["lastName"])){
                $validarA = false;
                $lastNameErr = "Apellido necesario";
            }else{
                $lastName = test_input($_POST["lastName"]);
                if (!preg_match("/^[a-zA-Z ]*$/",$lastName)){
                    $validarA = false;
                    $lastNameErr = "Solo letras";
                }else{
                    $validarA = true;
                }
            }
            //Validar Genero
            if(empty($_POST["gender"])){
                $validarG = false;
                $genderErr = "Genero necesario";
            }else{
                $validarG = true;
                $gender = test_input($_POST["gender"]);
            }
            //Validar fecha nacimiento
            if(empty($_POST["birthday"])){
                $validarF = false;
                $fecha = "Fecha nacimiento necesaria";
            }else{
                $validarF = true;
                $fecha = test_input($_POST["birthday"]);
                $split = explode('/', $fecha);
                validarFecha($_POST["birthday"]);
            }
            //Validar numero celular
             $number = test_input($_POST["phone"]);
            
            //Validar mail
            if (empty($_POST["mail"])){
                $validarM = false;
                $mailErr = "Mail necesario";
            }else {
                $mail = test_input($_POST["mail"]);
                // verificar si la direccion de correo es valida
                if (!filter_var($mail, FILTER_VALIDATE_EMAIL)){
                    $validarM = false;
                    $mailErr = "Mail inválido, revisa de nuevo";
                }else{
                    $validarM = true;
                }
            }
             //Validar nick usuario
            if(empty($_POST["nickName"])){
                $validarNN = false;
                $nickErr = "Necesitas un nombre de usuario";
            }else{
                $nickName = test_input($_POST["nickName"]);
                if (!preg_match("/^[a-zA-Z0-9 ]*$/", $nickName)){
                    $validarNN = false;
                    $nickErr = "Escribe un nombre de usuario valido";
                }else{
                    $validarNN = true;
                }
            }
            //Validar contrasenia
            if(empty($_POST["password"])){
                $validarPwd = false;
                $pwdErr = "Necesitas una contraseña";
            }else{
                $pwd = test_input($_POST["password"]);
                if(strlen($pwd) < 8){
                    $pwdErr = "Minimo 8 caracteres (numeros y/o letras)";
                    $validarPwd = false;
                }else{
                    $validarPwd = true;
                }
            }
            //Validar cuenta bancaria
            if(empty($_POST["card"])){
                $validarC = false;
                $creditErr = "Introduce numero de tarjeta";
            }else{
                $credit = test_input($_POST["card"]);
                if(strlen($credit) != 16){
                    $creditErr = "Unicamente 16 digitos";
                    $validarC = false;
                }else{
                    $validarC = true;
                }
            }
        }
        //Funciones para validar revisar y validar datos
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        function validarFecha($date){
            $split = explode('/', $date);
            if(count($split) == 3 && checkdate($split[1], $split[0], $split[2])){
                $birthdayErr = "Fecha invalida, revise de nuevo";
            }
        }
    ?>
    <!--Fin PHP-->
        <header class="headerMenu">    
        <nav class="navMenu">
            <div class="logo"><a class="logoLink" href="../index.php"><img src="../imagenes/bicycle_50px.png" alt="LogoBike"> The Classic Ride Style</a></div>
            <ul class="menu">
            <li><a href="../index.php">Home</a></li>
            <li><a href="../php/sesion.php">Iniciar Sesion</a></li>
            <li><a href="../about.html">Nosotros</a></li>
            <li><a href="#">Acerca de este sitio</a></li>
            <li><a href="#"><img src="../imagenes/shopping_cart_30px.png" alt="Carrito"></a></li>               
            </ul>
        </nav>
        </header>
        <div class="mensaje">
            <h3>Registro</h3>
            <p>Hola! Nos encantaría que formaras parte de nosotros. <br>Por favor ingresa todos los datos necesarios para
            registrarte y explorar todo lo que tenemos para ofrecerte.
            </p>
        </div>
        <div class="login">
            <article class="fondo">
                <img src="../imagenes/bear ride bicycle by iamvictoria.jpg" alt="User">
                <h3>*Necesario</h3>
                <form class="formulario" id="form" method="post">
                    <input class="inp" type="text" name="name" value="<?php echo $name;?>"
                    placeholder="Nombre">
                    <span class="error">* <?php echo $nameErr;?></span>
                    <input class="inp" type="text" name="lastName" value="<?php echo $lastName;?>"
                    placeholder="Apellido">
                    <span class="error">* <?php echo $lastNameErr;?></span>
                    <div>
                        <label id="label" for="gender">Genero:</label><span class="error">* <?php echo $genderErr;?></span><br>
                        <input type="radio" name="gender"
                        <?php if (isset($gender) && $gender=="Femenino") echo "checked";?>
                        value="Femenino">Femenino <br>
                        <input type="radio" name="gender"
                        <?php if (isset($gender) && $gender=="Masculino") echo "checked";?>
                        value="Masculino">Maculino <br>
                        <input type="radio" name="gender"
                        <?php if (isset($gender) && $gender=="Otro") echo "checked";?>
                        value="Otro">Otro
                    </div><br>
                    <div>
                        <label id="label" for="birthday">Fecha Nacimiento</label><span class="error">* <?php echo $fechaErr;?></span><br>
                        <input class="datos" type="date" name="birthday" value="<?php echo $fecha;?>">
                    </div><br>
                    <input class="inp" type="number" name="phone"
                    placeholder="Numero telefonico" value="<?php echo $number;?>">
                    <input class="inp" type="text" name="mail" value="<?php echo $mail;?>"
                    placeholder="Mail">
                    <span class="error">* <?php echo $mailErr;?></span>
                    <input class="inp" type="text" name="nickName" value="<?php echo $nickName;?>"
                    placeholder="Nombre Usuario">
                    <span class="error">*<?php echo $nickErr;?></span>
                    <input class="inp" type="password" name="password" value="<?php echo $pwd;?>"
                    placeholder="Contraseña">
                    <span class="error">*<?php echo $pwdErr?></span>
                    <input class="inp" type="text" name="card" value="<?php echo $credit;?>"
                    placeholder="Numero de tarjeta">
                    <span class="error">*<?php echo $creditErr;?></span>
                    <input class="boton" type="submit" name="inicio" value="Registrarme">
                    <a href="sesion.php" class="he">Ya tengo una cuenta, llevame a iniciar.</a>
                </form>
                <?php
                    if($validarN == true && $validarNN == true && $validarA == true && $validarG == true && $validarF == true && $validarM == true && $validarPwd == true && $validarC == true){
                        $mysqlCon = mysqli_connect("localhost", "root", "BasesDatosAvanzadas", "finalDaw", "3306");
                        if(mysqli_connect_errno()){
                            echo "<div class=\"alert alert-danger\">Error, no se pudo establecer conexion con la base de datos</div>" . mysqli_connect_error();
                        }else{
                            //Agregando datos del formulario a la tabla clientes en la base de datos
                            $query="INSERT INTO customers(u_name, u_lName, u_gen, u_number, u_mail, u_passwd, u_cCard, u_birth, u_nick)
                            VALUES('$name', '$lastName', '$gender', '$number', '$mail', '$pwd', '$credit', '$fecha', '$nickName');";
                            if(mysqli_query($mysqlCon, $query)){
                                echo "<script language='JavaScript'>";
                                echo "location = 'registro.php'";
                                echo "</script>";
                                echo"
                                <div class='alert alert-success alert-dismissible fade in'>
                                <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                <strong>Registro exitoso!</strong> Gracias por unirte a la comunidad.
                              </div>
                              <p>Inicia sesion para ingresar a la tienda</p>";
                            }else{
                                echo "<div class='alert alert-danger alert-dismissible fade in'>
                                <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                <strong>Error!</strong> No fue posible completar el registro, intente de nuevo.
                              </div>";
                            }
                        }
                        mysqli_close($mysqlCon);
                    }
                ?>
            </article>
        </div>
    </body>
</html>