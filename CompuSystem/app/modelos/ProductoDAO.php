<?php

class ProductoDAO {

    private $conn;

    public function __construct($connEntra)
    {
        if (!$connEntra instanceof mysqli) {
            return false;
        }
        $this->conn = $connEntra;
    }

    public function obtenerTodos() {
        $sql  = "SELECT * FROM productos";

        if (!$result = $this->conn->query($sql)) {
            die("Error al preparar la sentencia: " . $this->conn->error);
        }
    
        $productos = array();

        while($producto = $result->fetch_object('Producto')) {
            $productos[] = $producto;
        }
        
        return $productos;
    }

    public function obtenerTodosFiltrados(int $idCategoria, $orden) {
        try {
            //No es posible utilizar bind_param para el orden porque solo puede vincular parámetros de consulta
            //que representen valores en la clausula Where
            $sql = "SELECT * FROM productos WHERE idCategoria = ? ORDER BY precio " . $orden;

            if(!$stmt = $this->conn->prepare($sql)) {
                throw new Exception("Error al preparar la sentencia: " . $this->conn->error);
            }

            $stmt->bind_param('i', $idCategoria);
            $stmt->execute();

            $result = $stmt->get_result();
            $productosFiltrados = array();

            while($producto = $result->fetch_object('Producto')) {
                $productosFiltrados[] = $producto;
            }

            return $productosFiltrados;

        } catch(Exception $e) {
            die("Error al obtener los productos: " . $e->getMessage());
        }
    }

    public function obtenerCantidadProductos() {
        try {

            $sql = "SELECT COUNT(*) as total FROM productos";

            if(!$stmt = $this->conn->prepare($sql)) {
                throw new Exception("Error al preparar la sentencia: " . $this->conn->error);
            }

            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            return (int) $row['total'];

        } catch(Exception $e) {
            die("Error al obtener la cantidad de productos: " . $e->getMessage());
        }
    }

    public function obtenerPorLimite($limite, $offset) {
        try {

            $sql = "SELECT * FROM productos ORDER BY idProducto ASC LIMIT ?, ?";

            if(!$stmt = $this->conn->prepare($sql)) {
                throw new Exception("Error al preparar la sentencia: " . $this->conn->error);
            }

            $stmt->bind_param('ii', $offset, $limite);
            $stmt->execute();

            $result = $stmt->get_result();
            $productosOrdenados = array();

            while($producto = $result->fetch_object('Producto')) {
                $productosOrdenados[] = $producto;
            }

            return $productosOrdenados;

        } catch(Exception $e) {
            die("Error al obtener la cantidad de productos: " . $e->getMessage());
        }
    }

    public function obtenerPorId(int $id) {
        $sql = "SELECT * FROM productos WHERE idProducto = ?";

        if(!$stmt = $this->conn->prepare($sql)) {
            die("Error al preparar la sentencia: " . $this->conn->error);
        }
    
        $stmt->bind_param('i', $id);
        $stmt->execute();
        
        $result = $stmt->get_result();
        return $result->fetch_object('Producto');
        
    }

    public function obtenerPorNombre(String $nombreProducto) {

        $sql = "SELECT * FROM productos WHERE nombre = ?";

        if(!$stmt = $this->conn->prepare($sql)) {
            die("Error al preparar la sentencia: " . $this->conn->error);
        }

        $stmt->bind_param('s',$nombreProducto);
        $stmt->execute();

        $result = $stmt->get_result();
        return $result->fetch_object('Producto');

    }
    
    public function insertarProducto(Producto $p) {
        try {

            $sql = "INSERT INTO productos (nombre, descripcion, precio, idCategoria) VALUES(?, ?, ?, ?)";

            if(!$stmt = $this->conn->prepare($sql)) {
                throw new Exception("Error al preparar la sentencia: " . $this->conn->error);
            }

            $nombre = $p->getNombre();
            $descripcion = $p->getDescripcion();
            $precio = $p->getPrecio();
            $idCategoria = $p->getIdCategoria();
            
            $stmt->bind_param('ssdi', $nombre, $descripcion, $precio, $idCategoria);
            $stmt->execute();
            
        } catch(Exception $e) {
            die("Ha ocurrido un error al insertar el producto: " . $e->getMessage());
        }
    }

    public function modificarProducto(Producto $p) {
        try {
            $sql = "UPDATE productos SET nombre = ?, descripcion = ?, precio = ? WHERE idProducto = ?";

            if(!$stmt = $this->conn->prepare($sql)) {
                throw new Exception("Error al preparar la sentencia: " . $this->conn->error);
            }

            $nombre = $p->getNombre();
            $descripcion = $p->getDescripcion();
            $precio = $p->getPrecio();
            $idProducto = $p->getIdProducto();

            $stmt->bind_param('ssdi', $nombre, $descripcion, $precio, $idProducto);
            $stmt->execute();

        } catch(Exception $e) {
            die("Ha ocurrido un error al modificar el producto: " . $e->getMessage());
        }
    }
}