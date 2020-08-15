<?php 
// https://www.youtube.com/watch?v=T-V6MAFwFzg
// https://3v4l.org/
    class User{
        // typed properties
        public int $id;
        public string $name;
        public array $hobbies = [];
        
    }
    $erick = new User; 
    $erick->id = 2;
    $erick->name = "Erick";
    array_push($erick->hobbies,"Programming");
    var_dump($erick);

    // arrow function
    $factor = 10;
    $numsMap = array_map(fn($n)=>$n*$factor,[1,2,3]);
    $numsReduce = array_reduce([1,2,3,4],fn($acc,$curr)=>$acc+ $curr,0);

    final class ClassToTess{

        public function loQuesea():array
        {
            $array = [1,2,3,4,5];
            // return array_map(
            //     static function(int $value){
            //         return $value + 1;
            //     },
            //     $array
            // );
            return array_map(fn(int $value)=>$value+1,$array);
        }
    }
?>