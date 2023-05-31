<?php

class Foto {

    private $idFoto;
    private $nombre;
    private $idProducto;
    private $principal;

    /**
     * Get the value of idFoto
     */ 
    public function getIdFoto()
    {
        return $this->idFoto;
    }

    /**
     * Set the value of idFoto
     *
     * @return  self
     */ 
    public function setIdFoto($idFoto)
    {
        $this->idFoto = $idFoto;

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
     * Get the value of principal
     */ 
    public function getPrincipal()
    {
        return $this->principal;
    }

    /**
     * Set the value of principal
     *
     * @return  self
     */ 
    public function setPrincipal($principal)
    {
        $this->principal = $principal;

        return $this;
    }
    

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }
}