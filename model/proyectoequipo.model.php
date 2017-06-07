<?php
class proyectoequipoModel
{
    private $pdo;

    public $PEQid;
    public $PROcodigo;
    public $USUcodigo;
    public $ROLid;
    public $PEQestado;

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

    public function RegistrarProyectoEquipo(ProyectoEquipoModel $data)
    {
        try 
        {
        $sql = "INSERT INTO sgcsPEQtProyectoEquipo (
                        PROcodigo,
                        USUcodigo,
                        ROLid,
                        PEQestado) 
                VALUES (?, ?, ?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
            array(
                $data->PROcodigo,
                $data->USUcodigo,
                $data->ROLid,
                $data->PEQestado
                )
            );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function ActualizarProyectoEquipo($data)
    {
        try
        {
            $sql = "UPDATE sgcsPEQtProyectoEquipo SET
                        PROcodigo = ?,
                        USUcodigo = ?,
                        ROLid   = ?,
                        PEQestado = ?
                    WHERE PEQid = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                    array(
                        $data->PROcodigo,
                        $data->USUcodigo,
                        $data->ROLid,
                        $data->PEQestado,
                        $data->PEQid
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function ObtenerProyectoEquipo($PEQid)
    {
        try
        {
            $stm = $this->pdo->prepare("SELECT * FROM sgcsPEQtProyectoEquipo  
                                            WHERE PEQid = ?");
            $stm->execute(array($PEQid));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

}