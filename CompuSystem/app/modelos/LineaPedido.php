<?php

class LineaPedido {

    private $idLineaPedido;
    private $idPedido;
    private $idProducto;
    private $ctd;

    /**
     * Get the value of idLineaPedido
     */ 
    public function getIdLineaPedido()
    {
        return $this->idLineaPedido;
    }

    /**
     * Set the value of idLineaPedido
     *
     * @return  self
     */ 
    public function setIdLineaPedido($idLineaPedido)
    {
        $this->idLineaPedido = $idLineaPedido;

        return $this;
    }

    /**
     * Get the value of idPedido
     */ 
    public function getIdPedido()
    {
        return $this->idPedido;
    }

    /**
     * Set the value of idPedido
     *
     * @return  self
     */ 
    public function setIdPedido($idPedido)
    {
        $this->idPedido = $idPedido;

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