<?php

class ProductosController {

    function inicioTienda() {
        $conn = ConexionBD::conectar();
        $productosDAO = new ProductoDAO($conn);
        $fotosDAO = new FotoDAO($conn);
        $usuariosDAO = new UsuarioDAO($conn);
        $categoriaDAO = new CategoriaDAO($conn);
        $listaCategorias = $categoriaDAO->obtenerTodos();
        if(isset($_SESSION['idUsuario'])) {
            $usuarioLogueado = $usuariosDAO->obtenerPorId($_SESSION['idUsuario']);
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $orden = $_POST['precio'];
            $categoriaSeleccionada = $_POST['categoria'];
            $listaProductos = $productosDAO->obtenerTodosFiltrados($categoriaSeleccionada, $orden);
        } else {
            //Obtenemos el total de los productos
            $totalDeProductos = $productosDAO->obtenerCantidadProductos();
            //Definimos la cantidad de productos que queremos mostrar por pagina
            $por_pagina = 12;
            //Obtenemos la cantidad que vamos a necesitar de paginas
            $numero_de_paginas = ceil($totalDeProductos/$por_pagina);
            //Obtenemos la página actual
            if(isset($_GET['pagina'])) {
                $pagina_actual = intval($_GET['pagina']);
            } else {
                $pagina_actual = 1;
            }
            $limite = $por_pagina;
            //Calculamos el offest de la página
            /*
            * $offset se utiliza para determinar la posición de inicio de los registros que se van a mostrar
            * en la página actual, y se basa en el número de registros por página y en el número 
            * de páginas anteriores a la página actual.
            */
            $offset = ($pagina_actual - 1) * $por_pagina;
            $listaProductos = $productosDAO->obtenerPorLimite($limite, $offset);
            //Obtenemos todos los productos sin paginacion
            //$listaProductos = $productosDAO->obtenerTodos();
        }
        require 'app/vistas/tienda.php';
    }

