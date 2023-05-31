<?php

//Para poder utilizar variables de tipo sesion
session_start();

///CONTROLADOR FRONTAL///

//Requires de modelos, controladores y config

require 'app/config.php';
require 'app/utilidades/MensajeFlash.php';
require 'app/modelos/ConexionBD.php';
require 'app/modelos/Usuario.php';
require 'app/modelos/UsuarioDAO.php';
require 'app/controladores/UsuariosController.php';
require 'app/modelos/Categoria.php';
require 'app/modelos/CategoriaDAO.php';
require 'app/modelos/Producto.php';
require 'app/modelos/ProductoDAO.php';
require 'app/controladores/ProductosController.php';
require 'app/modelos/Foto.php';
require 'app/modelos/FotoDAO.php';
require 'app/modelos/Carrito.php';
require 'app/modelos/CarritoDAO.php';
require 'app/modelos/LineaPedido.php';
require 'app/modelos/LineaPedidoDAO.php';
require 'app/modelos/Pedido.php';
require 'app/modelos/PedidoDAO.php';
require 'app/modelos/Favorito.php';
require 'app/modelos/FavoritoDAO.php';

//MAPA DE ENRUTAMIENTO

$map = array(
    "inicio" => array("controller" => "UsuariosController", "method" => "inicio", "publica" => true),
    "login" => array("controller" => "UsuariosController", "method" => "login", "publica" => true),
    "registrar" => array("controller" => "UsuariosController", "method" => "registrar", "publica" => true),
    "ver_enlace" => array("controller" => "UsuariosController", "method" => "ver_enlace", "publica" => true),
    "logout" => array("controller" => "UsuariosController", "method" => "logout", "publica" => false),
    "ver_perfil" => array("controller" => "UsuariosController", "method" => "verPerfil", "publica" => false),
    "cambiar_password" => array("controller" => "UsuariosController", "method" => "cambiarPassword", "publica" => false),
    "cambiar_foto" => array("controller" => "UsuariosController", "method" => "cambiarFotoPerfil", "publica" => false),
    "inicio_tienda" => array("controller" => "ProductosController", "method" => "inicioTienda", "publica" => true),
    "insertar_producto" => array("controller" => "ProductosController", "method" => "insertar_producto", "publica" => false),
    "ver_producto" => array("controller" => "ProductosController", "method" => "verProducto", "publica" => true),
    "modificar_producto" => array("controller" => "ProductosController", "method" => "modificarProducto", "publica" => false),
    "ver_carrito" => array("controller" => "ProductosController", "method" => "verCarrito", "publica" => false),
    "insertar_producto_carrito" => array("controller" => "ProductosController", "method" => "insertarProductoCarrito", "publica" => false),
    "tramitar_pedido" => array("controller" => "ProductosController", "method" => "crearPedidoUsuario", "publica" => false),
    "eliminar_producto_carrito" => array("controller" => "ProductosController", "method" => "eliminar_producto_carrito", "publica" => false),
    "ver_favoritos" => array("controller" => "ProductosController", "method" => "verFavoritos", "publica" => false),
    "anadir_favorito" => array("controller" => "ProductosController", "method" => "anadirFavorito", "publica" => false),
    "borrar_favorito" => array("controller" => "ProductosController", "method" => "quitarFavorito", "publica" => false),
    "ver_pedidos" => array("controller" => "ProductosController", "method" => "verPedidos", "publica" => false),
    "ver_detalles_pedido" => array("controller" => "ProductosController", "method" => "verDetallesPedido", "publica" => false)

);

//PARSEO DE LA RUTA
//Si no le llega por GET ningún parámetro de action aplicará el por defecto a la página main
if(!isset($_GET['action'])) {
    $action = 'inicio';
} else {
    //Si no existe la accion en el mapa
    if(!isset($map[$_GET['action']])) {
        header('Statis: 404 not found');
        print "La acción indicada no existe";
        die();
    } else {
        $action = filter_var($_GET['action'], FILTER_SANITIZE_STRING);
    }
}

//MANEJO DE COOKIES DEL USUARIO
//Si el usuario aún dispone de la cookie le iniciaremos la sesión
if(!isset($_SESSION['idUsuario']) && isset($_COOKIE['uid'])){
    //Si tiene cookie y no tiene sesión iniciada le iniciamos sesión
    //Filtramos la cookie del usuario
    $uid = filter_var($_COOKIE['uid'], FILTER_SANITIZE_STRING);
    $usuarioDAO = new UsuarioDAO(ConexionBD::conectar());
    $u = $usuarioDAO->obtenerPorUid($uid);
    $u instanceof Usuario;
    //Si no se encuentra al usuario
    if(!$u) {
        //Borramos la cookie del cliente
        setcookie("uid", "", time() - 5, "/");
        header("Location: index.php");
        die();
    } else {
        //Si encontramos al usuario volvemos a crear las variables SESSION
        $_SESSION['usuario'] = $u->getUsuario();
        $_SESSION['idUsuario'] = $u->getId();
        $_SESSION['fotoUsuario'] = $u->getFoto();
        //Renovamos otra semana la cookie del usuario
        setcookie("uid", $uid, time() + 7 * 24 * 60 * 60, "/");
    }
}
//Comprobaciones de usuario para redigir
if(!$map[$action]["publica"] && !isset($_SESSION['usuario'])) {
    MensajeFlash::guardarMensaje("Debes identificarte");
    header("Location: index.php");
    die();
}

//EJECUCCIÓN DEL CONTROLADOR NECESARIO
//Recojemos el controlador y metodo necesario
$controller = $map[$action]['controller'];
$method = $map[$action]['method'];

if(method_exists($controller, $method)) {
    $obj_controller = new $controller();
    $obj_controller->$method();
} else {
    header('Status: 404 not found');
    echo "El método $method del controlador $controller no existe";
}
