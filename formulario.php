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
        <input type="datetime-local" name="date" ><br>
        <input type="submit" name="mostrar" value="Mostrar Tareas" ><br>
        <input type="submit" name= "crear"value="Crear Tarea">  
          
          
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
    if(isset($_POST['crear'])){
        $ManagerTareas->crearTarea($_POST['name'], $_POST['description'], $_POST['priority'], $_POST['date']);   
    }
    if(isset($_POST['mostrar'])){
        $ManagerTareas->listarTareas();
    }
    include "views/footer.php"; 
?>