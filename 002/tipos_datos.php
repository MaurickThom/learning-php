<?php 
    $boolean = true;
    $boolean = FALSE;
    $numeric = 12;
    $float = 12.5;
    $string = "asdasd";
    print $boolean;
    if($boolean) {
        echo "verdadero";
    }else{
        echo "Falso\n";
    }

    # constantes
    define('constante',10);
    define('PI',3.1416);
    const otraConstante = 15;
    echo constante, "\n";
    echo otraConstante, "\n";
    echo PI,"\n";
    echo gettype(otraConstante),"\n";
    echo gettype($boolean),"\n";
    echo gettype($string);
    echo "\nhola ". "mundo";
    $octal = 0755;
    $hexadecimal = 0xC4E;
    $binario = 0b1010;
    echo gettype($hexadecimal);
    echo gettype($octal);
    echo gettype($binario);

    # para saver que tipo son y ademas ver el dato que trae
    var_dump($binario);
    var_dump($string);
?>