<?php 

    # arreglos indexados
    // $languages = array("PHP","JS","Python");
    $languages = ["PHP","JS","Python"];

    // echo $languages;
    echo gettype($languages),"\n";
    echo $languages[0];
    array_push($languages,"R");
    $languages[] = "Java";
    foreach ($languages as $value) {
        echo $value , "\n";
    }
    
    # arreglos asociativos
    $newLenguage = ["lenguaje1"=>"PHP","lenguaje2"=>"JS","lenguaje3"=>"Python"];
    // $newLenguage = array("lenguaje1"=>"PHP","lenguaje1"=>"JS","lenguaje1"=>"Python")

    // echo $newLenguage[0]; // undefined
    echo $newLenguage["lenguaje2"];

    $newArray = [1,2,4,true,"false",["true",false]];
    print_r($newArray);
    $jsonDataArr=array('fname'=>'xyz','lname'=>'abc');
    $pushArr=array("adm_no" => true,'date'=> date('m/d/Y h:i:s'));
    $jsonDataArr = array_merge($jsonDataArr,$pushArr);
    print_r($jsonDataArr);//Array ( [fname] => xyz [lname] => abc [adm_no] =>1234 [date] =>'2015-04-22')
    var_dump($languages);
    var_dump($newLenguage);
    
    $jsonDataArr["nuevo"] = "nuevo";
    var_dump($jsonDataArr);
?>