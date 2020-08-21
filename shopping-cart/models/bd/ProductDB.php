<?php
require_once __DIR__."/BD.php";
class ProductDB extends DB{

    function __construct(){
        parent::__construct();
    }

    public function getItemsByCategory(int $idCategory){
        $query = $this->connect()->prepare('SELECT * FROM products WHERE id_category = :id_category AND quantity > 0');
        $query->execute(['id_category' => $idCategory]);
        $rows = $query->fetchAll();
        return $rows;
    }

    public function getItem(int $idProduct){
        $query = $this->connect()->prepare('SELECT * FROM products WHERE id_product = :id_product AND quantity > 0');
        $query->execute(['id_product' => $idProduct]);
        $row = $query->fetch();
        return $row;
    }

    public function updateItem(int $idProduct,bool $toBuy = true):bool{
        try{
            $query = "UPDATE products SET quantity = quantity".($toBuy?'-' : '+')."1 WHERE id_product = $idProduct";
            $this->connect()->prepare($query)->execute();
            return true;
        }catch(Exception $ex){
            return false;
        }
    }

    // public function getItemsByCategory($category){
    //     $query = $this->connect()->prepare('SELECT * FROM products WHERE id_category = :id_category');
        // $query->execute(['id_category' => $idCategory]);
    //     $items = [];
        
    //     while($row = $query->fetch(PDO::FETCH_ASSOC)){
    //         $item = [
    //                 'id'        => $row['id'],
    //                 'nombre'    => $row['nombre'],
    //                 'precio'    => $row['precio'],
    //                 'categoria' => $row['categoria'],
    //                 'imagen'    => $row['imagen']
    //                 ];
    //         array_push($items, $item);
    //     }
    //     return $items;
    // }
}

?>