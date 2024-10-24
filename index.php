<?php
    $_SESSION ['user']="Miguel";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GestorTareas</title>
</head>
<body>
    <form action = "login.php" method="POST">
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

        <input type="submit" value="Login">        
    </form>
</body>
</html>