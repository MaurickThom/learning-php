<?php 

# que requerimeintos tiene mas no es
# luego de terminar el curso obtendra conocimiento
interface Conocimiento{
    public function asignarConocimiento($listado);
    public function obtenerConocimiento();
}

class Course implements Conocimiento{
    private $name;
    private $time;
    private $teacher;
    private $cost;
    private $available;

    #Atributo estático
    public static $moneda = 'USD';
    public static $bienvenida = 'Hola a mi curso de POO';


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
    public static function obtenerDenominacion(){
        return self::$moneda; # el self solo funcionará para metodos y varibles estaticas
    }
    # getters y setters : me da weva hacerlo, esto es muy básico

    private $listado;

    public function asignarConocimiento($listado){
        $this->listado = $listado;
    }
    public function obtenerConocimiento(){
        if (empty($this->listado))
            return;
        foreach ($this->listado as $item) {
            echo "<p>".$item."</p>";
        }
    }
}

?>