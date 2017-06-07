<?php

class EspecialidadModel 
{  
    private $pdo;

    public $ESPid;
    public $ESPnombre;
    public $ESPdescripcion;

    public function __CONSTRUCT()
    {
        try
        {
            $this->pdo = Database::Conectar();
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }   

    public function ListarEspecialidad()
    {
        try
        {
            $result = array();
            $stm = $this->pdo->prepare("SELECT * FROM sgcsESPtEspecialidad where ESPid>='2'");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

}
?>