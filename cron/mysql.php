<?php
 /* este programa es de prueba a base de crear una vista de una grfaica dcon php en una pagina web */
/* esta conexion debase esta desarrolaada con la logica de programacion a objetos */ 
/*https://www.youtube.com/watch?v=ruLvT2irR_8*/ 

 include '../config.php';

class MySQL{
    private  $oConBD = null;

    public $sqlTabla = "CREATE DATABASE db_prueba";

    /*

    public $sqlTabla = "
        CREATE TABLE resumen_productos (
            id_resumen                  INT(11)     UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            nombre                      VARCHAR(45) NOT NULL,
            categoria                   VARCHAR(45) NOT NULL,
            precio                      FLOAT       NOT NULL,
            cantidad_vendidos           INT(11)     NOT NULL,
            en_almacen                  INT(11)     NOT NULL,
            fecha_alta                  datetime    NOT NULL
        )
    ";

    public $strInsert_old = "
		insert into resumen_productos
			(nombre,categoria,precio,cantidad_vendidos,en_almacen,fecha_alta)
		values
			('producto-1','categoria-2', 199.00, 30, 100,'2019-01-01')
        ";

    public $strInsert = "
    insert into resumen_productos
        (nombre,categoria,precio,cantidad_vendidos,en_almacen,fecha_alta)
    values
        (?,?,?,?,?,?)
    ";
    private $strSelect = "
        select
            id_resumen, nombre, categoria, precio, cantidad_vendidos, en_almacen, fecha_alta
        from resumen_productos
        where
            cantidad_vendidos > ?
        order by precio desc
        limit ?
        ;
    ";

    private $strSelectPDO = "
        select
            id_resumen, nombre, categoria, precio, cantidad_vendidos, en_almacen, fecha_alta
        from resumen_productos
        where
            cantidad_vendidos > :cantidad_vendidos
        order by precio desc
        limit :limit
        ;
    ";

    private $strUpdate = "
        update resumen_productos
        set
             nombre = ?
            ,categoria = ?
        where
            id_resumen = ?
    ";

    private $strUpdatePDO = "
        update resumen_productos
        set
             nombre = :nombre
            ,categoria = :categoria
        where
            id_resumen = :id_resumen
    ";

    private $strDelete = "
        delete from resumen_productos where id_resumen = ?
    ";

    private $strDeletePDO = "
        delete from resumen_productos where id_resumen = :id_resumen
    ";
*/

    public function _construc (){
        global $usuarioBD, $passBD, $ipBD;

        $this-> usuarioBD = $usuarioBD;
        $this-> passBD = $passBD;
        $this-> ipBD = $ipBD;


    }

    public function conBDOB(){
        $this->oConBD = new mysql ($this->ipBD, $this->usuarioBD, $this->passBD);
        if ($this->oConBD->connect_error){
            echo "error al conectarse a la base de datos" . $this->oConBD-> connect_error . "\n";
            return false;

                }
                echo "conexion exitosa ";
                return true;
    }

    public function execStrQueryOB($query){
        $id;
        if ($this->conBDOB() && $query != '') {
            if ($this->oConBD->query($query) === true) {
                $id = $this->oConBD->insert_id;
                echo "Consulta ejecutada \n";
            } else {
                echo "Error al ejecutar consulta " . $this->oConBD->error . "\n";
            }
            $this->oConBD->close();
        }
        return $id;
    }

    /*

    public function insertarOB()
    {
        $json = file_get_contents('./datos.json');
        $jsonDatos = json_decode($json, true);
        //print_r($jsonDatos);
        if ($this->conBDOB()) {
            //echo ($this->strInsert) ;
            //Disminuye el riesgo de inyección sql
            $pQuery = $this->oConBD->prepare($this->strInsert);
            foreach ($jsonDatos as $id => $valor) {
                $pQuery->bind_param(
                    "ssdiis",
                    $valor["nombre"],
                    $valor["categoria"],
                    $valor["precio"],
                    $valor["cantidad_vendidos"],
                    $valor["en_almacen"],
                    $valor["fecha_alta"]
                );
                $pQuery->execute();
                //comprobando insert recibiendo el ultimo ID
                $idInsertado = $this->oConBD->insert_id;
                echo ("Nombre: " . $valor["nombre"] . ", Ultimo ID: " . $idInsertado . "\n");
            }
            $pQuery->close();
            $this->oConBD->close();
        }
    }

    public function consultasOB()
    {
        $cantidad = 50;
        $noProductos = 2;
        if ($this->conBDOB()) {
            $pQuery = $this->oConBD->prepare($this->strSelect);
            $pQuery->bind_param("ii", $cantidad, $noProductos);
            $pQuery->execute();
            $productos = $pQuery->get_result();
            while ($producto = $productos->fetch_assoc()) {
                printf(
                    "id: %s, nombre: %s, categoría: %s, precio: %s, vendidos: %s, en almacen: %s, fecha: %s \n",
                    $producto["id_resumen"],
                    $producto["nombre"],
                    $producto["categoria"],
                    $producto["precio"],
                    $producto["cantidad_vendidos"],
                    $producto["en_almacen"],
                    $producto["fecha_alta"]
                );
            }
            $pQuery->close();
            $this->oConBD->close();
        }
    }


    public function execSPOB()
    {
        if ($this->conBDOB()) {
            $pQuery = $this->oConBD->prepare(" call SP_INDICADORES(); ");
            $pQuery->execute();
            $indicadores = $pQuery->get_result();
            while ($indicador = $indicadores->fetch_assoc()) {
                printf(
                    "Productos totales: %s, Productos en almacen: %s, Ingresos totales: %s \n",
                    $indicador["PT"],
                    $indicador["PA"],
                    $indicador["IT"]

                );
            }
            $pQuery->close();
            $this->oConBD->close();
        }
    }


    public function execSPParametrosOB()
    {
        $nombre = "zapatos";
        $categoria = "calzado";
        $precio = 500;
        $cantidad_vendidos = 20;
        $en_almacen = 30;
        $fecha_alta = "2020-01-30";
        if ($this->conBDOB()) {
            $pQuery = $this->oConBD->prepare(" call SP_INSERTAR_PRODUCTO(?,?,?,?,?,?); ");
            $pQuery->bind_param("ssdiis", $nombre, $categoria, $precio, $cantidad_vendidos, $en_almacen,  $fecha_alta);
            $pQuery->execute();
            $indicadores = $pQuery->get_result();
            while ($indicador = $indicadores->fetch_assoc()) {
                printf("Producto insertado con ID: %s \n", $indicador["ultimo_id"]);
            }
            $pQuery->close();
            $this->oConBD->close();
        }
    }
    */

}

?>