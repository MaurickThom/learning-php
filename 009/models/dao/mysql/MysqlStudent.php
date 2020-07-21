<?php
require_once __DIR__ . "/../interfaces/DAO.php";
require_once "MysqlConnection.php";
class MysqlStudent implements DAO
{
    public function __destruct()
    {

    }
    private $connection = null;
    public function update($object)
    {

        try {
            $this->connection = MysqlConnection::getInstanceDB()->getConnection();
            #SELECT * FROM nombre_tabla;
            $query = "UPDATE estudiantes SET nombre=:nombre, paterno=:paterno, materno=:materno WHERE email=:email;";
            $actualizar = $this->connection->prepare($query)->execute($object);

        } catch (Exception $e) {
            exit("ERROR: " . $e->getMessage());
        } finally {
            MysqlConnection::closeConnection();
            $this->connection = null;
        }

    }
    public function insert($object)
    {
        try {
            $this->connection = MysqlConnection::getInstanceDB()->getConnection();
            #SELECT * FROM nombre_tabla;
            $query = "INSERT INTO estudiantes SET nombre=:nombre, paterno=:paterno, materno=:materno, email=:email";
            #return $consulta = $conexion->query($query)->fetch();
            $insertar = $this->connection->prepare($query)->execute($object);
            return true;
        } catch (Exception $e) {
            exit("ERROR: " . $e->getMessage() . "\n");
            return false;
        } finally {
            MysqlConnection::closeConnection();
            $this->connection = null;
        }
    }
    public function delete($key)
    {
        try {
            $this->connection = MysqlConnection::getInstanceDB()->getConnection();
            $query = "DELETE FROM estudiantes WHERE email=:email";
            $eliminar = $this->connection->prepare($query)->execute($key);
            echo "He eliminado";

        } catch (Exception $e) {
            exit("ERROR: " . $e->getMessage());
        } finally {
            MysqlConnection::closeConnection();
            $this->connection = null;
        }
    }
    public function show()
    {
        try {
            $this->connection = MysqlConnection::getInstanceDB()->getConnection();
            #SELECT * FROM nombre_tabla;
            $query = "SELECT * FROM estudiantes";
            #return $consulta = $conexion->query($query)->fetch();
            return $consulta = $this->connection->query($query)->fetchAll();
        } catch (Exception $e) {
            exit("ERROR: " . $e->getMessage());
        } finally {
            MysqlConnection::closeConnection();
            $this->connection = null;
        }
    }

    // ['nombre','paterno'] => options
    // ['edad >'=>20]
    // ['paterno LIKE'=>'%ias']
    public function selectParams($options = [],$where = []){
        try {
            $this->connection = MysqlConnection::getInstanceDB()->getConnection();
            $cadena = '';
            $query = "";
            if(!empty($options))
                $cadena = "*";
            else{
                foreach ($options as $option) {
                    $cadena .= $option.",";
                }
                $cadena = substr($cadena,0,-1);
            }
            if(!empty($where))
                $query = "SELECT {$cadena} FROM estudiantes";
            else{
                $condiciones = [];
                foreach ($where as $key => $value) {
                    if($value != ''){
                        $condiciones[] = "{$key} {$value}";
                    }
                }
                $query = "SELECT {$cadena} FROM estudiantes WHERE {implode('AND',$condiciones)}";
                return $consulta = $this->connection->query($query)->fetchAll();
            }
        } catch (Exception $e) {
            exit("ERROR: " . $e->getMessage());
        } finally {
            MysqlConnection::closeConnection();
            $this->connection = null;
        }
    }
    public function showById($key)
    {
        try {
            $this->connection = MysqlConnection::getInstanceDB()->getConnection();
            #SELECT * FROM nombre_tabla;
            $query = "SELECT * FROM estudiantes WHERE id_estudiante=:id_estudiante";
            #return $consulta = $conexion->query($query)->fetch();
            return $consulta = $this->connection->query($query)->fetch();
        } catch (Exception $e) {
            exit("ERROR: " . $e->getMessage());
        } finally {
            MysqlConnection::closeConnection();
            $this->connection = null;
        }
    }
}
