<?php 
    require_once __DIR__."/../models/bd/ProductDB.php";

    $data = [];
    $productsDB = new ProductDB();
    if(isset($_GET["id_product"])){
        $id_product = (int)$_GET["id_product"];
        $data = ["ok"=>$productsDB->updateItem(($id_product))];
    }
    if(isset($_GET["id_category"])){
        $category = (int)$_GET["id_category"];
        $data = $productsDB->getItemsByCategory($category);
    }
    header('Content-type: application/json; charset=utf-8');
    echo json_encode($data);
?>