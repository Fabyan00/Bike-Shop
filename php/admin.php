<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Administración</title>
        <!--Fuentes Google -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400&family=Playfair+Display&display=swap" rel="stylesheet">
        <!--Recursos BootStrap, JQuery, JavaScript, CSS -->
        <link rel="stylesheet" href="../css/admin.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    </head>
    <body>
        <!--INICIO PHP-->
        <?php
            $valI = $valN = $valT = $valP = $valM = $valO = $valImg = $valC = false;
            $i = $n = $t = $p = $m = $o = $c = $image = $d = "";
            //Variables necesarias que almacenan mensaje de error
            $iErr = $nErr = $tErr = $pErr = $mErr = $oErr =$imgErr = $cErr = "";
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                //Validar ID
                if(empty($_POST["id"])){
                    $valI = false;
                    $iErr = "ID necesario";
                }else{
                    $i = test_input($_POST["id"]);
                    if (!preg_match("/^[a-zA-Z0-9 ]*$/",$i)){
                        $valI = false;
                        $iErr = "Letras y numeros unicamente";
                    }else{
                        $valI = true;
                    }
                }

                //Validar Nombre
                if(empty($_POST["nombre"])){
                    $valN = false;
                    $nErr = "Nombre necesario";
                }else{
                    $n = test_input($_POST["nombre"]);
                    if (!preg_match("/^[a-zA-Z ]*$/",$n)){
                        $valN = false;
                        $nErr = "Solo letras";
                    }else{
                        $valN = true;
                    }
                }
                //Validar tipo
                if(empty($_POST["tipo"])){
                    $valT = false;
                    $tErr = "Tipo necesario";
                }else{
                    $valT = true;
                    $t = test_input($_POST["tipo"]);
                }
                
                //Validar precio
                $p = test_input($_POST["precio"]);
                if (!preg_match("/^[0-9 ]*$/", $p)){
                    $valP = false;
                    $pErr = "Solo numeros";
                }else{
                    $valP = true;
                }
                
                //Validar manufacturador
                if(empty($_POST["manufactura"])){
                    $valM = false;
                    $mErr = "Nombre de manufacturador necesario";
                }else{
                    $m = test_input($_POST["manufactura"]);
                    if (!preg_match("/^[a-zA-Z ]*$/",$n)){
                        $valM = false;
                        $mErr = "Solo letras";
                    }else{
                        $valM = true;
                    }
                }

                //Validar pais
                if(empty($_POST["origen"])){
                    $valO = false;
                    $oErr = "Lugar de origen necesario";
                }else{
                    $o = test_input($_POST["origen"]);
                    if (!preg_match("/^[a-zA-Z ]*$/",$o)){
                        $valO = false;
                        $oErr = "Solo letras";
                    }else{
                        $valO = true;
                    }
                }
                //Descripcion
                $d = test_input($_POST["descripcion"]);

                 //Validar cantidad en almacen
                 $c = test_input($_POST["cantidad"]);
                 if (!preg_match("/^[0-9 ]*$/", $c)){
                     $valC = false;
                     $cErr = "Solo numeros";
                 }else{
                     $valC = true;
                 }

                 //INICIO IMAGEN
                 if (!getimagesize($_FILES['imagen']['tmp_name'])){
                    $imgErr="Imagen no válida";
                    $valImg = false;
                    
                }else{
                    $valImg = true;
                    $image=addslashes($_FILES['imagen']['tmp_name']);
                    $image=file_get_contents($image);
                    $image=base64_encode($image);         
                }
                //FIN IMAGEN
               
            }
            //Funciones para validar y revisar datos
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
        ?>
        <!--FIN PHP-->
        <div>
        <h1 style="text-align: center; padding-top: 20px;">ADMINISTRACIÓN</h1>
        </div><br>

        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#registro">Registro de producto</a></li>
            <li><a data-toggle="tab" href="#clientes">Ver Clientes</a></li>
            <li><a data-toggle="tab" href="#productos">Ver Productos</a></li>
            <li><a data-toggle="tab" href="modificaciones.php">Modificaciones</a></li>
        </ul>

        <div class="tab-content well">
            <div style="text-align: center;" id="registro" class="tab-pane fade in active">
                <h3>Registrar un producto</h3><br><br>
                <form class="form" method="POST" enctype="multipart/form-data">
                    <fieldset>
                        <div class="input-group">
                            <label for="nombre">ID del producto:</label>
                            <input id="nombre" type="text" class="form-control" name="id" placeholder="Identificador de producto">
                            <span><?php echo $iErr;?></span>
                        </div>
                       <br><br>
                        <div class="input-group">
                            <label for="nombre">Nombre del producto:</label>
                            <input id="nombre" type="text" class="form-control" name="nombre" placeholder="Nombre">
                            <span><?php echo $nErr;?></span>
                        </div>
                       <br><br>
                        <div>
                            <label id="label" for="gender">Clase:</label><span class="error">* <?php echo $tErr;?></span><br>
                            <input type="radio" name="tipo"
                            <?php if (isset($t) && $t=="Urban") echo "checked";?>
                            value="Urban">Urban <br>
                            <input type="radio" name="tipo"
                            <?php if (isset($t) && $t=="Electric") echo "checked";?>
                            value="Electric">Electric <br>
                        </div><br>
                        <br>
                        <div class="input-group">
                            <label for="precio">Precio:</label>
                            <input id="precio" type="number" class="form-control" name="precio" placeholder="$">
                        </div><br>
                        <div class="input-group">
                            <label for="manufactura">Manufacturador:</label>
                            <input id="manufactura" type="text" class="form-control" name="manufactura" placeholder="Nombre del manufacturador">
                        </div><br>
                        <div class="input-group">
                            <label for="origen">Origen:</label>
                            <input id="origen" type="text" class="form-control" name="origen" placeholder="País de origen">
                        </div><br>
                        <div class="form-group">
                            <label for="comment">Descripción:</label>
                            <textarea class="form-control" rows="5" id="descripción" name="descripcion"></textarea>
                        </div>
                        <div class="foto">
                            <label for="imagen">Subir imagen del producto</label>
                            <input class="form-control-file" type="file" name="imagen">
                            <span><?php echo $imgErr;?></span>
                        </div><br>
                        <div class="input-group">
                            <label for="cantidad">Cantidad en almacén:</label>
                            <input id="cantidad" type="number" class="form-control" name="cantidad">
                        </div>
                    </fieldset><br><br>
                    <button style="width: 100%;" type="submit" class="btn btn-success">Subir producto</button><br><br>
                    <button style="width: 100%;" type="button" class="btn btn-danger">Cancelar</button><br><br>
                    <button style="width: 100%;" type="button" class="btn btn-primary"><a style="color: whitesmoke; text-decoration:none" href="salir.php">Cerrar Administrador</a></button>
                </form>
                <?php
                    if($valImg == true && $valI == true && $valN == true && $valT == true && $valP == true && $valM == true && $valO == true && $valC == true){
                        $mysqlCon = mysqli_connect("localhost", "root", "BasesDatosAvanzadas", "finalDaw", "3306");
                        if(mysqli_connect_errno()){
                            echo "<div class=\"alert alert-danger\">Error, no se pudo establecer conexion con la base de datos</div>" . mysqli_connect_error();
                        }else{
                            
                            //Agregando datos del formulario a la tabla productos en la base de datos
                            $query="INSERT INTO products(p_id, p_name, p_class, p_desc, p_price, p_manf, p_origin, p_img, p_stock)
                            VALUES('$i', '$n', '$t', '$d', $p, '$m', '$o', \"$image\", $c);";
                            if(mysqli_query($mysqlCon, $query)){
                                echo "<div id='exito' class='alert alert-success alert-dismissible fade in'>
                                <a href='#exito' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                <strong>Exito!</strong> Su producto se ha registrado satisfactoriamente.
                              </div>";
                            }else{
                                echo "<div id='fracaso' class='alert alert-danger alert-dismissible fade in'>
                                <a href='#fracaso' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                <strong>Ups!</strong> Error, intente de nuevo.
                              </div>";
                            }
                        }
                        mysqli_close($mysqlCon);
                    }
                ?>
            </div>

            <div id="clientes" class="tab-pane fade">
                <h3>Listado de usuarios</h3>
                <div class="responsive-table">
                    <table class="table table-stripped">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Sexo</th>
                        <th>Numero Telefonico</th>
                        <th>Correo</th>
                        <th>Nick</th>
                    </tr>
                    <?php
                        $mysqlCon = mysqli_connect("localhost", "root", "BasesDatosAvanzadas", "finalDaw", "3306");
                        $query = "SELECT * FROM customers ORDER BY u_id ASC;";
                        $res = $mysqlCon->query($query);            
                            while($row = mysqli_fetch_array($res)){
                            echo "<tr>";
                                echo "<td>" . $row['u_id'] . "</td>";
                                echo "<td>" . $row['u_name'] . "</td>";
                                echo "<td>" . $row['u_lName'] . "</td>";
                                echo "<td>" . $row['u_gen'] . "</td>";
                                echo "<td>" . $row['u_number'] . "</td>";
                                echo "<td>" . $row['u_mail'] . "</td>";
                                echo "<td>" . $row['u_nick'] . "</td>";
                            echo "</tr>";
                            }
                        echo "</table>";
                    ?>
                    <button style="width: 100%;" type="button" class="btn btn-primary"><a style="color: whitesmoke; text-decoration:none" href="salir.php">Cerrar Administrador</a></button>
                </div>
            </div>

            <div id="productos" class="tab-pane fade">
                <h3>Listado de productos</h3>
                <div class="responsive-table">
                    <table class="table table-stripped">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Precio</th>
                        <th>Manufacturador</th>
                        <th>Origen</th>
                        <th>Cantidad Disponible</th>
                        <th>Imagen</th>
                    </tr>
                    <?php
                        $mysqlCon = mysqli_connect("localhost", "root", "BasesDatosAvanzadas", "finalDaw", "3306");
                        $query = "SELECT * FROM products ORDER BY p_class = 'Urban';";
                        $res = $mysqlCon->query($query);            
                            while($row = mysqli_fetch_array($res)){
                            $imagen = $row['p_img'];
                            echo "<tr>";
                                echo "<td>" . $row['p_id'] . "</td>";
                                echo "<td>" . $row['p_name'] . "</td>";
                                echo "<td>" . $row['p_class'] . "</td>";
                                echo "<td>" . $row['p_price'] . "</td>";
                                echo "<td>" . $row['p_manf'] . "</td>";
                                echo "<td>" . $row['p_origin'] . "</td>";
                                echo "<td>" . $row['p_stock'] . "</td>";
                                echo "<td> <img class='img-fluid' style='width: 50%; overflow: auto' src='data:image;base64, $imagen'>";
                            echo "</tr>";
                            }
                        echo "</table>";
                    ?>
                    <button style="width: 100%;" type="button" class="btn btn-primary"><a style="color: whitesmoke; text-decoration:none" href="salir.php">Cerrar Administrador</a></button>
                </div>
            </div>
            
        </div>
    </body>
</html>