<?php
 /* este programa es de prueba a base de crear una vista de una grfaica dcon php en una pagina web */
/* esta conexion debase esta desarrolaada con la logica de programacion a objetos */ 
/*https://www.youtube.com/watch?v=ruLvT2irR_8*/ 

 include '../config.php';

class MySQL{
    private  $oConBD = null;

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
}

?>