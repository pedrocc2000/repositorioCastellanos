<?php

class FavoritoDAO {

    private $conn;

    public function __construct($connEntra)
    {
        if (!$connEntra instanceof mysqli) {
            return false;
        }
        $this->conn = $connEntra;
    }

    public function insertarFavorito(Favorito $f) {
        try {

            $sql = "INSERT INTO favoritos (idProducto, idUsuario) VALUES (?,?)";

            if(!$stmt = $this->conn->prepare($sql)) {
                throw new Exception("Error al preparar la sentencia: " . $this->conn->error);
            }

            $idProducto = $f->getIdProducto();
            $idUsuario = $f->getIdUsuario();

            $stmt->bind_param('ii', $idProducto, $idUsuario);
            $stmt->execute();

            return $stmt->insert_id();

        } catch(Exception $e) {
            die("Ha ocurrido un error al generar el favorito: " . $e->getMessage());
        }
    }

    public function borrarFavorito(int $idFavorito) {
        try {
            $sql = "DELETE FROM favoritos WHERE idFavorito = ?";

            if(!$stmt = $this->conn->prepare($sql)) {
                throw new Exception("Error al preparar la sentencia: " . $this->conn->error);
            }

            $stmt->bind_param('i', $idFavorito);
            $stmt->execute();

        } catch(Exception $e) {
            die("Ha ocurrido un error al generar el favorito: " . $e->getMessage());
        }
    }

    public function obtenerFavorito(int $idProducto, int $idUsuario) {

        try {
            
            $sql = "SELECT * FROM favoritos WHERE idProducto = ? AND idUsuario = ?";

            if(!$stmt = $this->conn->prepare($sql)) {
                throw new Exception("Error al preparar la sentencia: " . $this->conn->error);
            }

            $stmt->bind_param('ii', $idProducto, $idUsuario);
            $stmt->execute();

            $result=$stmt->get_result();
            return $result->fetch_object('Favorito');
            
        } catch(Exception $e) {
            die("Ha ocurrido un error al generar el favorito: " . $e->getMessage());
        }
    }

    public function obtenerFavoritosUsuario() {

        try {
            $sql = "SELECT * FROM favoritos WHERE idUsuario = ?";

            if(!$stmt = $this->conn->prepare($sql)) {
                throw new Exception("Error al preparar la sentencia: " . $this->conn->error);
            }

            $stmt->bind_param('i', $_SESSION['idUsuario']);
            $stmt->execute();

            $result = $stmt->get_result();
            $favoritos = array();

            while($favorito = $result->fetch_object('Favorito')) {
                $favoritos[] = $favorito;
            }

            return $favoritos;
            
        } catch(Exception $e) {
            die("Ha ocurrido un error al generar el favorito: " . $e->getMessage());
        }
    }
}