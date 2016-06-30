<?php 



// get database connection 
include_once 'database.php'; 
$database = new Database(); 
$db = $database->getConnection();
 
// instantiate product object
include_once 'consultas.php';
$query = new Consultas($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input")); 
 
// set product property values
$query->user = $data->usuario;
$query->password = $data->clave;

     
// create the product
if($query->create()){
    echo "Usuario Registrado.";
}
 
// if unable to create the product, tell the user
else{
    echo "No se pudo registrar el usuario";
}
?>