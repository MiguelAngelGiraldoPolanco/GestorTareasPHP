<?php 
    // Incluye el archivo de cabecera de la vista y la clase ManagerTareas
    include "views/header.php";
    include "Clases/ManagerTareas.php";
    

    // Inicia la sesión para almacenar y recuperar datos de sesión
    session_start();

    // Comprueba si existe una instancia de ManagerTareas en la sesión
    if (isset($_SESSION['managerTareas'])) {
        // Si existe, la carga en una variable para su uso
        $ManagerTareas = $_SESSION['managerTareas'];
    } else {
        // Si no existe, muestra un mensaje de error y detiene la ejecución
        echo "<p>Error: No hay ninguna instancia de ManagerTareas en la sesión.</p>";
        exit;
    }
?>

<!-- Formulario de edición de tareas -->
<div>
    <h1>Formulario Edición</h1>
    <form action="" method="POST">
        <!-- Campo para ingresar el índice de la tarea a modificar -->
        Num Tarea: 
        <input type="text" name="index" placeholder="Posición de la tarea a modificar"><br>

        <!-- Campo para ingresar el nombre de la tarea -->
        Nombre Tarea: 
        <input type="text" name="name" placeholder="Ingrese el nombre de la tarea"><br>

        <!-- Campo para ingresar la descripción de la tarea -->
        Descripción:
        <input type="text" name="description" placeholder="Ingrese la descripción"><br>

        <!-- Selección de prioridad de la tarea -->
        Prioridad:
        <select id="priority" name="priority">
            <option value="Alta">Alta</option>
            <option value="Media">Media</option>
            <option value="Baja">Baja</option>
        </select><br>

        <!-- Campo para seleccionar la fecha límite de la tarea -->
        Fecha límite:
        <input type="date" name="date"><br>

        <!-- Botones para diferentes acciones: Modificar, Mostrar, Regresar y Eliminar -->
        <input type="submit" name="modificar" value="Modificar">   
        <input type="submit" name="mostrar" value="Mostrar Tareas">    
        <input type="submit" name="regresar" value="Regresar">    
        <input type="submit" name="eliminar" value="Eliminar">   
    </form>
</div>

<?php 
    // Si se hace clic en "Modificar", recoge los datos del formulario y modifica la tarea
    if (isset($_POST['modificar'])) {
        $index = $_POST['index'];             // Índice de la tarea a modificar
        $nombre = $_POST['name'];             // Nuevo nombre de la tarea
        $descripcion = $_POST['description']; // Nueva descripción de la tarea
        $prioridad = $_POST['priority'];      // Nueva prioridad de la tarea
        $fechaLimite = $_POST['date'];        // Nueva fecha límite de la tarea

        // Llama al método modificarTarea para actualizar los datos de la tarea
        $ManagerTareas->modificarTarea($index, $nombre, $descripcion, $prioridad, $fechaLimite);

        // Guarda la instancia de vuelta en la sesión por si se han hecho cambios
        $_SESSION['managerTareas'] = $ManagerTareas;
        echo "<p>Cambios guardados correctamente.</p>";
    }

    // Si se hace clic en "Mostrar", llama al método listarTareas para mostrar las tareas
    if (isset($_POST['mostrar'])) {
        $ManagerTareas->listarTareas();
    }

    // Si se hace clic en "Regresar", redirige a formulario.php
    if (isset($_POST['regresar'])) {
        header('Location: formulario.php');
    }

    // Si se hace clic en "Eliminar", recoge el índice y elimina la tarea
    if (isset($_POST['eliminar'])) {
        $index = $_POST['index'];
        $ManagerTareas->eliminarTarea($index);
        echo "<p>Tarea eliminada correctamente.</p>";
    }
    
    // Incluye el archivo de pie de página de la vista
    include "views/footer.php"; 
?>
