<?php

class CategoriaDAO {

    private $conn;

    public function __construct($connEntra)
    {
        if (!$connEntra instanceof mysqli) {
            return false;
        }
        $this->conn = $connEntra;
    }

    public function obtenerTodos() {
        $sql = "SELECT * FROM categorias";
        
        if (!$result = $this->conn->query($sql)) {
            die("Error al preparar la sentencia: " . $this->conn->error);
        }

        $categorias = array();

        while ($categoria = $result->fetch_object('Categoria')) {
            $categorias[] = $categoria;
        }

        return $categorias;
    }

    public function insertar(Categoria $c) {
        $sql = "INSERT INTO categorias (nombre) VALUES (?)";

        if(!$stmt = $this->conn->prepare($sql)) {
            die("Error al preparar la sentencia: " . $this->conn->error);
        }

        $nombre = $c->getNombre();
        $stmt->bind_param('s',$nombre);
        $stmt->execute();
    }

    public function obtenerPorId(int $id) {
        $sql = "SELECT * FROM categorias WHERE idCategoria = ?";

        if(!$stmt = $this->conn->prepare($sql)) {
            die("Error al preparar la sentencia: " . $this->conn->error);
        }

        $stmt->bind_param('i', $id);
        $stmt->execute();

        $result = $stmt->get_result();
        return $result->fetch_object('Categoria');
    }

    public function obtenerPorNombre(String $nombre) {

        try {

            $sql = "SELECT * FROM categorias WHERE nombre = ?";

            if(!$stmt = $this->conn->prepare($sql)) {
                throw new Exception("Error al preparar la sentencia: " . $this->conn->error);
            }

            $stmt->bind_param('s', $nombre);
            $stmt->execute();


            $result = $stmt->get_result();
            return $result->fectch_object('Categoria');
            
        } catch(Exception $e) {
            die("Ha ocurrido un error al obtener la categoria: " . $e->getMessage());
        }
    
    }
}