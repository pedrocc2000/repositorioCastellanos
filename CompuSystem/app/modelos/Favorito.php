<?php

class Favorito {

    private $idFavorito;
    private $idProducto;
    private $idUsuario;

    /**
     * Get the value of idFavorito
     */ 
    public function getIdFavorito()
    {
        return $this->idFavorito;
    }

    /**
     * Set the value of idFavorito
     *
     * @return  self
     */ 
    public function setIdFavorito($idFavorito)
    {
        $this->idFavorito = $idFavorito;

        return $this;
    }

    /**
     * Get the value of idProducto
     */ 
    public function getIdProducto()
    {
        return $this->idProducto;
    }

    /**
     * Set the value of idProducto
     *
     * @return  self
     */ 
    public function setIdProducto($idProducto)
    {
        $this->idProducto = $idProducto;

        return $this;
    }

    /**
     * Get the value of idUsuario
     */ 
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * Set the value of idUsuario
     *
     * @return  self
     */ 
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }
    
}