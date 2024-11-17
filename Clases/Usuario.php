<?php
include_once "Clases/BaseDatos.php";
class Usuario{
        private $email;
        private $contrasenya;

        public function __construct($email, $contrasenya){
            $this->email = $email;
            $this->contrasenya = $contrasenya;
        }

        public function getNombre(){
            return $this->email;
        }

        public function validar_usuario($email, $clave){
            $db = new BaseDatos();
            $pdo = $db->getConnection();
            $select = $pdo->prepare('SELECT clave FROM user WHERE nombre = ?');
            $select->execute(array($email));
            $contrasenya = $select->fetchColumn();
            if ($contrasenya) {
                if (password_verify($clave, $contrasenya)){
                    unset($db);
                    return true;
                }else{
                    unset($db);
                    return false;
                }
            }else{
                unset($db);
                return false;
            }
        }

        public function crearUsuario($email,$clave){
            try {
                $db = new BaseDatos();
                $pdo = $db->getConnection();
                $stmt = $pdo->prepare("INSERT INTO user (nombre, clave) VALUES (:nombreUsuario, :contrasenya)");
                $contra = password_hash($clave, PASSWORD_DEFAULT);
                
                $data = [
                    'nombreUsuario' => $email, 
                    'contrasenya' => $contra
                ];
                
                if ($stmt->execute($data)) {
                    echo "Usuario creado con éxito";
                    unset($db);
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
                    unset($db);
                }
            
        }
    }

?>
