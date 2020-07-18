<?php 

    # Desactivar toda notificación de error
    error_reporting(0);
    $name = "hola";
    echo $names; 

    # E_NOTICE informa de varibles no inicializadas

    # guardar errores en un log
    ini_set("log_errors",1);
    ini_set("error_log","/tmp/php-error.log");
    error_log("Hay un error");
    # elimina elemento de un array
    # unset($array1[2]);
    //Elimino los elementos con clave = uno y cinco, despues muestro el array
    // unset($array2['uno'],$array2['cinco']);  

    # para borrar una o varias variables:
    // unset($variable1, $variable2, $variable3);
?>