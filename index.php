<?php include "views/header.php";
    include "Clases/Usuario.php";
    include "Clases/ManagerTareas.php";
$_SESSION['name']='Miguel'?>
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
        $user = new Usuario($_POST['name'], $_POST['password']);
        if ($user->isAdmin() == true){
            if ($user->verifyPassword() == 'true') {
                if (!isset($_SESSION['managerTareas'])) {
                    $_SESSION['managerTareas'] = new ManagerTareas();  // Guardamos la instancia en la sesión 
                 }
                header('Location: formulario.php');
            }    
        }
    }
include "views/footer.php"; 
?>