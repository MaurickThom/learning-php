<?php
    class Course {
        private $name;
        private $time;
        private $teacher;
        private $cost;
        private $available;

        public function __construct(
            $name,
            $time,
            $teacher,
            $cost,
            $available
        ){
            $this->name = $name;
            $this->time = $time;
            $this->teacher = $teacher;
            $this->cost = $cost;
            $this->available = $available;
        }
        
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

    $php = new Course("PHP",date('m/d/Y h:i:s'),"Thom Maurick Roman Aguilar",TRUE,"USB");
    $php->toString();
    $php->validateAvailable();

    var_dump($php);
    # https://www.php.net/manual/es/language.oop5.decon.php
?>
