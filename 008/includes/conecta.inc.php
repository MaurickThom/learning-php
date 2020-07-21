<?php 
    function conecta(){
        try {
            $cadena = 'mysql:host=localhost;dbname=cursophp';
			$conexion = new PDO($cadena, 'root', 'mysql');
			return true;
        } catch (PDOException $ex) {
            echo "ERROR: ". $ex->getMessage();
        }
    }

?>