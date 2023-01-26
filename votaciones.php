<?php
// Abrir sesión para evitar votos múltiples
//session_start();
if (session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}

// Definir la clase Votación
class Votacion{

	// Datos de acceso a la base de datos
	private $host        = 'localhost';
	private $usuario     = 'root';
	private $clave       = '';
	private $basededatos = 'peliculas';
/* 	private $host        = '*******'; */
/* 	private $usuario     = '********'; */
/* 	private $clave       = '*******'; */
/* 	private $basededatos = '********'; */
	public  $db;



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

	// Método para pillar la puntuación de un elemento
	public function obtener_la_puntuacion_de($elemento){

		// Asegurar la variable para evitar ataques SQL
		$elemento=$this->db->real_escape_string($elemento);

		// Consultar la media de valoraciónes
		$sql = "SELECT AVG(`valoracion`) FROM `votaciones` WHERE `elemento_votado`='".$elemento."'";

		// Hacer la consulta y guardar el resultado
		$resultado = $this->db->query($sql);

		// Asignar el resultado a una variable
		list($puntuacion_media)=$resultado->fetch_row();

		// Devolver la puntuación
		return $puntuacion_media;
		
	}

	// Método para mostrar las estrellitas
	public function mostrar_estrellitas_para($elemento){

		// Pillamos la puntuación
		$puntuacion_media = $this->obtener_la_puntuacion_de($elemento);

		// Generar el HTML resultante
		$HTML_output='<div class="estrellas">';
 
 			// Generamos un bucle de 5 iteraciones (1 por estrella)
			for($i = 1; $i <= 5; $i++) {

				// Si esta estrella está por debajo de la puntuación, está dorada
				if($i <= $puntuacion_media) {
					$clase_css_estrella='estrella_dorada';

				//Si está por encima de la puntuación, está normal
				}else{
					$clase_css_estrella='estrella_normal';
				}

				// Añadir la estrella con su clase CSS y su función para puntuar
				$HTML_output.='<span class="'.$clase_css_estrella.'" onclick="ratestar('.$elemento.','.$i.')">&#x2605;</span>';
			}
		
		// Cerrar DIV estrella
		$HTML_output.='</div>';

		// Devolver el HTML resultante final
		return $HTML_output;

	}

		// Método para mostrar las estrellitas por usuario
		public function mostrar_estrellitas_para_usuario($elemento,$usuario){

			// Pillamos la puntuación
			$puntuacion_media = $this->obtener_la_puntuacion_de_usuario($elemento,$usuario);
	
			// Generar el HTML resultante
			$HTML_output='<div class="estrellas">';
	 
				 // Generamos un bucle de 5 iteraciones (1 por estrella)
				for($i = 1; $i <= 5; $i++) {
	
					// Si esta estrella está por debajo de la puntuación, está dorada
					if($i <= $puntuacion_media) {
						$clase_css_estrella='estrella_dorada';
	
					//Si está por encima de la puntuación, está normal
					}else{
						$clase_css_estrella='estrella_normal';
					}
	
					// Añadir la estrella con su clase CSS y su función para puntuar
					$HTML_output.='<span class="'.$clase_css_estrella.'" onclick="ratestar('.$elemento.','.$i.')">&#x2605;</span>';
				}
			
			// Cerrar DIV estrella
			$HTML_output.='</div>';
	
			// Devolver el HTML resultante final
			return $HTML_output;
	
		}

// Método para pillar la puntuación de un elemento
public function obtener_la_puntuacion_de_usuario($elemento,$usuario){

	// Asegurar la variable para evitar ataques SQL
	$elemento=$this->db->real_escape_string($elemento);

	// Consultar la media de valoraciónes
	 $sql = "SELECT valoracion FROM `votaciones` WHERE `elemento_votado`='".$elemento."' and usuarioid = $usuario";

	// Hacer la consulta y guardar el resultado
	$resultado = $this->db->query($sql);

	// Asignar el resultado a una variable
	list($puntuacion_media)=$resultado->fetch_row();

	// Devolver la puntuación
	return $puntuacion_media;
	
}

	// Método para añadir una votación nueva
	public function insertar_puntuacion($elemento_votado, $puntuacion){

		$puede_votar=true;

		// Comprobar si ya ha votado durante esta sesión
		if( isset($_SESSION['elementos_votados']) ){

			if( in_array($elemento_votado,$_SESSION['elementos_votados']) ){
				echo 'Ya has votado';
				$puede_votar=false;
			}else{

				// Agregar este elemento a la lista
				$_SESSION['elementos_votados'][]=$elemento_votado;

			}

		}else{

			$_SESSION['elementos_votados']=array($elemento_votado);

		}


		// Si aún no ha votado, permitir que lo haga
		if($puede_votar){
			// Asegurar la variable para evitar ataques SQL
			$elemento_votado=$this->db->real_escape_string($elemento_votado);
			$puntuacion=$this->db->real_escape_string($puntuacion);

			// Realizar la inserción en la BD
			$sql = "INSERT INTO `votaciones` (`usuarioid`,`elemento_votado`,`valoracion`) VALUES ('".$_SESSION['usuarioid'] ."','".$elemento_votado."','".$puntuacion."')";

			// Comprobar si ha fallado la consulta
			$result = $this->db->query($sql);
			if($result) { 
				echo 'Votación correcta';
			}
		}
	}


	public function obtener_media_peliculas($num_elementos,$orden){
		/* echo $query = " select elemento_votado, AVG(valoracion) media from votaciones group by elemento_votado order by AVG(valoracion) DESC";
                        $resultado = mysqli_query($conpel,$query);
                        $legend = [];
                        $data = [];
                        if(mysqli_num_rows($resultado)!=0){   
                                while($fila=mysqli_fetch_array($resultado)){     
                                        echo $query2="select titulo from peliculas where id = " .  $fila["elemento_votado"];
                                        $resultado2 = mysqli_query($conpel,$query2);
                                        $titulo ='No encontrado';
                                        if(mysqli_num_rows($resultado2)!=0){ 
                                            $fila2 = mysqli_fetch_assoc($resultado2);
                                            $titulo = $fila2['titulo'];
                                        }  
                                        array_push($legend,$titulo);
                                        array_push($data,$fila["media"]);
                            } // FIN WHILE 
                                
                    }else{     
                                
                    }  
                    print_r($legend);
                    print_r($data);
                    $numValores = count($legend); */
	}
 
}


// Comprobar si hay que insertar una votacion
if(isset($_GET['votarElemento'])){
	if (!isset($_SESSION['usuarioid'])){ // controla los usuarios registrados
		echo("Debes estar registrado \r\nPara poder votar"); 
	} else {
		$V = new Votacion();
		$V->insertar_puntuacion($_GET['votarElemento'], $_GET['puntuacion']);
	}
}

?>