    function insertar_producto() {
        $conn = ConexionBD::conectar();
        $productosDAO = new ProductoDAO($conn);
        $categoriaDAO = new CategoriaDAO($conn);
        $fotoDAO = new FotoDAO($conn);
        $listaCategorias = $categoriaDAO->obtenerTodos();
        
        //Inicializamos las variables del contenido del producto
        $nombreProducto = "";
        $precioProducto = "";
        $descripcionProducto = "";
        $categoriaProducto = "";

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $producto = new Producto();
            $producto instanceof Producto;

            //Filtramos el contenido de los campos del formulario
            $nombreProducto = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
            $precioProducto = filter_var($_POST['precio'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $categoriaProducto = filter_var($_POST['categoria'], FILTER_SANITIZE_NUMBER_INT);
            $descripcionProducto = $_POST['descripcion'];
            //Comprobamos que no exista ya un producto con el mismo nombre
            
            if($productosDAO->obtenerPorNombre($nombreProducto)) {
                MensajeFlash::guardarMensaje("Ya existe un producto con este nombre");
            } else {
                //Asignamos el valor de las variables al nuevo producto
                $producto->setNombre($nombreProducto);
                $producto->setPrecio($precioProducto);
                $producto->setDescripcion($descripcionProducto);
                $producto->setIdCategoria($categoriaProducto);
                //Comprobamos que existe al menos una foto
                $hayError = false;
                if(isset($_FILES['foto']['size'][0]) && ($_FILES['foto']['size'][0] > 0)) {
                    //Recorremos todas las fotos que ha subido el usuario para comprobar que cumplen con las condiciones
                    foreach($_FILES['foto']['type'] as $posicion => $error) {
                        if($error == UPLOAD_ERR_OK) {
                            $tipo = $_FILES['foto']['type'][$posicion];
                            $tamano = $_FILES['foto']['size'][$posicion];
                            if($tipo != 'image/gif' &&
                                $tipo != 'image/jpeg' &&
                                $tipo != 'image/png' &&
                                $tipo != 'image/webp') {
                                    MensajeFlash::guardarMensaje("Una de las fotos añadidas no es una imagen o no corresponden con el formato correspondiente");
                                    $hayError = true;
                                }
                            if($tamano > 10048576) {
                                MensajeFlash::guardarMensaje("Una de las fotos ocupa mas de 10MB por lo que no podrá subirte");
                                $hayError = true;
                            }
                        }
                    }
                    if($hayError == false) {
                        //Insertamos el producto en la base de datos
                        $productosDAO->insertarProducto($producto);
                        //Obtenemos el producto que acabamos de insertar para poder obtener su id para asociarlo a la foreign key de las fotos
                        $productoInsertado = $productosDAO->obtenerPorNombre($nombreProducto);
                        $productoInsertado instanceof Producto;
                        //Recorremos todas las fotos
                        $nombres = $_FILES['foto']['name'];
                        $num_elementos = count($nombres);
                        for ($i=0; $i < $num_elementos; $i++) { 
                            $foto = new Foto();
                            //Generamos un nombre aleatorio para la foto
                            $nombreArchivo = md5(rand());
                            $nombreOriginal = $_FILES['foto']['name'][$i];
                            $extension = substr($nombreOriginal, strrpos($nombreOriginal, '.'));
                            $nuevoNombre = $nombreArchivo . $extension;
                            //Comprobamos que no exista ya una foto con ese mismo nombre el servidor
                            //en caso de que si, volveremos a generar un nuevo nombre para esa foto
                            while (file_exists('web/imagenes/imagenes-productos/' . $nuevoNombre)) {
                                $nombreArchivo = md5(rand());
                                $nuevoNombre = $nombreArchivo . $extension;
                            }
                            //Movemos la imagen a la ruta destinada a almacenar las imagenes de los productos
                            move_uploaded_file($_FILES['foto']['tmp_name'][$i],
                                        'web/imagenes/imagenes-productos/' . $nuevoNombre);
                            $nombreFoto = $_FILES["foto"]["name"][$i];
                            $foto->setNombre($nuevoNombre);
                            $foto->setIdProducto($productoInsertado->getIdProducto());
                            //La primera foto que seleccione se ajustará como la principal de la foto
                            if ($i == 0) {
                                $foto->setPrincipal(true);
                            } else {
                                $foto->setPrincipal(false);
                            }
                            $fotoDAO->insertarFoto($foto);
                        }
                        MensajeFlash::guardarMensaje("El producto se ha insertado correctamente");
                        header("Location: index.php?action=insertar_producto");
                        die();
                    }    
                } else {
                    MensajeFlash::guardarMensaje("Debe seleccionarse como mínimo una foto para el producto");
                }
            }
        }
        require 'app/vistas/insertar_producto.php';
    }

    function verProducto() {
        $conn = ConexionBD::conectar();
        $productosDAO = new ProductoDAO($conn);
        $categoriaDAO = new CategoriaDAO($conn);
        $fotoDAO = new FotoDAO($conn);
        $favoritosDAO = new FavoritoDAO($conn);
        $usuariosDAO = new UsuarioDAO($conn);
        $productoVer = $productosDAO->obtenerPorId($_GET['id']);
        $fotosProducto =$fotoDAO->obtenerFotosProducto($_GET['id']);
        $categoriaProducto = $categoriaDAO->obtenerPorId($productoVer->getIdCategoria());
        if(isset($_SESSION['idUsuario'])) {
            $favorito = $favoritosDAO->obtenerFavorito($_GET['id'], $_SESSION['idUsuario']);
            $usuario = $usuariosDAO->obtenerPorId($_SESSION['idUsuario']);
        }
        require 'app/vistas/ver_producto.php';
    }

    function modificarProducto() {
        //Declaracion de clases DAO que utilizaremos
        $conn = ConexionBD::conectar();
        $productosDAO = new ProductoDAO($conn);
        $categoriaDAO = new CategoriaDAO($conn);
        $fotoDAO = new FotoDAO($conn);
        $categoriasDAO = new CategoriaDAO($conn);
        $listaCategorias = $categoriaDAO->obtenerTodos();

        //Declaracion de variables
        $nombreProducto = "";
        $precioProducto = "";
        $idCategoriaProducto = "";
        //$descripcionProducto = "";

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $producto = new Producto();
            $idProducto = $_GET['idProducto'];
            //Filtramos nuevamente el contenido del producto para evitar fallos de seguridad
            $nombreProducto = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
            $precioProducto = filter_var($_POST['precio'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $categoriaProducto = filter_var($_POST['categoria'], FILTER_SANITIZE_NUMBER_INT);
            $descripcionProducto = $_POST['descripcion'];
            //Asignamos nuevamente los contenidos de los campos del producto
            $producto->setIdProducto($idProducto);
            $producto->setNombre($nombreProducto);
            $producto->setPrecio($precioProducto);
            $producto->setIdCategoria($categoriaProducto);
            $producto->setDescripcion($descripcionProducto);
            $productosDAO->modificarProducto($producto);
            MensajeFlash::guardarMensaje("El producto se ha modificado correctamente");
            header("Location: index.php?action=modificar_producto&idProducto=" . $idProducto);
            die();
        } else {
            $productoAModificar = $productosDAO->obtenerPorId($_GET['idProducto']);
            $fotosProductoAModificar = $fotoDAO->obtenerFotosProducto($_GET['idProducto']);
            $categoriaProductoAModificar = $categoriaDAO->obtenerPorId($productoAModificar->getIdCategoria());
            require 'app/vistas/modificarProducto.php';
        }
    }

    //Insertar producto al carrito con ajax
    function insertarProductoCarrito() {
        header("Content-type: application/json; charset=utf-8");
        $idProducto = $_GET['idProducto'];
        $idUsuario = $_SESSION['idUsuario'];
        $cantidad = $_GET['ctd'];
        $conn = ConexionBD::conectar();
        $carritoDAO = new CarritoDAO($conn);
        if($carritoDAO->insertarProductoEnCarrito($idProducto, $idUsuario, $cantidad)) {
            print json_encode(["anadido" => true]);
        } else {
            print json_encode(["anadido" => false]);
        }
    }

    function eliminar_producto_carrito() {
        $conn = ConexionBD::conectar();
        $carritoDAO = new CarritoDAO($conn);
        $idProductoCarritoEliminar = $_GET['id'];
        $productoCarritoEliminar = $carritoDAO->obtenerPorId($idProductoCarritoEliminar);
        $carritoDAO->borrarProductoEnCarrito($productoCarritoEliminar);
        header("Location: index.php?action=ver_carrito");
        die();
    }

    function verCarrito() {
        $conn = ConexionBD::conectar();
        $productosDAO = new ProductoDAO($conn);
        $categoriaDAO = new CategoriaDAO($conn);
        $fotoDAO = new FotoDAO($conn);
        $carritoDAO = new CarritoDAO($conn);
        $carritoCompletoUsuario = $carritoDAO->obtenerCarritoUsuario($_SESSION['idUsuario']);

        require 'app/vistas/carrito.php';
    }

    function crearPedidoUsuario() {
        $conn = ConexionBD::conectar();
        $carritoDAO = new CarritoDAO($conn);
        $productosDAO = new ProductoDAO($conn);
        $lineaPedidoDAO = new LineaPedidoDAO($conn);
        $pedidosDAO = new PedidoDAO($conn);
        
        //Recorremos todos los productos del carrito para saber el total del pedido
        $totalPrecio = 0;
        $carritoCompletoUsuario = $carritoDAO->obtenerCarritoUsuario($_SESSION['idUsuario']);
        foreach($carritoCompletoUsuario as $carrito) {
            $carrito instanceof Carrito;
            $producto = $productosDAO->obtenerPorId($carrito->getIdProducto());
            $totalPrecio += $producto->getPrecio() * $carrito->getCtd();
        }

        //Creamos primero el pedido para poder insertar la foreign key a la linea pedido
        $pedido = new Pedido();
        $pedido->setIdUsuario($_SESSION['idUsuario']);
        $pedido->setTotal($totalPrecio);
        //Obtenemos el id ademas de ya insertar el pedido con el total
        $idPedidoInsertado = $pedidosDAO->insertar($pedido);

        //Recorremos de nuevo el carrito para ir insertando las lineas pedido
        foreach($carritoCompletoUsuario as $carrito) {
            $carrito instanceof Carrito;
            $lineaPedido = new LineaPedido();
            $lineaPedido->setIdPedido($idPedidoInsertado);
            $lineaPedido->setIdProducto($carrito->getIdProducto());
            $lineaPedido->setCtd($carrito->getCtd());
            $lineaPedidoDAO->insertar($lineaPedido);
        }

        $carritoDAO->vaciarCarritoUsuario($_SESSION['idUsuario']);
        sleep(3);
        header("Location: index.php?action=ver_carrito&tramitado=true");
        die();
    }

    function anadirFavorito() {
        header("Content-type: application/json; charset=utf-8");
        $conn = ConexionBD::conectar();
        $favoritosDAO = new FavoritoDAO($conn);
        $idProducto = $_GET['idProducto'];
        $idUsuario = $_SESSION['idUsuario'];
        $favorito = new Favorito();
        $favorito->setIdProducto($idProducto);
        $favorito->setIdUsuario($idUsuario);
        if($favoritosDAO->obtenerFavorito($idProducto, $idUsuario)) {

        } else {
            if($favoritosDAO->insertarFavorito($favorito)){
                print json_encode(["anadido" => true]);
            } else {
                print json_encode(["anadido" => false]);
            }
        }
    }

    function quitarFavorito() {
        header("Content-type: application/json; charset=utf-8");
        $conn = ConexionBD::conectar();
        $favoritosDAO = new FavoritoDAO($conn);
        $idProductoFavorito = $_GET['idFavorito'];
        if($favoritosDAO->borrarFavorito($idProductoFavorito)) {
            print json_encode(["eliminado" => true]);
        } else {
            print json_encode(["eliminado" => false]);
        }

    }

    function verFavoritos() {
        $conn = ConexionBD::conectar();
        $favoritosDAO = new FavoritoDAO($conn);
        $productosDAO = new ProductoDAO($conn);
        $fotosDAO = new FotoDAO($conn);
        
        //Recojemos de la bbdd todos los productos favoritos del usuario
        $favoritos = $favoritosDAO->obtenerFavoritosUsuario($_SESSION['idUsuario']);
        require 'app/vistas/favoritos.php';
    }

    function verPedidos() {
        $conn = ConexionBD::conectar();
        $pedidosDAO = new PedidoDAO($conn);
        $pedidosUsuario = $pedidosDAO->obtenerPedidosUsuario();
        require 'app/vistas/pedidos.php';
    }

    function verDetallesPedido() {
        $conn = ConexionBD::conectar();
        $lineaPedidosDAO = new LineaPedidoDAO($conn);
        $productosDAO = new ProductoDAO($conn);
        $lineasPedidosPedido = $lineaPedidosDAO->obtenerLineasPedidos($_GET['idPedido']);
        require 'app/vistas/detallesPedido.php';
    }
}