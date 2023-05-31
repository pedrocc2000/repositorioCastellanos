<?php

class CarritoDAO {

    private $conn;

    public function __construct($connEntra)
    {
        if (!$connEntra instanceof mysqli) {
            return false;
        }
        $this->conn = $connEntra;
    }

    public function insertarProductoEnCarrito(int $idProducto, int $idUsuario, int $cantidad) {
        try {
            $sql = "INSERT INTO carrito (idProducto, ctd, idUsuario) VALUES (?,?,?)";

            if(!$stmt = $this->conn->prepare($sql)) {
                throw new Exception("Error al preparar la sentencia: " . $this->conn->error);
            }

            $stmt->bind_param('iii',$idProducto, $cantidad, $idUsuario);
            $stmt->execute();
            return $stmt->affected_rows();

        } catch(Excepion $e) {
            die("Ha ocurrido un problema al insertar el producto en el carrito: " . $e->getMessage());
        }
    }

    public function borrarProductoEnCarrito(Carrito $c) {
        try {

            $sql = "DELETE FROM carrito WHERE idProductoCarrito = ?";

            if(!$stmt = $this->conn->prepare($sql)) {
                throw new Exception("Error al preparar la sentencia: " . $this->conn->error);
            }

            $idProductoCarrito = $c->getIdProductoCarrito();

            $stmt->bind_param('i', $idProductoCarrito);
            $stmt->execute();

            if($stmt->affected_rows == 0) {
                return false;
            } else {
                return true;
            }

        } catch(Excepion $e) {
            die("Ha ocurrido un problema al insertar el producto en el carrito: " . $e->getMessage());
        }
    }

    public function obtenerPorId(int $idProductoCarrito) {
        try {

            $sql = "SELECT * FROM carrito WHERE idProductoCarrito = ?";

            if(!$stmt = $this->conn->prepare($sql)) {
                throw new Exception("Error al preparar la sentencia: " . $this->conn->error);
            }

            $stmt->bind_param('i', $idProductoCarrito);
            $stmt->execute();

            $result = $stmt->get_result();

            return $result->fetch_object('Carrito');

        } catch(Exception $e) {
            die("Ha ocurrido un error al obtener el carrito: " . $e->getMessage());
        }
    }

    public function obtenerCarritoUsuario(int $idUsuario) {
        try {

            if(empty($idUsuario) || !is_int($idUsuario)) {
                throw new Exception("El id de usuario proporcionado no es válido.");
            }

            $sql = "SELECT * FROM carrito WHERE idUsuario = ?";

            if(!$stmt = $this->conn->prepare($sql)) {
                throw new Exception("Error al preparar la sentencia: " . $this->conn->error);
            }

            $stmt->bind_param('i', $idUsuario);
            $stmt->execute();

            $result = $stmt->get_result();
            $carrito = array();

            while($carritoP = $result->fetch_object('Carrito')) {
                $carrito[] = $carritoP;
            }

            return $carrito;

        } catch(Exception $e) {
            die("Ha ocurrido un error al obtener el carrito: " . $e->getMessage());
        }
    }

    public function vaciarCarritoUsuario(int $idUsuario) {
        try {
            
            if(empty($idUsuario) || !is_int($idUsuario)) {
                throw new Exception("El id de usuario proporcionado no es válido.");
            }

            $sql = "DELETE FROM carrito WHERE idUsuario = ?";

            if(!$stmt = $this->conn->prepare($sql)) {
                throw new Exception("Error al preparar la sentencia: " . $this->conn->error);
            }

            $stmt->bind_param('i', $idUsuario);
            $stmt->execute();

        }catch(Exception $e) {
            die("Ha ocurrido un error al borrar el carrito del usuario: " . $e->getMessage());
        }
    }
}