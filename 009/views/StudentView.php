<?php
require_once __DIR__ . "/../models/dao/mysql/MysqlStudent.php";
$dbStudent = new MysqlStudent();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>CRUD de Estudiantes</h1>
    <h3>C: Insertar</h3>
    <?php

$alumno = [
    'nombre' => 'Thom',
    'paterno' => 'roman',
    'materno' => 'aguilar',
    'email' => 'thomtwd@gmail.com',
];

// $respuesta = $dbStudent->insert($alumno);
// if ($respuesta == true) {
//     echo "Se ha insertado";
// } else {
//     echo "Hay un error";
// }

?>

    <h3>R: Leer/Consultar</h3>
    <?php
$resultados = $dbStudent->show();
foreach ($resultados as $estudiante) {
    echo $estudiante['nombre'] . " " . $estudiante['paterno'] . "<br />";
}
?>

    <h3>U: Actualizar</h3>

    <?php

$alumno = [
    'nombre' => 'Yesi',
    'paterno' => 'Days.',
    'materno' => 'B.',
    'email' => 'thomtwd@gmail.com',
];
$dbStudent->update($alumno);

?>

    <h3>D: Eliminar</h3>

    <?php

$alumno = ['email' => 'thomtwd@gmail.com'];
$dbStudent->delete($alumno);

?>

</body>

</html>