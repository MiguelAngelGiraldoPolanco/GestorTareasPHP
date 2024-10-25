<?php 
    include "views/header.php";
    include "Clases/ManagerTareas.php";
    session_start();
?>
    <div>
    <form action = "" method="POST">
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
        <input type="datetime-local" name="date" placeholder="Ingrese la descripcion"><br>

        <input type="submit" value="Crear Tarea">     
          
    </form>
    <a href='LogOut.php'>Salir</a>
    </div>
<?php 
    if (isset($_SESSION['managerTareas'])) {
        $ManagerTareas = $_SESSION['managerTareas'];     
    } else {
        $ManagerTareas = new ManagerTareas();
        $_SESSION['managerTareas'] = $ManagerTareas;
    }
    if(isset($_POST['name']) && isset($_POST['description'])){
        $ManagerTareas->crearTarea($_POST['name'], $_POST['description'], $_POST['priority'], $_POST['date']);   
        echo "<p>Tarea creada correctamente </p>";
    }

    include "views/footer.php"; 
?>