<?php 
    $first_time = microtime(true);
    for ($i=0; $i < 1000000000 ; $i++) 
        if($i % 100000000 === 0)
            echo "{$i}\n";

    $last_time = round(microtime(true) - $first_time,6);
    echo "Elasped time : {$last_time} sec\n";
?>