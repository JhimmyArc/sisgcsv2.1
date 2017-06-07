<?php

class EntregableModel 
{  
    private $pdo;

    public $ENTid;
    public $ETAid;
    public $ENTnombre;

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

    public function RegistrarEntregable(EntregableModel $data)
    {
        //print_r($_POST);
        try 
        {
        $sql = "INSERT INTO sgcsENTtEntregable (ETAid,ENTnombre) 
                VALUES (?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
                    array(
                        $data->ETAid,
                        $data->ENTnombre
                        )
                    );
        } 
        catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function ActualizarEntregable($data)
    {
        try
        {
        $sql = "UPDATE sgcsENTtEntregable SET
                        ETAid      = ?,
                        ENTnombre  = ?
                WHERE ENTid = ?";

        $this->pdo->prepare($sql)
             ->execute(
                    array(
                        $data->ETAid,
                        $data->ENTnombre,
                        $data->ENTid
                    )
            );
        } 
        catch (Exception $e)
        {
            die($e->getMessage());
        }
    }
    
    public function ListarEntregable()
    {
        try
        {
            $result = array();
            $stm = $this->pdo->prepare("SELECT * FROM sgcsENTtEntregable as ent 
                                                        inner join sgcsETAtEtapa as eta on eta.ETAid=ent.ETAid 
                                                        inner join sgcsmetpmetodologia as met on met.METid=eta.METid");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function ObtenerEntregable($ENTid)
    {
        try
        {
            $stm = $this->pdo->prepare("SELECT * FROM sgcsENTtEntregable as ent 
                                                        inner join sgcsETAtEtapa as eta on eta.ETAid=ent.ETAid 
                                                        inner join sgcsmetpmetodologia as met on met.METid=eta.METid
                                                 WHERE ent.ENTid = ?");
            $stm->execute(array($ENTid));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function EliminarEntregable($ENTid)
    {
        try
        {
            $stm = $this->pdo
                        ->prepare("DELETE FROM sgcsENTtEntregable WHERE ENTid = ?");

            $stm->execute(array($ENTid));
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

}
?>