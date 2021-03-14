<?php
namespace Application\Model;

class Articulos {
    protected $id;
    protected $propietario;
    protected $articulo;
    protected $fecha;

    public function exchangeArray($data){
        $this->id = (!empty($data['id'])) ? $data['id'] : null;
        $this->propietario = (!empty($data['propietario'])) ? $data['propietario'] : null;
        $this->articulo = (!empty($data['articulo'])) ? $data['articulo'] : null;
        $this->fecha = (!empty($data['fecha'])) ? $data['fecha'] : null;


    }
    public function getcomentarioId(){
        return $this->articuloId;

    }
    public function getpropietario(){
        return $this->propietario;
        
    }
    public function getcomentario(){
        return $this->articulo;
        
    }
    public function getfecha(){
        return $this->fecha;
        
    }

}