<?php 
    require_once __DIR__."/../interfaces/DAO.php";
    require_once "MysqlConnection.php";
    class MysqlStudent implements DAO{
        public function __destruct(){
            
        }
        private $connection = null;
        function update($object){
            
            try {
                $this->connection = MysqlConnection::getInstanceDB()->getConnection();
				#SELECT * FROM nombre_tabla;
				$query = "UPDATE estudiantes SET nombre=:nombre, paterno=:paterno, materno=:materno WHERE email=:email;";
				$actualizar = $this->connection->prepare($query)->execute($object);

			} catch (Exception $e) {
				exit("ERROR: ".$e->getMessage());
			}finally{
                MysqlConnection::closeConnection();
                $this->connection = null;
            }

        }
        function insert($object){
            try {
                $this->connection = MysqlConnection::getInstanceDB()->getConnection();
				#SELECT * FROM nombre_tabla;
				$query = "INSERT INTO estudiantes SET nombre=:nombre, paterno=:paterno, materno=:materno, email=:email";
				#return $consulta = $conexion->query($query)->fetch();
                $insertar = $this->connection->prepare($query)->execute($object);
                return true;
			} catch (Exception $e) {
				exit("ERROR: ".$e->getMessage()."\n");
                return false;
			}finally{
                MysqlConnection::closeConnection();
                $this->connection = null;
            }
        }
        function delete($key){
            try {
                $this->connection = MysqlConnection::getInstanceDB()->getConnection();
                $query = "DELETE FROM estudiantes WHERE email=:email";
				$eliminar = $this->connection->prepare($query)->execute($key);
				echo "He eliminado";

			} catch (Exception $e) {
				exit("ERROR: ".$e->getMessage());
			}finally{
                MysqlConnection::closeConnection();
                $this->connection = null;
            }
        }
        function show(){
            try {
                $this->connection = MysqlConnection::getInstanceDB()->getConnection();
				#SELECT * FROM nombre_tabla;
				$query = "SELECT * FROM estudiantes";
				#return $consulta = $conexion->query($query)->fetch();
				return $consulta = $this->connection->query($query)->fetchAll();
			} catch (Exception $e) {
				exit("ERROR: ".$e->getMessage());
			}finally{
                MysqlConnection::closeConnection();
                $this->connection = null;
            }
        }
        function showById($key){
            try {
                $this->connection = MysqlConnection::getInstanceDB()->getConnection();
				#SELECT * FROM nombre_tabla;
				$query = "SELECT * FROM estudiantes";
				#return $consulta = $conexion->query($query)->fetch();
				return $consulta = $this->connection->query($query)->fetchAll();
			} catch (Exception $e) {
				exit("ERROR: ".$e->getMessage());
			}finally{
                MysqlConnection::closeConnection();
                $this->connection = null;
            }
        }
    }

?>