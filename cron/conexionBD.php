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

foreach($content as $row) {

    $nombre = $row['nombre'];
    $categoria = $row['categoria'];
    $precio = $row['precio'];
    $cantidad_vendidos = $row['cantidad_vendidos'];
    $en_almacen = $row['en_almacen'];
    $fecha_alta = $row['fecha_alta'];

    $query = "INSERT INTO resumen_productos ( nombre, categoria, precio, cantidad_vendidos, en_almacen, fecha_alta) VALUES('$nombre', '$categoria', '$precio', '$cantidad_vendidos', '$en_almacen', '$fecha_alta')";
    mysqli_query($conn,$query);
}


/* busqueda de los datos a la matriz  */



/* prueba for each */


/* instertar los datos dentro de la base mediante sentencias sql */

if(!mysqli_query($conn, $query)) { 
 die('Error : query no ejecutado ! ' . mysqli_error($conn,$query));
} else{ 
 echo "datos insertados correctamente ";
} 



?>