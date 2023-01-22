<?php 
class Usuarios {

    private $user_id;
    private $nombre;
    private $apellidos;
    private $mail;
    private $estado;
    private $rol;

    private $host        = 'localhost';
	private $usuario     = 'root';
	private $clave       = '';
	private $basededatos = 'peliculas';
    

/*     public function __construct($user_id = '') {
        global $conpel;

            $this->user_id = $user_id;

            $query = mysqli_query($conpel,"SELECT * FROM users WHERE user_id = '" . $user_id  );

            if (mysqli_num_rows($query) > 0) {
                $row = mysqli_fetch_array($query);

                $this->nombre = $row['nombre'];
                $this->apellidos = $row['apellidos'];
                $this->mail = $row['mail'];
                //$this->password = $row['password'];
                $this->estado = $row['estado'];
                $this->rol = $row['rol'];        
            }
    } */

    public function __construct(){
		if(!isset($this->db)){
			// Conectar a la base de datos    
			try {
			$this->db = new mysqli($this->host, $this->usuario, $this->clave, $this->basededatos);
			$this->db->set_charset("utf8");
			}catch (Exception $e){
			$error = $e->getMessage();
			echo $error;
			}
		}
	}

/*     public function getName() {
        return $this->nombre;
    }

    public function setName($new_name) {
        global $conpel;
        $update = "UPDATE users SET name = '$new_name' WHERE user_id = '$this->user_id'";
        mysqli_query($update, $conexion);
    } */

    public function getFicha($id){
        global $conpel;
        $resultado = mysqli_query($conpel,"SELECT * FROM users WHERE id = $id");
        $jason = "{\"id\":$id,";
        if (mysqli_num_rows($resultado) > 0) {
            $fila = mysqli_fetch_assoc($resultado);
            $jason .= "'nombre' : '" .  $fila['nombre'] ."'";
        } else {
            $jason .= '"error":\'no existe usuario\'';
        }
        $json .= '}';
        return $jason;
    }
    
    public function getFichaUsuario($elemento){

		// Asegurar la variable para evitar ataques SQL
		$elemento=$this->db->real_escape_string($elemento);

		// Consultar la media de valoraciónes
		$sql = "SELECT * FROM users WHERE id = $elemento";

		// Hacer la consulta y guardar el resultado
		 $resultado = $this->db->query($sql);
       //$numero_filas = mysqli_num_rows($resultado);
        $jason = "{\"id\":$elemento,";
        if ($resultado->num_rows > 0) {
            $fila = $resultado->fetch_row();
            $jason .= "'nombre' : '" .  $fila['nombre'] ."'";
        } else {
            $jason .= '"error":\'no existe usuario\'';
        }
        $jason .= '}';
        return $jason;

		
		
		
	}


}