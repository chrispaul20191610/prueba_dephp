<?php
include "../aplicacion_prueba/config.php";
class MySQL {
    private $oConBD = null;

    public function __construct ()
    {
        global $usuarioBD, $passBD, $ipBD, $database;
        $this->usuarioBD = $usuarioBD;
        $this->passBD = $passBD;
        $this->ipBD = $ipBD;
        $this->database = $database;
        

    }

    /* conexion con <pdo></pdo>*/
    /* continucacion de video https://www.youtube.com/watch?v=TxFtNz6ixug&t=147s */

    public function conBDPDO(){
        try {
            $this->oConBD = new PDO("MySql:host=" . $this->ipBD . "dbname=" . $this->database, $this->usuarioBD, $this->passBD);
            echo "conexion exitosa";

        }
    }
}

?>