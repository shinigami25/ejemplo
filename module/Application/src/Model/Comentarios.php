<?php
namespace Application\Model;

class Comentarios {
    protected $comentarioId;
    protected $articuloId;
    protected $propietario;
    protected $comentario;
    protected $fecha;


    public function getcomentarioId(){
        return $this->comentarioId;

    }
    public function getpropietario(){
        return $this->propietario;
        
    }
    public function getcomentario(){
        return $this->comentario;
        
    }
    public function getfecha(){
        return $this->fecha;
        
    }

}