<?php
include "Clases/Tarea.php";
class ManagerTareas extends Tarea{

    private $tareas = array();

    public function __construct() {        
    }
    // Método para crear una nueva tarea
    public function crearTarea($nombre,$descripcion,$prioridad,$fechaLimite) {
        $tarea=new Tarea($nombre,$descripcion,$prioridad,$fechaLimite);
        array_push($this->tareas, $tarea);
        echo "<p>Tarea creada correctamente</p>";
    }
    // Método para obtener una tarea específica
    public function eliminarTarea($index) {                    
        unset($this->tareas[$index]);
        echo '<p>Tarea eliminada correctamente</p>';
        $this->tareas = array_values($this->tareas);        
    }
    // Método para listar todas las tareas
    public function listarTareas() {   
        var_dump($this->tareas); 
        if ($this->tareas === null){
            echo "<p>No tienes tareas creadas</p>";
            return;
        }else {
        foreach ($this->tareas as $key => $tarea) {
            echo '<div>
                    <form action="" method="POST">
                        Nombre Tarea: 
                        <input type="text" name="name" value="'.$tarea->getNombreTarea().'"><br>
                        Descripción:
                        <input type="text" name="description" value="'.$tarea->getDescripcionTarea().'"><br>
                        Prioridad:
                        <select id="priority" name="priority">';
            
            // Verifica el valor de prioridad y selecciona la opción correspondiente
            if ($tarea->getPrioridad() == 'Alta') {
                echo '<option value="Alta" selected>Alta</option>
                      <option value="Media">Media</option>
                      <option value="Baja">Baja</option>';
            } else if ($tarea->getPrioridad() == 'Media') {
                echo '<option value="Alta">Alta</option>
                      <option value="Media" selected>Media</option>
                      <option value="Baja">Baja</option>';
            } else if ($tarea->getPrioridad() == 'Baja') {
                echo '<option value="Alta">Alta</option>
                      <option value="Media">Media</option>
                      <option value="Baja" selected>Baja</option>';
            }
        
            echo '</select><br>
                  Fecha límite:
                  <input type="datetime-local" name="date" value="'.$tarea->getFechaLimite().'"><br>
                  <input type="submit" name = "modificar" value="Modificar">
                  <input type="submit" name = "eliminar" value="Eliminar">     
                  <input type="hidden" name="index" value="'.$key.'">      
                  </form>
                  </div>';
        }
        } 
    
        if (isset($_POST['eliminar'])) {
            $ManagerTareas->eliminarTarea($_POST['index']);
        }
    if (isset($_POST['modificar'])) {
        $this->modificarTarea($_POST['index'],$_POST['name'], $_POST['description'], $_POST['priority'], $_POST['date']);
    }

        
    }
    public function modificarTarea($index,$nombre,$descripcion,$prioridad,$fechaLimite) {
        if (isset($this->tareas[$index])) {
            $this->tareas[$index]->setNombreTarea($nombre);
            $this->tareas[$index]->setDescripcionTarea($descripcion);
            $this->tareas[$index]->setPrioridad($prioridad);
            $this->tareas[$index]->setFechaLimite($fechaLimite);
            echo '<p>Tarea modificada correctamente</p>';
        } else {
            echo '<p>Error: Tarea no encontrada.</p>';
        }
    }


}
?>