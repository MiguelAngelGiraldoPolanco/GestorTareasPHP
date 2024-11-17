<?php 
// Incluye el encabezado y las clases necesarias
include "views/header.php";
include "Clases/Usuario.php";
include "Clases/ManagerTareas.php";

session_start();

?>

        <div id =formulario>    
            <form action="index.php" method="post">
                <p>Email:  <input type="email" placeholder="Ingrese su Nombre" name="email" required ></p>
                <p>Contraseña:  <input type="password" placeholder="Ingrese su Contraseña" name="contrasenya" required></p>
            <input type="submit" value="Login" name="accion"> 
            <p>(O crea una cuenta si no la tienes)</p>
            <input type="submit" value="Crear usuario" name="accion">
            </form>
        </div>
        <?php
        
                try {
                    if (isset($_POST['accion'])) {
                        switch ($_POST['accion']) {
                            case 'Login':
                                
                                $usuario = new Usuario($_POST['email'], $_POST['contrasenya']);
                               if( $usuario->validar_usuario($_POST['email'], $_POST['contrasenya'])){

                                $_SESSION['usuarioCreado'] = $usuario;
                                header('Location: formulario.php');
                                exit();
                               } else{
                                  echo "<p>El email o la contraseña no son correctos.</p>";
                               }
                            break;
                            case 'Crear usuario':
                                if (isset($_POST['email'])) {
                                    $usuario = new Usuario($_POST['email'], $_POST['contrasenya']);
                                    $usuario->crearUsuario($_POST['email'],$_POST['contrasenya']);
                                }
                            break;
                        }
                    }
                } catch (Exception $e) {
                    echo "<p>".$e->getMessage()."</p>";
                }
        
include "views/footer.php"; 
?>
