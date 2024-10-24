<?php include "views/header.php"; ?>
    <div>
    <form action = "" method="POST">
        User: 
        <input type="text" name="name" placeholder="Ingrese el nombre de usuaruio"><br>
        Password:
        <input type="password" name="password" placeholder="Ingrese la contraseña"><br>

        <input type="submit" value="Login">        
    </form>
    </div>
<?php 
    if(isset($_POST['name']) && isset($_POST['password'])) {    
        header("Location:formulario.php");
    }
include "views/footer.php"; 
?>