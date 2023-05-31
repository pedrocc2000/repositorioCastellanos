<?php

class FotoDAO {

    private $conn;

    public function __construct($connEntra)
    {
        if (!$connEntra instanceof mysqli) {
            return false;
        }
        $this->conn = $connEntra;
    }

    public function obtenerFotosProducto(int $idProducto) {
        try {

            $sql = "SELECT * FROM fotos WHERE idProducto = ?";
            
            if(!$stmt = $this->conn->prepare($sql)) {
                throw new Exception("Error al preparar la sentencia: " . $this->conn->error);
            }

            $stmt->bind_param('i', $idProducto);
            $stmt->execute();

            $result = $stmt->get_result();
            $fotos = array();

            while($foto = $result->fetch_object('Foto')) {
                $fotos[] = $foto;
            }
            
            return $fotos;

        } catch(Exception $e) {

            die("Ha ocurrido un error al obtener las fotos del producto " . $e->getMessage());

        }
    }
    public function insertarFoto(Foto $f) {
        try {
            $sql = "INSERT INTO fotos (nombre, idProducto, principal) VALUES (?,?,?)";

            if(!$stmt = $this->conn->prepare($sql)) {
                throw new Exception("Error al preparar la sentencia: " . $this->conn->error);
            }

            $nombre = $f->getNombre();
            $idProducto = $f->getIdProducto();
            $principal = $f->getPrincipal();

            $stmt->bind_param('sii', $nombre, $idProducto, $principal);
            $stmt->execute();
            
        } catch(Excepcion $e) {
            die("Ha ocurrido un error al insertar el producto: " . $e->getMessage());
        }
    }

    public function obtenerPrincipalProducto(int $idProducto) {
        try {
            $sql = "SELECT * FROM fotos WHERE idProducto = ? AND principal = 1";
            
            if(!$stmt = $this->conn->prepare($sql)) {
                throw new Exception("Error al preparar la sentencia: " . $this->conn->error);
            }

            $stmt->bind_param('i', $idProducto);
            $stmt->execute();

            $result = $stmt->get_result();
            return $result->fetch_object('Foto');

        } catch(Excepcion $e) {
            die("Ha ocurrido un error al obtener la foto principal del producto " . $e->getMessage());
        }
    }
}