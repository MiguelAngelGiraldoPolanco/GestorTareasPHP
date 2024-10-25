<?php
class Tarea {
    private $nombreTarea;
    private $descripcionTarea;
    private $prioridad;
    private $fechaLimite;

    public function __construct($nombreTarea, $descripcionTarea, $prioridad, $fechaLimite){
        $this->nombreTarea = $nombreTarea;
        $this->descripcionTarea = $descripcionTarea;
        $this->prioridad = $prioridad;
        $this->fechaLimite = $fechaLimite;
    }

    public function getNombreTarea(){
        return $this->nombreTarea;
    }
    public function getDescripcionTarea(){
        return $this->descripcionTarea;
    }
    public function getPrioridad(){
        return $this->prioridad;
    }
    public function getFechaLimite(){
        return $this->fechaLimite;
    }
}
?>