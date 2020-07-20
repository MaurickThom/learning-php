<?php 

	# https://www.php.net/manual/es/language.oop5.traits.php
	# rasgos - traits

	#  son un mecanismo de reutilización de código en lenguajes de herencia simple
	# para poder imitar la herencia multiple pero no es lo mismo solo IMITA

	trait Compra {
		private $compra;

		function validarCompra(){
			return "Compra exitosa";
		}
	}

	class Person{
		private $nombre;
		private $apellido;
		private $email;

		const MONEDA = 'USD';

		use Compra;


		public function __construct($nombre, $apellido, $email) {

			$this->validateName($nombre);
			$this->validEmail($email);

			$this->nombre = $nombre;
			$this->apellido = $apellido;
			$this->email = $email;
		}
		public function __destruct(){}
		public function bienvenida() {
			#$this->validaNombre($this->nombre);
			return "Bienvenido {$this->nombre}";
			#return "Bienvenido ".$this->nombre." a Ed Team";
		}

		# gracias a este final no se podra sobreescribir
		final public function despedida() {
			return "Hasta pronto {$this->nombre}";
		}

		public function validEmail($email){
			try {
				if(!filter_var($email,FILTER_VALIDATE_EMAIL))
					throw new Exception("El correo es invalido");
			} catch (Exception $ex) {
				echo $ex->getMessage();
			}
		}

		public function validateName($name){
			try {
				if(empty(trim($name)))
					throw new Exception("Debe ingresar el nombre");
			} catch (Exception $ex) {
				echo $ex->getMessage();
			}
		}

	}
?>