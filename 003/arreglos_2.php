<?php 
    $string = "";
    $array = [];
    $games = ["GTA","Batterfield","Call of Duty","otro"=>10];

    # Vacio - empty => true o false
    echo empty($array),"\n";
    echo filter_var(empty($array),FILTER_VALIDATE_BOOLEAN),"\n";
    echo boolval(empty($array)),"\n";
    var_dump(empty($array)); 
    var_dump(empty($games)); 

    # Existe isset => true o false
    var_dump(isset($games[100]));

    # Contar elementos dela arreglo
    echo count($games),"\n";
    echo count($array),"\n";

    # antepenultimo elemento
    $index = count($games) - 2;
    echo $games[$index];

    $videoGames_1 = ["GTA","Batterfield","Call of Duty","Pokémon","The sims","Fornite","FIFA"];
    $videoGames_2 = ["GTA","Batterfield","Call of Duty","Pokémon","The sims","Fornite","FIFA"];
    $videoGames_3 = ["GTA","Batterfield","Call of Duty","Pokémon","The sims","Fornite","FIFA"];
    $videoGames_4 = ["GTA","Batterfield","Call of Duty","Pokémon","The sims","Fornite","FIFA"];
    # Ordenar un arreglo
    sort($videoGames_1);
    
    var_dump($videoGames_1);
    
    # Ordenar un arreglo sin perder el indice
    asort($videoGames_2);
    var_dump($videoGames_2);
    
    # Ordenar de manera inversa
    rsort($videoGames_3);
    var_dump($videoGames_3);
    
    # Ordenar un arreglo sin perder el indice de forma inversa
    arsort($videoGames_4);
    var_dump($videoGames_4);

    # Sumar valores del arreglo
    $numbers = [1,2,3,4,5,6];
    echo "La suma es  ".array_sum($numbers). "\n";

    # Encontrar la diferencia entre dos arreglos
    $first_array = [1,2,3];
    $second_array = [5,2,7,4];

    $difference_first_second = array_diff($first_array,$second_array);# comparará que valores no tiene second_array que si tiene first array
    $difference_second_first = array_diff($second_array,$first_array);# comparará que valores no tiene first array que si tiene second array
    
    var_dump($difference_first_second);
    var_dump($difference_second_first);
    
    $associative_arrays_1 = ['a1'=>"thom",'a2'=>3,4=>5];
    $associative_arrays_2 = ['a2'=>"thom",'a1'=>3,4=>7];
    $associative = array_diff($associative_arrays_1,$associative_arrays_2); # hara lo mismo que lo anterior pero ignorará las key solo se fijara en los values
    var_dump($associative);

    # retorna un array con sub-arreglos 

    $divide = array_chunk($videoGames_1,2);
    var_dump($divide);

    # divide el arreglo y elimina lo anterior
    var_dump(array_slice($videoGames_1,3)); # eliminara todo lo que este antes de la posición 3 => 0 1 2
    

    # unir dos arreglos
    $merge = array_merge([1,2,3],[4,5,6]);
    var_dump($merge);
    
    # eliminar el ultimo
    array_pop($merge);
    var_dump($merge);
    
    
    #buscar y retorna la posicion y si no lo encuentra retorna false
    $element = array_search(15,$merge);
    var_dump($element);
?>