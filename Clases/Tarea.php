<?php
class Tarea {
    // Propiedades privadas de la clase
    private $nombreTarea;
    private $descripcionTarea;
    private $prioridad;
    private $fechaLimite;

    // Constructor que inicializa las propiedades al crear una nueva tarea
    public function __construct($nombreTarea, $descripcionTarea, $prioridad, $fechaLimite){
        $this->nombreTarea = $nombreTarea;          // Asigna el nombre de la tarea
        $this->descripcionTarea = $descripcionTarea; // Asigna la descripción de la tarea
        $this->prioridad = $prioridad;              // Asigna la prioridad de la tarea
        $this->fechaLimite = $fechaLimite;          // Asigna la fecha límite de la tarea
    }

    // Métodos getter y setter para cada propiedad

    public function getNombreTarea(){
        return $this->nombreTarea; // Retorna el nombre de la tarea
    }
    
    public function setNombreTarea($nombreTarea){
        $this->nombreTarea = $nombreTarea; // Establece el nombre de la tarea
    }
    
    public function getDescripcionTarea(){
        return $this->descripcionTarea; // Retorna la descripción de la tarea
    }
    
    public function setDescripcionTarea($descripcionTarea){
        $this->descripcionTarea = $descripcionTarea; // Establece la descripción de la tarea
    }
    
    public function getPrioridad(){
        return $this->prioridad; // Retorna la prioridad de la tarea
    }
    
    public function setPrioridad($prioridad){
        $this->prioridad = $prioridad; // Establece la prioridad de la tarea
    }
    
    public function getFechaLimite(){
        return $this->fechaLimite; // Retorna la fecha límite de la tarea
    }
    
    public function setFechaLimite($fechaLimite){
        $this->fechaLimite = $fechaLimite; // Establece la fecha límite de la tarea
    }
}
?>
