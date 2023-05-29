<?php
function conectarse(){
    if(!($cn=mysqli_connect("localhost", "root", ""))){
            echo "error al conectarse con el servidor";
            exit();
        }
        if (!mysqli_select_db($cn, "dhl")){
            echo "error al selecionar la base de datos";
            exit();
        }
        else{
           // echo "conexion exitosa";
        }
        return $cn;

        
    }
        $cn=conectarse();
        mysqli_close($cn);

?>