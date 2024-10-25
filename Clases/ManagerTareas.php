<?php
include "Clases/Tarea.php";
class ManagerTareas extends Tarea{
    private $tareas = array();

    public function __construct() {        
    }
    // Método para crear una nueva tarea
    public function crearTarea($nombre,$descripcion,$prioridad,$fechaLimite) {
        $tarea=new Tarea($nombre,$descripcion,$prioridad,$fechaLimite);
        $this->tareas=$tarea;
    }
    // Método para obtener una tarea específica
    public function eliminarTarea($id) { 
        $nombreTarea = $this->getNombreTarea();
        $descripcionTarea = $this->getDescripcionTarea();
        $prioridadTarea = $this->getPrioridadTarea();
        $fechaLimite = $this->getFechaLimite();    
    }
    // Método para listar todas las tareas
    public function listarTareas() { 
        $nombreTarea = $this->getNombreTarea();
        $descripcionTarea = $this->getDescripcionTarea();
        $prioridadTarea = $this->getPrioridadTarea();
        $fechaLimite = $this->getFechaLimite();  
    }
    public function actualizarTarea($id, $datosActualizados) {
        
    }


}
?>