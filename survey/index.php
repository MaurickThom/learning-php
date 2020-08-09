<?php 
    include_once __DIR__."/models/survey.php";
    
    $survey = new SurveyModel();
    $showResults = false;
    if(isset($_POST['lenguaje'])){
        $showResults = true;
        
        $survey->setOptionSelected($_POST['lenguaje']);
        $survey->vote();
    }

?>

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
            font-family: sans-serif;
        }

        form{
            background-color: #eee;
            margin: 1em auto;
            width: 500px;
            padding: 20px;
        }
        .result{
            padding: 5px 0;
        }
        .bar{
            background-color:rgb(152, 196, 236);
            border-radius: 4px;
            padding: 10px;
        }
        .selected{
            background-color: rgb(33, 90, 143);
            border-radius: 4px;
            color: white;
            padding: 10px
        }
    
    </style>
</head>
<body>
<form action="#" method="POST">
        <h2>¿Cuál es tu lenguaje de programación favorito?</h2>

        <?php
            if($showResults){
                $queryLanguages = $survey->showResults();

                echo "<h2>" . $survey->getTotalVotes() . " votos totales</h2>";
                foreach ($queryLanguages as $language) {
                    $percentage = $survey->getPercentageVotes($language['votes']);

                    include __DIR__."/views/result.php";
                }
            }else{
                include __DIR__."/views/options.php";
            }
        ?>
        
    </form>
</body>
</html>