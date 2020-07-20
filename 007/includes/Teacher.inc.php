<?php 
    class Teacher extends Person{
        
        public function __construct($nombre, $apellido, $email) {
			parent::__construct($nombre,$apellido,$email);
		}

        public function __destruct(){}

        public function bienvenida(){
            return "Bienvenido profesor {$this->nombre}";
        }
    }

?>