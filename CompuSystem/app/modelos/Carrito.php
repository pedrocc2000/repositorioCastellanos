<?php

class Carrito {

    private $idProductoCarrito;
    private $idProducto;
    private $ctd;
    private $idUsuario;

    /**
     * Get the value of idProductoCarrito
     */ 
    public function getIdProductoCarrito()
    {
        return $this->idProductoCarrito;
    }

    /**
     * Set the value of idProductoCarrito
     *
     * @return  self
     */ 
    public function setIdProductoCarrito($idProductoCarrito)
    {
        $this->idProductoCarrito = $idProductoCarrito;

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
    

    /**
     * Get the value of ctd
     */ 
    public function getCtd()
    {
        return $this->ctd;
    }

    /**
     * Set the value of ctd
     *
     * @return  self
     */ 
    public function setCtd($ctd)
    {
        $this->ctd = $ctd;

        return $this;
    }
}