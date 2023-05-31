<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mi página con Bootstrap 5</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="web/css/style.css">
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
</head>
<body>
  <div class="container-fluid" id="contenedor-padre">
    <div class="fixed-top">
      <header class="p-1 bg-dark text-white d-flex justify-content-between align-items-center">
        <div class="text-end" id="divLogoCompuSystem">
          <a href="index.php">
            <img src="web/imagenes/logo_compusystem.png" alt="" id="logoCompuSystem">
          </a>
        </div>
        <?php
        print MensajeFlash::imprimirMensaje();
        if(isset($_SESSION['usuario'])) {
        ?>
        <div class="dropdown bg-danger">
          <a class="btn btn-danger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            Hola <?= $_SESSION['usuario'] ?>
            <img src="web/imagenes/imagenes-usuario/<?=$_SESSION['fotoUsuario']?>" class="rounded-circle" style="width:5vw">
          </a>
          <ul class="dropdown-menu bg-danger" aria-labelledby="dropdownMenuLink">
            <li>
              <a class="dropdown-item" href="index.php?action=ver_perfil">
              <img src="web/imagenes/svg/user-solid.svg" class="list_img">
                Mi perfil
              </a>
            </li>
            <li><a class="dropdown-item" href="index.php?action=ver_carrito">
            <img src="web/imagenes/svg/cart-shopping-solid.svg" class="list_img">
              Carrito
            </a></li>
            <li><a class="dropdown-item" href="index.php?action=ver_favoritos">
            <img src="web/imagenes/svg/star-solid.svg" class="list_img">
              Favoritos
            </a></li>
            <li><a class="dropdown-item" href="index.php?action=ver_pedidos">
            <img src="web/imagenes/svg/box-solid.svg" class="list_img">
              Mis pedidos
            </a></li>
            <li><a class="dropdown-item" href="index.php?action=logout">
            <img src="web/imagenes/svg/right-from-bracket-solid.svg" class="list_img">
              Cerrar sesión
            </a></li>
          </ul>
        </div>
        <?php
        } else {
        ?>
<div class="text-end" id="divLogin">
  <form class="d-flex flex-column flex-sm-row align-items-center" action="index.php?action=login" method="POST">
    <div class="form-group me-sm-2 mb-2">
      <input class="form-control" placeholder="usuario" name="usuario" type="text">
    </div>
    <div class="form-group me-sm-2 mb-2">
      <input class="form-control" placeholder="contraseña" name="password" type="password">
    </div>
    <div class="form-group me-sm-2 mb-2">
      <input type="submit" class="btn btn-outline-light me-2" value="Login">
    </div>
    <div class="form-group me-sm-2 mb-2">
      <a href="index.php?action=registrar" class="btn btn-danger">Registrarse</a>
    </div>
  </form>
</div>
        <?php  
        }
        ?>
      </header>
      <nav class="navbar navbar-expand-lg navbar-light bg-danger" id="navMenu">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav flex-fill justify-content-between">
            <li class="nav-item dropdown flex-fill">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="web/imagenes/svg/home.svg" class="list_img">
                  Home
                </a>
                <ul class="dropdown-menu dropdown-menu-right bg-danger" aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item" href="index.php?action=ver_enlace&enlace=paginas/quienessomos.php">Quienes somos</a></li>
                  <li><a class="dropdown-item" href="index.php?action=ver_enlace&enlace=paginas/contacto.php">Contacto</a></li>
                  <li><a class="dropdown-item" href="index.php?action=ver_enlace&enlace=paginas/faqs.php">FAQ's</a></li>
                  <li><a class="dropdown-item" href="index.php?action=ver_enlace&enlace=paginas/sobreMi.php">Sobre mi</a></li>
                  <li><a class="dropdown-item" href="index.php?action=ver_enlace&enlace=paginas/miCurriculum.php">Mi curriculum</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown flex-fill">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="web/imagenes/svg/servicios.svg" alt="" class="list_img">
                  Servicios
                </a>
                
                <ul class="dropdown-menu dropdown-menu-right bg-danger" aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item" href="index.php?action=ver_enlace&enlace=paginas/vpn.php">VPN</a></li>
                  <li><a class="dropdown-item" href="index.php?action=ver_enlace&enlace=paginas/firewall.php">Firewall</a></li>
                  <li><a class="dropdown-item" href="index.php?action=ver_enlace&enlace=paginas/callcenter.php">Call Center</a></li>
                  <li><a class="dropdown-item" href="index.php?action=ver_enlace&enlace=paginas/redmesh.php">Red mesh</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown flex-fill">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="web/imagenes/svg/fibraOptica.svg" alt="" class="list_img">
                  Fibra óptica
                </a>
                <ul class="dropdown-menu dropdown-menu-right bg-danger" aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item" href="index.php?action=ver_enlace&enlace=paginas/tarifaestudiantes.php">Tarifa estudiantes</a></li>
                  <li><a class="dropdown-item" href="index.php?action=ver_enlace&enlace=paginas/tarifaempresas.php">Tarifa empresas</a></li>
                </ul>
              </li>
              <li class="nav-item flex-fill">
                <a class="nav-link" href="index.php?action=ver_enlace&enlace=paginas/tarifasmoviles.php">
                <img src="web/imagenes/svg/movil.svg" class="list_img">
                  Tarifas moviles
                </a>
              </li>
              <li class="nav-item flex-fill">
                <a class="nav-link" href="index.php?action=inicio_tienda">
                <img src="web/imagenes/svg/tienda.svg" class="list_img">
                  Tienda
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
    <main id="main-section">
      <section class="container">
        <?php
        print $vista
        ?>
      </section>
    </main>
    <footer class="container-fluid d-flex flex-wrap justify-content-between text-center py-3 my-4 border-top bg-dark text-white">
      <div class="col-md-4 d-flex align-items-center flex-fill justify-content-center">
        <p>Direccion: C/Castillo Nº28 Tomelloso 28</p>
      </div>
      <div class="col-md-4 d-flex align-items-center flex-fill justify-content-center">
        <p>Horarios: Lunes a viernes: de 9:00 a 17:00h. Sábado y domingo: de 11:00 a 15:00h.</p>
      </div>
      <div class="col-md-4 d-flex align-items-center flex-fill justify-content-center">
        <a href="index.php?action=ver_enlace&enlace=paginas/contacto.php">Contáctanos</a>
      </div>
    </footer>
  </div>
  <script src="web/js/script.js"></script>
</body>
</html>