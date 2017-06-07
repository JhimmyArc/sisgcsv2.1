<?php

class EtapaModel 
{  
    private $pdo;

    public $ETAid;
    public $METid;
    public $ETAnombre;
    public $ETAdescripcion;

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

    public function RegistrarEtapa(EtapaModel $data)
    {
        try 
        {
        $sql = "INSERT INTO sgcsETAtEtapa (METid,ETAnombre,ETAdescripcion) 
                VALUES (?, ?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
                array(
                    $data->METid,
                    $data->ETAnombre,
                    $data->ETAdescripcion
                    )
                );
        } 
        catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function ActualizarEtapa($data)
    {
        try
        {
        $sql = "UPDATE sgcsETAtEtapa SET
                    METid          = ?,
                    ETAnombre        = ?,
        ETAdescripcion        = ?
                WHERE ETAid = ?";

        $this->pdo->prepare($sql)
             ->execute(
                array(
                    $data->METid,
                    $data->ETAnombre,
                    $data->ETAdescripcion,
                    $data->ETAid
                )
            );
        } 
        catch (Exception $e)
        {
            die($e->getMessage());
        }
    }
    
    public function ListarEtapa()
    {
        try
        {
            $result = array();
            $stm = $this->pdo->prepare("SELECT * FROM sgcsETAtEtapa as eta 
                                                        inner join sgcsmetpmetodologia as met on eta.METid=met.METid");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function ObtenerEtapa($METid)
    {
        try
        {
            $stm = $this->pdo->prepare("SELECT * FROM sgcsETAtEtapa as eta 
                                                        inner join sgcsmetpmetodologia as met on eta.METid=met.METid
                                                 WHERE eta.ETAid = ?");
            $stm->execute(array($METid));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function EliminarEtapa($ETAid)
    {
        try
        {
            $stm = $this->pdo
                        ->prepare("DELETE FROM sgcsETAtEtapa WHERE ETAid = ?");

            $stm->execute(array($ETAid));
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

}
?>