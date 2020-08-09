<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *,
        *::after,
        *::before{
            box-sizing: border-box;
        }
        body{
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .main-container{
            margin: auto;
            background-color: #eee;
            padding: 10px;
            width: 800px;
        }
        .search{
            width: 100%;
            height: 100%;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .search__title{
            width: 100%;
            text-align: center;
        }
        input[type="text"]{
            width: 70%;
            padding: 10px;
            font-size: 1em;
            margin-right: 20px;
        }
        .search__action{
            width: 15%;
            padding: 1em;
            border: 0;
            border-radius: 3px;
            background-color: dodgerblue;
            color: white;
            
        }.result{
            padding: 1em;
            width: 87%;
        }
    </style>
</head>
<body>
    <main class="main-container">
        <div class="search-container">
            <form action="index.php" method="GET" class="search">
                <p class="search__title">Buscar el nombre del usuario por id</p>
                <input type="text" name="id" class="search__id"> 
                <button type="submit" class="search__action">Buscar</button>
                <div class="result">
                    <?php 
                        if(isset($_GET["id"])){
                            $server = "localhost";
                            $username = "root";
                            $password = "mysql";
                            $dbName = "usersDB";

                            $connection = new mysqli($server,$username,$password,$dbName);
                            
                            if($connection->connect_error)
                                die("Conexion fallida ".$connection->connect_error);
                            
                            $id = $_GET["id"];
                            $sql = "SELECT name FROM users WHERE id=$id";
                            $result = $connection->query($sql);
                            while($row = $result->fetch_assoc())
                                echo $row['name'];
                        }
                    ?>
                </div>
            </form>
        </div>
    </main>
</body>
</html>

<!-- 

        http://learning-php.test/sql-inyection/index.php?id=1 UNION SELECT id | password FROM users WHERE id=1


 -->