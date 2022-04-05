<?php
  session_start();
  $userID = '';
  $userName = '';
  if($_SESSION['u_id']!=""){
    $userID = $_SESSION['u_id'];
    $userName = $_SESSION['nombre'];
  }
?>
<!DOCTYPE html>
<html lang="es">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Classic Ride</title>
      <!--Fuentes Google -->
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400&family=Playfair+Display&display=swap" rel="stylesheet">
      <!--Recursos BootStrap, JQuery, JavaScript, CSS -->
      <link rel="stylesheet" href="css/inicio.css">
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  </head>

  <body>
    <header class="headerMenu">    
      <nav class="navMenu">
        <div class="logo"><a class="logoLink" href="index.php"><img src="imagenes/bicycle_50px.png" alt="LogoBike"> The Classic Ride Style</a></div>
        <ul class="menu">
        <?php
        if($userID == ""){
          echo "<li><a href='php/sesion.php'>Iniciar Sesion</a></li>
          <li><a href='php/registro.php'>Registrarse</a></li>";
        }else{
          echo "<li> 
          <a class = 'perfil' href='#'>" . $userName . "</a></li>";
        }
      ?>
        <li><a href="<?php  if ($userID!="") {
          echo "php/productos.php";
      }else{
          echo "php/sesion.php";
      }
      ?>">Nuestros Productos</a></li>
          <li><a href="html/about.html">Acerca de este Sitio</a></li>
          <li><a href="<?php  if ($userID!="") {
            echo "php/productos.php";
          }else{
            echo "php/sesion.php";
          }
          ?>"><img src="imagenes/shopping_cart_30px.png" alt="Carrito"></a></li>   
        </ul>
      </nav>
    </header>

      <div class="bannerArea">
        <div class="texto">
          <h1>Adquiere la tuya y demuestra tu estilo!</h1>
          <p>50% de descuento en la primera compra</p>
        </div>
      </div>
     
        <div class="contentArea">
        <div class="wrapper">
          <h2>El vehículo del futuro tiene dos ruedas</h2>
          <div><button id="btnDef" type="button" class="btn btn-default"><a href="<?php  if ($userID!="") {
            echo "php/productos.php";
          }else{
            echo "php/sesion.php";
          }
          ?>">Ver bicicletas</a></button></div>

          <p>- Todas nuestras bicicletas tienen un diseño único para cada estilo de vida. <br>Compra la tuya y unete a la gran comunidad 
          que se transporta en dos ruedas.</p>
          <div classs="prom">
            <br>
            <div class="categoria">
            <h3 id="tt">Urban Vintage</h3>
            </div>
            <table class="urbanoVintage">
              <tr>
                <td><a href="php/sesion.php"><img src="imagenes/promocion/urbano1.jpg" alt="Bicicleta Ubrana Vintage" width="500px" height="300px"></a></td>
                <td><img src="imagenes/promocion/urbano2.jpg" alt="Bicicleta Ubrana Vintage" width="500px" height="300px"></td>
              </tr>
              <tr>
                <td><img src="imagenes/promocion/urbano3.jpg" alt="Bicicleta Ubrana Vintage" width="500px" height="300px"></td>
                <td><img src="imagenes/promocion/urbano5jpg.jpg" alt="Bicicleta Ubrana Vintage" width="500px" height="300px"></td>
              </tr>
              <tr>
                <td><img src="imagenes/promocion/urbano6.jpg" alt="Bicicleta Ubrana Vintage" width="500px" height="300px"></td>
                <td><img src="imagenes/promocion/urbano7.jpg" alt="Bicicleta Ubrana Vintage" width="500px" height="300px"></td>
              </tr>
              <tr>
                <td><img src="imagenes/promocion/urbano8.jpg" alt="Bicicleta Ubrana Vintage" width="500px" height="300px"></td>
                <td><img src="imagenes/promocion/urbano9.jpg" alt="Bicicleta Ubrana Vintage" width="500px" height="300px"></td>
              </tr>
              <tr>
                <td><img src="imagenes/promocion/urbano10.jpg" alt="Bicicleta Ubrana Vintage" width="500px" height="300px"></td>
                <td><img src="imagenes/promocion/urban4.jpg" alt="Bicicleta Ubrana Vintage" width="500px" height="300px"></td>
              </tr>
            </table>
          </div>

          <div classs="prom">
            <div class="categoria">
            <h3 id="tt">Electric Vintage</h3>
            </div>
            <table class="urbanoVintage">
              <tr>
                <td><a href="php/sesion.php"><img src="imagenes/promocion/electric1.jpg" alt="Bicicleta Ubrana Vintage" width="500px" height="300px"></a></td>
                <td><img src="imagenes/promocion/electric2.jpg" alt="Bicicleta Ubrana Vintage" width="500px" height="300px"></td>
              </tr>
              <tr>
                <td><img src="imagenes/promocion/electric3.jpg" alt="Bicicleta Ubrana Vintage" width="500px" height="300px"></td>
                <td><img src="imagenes/productosElectricVintage/electric4.jpg" alt="Bicicleta Ubrana Vintage" width="500px" height="300px"></td>
              </tr>
              <tr>
                <td><img src="imagenes/promocion/electric5.jpg" alt="Bicicleta Ubrana Vintage" width="500px" height="300px"></td>
                <td><img src="imagenes/promocion/electric6.jpg" alt="Bicicleta Ubrana Vintage" width="500px" height="300px"></td>
              </tr>
              <tr>
                <td><img src="imagenes/promocion/electric7.jpeg" alt="Bicicleta Ubrana Vintage" width="500px" height="300px"></td>
                <td><img src="imagenes/promocion/electric8.jpeg" alt="Bicicleta Ubrana Vintage" width="500px" height="300px"></td>
              </tr>
              <tr>
                <td><img src="imagenes/promocion/electric9.jpeg" alt="Bicicleta Ubrana Vintage" width="500px" height="300px"></td>
                <td><img src="imagenes/promocion/electric10.jpeg" alt="Bicicleta Ubrana Vintage" width="500px" height="300px"></td>
              </tr>
            </table>
          </div>
        </div>
        <div>
            <footer id="footer">
                <div class="logo"><a class="logoLink" href="html/about.html"><img src="imagenes/bicycle_50px.png" alt="LogoBike"> The Classic Ride Style</a></div>    
            </footer>
        </div>
    </div>
  </body> 
</html>