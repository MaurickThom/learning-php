<?php 
    include_once __DIR__."/db.php";
    class SurveyModel extends DB{

        private $totalVotes;
        private $optionSelected;
    
        public function setOptionSelected($option){
            $this->optionSelected = $option;
        }
        public function getOptionSelected(){
            return $this->optionSelected;
        }
    
        public function vote(){
            $query = $this->connect()->prepare('UPDATE survey SET votes = votes + 1 WHERE _option = :opcion');
            $query->execute(['opcion' => $this->optionSelected]);
        }
    
        public function showResults(){
            return $this->connect()->query('SELECT * FROM survey');
        }
    
        public function getTotalVotes(){
            $querySum = $this->connect()->query('SELECT SUM(votes) AS votos_totales  FROM survey');
            $this->totalVotes = $querySum->fetch(PDO::FETCH_OBJ)->votos_totales;
    
            return $this->totalVotes;
        }
    
        public function getPercentageVotes($option){
            return round(($option / $this->totalVotes) * 100, 0);
        }
    }
?>