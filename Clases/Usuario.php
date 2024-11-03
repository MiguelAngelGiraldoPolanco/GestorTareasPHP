<?php    
    class Usuario{
        private $username;
        private $password;

        public function __construct($username, $password){
            $this->username = $username;
            $this->password = $password;
        }
        
        public function validatePasswordStructure() {
            try {
                // Valida longitud de la contraseña
                if (strlen($this->password) < 6) {
                    throw new Exception("La clave debe tener al menos 6 caracteres");
                } elseif (strlen($this->password) > 16) {
                    throw new Exception("La clave debe ser menor de 16 caracteres");
                }
                // Valida contenido de la contraseña
                if (!preg_match('`[a-z]`', $this->password)) {
                    throw new Exception("La clave debe contener al menos una letra minúscula");
                }
                if (!preg_match('`[A-Z]`', $this->password)) {
                    throw new Exception("La clave debe contener al menos una letra mayúscula");
                }
                if (!preg_match('`[0-9]`', $this->password)) {
                    throw new Exception("La clave debe contener al menos un número");
                }
                return true; // Estructura de contraseña válida
            } catch (Exception $e) {
                // Muestra el mensaje de error de la excepción lanzada
                echo $e->getMessage();
                return false;
            }
        }
        
        public function isAdmin($usuarios){
            foreach ($usuarios as $usuario) {
                // Verifica que el nombre de usuario y la clave coincidan
                if ($usuario['nombre'] === $this->username && $usuario['clave'] === $this->password) {
                    return true; // Credenciales válidas
                }
            }
            return false; // Credenciales no válidas
        }
        }
    
?>