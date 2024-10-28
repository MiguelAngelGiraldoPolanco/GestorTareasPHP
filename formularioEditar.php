<?php 
    include "views/header.php";
    include "Clases/ManagerTareas.php";
    session_start();
    if (isset($_SESSION['managerTareas'])) {
        $ManagerTareas = $_SESSION['managerTareas'];
    } else {
        echo "<p>Error: No hay ninguna instancia de ManagerTareas en la sesión.</p>";
        exit;
    }
?>
    <div>
        <h1>Formulairo Edicion</h1>
    <form action = "" method="POST">
        Num Tarea: 
        <input type="text" name="index" placeholder="Poscion de la tarea a modificar"><br>
        Nombre Tarea: 
        <input type="text" name="name" placeholder="Ingrese el nombre de la tarea"><br>
        Descripcion:
        <input type="text" name="description" placeholder="Ingrese la descripcion"><br>
        Prioridad:
        <select id="priority" name="priority">
            <option value="Alta">Alta</option>
            <option value="Media">Media</option>
            <option value="Baja">Baja</option>
        </select><br>
        Fecha limite:
        <input type="datetime-local" name="date" ><br>
        <input type="submit" name="modificar" value="Modificar" >   
        <input type="submit" name="mostrar" value="Mostrar Tareas" >    
        <input type="submit" name="regresar" value="Regresar" >    
        <input type="submit" name="eliminar" value="Eliminar" >   
          
    </form>
    </div>
<?php 
    if (isset($_POST['modificar'])) {
        $index = $_POST['index'];
        $nombre = $_POST['name'];
        $descripcion = $_POST['description'];
        $prioridad = $_POST['priority'];
        $fechaLimite = $_POST['date'];
        
        $ManagerTareas->modificarTarea($index, $nombre, $descripcion, $prioridad, $fechaLimite);
        
        // Guarda la instancia de vuelta en la sesión por si se han hecho cambios
        $_SESSION['managerTareas'] = $ManagerTareas;
        echo "<p>Cambios guardados correctamente.</p>";
    }
    if(isset($_POST['mostrar'])){
        $ManagerTareas->listarTareas();
    }
    if(isset($_POST['regresar'])){
        header('Location: formulario.php');
    }
    if(isset($_POST['eliminar'])){
        $index = $_POST['index'];
        $ManagerTareas->eliminarTarea($index);
        echo "<p>Tarea eliminada correctamente.</p>";
    }
    
    include "views/footer.php"; 
?>