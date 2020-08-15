<?php 
    // var_dump($_FILES["file"]); # con esto recibo la data que me llego es como el post pero para archivos
    $nameDiretory = "uploads/";
    $file = $nameDiretory.basename($_FILES["file"]["name"]);
    $typeFile = strtolower(pathinfo($file,PATHINFO_EXTENSION));

    $isImg = getimagesize($_FILES["file"]["tmp_name"]);

    if(!$isImg){
        echo "El documento no es una imagen";
        return;
    }
    $sizeImg = $_FILES["file"]["size"];

    if($sizeImg > 500000){
        echo "El archivo tiene que ser menor a 500kb";
        return;
    }
    $mimes = ["jpg","jpeg"];
    if(in_array($typeFile, $mimes)){
        echo "Solo se admiten archivos jpg/jpeg";
        return;
    }
    if(move_uploaded_file($_FILES["file"]["tmp_name"], $file)){
        echo "El archivo se subió correctamente";
        return;
    }
    echo "Hubo un error en la subida del archivo";

?>