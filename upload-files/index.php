<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
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
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <h2>Subir archivo</h2>
        <input type="file" name="file">
        <p class="center"><input type="submit" value="Subir archivo"></p>
    </form>
</body>
</html>