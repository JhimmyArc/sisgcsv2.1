<?php
class proyectoentregableModel
{
    private $pdo;

    public $PENid;
    public $PROcodigo;
    public $ENTid;
    public $PEQid;
    public $PENresponsable;
    public $PENfechaInicio;
    public $PENfechaFin;
    public $PENenlace;
    public $PENestado;
    public $PENactivo;
    public $PENprogreso;

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

    public function RegistrarProyectoEntregable(proyectoentregableModel $data)
    {
        try 
        {
            $sql = "INSERT INTO sgcsPENtProyectoEntregable (
                        PROcodigo,
                        ENTid,
                        PEQid,
                        PENresponsable,
                        PENfechaInicio,
                        PENfechaFin,
                        PENenlace,
                        PENestado,
                        PENactivo,
                        PENprogreso) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $this->pdo->prepare($sql)
                 ->execute(
                    array(
                        $data->PROcodigo,
                        $data->ENTid,
                        $data->PEQid,
                        $data->PENresponsable,
                        $data->PENfechaInicio,
                        $data->PENfechaFin,
                        $data->PENenlace,
                        $data->PENestado,
                        $data->PENactivo,
                        $data->PENprogreso
                    )
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function ActualizarProyectoEntregable($data)
    {
        try
        {
            $sql = "UPDATE sgcsPENtProyectoEntregable SET
                        PROcodigo = ?,
                        ENTid = ?,
                        PEQid   = ?,
                        PENresponsable = ?,
                        PENfechaInicio = ?,
                        PENfechaFin = ?,
                        PENenlace = ?,
                        PENestado = ?,
                        PENactivo = ?,
                        PENprogreso = ?
                    WHERE PENid = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                    array(
                        $data->PROcodigo,
                        $data->ENTid,
                        $data->PEQid,
                        $data->PENresponsable,
                        $data->PENfechaInicio,
                        $data->PENfechaFin,
                        $data->PENenlace,
                        $data->PENestado,
                        $data->PENactivo,
                        $data->PENprogreso,
                        $data->PENid
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function ObtenerProyectoEntregable($PENid)
    {
        try
        {
            $stm = $this->pdo->prepare("SELECT * FROM sgcsPENtProyectoEntregable as pen 
                                                        inner join sgcsenttentregable as ent on pen.ENTid=ent.ENTid
                                                        inner join sgcsetatetapa as eta on ent.ETAid=eta.ETAid
                                                 WHERE PENid = ?");
            $stm->execute(array($PENid));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function EliminarProyectoEntregable($PENid)
    {
        try
        {
            $stm = $this->pdo
                        ->prepare("DELETE FROM sgcsPENtProyectoEntregable WHERE PENid = ?");

            $stm->execute(array($PENid));
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

}