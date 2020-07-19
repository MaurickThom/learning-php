<?php 

    $counter = 0;
    do{
        if ($counter === 1 or $counter===0)
            echo "algo or";
        if ($counter === 2 and ($counter + 1) === 3 )
            echo "algo and";
        print($counter);
    }while($counter++ !== 5);

    $arr = [];

    for ($i=0; $i < 100 ; $arr[$i++]=$i);
    var_dump($arr);

    # sucesion de fibonacci
    # 0 1 1 2 3 5 8 13 ...
    $term = 8;
    $pre = 0;
    $pos = 1;
    for ($i=1; $i <=$term ; $i++) { 
        echo $pre." ";
        $sum = $pre + $pos;
        $pre = $pos;
        $pos= $sum;
        
    }

    // uso esclusivo de arreglos
    // foreach ($array as $value) {
    // foreach ($array as $key => $value) {
        # code...
    // }

    # funcion normal
    function algo(){
        return "algo";
    };

    # funcion anonima tambien llamado closure PERO PHP
    $fn = function(){
        return "algo";
    };

    function finalizaCurso(Closure $curso,$nombre){
        return $curso()." ".$nombre;
    }
    echo $fn();
    echo finalizaCurso($fn,"thom");
?>