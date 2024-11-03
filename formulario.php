<?php 
    // Incluye el archivo de cabecera de la vista y la clase ManagerTareas
    include "views/header.php";
    include "Clases/ManagerTareas.php";

    $db = new BaseDatos();
    $conn = $db->getConnection();
    $managerTareas = new ManagerTareas($conn);

    // Inicia la sesión para almacenar y recuperar datos de sesión
    session_start();
?>

<!-- Formulario para crear una nueva tarea -->
<div>
    <h1>Formulario Crear</h1>
    <form action="" method="POST">
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

        <!-- Botones para diferentes acciones: Mostrar, Crear Tarea, Modificar y Salir -->
        <input type="submit" name="mostrar" value="Mostrar Tareas">
        <input type="submit" name="crear" value="Crear Tarea">  
        <input type="submit" name="modificar" value="Modificar">    
        <input type="submit" name="salir" value="Salir"> 
    </form>
</div>

<?php 
  

    // Si se hace clic en "Crear Tarea", crea una nueva tarea con los datos del formulario
    if (isset($_POST['crear'])) {
        $managerTareas->crearTarea($_POST['name'], $_POST['description'], $_POST['priority'], $_POST['date']);   
    }

    // Si se hace clic en "Mostrar Tareas", muestra la lista de tareas
    if (isset($_POST['mostrar'])) {
        $managerTareas->listarTareas();
    }

    // Si se hace clic en "Modificar", redirige al formulario de edición de tareas
    if (isset($_POST['modificar'])) {
        header('Location: formularioEditar.php');
    }

    // Si se hace clic en "Salir", destruye la sesión y redirige al inicio
    if (isset($_POST['salir'])) {
        session_destroy();
        header('Location: index.php');
    }

    // Incluye el archivo de pie de página de la vista
    include "views/footer.php"; 
?>
