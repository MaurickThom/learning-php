<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Panel de Administración</h1>
    <?php
        var_dump(PDO::getAvailableDrivers());
    ?>
    <a href="StudentView.php">Estudiantes</a>
    <br>
    <a href="#">Profesores</a>
    <br>
    <a href="#">Cursos</a>
    <br>

</body>
</html>