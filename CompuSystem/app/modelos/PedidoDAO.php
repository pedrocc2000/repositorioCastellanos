<?php

class PedidoDAO {

    private $conn;

    public function __construct($connEntra)
    {
        if (!$connEntra instanceof mysqli) {
            return false;
        }
        $this->conn = $connEntra;
    }

    public function insertar(Pedido $p) {

        try {

            $sql = "INSERT INTO pedidos (idUsuario, total) VALUES (?,?)";

            if(!$stmt = $this->conn->prepare($sql)) {
                throw new Exception("Error al preparar la sentencia: " . $this->conn->error);
            }

            $idUsuario = $p->getIdUsuario();
            $total = $p->getTotal();

            $stmt->bind_param('id', $idUsuario, $total);
            $stmt->execute();
            
            return $stmt->insert_id;
            
        } catch(Exception $e) {
            die("Ha ocurrrido un error al insertar el pedido: " . $e->getMessage());
        }
    }

    public function obtenerPedidosUsuario() {
        try {
            $sql = "SELECT * FROM pedidos WHERE idUsuario = ?";

            if(!$stmt = $this->conn->prepare($sql)) {
                throw new Exception("Error al preparar la sentencia: " . $this->conn->error);
            }

            $stmt->bind_param('i', $_SESSION['idUsuario']);
            $stmt->execute();

            $result = $stmt->get_result();
            $pedidos = array();

            while($pedido  = $result->fetch_object('Pedido')) {
                $pedidos[] = $pedido;
            }

            return $pedidos;
            
        } catch(Exception $e) {
            die("Ha ocurrrido un error al insertar el pedido: " . $e->getMessage());
        }
    }
}