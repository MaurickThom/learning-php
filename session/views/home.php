<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
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
        .menu{
            background-color: #eee;
            padding: 10px;
        }
        .menu__ul{
            margin: 0;
            padding: 0;
            list-style: none;
            display: flex;
            justify-content: space-between;
            width: 100%;
        }
        li:first-child{
            margin-left: 1em;
        }
        li:last-child{
            margin-right: 1em;
        }
    </style>    
</head>
<body>
    <div class="menu">
        <ul class="menu__ul">
            <li class="menu__title">Home</li>
            <li class="cerrar-sesion"><a href="models/logout.php">Cerrar sesión</a></li>
        </ul>
    </div>

    <section>
        <h1>Bienvenido <?php echo $user->getName();  ?></h1>
    </section>
    
</body>
</html>