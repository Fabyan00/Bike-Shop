
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="jumbotron">
        <h1>MODIFICACIONES</h1>
    </div>
    <!--MODIFICACIONES-->

                <h3>Para realizar la modificacion, ingrese el ID del producto e ingrese la nueva informacion en los campos. Pulse botón de modificar para terminar.</h3>
                <!--INICIO-->
                <div class="tab-content well">
                    <div style="text-align: center;" id="registro" class="tab-pane fade in active">
                        <form class="form" method="POST" enctype="multipart/form-data">
                            <fieldset>
                                <div class="input-group">
                                    <label for="nombre">ID del producto a modificar:</label>
                                    <input id="nombre" type="text" class="form-control" name="id" placeholder="Identificador de producto">
                                    <span><?php echo $iErr;?></span>
                                </div>
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
                               
                                </div><br>
                                <div class="input-group">
                                    <label for="cantidad">Cantidad en almacén:</label>
                                    <input id="cantidad" type="number" class="form-control" name="cantidad">
                                </div>
                            </fieldset><br><br>
                            <button style="width: 100%;" type="submit" class="btn btn-success">Modificar producto</button><br><br>
                            <button style="width: 100%;" type="button" class="btn btn-danger"><a style="color: whitesmoke; text-decoration:none" href="salir.php">Cerrar Administrador</a></button>
                        </form>
                        <?php
                            if($i == true && ($valN == true || $valT == true || $valP == true || $valM == true || $valO == true || $valC == true)){
                                $mysqlCon = mysqli_connect("localhost", "root", "BasesDatosAvanzadas", "finalDaw", "3306");
                                if(mysqli_connect_errno()){
                                    echo "<div class=\"alert alert-danger\">Error, no se pudo establecer conexion con la base de datos</div>" . mysqli_connect_error();
                                }else{
                                    
                                    //Agregando datos del formulario a la tabla productos en la base de datos
                                    $query="UPDATE TABLE products SET p_name = '$n', p_class = '$t', p_desc = '$d', p_price = $p, p_manf = '$m', p_origin = '$o', p_img = \"$image\", p_stock = $c; WHERE p_id = '$i'";
                                
                                    if(mysqli_query($mysqlCon, $query)){
                                        echo "<div class='alert alert-success alert-dismissible fade in'>
                                        <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                        <strong>Exito!</strong> Su producto se ha modificado correctamente.
                                    </div>";
                                    }else{
                                        echo "<div class='alert alert-danger alert-dismissible fade in'>
                                        <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                        <strong>Ups!</strong> Error, intente de nuevo.
                                    </div>";
                                    }
                                }
                                mysqli_close($mysqlCon);
                            }
                        ?>
                    </div>
                </div>
                    <!--FIN-->
</body>
</html>

