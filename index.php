<?php 
// Incluye el encabezado y las clases necesarias
include "views/header.php";
include "Clases/Usuario.php";
include "Clases/ManagerTareas.php";
include_once "Clases/BaseDatos.php";
session_start();

// Crea una instancia de la clase Database y obtiene la conexión
$db = new BaseDatos();
$conn = $db->getConnection();
$managerTareas = new ManagerTareas($conn);

// Verifica que la conexión se haya realizado con éxito
if ($conn) {
    // Realiza la consulta para obtener los usuarios
    $users = $conn->prepare('SELECT nombre, clave FROM user');
    $users->execute();
    $resultados = $users->fetchAll(PDO::FETCH_ASSOC); // Recupera todas las filas como un array asociativo
    print_r($resultados);  // Imprime los resultados para verificar
} else {
    echo "Error en la conexión a la base de datos.";
}

// Formulario de inicio de sesión
?>
<div>
    <form action="" method="POST">
        User: 
        <input type="text" name="name" placeholder="Ingrese el nombre de usuario"><br>
        Password:
        <input type="password" name="password" placeholder="Ingrese la contraseña"><br>
        <input type="submit" value="Login">        
    </form>
</div>

<?php 
// Verifica si se han enviado el nombre de usuario y la contraseña
if (isset($_POST['name']) && isset($_POST['password'])) { 
    // Crea una nueva instancia de Usuario con los datos ingresados
    $user = new Usuario($_POST['name'], $_POST['password']);
    
    // Verifica las credenciales del usuario con la base de datos
    if ($user->isAdmin($resultados)) {
        // Valida la estructura de la contraseña
        if ($user->validatePasswordStructure()) {
            $_SESSION['managerTareas'] = new ManagerTareas($conn);  // Guardamos la instancia en la sesión 
        }
        // Redirige al usuario a la página de formulario
        header('Location: formulario.php');
        exit();
    } else {
        echo "Credenciales incorrectas";
    }   
}

// Incluye el pie de página
include "views/footer.php"; 
?>
