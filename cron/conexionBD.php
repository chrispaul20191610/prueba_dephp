<?php
$servername = "localhost";
$database = "db_prueba";
$username = "prueba";
$password = "prueba";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Conecion fallida: " . mysqli_connect_error());
}
echo "Connecion exitosa ";
/*mysqli_close($conn);*/

/* optencion del contenido json */
 $jsonCont = file_get_contents('datos.json');
//decodificacion del conetnido json y convetirlo en un array en php dentro de una variable  */ 
$content = json_decode($jsonCont, true);

/* busqueda de los datos a la matriz  */

$nombre = $content['nombre'];
$categoria = $content['categoria'];
$precio = $content['precio'];
$cantidad_vendidos = $content['cantidad_vendidos'];
$en_almacen = $content['en_almacen'];
$fecha_alta = $content['fecha_alta'];

/* instertar los datos dentro de la base mediante sentencias sql */
$query = "INSERT INTO resumen_productos ( nombre, categoria, precio, cantidad_vendidos, en_almacen, fecha_alta) VALUES('$nombre', '$categoria', '$precio', '$cantidad_vendidos', '$en_almacen', '$fecha_alta')";
if(!mysqli_query($query,$conn)) { 
 die('Error : query no ejecutado ! ' . mysqli_error());
} else{ 
 echo "datos insertados correctamente ";
} 



?>