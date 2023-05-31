<?php

class UsuariosController {
    
    function inicio() {
        $conn = ConexionBD::conectar();
        $usuarioDAO = new UsuarioDAO($conn);
        require 'app/vistas/inicio.php';
    }

    function registrar() {
        //Inicializamos las variables
        $nombre = "";
        $apellidos = "";
        $email = "";
        $password = "";
        $usuario = "";
        $fechaAlta = "";
        $telefono = "";
        $foto = "";
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $u = new Usuario();
            $u instanceof Usuario;
            
            //Filtramos los campos que recibimos del formulario
            $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
            $apellidos = filter_var($_POST['apellidos'], FILTER_SANITIZE_STRING);
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
            $usuario = filter_var($_POST['usuario'], FILTER_SANITIZE_STRING);
            $telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_STRING);
            $fechaNacimiento = filter_var($_POST['fechaNac'], FILTER_SANITIZE_STRING);
            
            $usuarioDAO = new UsuarioDAO(ConexionBD::conectar());
            $usuarioDAO instanceof UsuarioDAO;
            //Comprobamos si existe un usuario con el mismo email
            if($usuarioDAO->obtenerPorEmail($email)) {
                MensajeFlash::guardarMensaje("Email repetido");
            } else {
                //Comprobaciones de la foto elegida por el usuario
                if ($_FILES['foto']['type'] != 'image/jpeg' &&
                $_FILES['foto']['type'] != 'image/gif' &&
                $_FILES['foto']['type'] != 'image/png' &&
                $_FILES['foto']['type'] != 'image/webp') {
                    MensajeFlash::guardarMensaje("El archivo no es una imagen");
                    die();
                }
                if ($_FILES['foto']['size'] > 10048576) {
                    MensajeFlash::guardarMensaje("El archivo tiene mas de 10MB y no se puede subir");
                    die();
                }
                //Generamos un nombre aleatorio para la foto
                $nombreArchivo = md5(rand());
                $nombreOriginal = $_FILES['foto']['name'];
                $extension = substr($nombreOriginal, strrpos($nombreOriginal, '.'));
                $nuevoNombre = $nombreArchivo . $extension;
                //Comprobamos que no exista un archivo con el mismo nombre
                //y en ese caso lo volvemos a generar
                while (file_exists('web/imagenes/' . $nuevoNombre)) {
                    $nombreArchivo = md5(rand());
                    $nuevoNombre = $nombreArchivo . $extension;
                }
                move_uploaded_file($_FILES['foto']['tmp_name'],
                        'web/imagenes/imagenes-usuario/' . $nuevoNombre);

                //Asignamos los atributos al usuario que vamos a insertar
                $u->setNombre($nombre);
                $u->setApellido($apellidos);
                $u->setEmail($email);
                $u->setUsuario($usuario);
                $u->setFechaNacimiento($fechaNacimiento);
                $u->setTelefono($telefono);
                $u->setFoto($nuevoNombre);
                $u->setRol("user");
                
                //Generamos una contraseña codificada al usuario a través de la enviada
                $passwordCodificado = password_hash($password, PASSWORD_BCRYPT);
                $u->setPassword($passwordCodificado);

                //Insertamos al usuario
                $usuarioDAO->insertar($u);

                //Regresamos al index y terminamos el proceso
                header("Location:index.php");
                die();
            }
        }
        require 'app/vistas/registro.php';
    }

    function login() {
        //Creamos la conexion con la BBDD
        $conn = ConexionBD::conectar();
        //Recolectamos la informaciónr recibida en el formulario
        $usuario = filter_var($_POST['usuario'], FILTER_SANITIZE_STRING);
        $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        //Obtenemos el usuario
        $usuarioDAO = new UsuarioDAO($conn);
        $u = $usuarioDAO->obtenerPorUsuario($usuario);
        $u instanceof Usuario;
        //Si el usuario no existe
        if(!$u) {
            MensajeFlash::guardarMensaje("El usuario o contraseña no son válidos o no existen");
            header("Location: index.php");
            die();
        //Si la contraseña o el usuario son incorrectos
        } elseif(!password_verify($password,$u->getPassword())) {
            MensajeFlash::guardarMensaje("El usuarioo o contraseña son incorrectos");
            header("Location: index.php");
            die();
        //Si el usuario y contraseña proporcionados son correctos
        } else {
            //Creamos variables SESSION y COOKIES
            $_SESSION['usuario'] = $u->getUsuario();
            $_SESSION['idUsuario'] = $u->getId();
            $_SESSION['fotoUsuario'] = $u->getFoto();
            //Hasheamos la COKKIE del usuario
            $uid = sha1(time() + rand() . md5(time()));
            //Le modificamos al usuario su cookie cada vez que se loguee
            setcookie("uid", $uid, time() + 7 * 24 * 60 * 60, "/");
            $u->setUid($uid);
            $usuarioDAO->actualizarUid($u);
            header("Location: index.php");
            die();
        }

    }

    function logout() {
        if(isset($_SESSION['usuario'])) {
            unset($_SESSION['usuario']);
            unset($_SESSION['idUsuario']);
            setcookie("uid","",time() - 5, "/");
            header("Location: index.php");
        } else {
            header("Location: index.php");
        }
    }

    function ver_enlace() {
        $ruta = $_GET['enlace'];
        require 'app/vistas/' . $ruta;
    }

    function verPerfil() {
        $conn = ConexionBD::conectar();
        $usuarioDAO = new UsuarioDAO($conn);
        $usuario = $usuarioDAO->obtenerPorId($_SESSION['idUsuario']);
        require 'app/vistas/perfil.php';
    }
    function cambiarPassword() {
        $conn = ConexionBD::conectar();
        $usuarioDAO = new UsuarioDAO($conn);
        $u = $usuarioDAO->obtenerPorId($_SESSION['idUsuario']);
        $u instanceof Usuario;
        //Recojemos los datos nuevos introducidos por el usuario
        $passwordActual = $_POST['passwordActual'];
        $passwordNueva1 = $_POST['passwordNueva1'];
        $passwordNueva2 = $_POST['passwordNueva2'];
        //Si la contraseña actual introducida por el usuario es incorrecta
        if(!password_verify($passwordActual, $u->getPassword())) {
            MensajeFlash::guardarMensaje("La contraseña actual no es la correcta");
            header("Location: index.php?action=ver_perfil");
            die();
        //Si la contraseña actual si es correcta
        } else {
            if($passwordNueva1 != $passwordNueva2) {
                MensajeFlash::guardarMensaje("La contraseñas no coinciden");
                header("Location: index.php?action=ver_perfil");
                die();
            }
            //Generamos una nueva contraseña codificada al usuario
            $passwordCodificado = password_hash($passwordNueva1, PASSWORD_BCRYPT);
            $u->setPassword($passwordCodificado);
            $usuarioDAO->actualizar($u);
            MensajeFlash::guardarMensaje("La contraseña ha sido cambiada con exito");
            header("Location: index.php?action=ver_perfil");
            die();
        }
    }

    function cambiarFotoPerfil() {
        $conn = ConexionBD::conectar();
        $usuarioDAO = new UsuarioDAO($conn);
        $u = $usuarioDAO->obtenerPorId($_SESSION['idUsuario']);
        $u instanceof Usuario;
        //Comprobaciones de la foto elegida por el usuario
        if ($_FILES['foto']['type'] != 'image/jpeg' &&
            $_FILES['foto']['type'] != 'image/gif' &&
            $_FILES['foto']['type'] != 'image/png' &&
            $_FILES['foto']['type'] != 'image/webp') {
                MensajeFlash::guardarMensaje("El archivo no es una imagen");
                die();
            }
            if ($_FILES['foto']['size'] > 10048576) {
                MensajeFlash::guardarMensaje("El archivo tiene mas de 10MB y no se puede subir");
                die();
            }
            //Generamos un nombre aleatorio para la foto
            $nombreArchivo = md5(rand());
            $nombreOriginal = $_FILES['foto']['name'];
            $extension = substr($nombreOriginal, strrpos($nombreOriginal, '.'));
            $nuevoNombre = $nombreArchivo . $extension;
            //Comprobamos que no exista un archivo con el mismo nombre
            //y en ese caso lo volvemos a generar
            while (file_exists('web/imagenes/' . $nuevoNombre)) {
                $nombreArchivo = md5(rand());
                $nuevoNombre = $nombreArchivo . $extension;
            }
            move_uploaded_file($_FILES['foto']['tmp_name'],
                    'web/imagenes/imagenes-usuario/' . $nuevoNombre);
            //Antes de asignar la nueva foto removemos la foto antigua del usuario del servidor
            unlink('web/imagenes/imagenes-usuario/' . $u->getFoto());
            //Asignamos la nueva foto del usuario
            $u->setFoto($nuevoNombre);
            //Actualizamos el usuario en la BBDD
            $usuarioDAO->actualizar($u);
            MensajeFlash::guardarMensaje("La foto ha sido cambiada con exito, por favor, cierre y vuelva a iniciar sesión para aplicar los cambios");
            header("Location: index.php?action=ver_perfil");
            die();
    }
}