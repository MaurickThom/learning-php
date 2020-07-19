<?php 

    class Course{
        public $name;
        public $time;
        public $teacher;
        public $cost;
        public $available;
        public function toString(){
            echo $this->name. " ".$this->teacher;
        }

        public function validateAvailable(){
            if($this->available){
                echo "Curso : ".$this->name." disponible";
                return;
            }
            echo "Curso : ".$this->name." no disponible";
        }
    }

    $php = new Course();
    $php->name = "PHP";
    $php->time = date('m/d/Y h:i:s');
    $php->teacher = "Thom Maurick Roman Aguilar";
    $php->available = TRUE;
    $php->cost = "USD";

    $php->toString();
    $php->validateAvailable();

    var_dump($php);

?>
