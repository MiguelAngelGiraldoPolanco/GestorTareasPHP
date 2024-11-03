<?php
include "Clases/Tarea.php";
include "Clases/BaseDatos.php";

class ManagerTareas extends Tarea {
    private $conn;
    
    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Método para crear una nueva tarea en la base de datos
    public function crearTarea($nombre, $descripcion, $prioridad, $fechaLimite) {
        $query = "INSERT INTO tarea (nombre, descripcion, prioridad, fechaLimite) VALUES (:nombre, :descripcion, :prioridad, :fechaLimite)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":descripcion", $descripcion);
        $stmt->bindParam(":prioridad", $prioridad);
        $stmt->bindParam(":fechaLimite", $fechaLimite);

        if ($stmt->execute()) {
            echo "<p>Tarea creada correctamente</p>";
        } else {
            echo "<p>Error al crear la tarea</p>";
        }
    }

    // Método para eliminar una tarea de la base de datos por su ID
    public function eliminarTarea($id) {
        $query = "DELETE FROM tarea WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);

        if ($stmt->execute()) {
            echo "<p>Tarea eliminada correctamente</p>";
        } else {
            echo "<p>Error al eliminar la tarea</p>";
        }
    }

    // Método para listar todas las tareas de la base de datos
    public function listarTareas() {
        $query = "SELECT * FROM tarea";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        $tareas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($tareas) === 0) {
            echo "<p>No tienes tareas creadas</p>";
        } else {
            foreach ($tareas as $tarea) {
                echo '<div>
                    <h2>Tarea ID: '.$tarea['id'].'</h2>
                    <form action="" method="POST">
                        Nombre Tarea: 
                        <input type="text" name="name" value="'.$tarea['nombre'].'"><br>
                        Descripción:
                        <input type="text" name="description" value="'.$tarea['descripcion'].'"><br>
                        Prioridad:
                        <select id="priority" name="priority">';
                
                $prioridad = $tarea['prioridad'];
                echo '<option value="Alta" '.($prioridad == 'Alta' ? 'selected' : '').'>Alta</option>
                      <option value="Media" '.($prioridad == 'Media' ? 'selected' : '').'>Media</option>
                      <option value="Baja" '.($prioridad == 'Baja' ? 'selected' : '').'>Baja</option>';

                echo '</select><br>
                      Fecha límite:
                      <input type="date" name="date" value="'.$tarea['fechaLimite'].'"><br>     
                      </form>
                      </div>';
            }
        }
    }

    // Método para modificar una tarea en la base de datos
    public function modificarTarea($id, $nombre, $descripcion, $prioridad, $fechaLimite) {
        $query = "UPDATE tarea SET nombre = :nombre, descripcion = :descripcion, prioridad = :prioridad, fechaLimite = :fechaLimite WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":descripcion", $descripcion);
        $stmt->bindParam(":prioridad", $prioridad);
        $stmt->bindParam(":fechaLimite", $fechaLimite);

        if ($stmt->execute()) {
            echo '<p>Tarea modificada correctamente</p>';
        } else {
            echo '<p>Error: No se pudo modificar la tarea.</p>';
        }
    }
}
?>
