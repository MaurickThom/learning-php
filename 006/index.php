<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php 
        echo __DIR__; # esto nos dara la ruta de donde se esta ejecutante este archivo
        # ahora definimos na constante con el string de la ruta de includes
        define('INC','/includes/');
        require_once __DIR__.INC.'Course.inc.php';
        // tambien se pudo haber hecho
        // require_once 'includes/Course.inc.php'; 
        
        $php = new Course("PHP",date('m/d/Y h:i:s'),"Thom Maurick Roman Aguilar",TRUE,"USB");
        $php->toString();
        $php->validateAvailable();

        var_dump($php);

        echo Course::$bienvenida. "</br>";
        echo Course::obtenerDenominacion(). "</br>";
    ?>
</body>
</html>