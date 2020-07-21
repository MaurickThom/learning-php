<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        echo "<h1>Bases de datos con PHP</h1>";
        require_once __DIR__."/includes/conecta.inc.php";

        $conecta = conecta();
        if ($conecta == true) {
            echo "<h3>Estamos conectados a la BD</h3>";
        }

    
    ?>
</body>
</html>