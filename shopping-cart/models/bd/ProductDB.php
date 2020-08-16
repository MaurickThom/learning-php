<?php
final class ProductDB extends DB{

    function __construct(){
        parent::__construct();
    }

    public function getItemsByCategory(int $idCategory){
        $query = $this->connect()->prepare('SELECT * FROM products WHERE id_category = :id_category');
        $query->execute(['id_category' => $idCategory]);
        $rows = $query->fetchAll();
        return $rows;
    }

    public function updateItem(int $idProduct):bool{
        try{
            $query = $this->connect()->prepare('UPDATE products SET quantity = quantity - 1 WHERE id_product = :id_product');
            $query->execute(["id_product"=>$idProduct]);
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