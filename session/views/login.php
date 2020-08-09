<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sesiones</title>

    <style>
        *,
        *::after,
        *::before{
            box-sizing: border-box;
        }
        body{
            margin: 0;
            font-family: sans-serif;
        }
        form{
            background-color: #eee;
            margin: 0 auto;
            width: 400px;
            padding: 20px;
        }
        input{
            border: solid 0;
            border-radius: 3px;
        }
        input[type=text], input[type=password]{
            padding: 10px;
            font-size: 18px;
            outline: none;
            width: 370px;
        }
        input[type=submit]{
            background-color: #1E69E3;
            color: white;
            padding: 8px;
            border: none;
            width: 200px;
        }
        .center{
            text-align: center;
        }

    </style>
</head>
<body>
    <form action="index.php" method="POST">
        <?php
            if(isset($errorLogin)){
                echo $errorLogin;
            }
        ?>
        <h2>Iniciar sesión</h2>
        <p>Nombre de usuario: <br>
        <input type="text" name="username"></p>
        <p>Password: <br>
        <input type="password" name="password"></p>
        <p class="center"><input type="submit" value="Iniciar Sesión"></p>
    </form>
</body>
</html>