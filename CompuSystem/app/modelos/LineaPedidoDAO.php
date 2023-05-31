<?php

class LineaPedidoDAO {

    private $conn;

    public function __construct($connEntra)
    {
        if (!$connEntra instanceof mysqli) {
            return false;
        }
        $this->conn = $connEntra;
    }

    public function insertar(LineaPedido $lp) {
        try {

            $sql = "INSERT INTO lineapedidos (idPedido, idProducto, ctd)  VALUES (?,?,?)";

            if(!$stmt = $this->conn->prepare($sql)) {
                throw new Exception("Error al preparar la sentencia: " . $this->conn->error);
            }

            $idPedido = $lp->getIdPedido();
            $idProducto = $lp->getIdProducto();
            $ctd = $lp->getCtd();

            $stmt->bind_param('iid', $idPedido, $idProducto, $ctd);
            $stmt->execute();
            
        } catch(Exception $e) {
            die("Ha ocurrido un error al insertar la linea pedido: " . $e->getMessage());
        }
    }

    public function obtenerLineasPedidos(int $idPedido) {
        try {

            $sql = "SELECT * FROM lineapedidos WHERE idPedido = ?";

            if(!$stmt = $this->conn->prepare($sql)) {
                throw new Exception("Error al preparar la sentencia: " . $this->conn->error);
            }

            $stmt->bind_param('i', $idPedido);
            $stmt->execute();

            $result = $stmt->get_result();
            $lineasPedido = array();

            while($lineaPedido = $result->fetch_object('LineaPedido')) {
                $lineasPedido[] = $lineaPedido;
            }

            return $lineasPedido;
            
        } catch(Exception $e) {
            die("Ha ocurrido un error al insertar la linea pedido: " . $e->getMessage());
        }
    }
}