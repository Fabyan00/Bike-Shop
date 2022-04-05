
<?php
    session_start();
    $userID = '';
    $userName = '';
    $userSex = '';
    $userID = $_SESSION['u_id'];
    $userName = $_SESSION['nombre'];
    $userSex = $_SESSION['sexo'];
    if ($userID=="") {
        echo "<script language='JavaScript'>";
        echo "location = '../index.php'";
        echo "</script>";
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <!--Fuentes Google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400&family=Playfair+Display&display=swap" rel="stylesheet">
    <!--Recursos BootStrap, JQuery, JavaScript, CSS -->
    <link rel="stylesheet" href="../css/productos.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>
    <header class="headerMenu">    
        <nav class="navMenu">
            <div class="logo"><a class="logoLink" href="../index.php"><img src="../imagenes/bicycle_50px.png" alt="LogoBike"> The Classic Ride Style</a></div>
            <ul class="menu">
                <?php
                    if($userID != ""){
                       echo "<li><a class = 'perfil' href='#'>" . $userName . "</a></li>";
                    }
                ?>
                <li><a href="../html/about.html">Nosotros</a></li>
                <li><a href="salir.php">Cerrar Sesion</a></li>
                <li><a href="#"><img src="../imagenes/shopping_cart_30px.png" alt="Carrito"></a></li>
            </ul>
        </nav>
    </header>
    

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="../imagenes/bgVintage.jpg" alt="Los Angeles" style="width:100%;">
        <div class="carousel-caption">
          <h3>Explora el mundo de las bicicletas</h3>
          <p>Mucha velocidad y diversión!</p>
        </div>
      </div>
    </div>
    <div class="container">
        <figure>
            <img src="../imagenes/descarga (1).jpg" alt="Promo Urban Vintage">
            <div class="capa">
                <h3>Urban Vintage</h3>
                <p>Estas bicicletas son ideales para rodar por las calles de la ciudad. Sus componentes están <br>
                diseñados para brindarte gran comodidad y eficiencia. Además cada bicicleta tiene un estilo <br>
                único para que encuentres la que mejor te haga lucir mientras ruedas.</p>
            </div>
        </figure>
        <figure>
            <img src="../imagenes/elVintage.jpg" alt="Promo Electric Vintage">
            <div class="capa">
                <h3>Electric Vintage</h3>
                <p>Estas increibles bicicletas poseen un complejo diseño en todos sus aspectos.<strong> No apto para principiantes.</strong><br>
                Con esta bicicleta tendras gran resistencia y velocidad, te facilitara el trabajo cuando<br>
                 salgas a rodar grandes trayectos. Está lista para salir a todas partes y lo mejor, no contamina!</p>
            </div>
        </figure>
    </div>

    <div class="wrapper">
        <div class="section-header text-center">
            <h2 class="h1 section-header__title">Bicicletas en Stock</h2>
        </div>

        <div class="section-subheading rte text-center">
            <p>- Las mejores bicicletas para ti están aquí</p>
            <hr class="hr--small">
        </div>
    </div>
   

    <div class="wrapper">
        <div class="section-header text-center">
            <h2 class="h1 section-header__title">Electricas</h2>
    </div>
    <?php
     $mysqlCon = mysqli_connect("localhost", "root", "BasesDatosAvanzadas", "finalDaw", "3306");
     $query = "SELECT * FROM products WHERE p_class = 'Electric';";
     $res = $mysqlCon->query($query);
                    
     echo "<div class='container'>";
        while($row = mysqli_fetch_array($res)){
            $imagen = $row['p_img'];
            $nombre = $row['p_name'];
            $price = $row['p_price'];
            $tipo = $row['p_class'];
            $marca = $row['p_manf'];
            $almacen = $row['p_stock'];
            
            echo " <figure>
                        <img  class='img-fluid' style='width: 100%; overflow: auto' src='data:image;base64, $imagen'>
                        <div class='capa'>
                            <h3>$nombre</h3>
                            <strong><p>Marca:</strong> $marca</p>
                            <strong><p>Modelo:</strong> $nombre</p>
                            <strong><p>Clase:</strong> $tipo</p>
                            <strong><p>Precio:</strong> $$price</p>
                            <strong><p>Disponibles:</strong> $almacen</p>
                        </div>
                    </figure>";
                    
        }
        echo "</div>";
    $query = "SELECT * FROM products WHERE p_class = 'Urban';";
     $res = $mysqlCon->query($query);
         echo "  <div class='wrapper'>
         <div class='section-header text-center'>
             <h2 class='h1 section-header__title'>Urbanas</h2>
     </div>";     
    echo "<div class='container'>";
        while($row = mysqli_fetch_array($res)){
            $imagen = $row['p_img'];
            $nombre = $row['p_name'];
            $price = $row['p_price'];
            $tipo = $row['p_class'];
            $marca = $row['p_manf'];
            $almacen = $row['p_stock'];
            echo " <figure>
                        <img  class='img-fluid' style='width: 100%; overflow: auto' src='data:image;base64, $imagen'>
                        <div class='capa'>
                            <h3>$nombre</h3>
                            <strong><p>Marca:</strong> $marca</p>
                            <strong><p>Modelo:</strong> $nombre</p>
                            <strong><p>Clase:</strong> $tipo</p>
                            <strong><p>Precio:</strong> $$price</p>
                            <strong><p>Disponibles:</strong> $almacen</p>
                        </div>
                    </figure>";
        }
    echo "</div>";
    ?>
  <div class="wrapper">
        <div class="section-header text-center">
            <h2 class="h1 section-header__title">Conoce a nuestros aliados</h2>
        </div>
    </div>
    <div class="container">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/kfws7XhaLzI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/tbozpEz4K5k" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    <footer id="footer">
                <div class="logo"><a class="logoLink" href="productos.php">The Classic Ride Style</a></div>    
            </footer>
</body>
</html>