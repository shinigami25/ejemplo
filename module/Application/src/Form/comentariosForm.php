<?php
namespace Application\Form;
use Zend\Form\Form ;
 

class ComentariosForm extends Form {

    function __construct($name = null){
        parent::__construct('application');
        $this->setAtribute('method', 'POST');
            //id, propietario,comentario fecha
        $this->add([
            'name' => 'comentarioId',
            'type' => 'hidden'
        ]);

        $this->add([
            'name' =>'propietario',
            'type' => 'text',
            'options' => [
                'label' => 'Autor'
            ]
        ]);

        $this->add([
            'name' =>'comentario',
            'type' => 'textarea',
            'options' => [
                'label' => 'Comentario'
            ]
        ]);

        $this->add([
            'name' =>'fecha',
            'type' => 'Zend\Form\Element\Date',
            'options' => [
                'label' => 'Fecha',
                'format' => 'Y-m-D'
            ]
        ]);

        $this->add([
            'name' =>'submit',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Guardar',
                'id' => 'saveCom'
            ]
        ]);

       
    }

}