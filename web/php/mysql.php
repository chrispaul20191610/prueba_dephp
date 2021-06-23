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
}

?>