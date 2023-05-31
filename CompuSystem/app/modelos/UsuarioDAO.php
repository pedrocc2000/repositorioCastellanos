<?php

class UsuarioDAO
{

    private $conn;

    public function __construct($connEntra)
    {
        if (!$connEntra instanceof mysqli) {
            return false;
        }
        $this->conn = $connEntra;
    }
    
    public function insertar(Usuario $u) {
        try {
            $u instanceof Usuario;
            $sql = "INSERT INTO usuarios (nombre, apellido, email, password, usuario, fechaNacimiento, telefono, foto, rol) VALUES (?,?,?,?,?,?,?,?,?)";
            
            if(!$stmt = $this->conn->prepare($sql)) {
                throw new Exception("Error al preparar la sentencia: " . $this->conn->error);
            }

            $nombre = $u->getNombre();
            $apellido = $u->getApellido();
            $email = $u->getEmail();
            $password = $u->getPassword();
            $usuario = $u->getUsuario();
            $fechaNacimiento = $u->getFechaNacimiento();
            $telefono = $u->getTelefono();
            $foto = $u->getFoto();
            $rol = $u->getRol();
            
            $stmt->bind_param('ssssssiss', $nombre, $apellido, $email, $password, $usuario, $fechaNacimiento, $telefono, $foto, $rol);
            $stmt->execute();
        } catch (Exception $e) {
            die("Ha ocurrido un error al insertar el usuario: " . $e->getMessage());
        }
    }
    

    public function obtenerPorEmail(String $email)
    {
        $sql = "SELECT * FROM usuarios WHERE email = ?";

        if (!$stmt = $this->conn->prepare($sql)) {
            die("Error al preparar la sentencia: " . $this->conn->error);
        }

        $stmt->bind_param('s', $email);
        $stmt->execute();

        $result = $stmt->get_result();
        return $result->fetch_object('Usuario');
    }

    public function obtenerPorUsuario(String $usuario)
    {
        $sql = "SELECT * FROM usuarios WHERE usuario = ?";

        if (!$stmt = $this->conn->prepare($sql)) {
            die("Error al preparar la sentencia: " . $this->conn->error);
        }
        $stmt->bind_param('s', $usuario);
        $stmt->execute();

        $result = $stmt->get_result();
        return $result->fetch_object('Usuario');
    }

    public function obtenerPorUid(String $uid)
    {
        $sql = "SELECT * FROM usuarios WHERE uid = ?";

        if (!$stmt = $this->conn->prepare($sql)) {
            die("Error al preparar la sentencia: " . $this->conn->error);
        }
        $stmt->bind_param('s', $uid);
        $stmt->execute();

        $result = $stmt->get_result();
        return $result->fetch_object('Usuario');
    }

    public function obtenerPorId(int $idUsuario) {
        try {

            $sql = "SELECT * FROM usuarios WHERE id = ?";

            if(!$stmt = $this->conn->prepare($sql)) {
                throw new Exception("Error al preparar la sentencia: " . $this->conn->error);
            }

            $stmt->bind_param('i', $idUsuario);
            $stmt->execute();

            $result = $stmt->get_result();
            return $result->fetch_object('Usuario');
            
        } catch(Exception $e) {
            die("Error al obtener al usuario: " . $e->getMessage());
        }
    }

    public function actualizar(Usuario $u)
    {
        $sql = "UPDATE usuarios SET nombre = ?, apellido = ?, email = ?,
        password = ?, usuario = ?, telefono = ?, foto = ?, rol = ?, uid= ? WHERE id = ?";

        if (!$stmt = $this->conn->prepare($sql)) {
            die("Error al preparar la sentencia: " . $this->conn->error);
        }

        $nombre = $u->getNombre();
        $apellido = $u->getApellido();
        $email = $u->getEmail();
        $password = $u->getPassword();
        $usuario = $u->getUsuario();
        $telefono = $u->getTelefono();
        $foto = $u->getFoto();
        $rol = $u->getRol();
        $uid = $u->getUid();

        $stmt->bind_param('sssssissii', $nombre, $apellido, $email, $password, $usuario, $telefono, $foto, $rol, $uid, $_SESSION['idUsuario']);
        $stmt->execute();
    }

    public function actualizarUid(Usuario $u) {
        $u instanceof Usuario;
        $sql = "UPDATE usuarios SET uid = ? WHERE id = ?";
        if (!$stmt = $this->conn->prepare($sql)) {
            die("Error al preparar la sentencia: " . $this->conn->error);
        }
        $uid = $u->getUid();
        $idUsuario = $u->getId();
        $stmt->bind_param("si", $uid, $idUsuario);
        $stmt->execute();
    }
}
