<?php include "views/header.php"; ?>
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
        <!-- <input type="bar" name="priority" placeholder="Baja Media Alta"><br> -->
        Fecha limite:
        <input type="datetime-local" name="date" placeholder="Ingrese la descripcion"><br>

        <input type="submit" value="Crear Tarea">        
    </form>
    </div>
<?php include "views/footer.php"; ?>