<?php

class TareaModel 
{  
    private $pdo;

    public $ATAid;
    public $PENid;
    public $PEQid;
    public $ATAresponsable;
    public $ATAnombre;
    public $ATAdescripcion;
    public $ATAprogreso;
    public $ATAfechaInicio;
    public $ATAfechaFin;
    public $ATAestado;

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

    public function RegistrarTarea(TareaModel $data)
    {
        try 
        {
            $sql = "INSERT INTO sgcsATAtAsignarTarea (
                        PENid,
                        PEQid,
                        ATAresponsable,
                        ATAnombre,
                        ATAdescripcion,
                        ATAprogreso,
                        ATAfechaInicio,
                        ATAfechaFin,
                        ATAestado) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $this->pdo->prepare($sql)
                 ->execute(
                    array(
                        $data->PENid,
                        $data->PEQid,
                        $data->ATAresponsable,
                        $data->ATAnombre,
                        $data->ATAdescripcion,
                        $data->ATAprogreso,
                        $data->ATAfechaInicio,
                        $data->ATAfechaFin,
                        $data->ATAestado
                    )
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function ActualizarTarea($data)
    {
        try
        {
            $sql = "UPDATE sgcsATAtAsignarTarea SET
                        PENid = ?,
                        PEQid = ?,
                        ATAresponsable   = ?,
                        ATAnombre = ?,
                        ATAdescripcion = ?,
                        ATAprogreso = ?,
                        ATAfechaInicio = ?,
                        ATAfechaFin = ?,
                        ATAestado = ?
                    WHERE ATAid = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                    array(
                        $data->PENid,
                        $data->PEQid,
                        $data->ATAresponsable,
                        $data->ATAnombre,
                        $data->ATAdescripcion,
                        $data->ATAprogreso,
                        $data->ATAfechaInicio,
                        $data->ATAfechaFin,
                        $data->ATAestado,
                        $data->ATAid
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function ObtenerTarea($ATAid)
    {
        try
        {
            $stm = $this->pdo->prepare("SELECT * FROM sgcsATAtAsignarTarea as ata 
                                            inner join sgcspentproyectoentregable pen on ata.ENTid=pen.ENTid 
                                            inner join sgcspropproyecto pro on pro.PROcodigo=pen.PROcodigo
                                            inner join sgcsenttentregable as ent on pen.ENTid=ent.ENTid
                                            inner join sgcsusutusuario as usu on ata.ATAresponsable=usu.USUcodigo
                                            WHERE ata.ATAid = ?");
            $stm->execute(array($ATAid));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

}
?>