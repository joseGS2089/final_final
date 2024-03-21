<?php
include('../config/config.php');
include('../config/conexion.php');

/*
//conectarse a la base de datos
$conn = new mysqli (DB_HOST, DB_USER, DB_PASS, DB_NAME);

//VERIFICAR LA CONEXION 
if ($conn->connect_error) {
    echo "error de conexion!";
    die ("Error al conectar a la base de datos: " . $conn->connect_error);
}
else {
    echo "Conexion exitosa!";
}
*/
/*
try {
    $dbh = new PDO('mysql:host=localhost;dbname=proyectotablas','root','LAcasona');
    echo "conexion exitosa <br/>";
}
catch (PDOException $e) {
    echo "Error de conexion: ". $e->getmessage ();
}
*/
/*
$con = new conexion(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$dbh = $con->conectar ();
$consulta= $dbh->prepare ("SELECT * FROM producto");
$consulta -> execute ();
$resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);
print_r ($resultados);
*/
/*
$con = mysqli_connect ("127.0.0.1","root","LAcasona","proyectotablas");
$query = "SELECT * FROM producto";
$resultado = mysqli_query ($con, $query);
$datos = mysqli_fetch_all ($resultado, MYSQLI_ASSOC);
$json = json_encode($datos);
echo $json;
mysqli_close ($con);
*/

class ProductoDAO {
    private $id;
    private $nombre;
    private $descripcion; 
    private $conexion;
    public function __construct ($nom=' ', $desc= ' ', $id=null){

        $this->nombre=$nom;
        $this->descripcion=$desc;
        $this->$id=$id;
        $this->conexion=new Conexion (DB_HOST, DB_USER, DB_PASS, DB_NAME);
        
    }
    public function traerDatosProducto () {
        $db=$this->conexion->Conectar();
        $consulta= $db->prepare ("SELECT * FROM producto");
        $consulta -> execute ();
        $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }
    public function traerDatosProductoXid() {
        $db=$this->conexion->Conectar();
        $query="SELECT * FROM producto WHERE id=$this->id";
        $consulta = $db->prepare($query);
        $consulta->execute();
        $resultados= $consulta->fetch(PDO::ASSOC);
        return $resultados;
    }


    public function addProductos () {
        $db=$this->conexion->Conectar();
        $query ="INSERT INTO producto (nombre, descripcion) VALUES ('$this->nombre', '$this->descripcion')";
        $consulta = $db->prepare($query);
        $consulta->execute();
    }

    public function actProducto() {
        $db = $this->conexion->Conectar();
        $query = "UPDATE producto SET nombre = :nombre, descripcion = :descripcion WHERE id = :id";
        $consulta = $db->prepare($query);
        $consulta->bindParam(':nombre', $this->nombre, PDO::PARAM_STR);
        $consulta->bindParam(':descripcion', $this->descripcion, PDO::PARAM_STR);
        $consulta->bindParam(':id', $this->id, PDO::PARAM_INT);
        $consulta->execute();
    }
    

    public function eliminarProducto($id) {
        $db = $this->conexion->Conectar();
        $query = "DELETE FROM producto WHERE id = :id";
        $consulta = $db->prepare($query);
        $consulta->bindParam(':id', $id, PDO::PARAM_INT);
        $consulta->execute();
    }
    
    
}
?>








