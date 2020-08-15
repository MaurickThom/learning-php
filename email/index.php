<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="mail.php" method="POST">
    <h2>Contacto</h2>
    <span>Nombre:</span>
    <br>
    <input type="text" name="name" required>
    <br>
    <span>Correo electrónico:</span>
    <br>
    <input type="email" name="email" required>
    <br>
    <span> Comentario:</span>
    <br>
    <textarea name="comment" id="" cols="30" rows="10" required></textarea>
    <br>
    <input type="submit" value="Enviar correo">
</form>
</body>
</html>
