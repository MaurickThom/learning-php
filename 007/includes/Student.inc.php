<?php 

    class Student extends Person{
        public function __construct($nombre, $apellido, $email) {
			parent::__construct($nombre,$apellido,$email);
		}
		public function __destruct(){

		}

		# sobreescribiendo
		public function bienvenida(){
			return parent::bienvenida()." ha este cursito";
		}
    }
?>