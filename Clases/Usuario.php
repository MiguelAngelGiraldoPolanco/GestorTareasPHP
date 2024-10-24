<?php    
    class Usuario{
        private $username;
        private $password;
        private $user = $_SESSION ['user']="Miguel";

        public function __construct($username, $password){
            $this->username = $username;
            $this->password = password_hash($password, PASSWORD_DEFAULT);
        }
        
        public function verifyPassword($password){
            try {
                // Si la longitud de la contraseña es menor de 6 caracteres, lanza una excepción
                if (strlen($password) < 6) {
                    throw new Exception("La clave debe tener al menos 6 caracteres");
                }
                // Si la longitud de la contraseña es mayor de 16 caracteres, lanza una excepción
                elseif (strlen($password) > 16) {
                    throw new Exception("La clave debe ser menor de 16 caracteres");
                }
                // Si la contraseña no contiene al menos una letra minúscula, lanza una excepción
                elseif (!preg_match('`[a-z]`', $password)) {
                    throw new Exception("La clave debe contener al menos una letra minúscula");
                }
                // Si la contraseña no contiene al menos una letra mayúscula, lanza una excepción
                elseif (!preg_match('`[A-Z]`', $password)) {
                    throw new Exception("La clave debe contener al menos una letra mayúscula");
                }
                // Si la contraseña no contiene al menos un número, lanza una excepción
                elseif (!preg_match('`[0-9]`', $password)) {
                    throw new Exception("La clave debe contener al menos un número");
                } 
                // Si la contraseña cumple con todas las reglas, retorna 'true'
                else {
                    return 'true';
                }
            } catch (Exception $e) {
                // Captura y muestra el mensaje de error de la excepción lanzada
                echo $e->getMessage();
            }
        }
        public function isAdmin(){
            if ($this->username == $this->user) {
                return true;
            }else{
                return false;
            }
        }
    }
?>