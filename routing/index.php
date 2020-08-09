
<?php 

    $request = $_SERVER['REQUEST_URI'];
    $router = str_replace('/routing-php/001','',$request);
    if($router == '/' || $router == "/index"){
        include("home.php");
    }
    elseif($router=='/about'){
        include("about.php");
    }
    elseif($router=='/product'){
        include("product.php");
    }
    elseif($router=='/services'){
        include("services.php");
    }
?>