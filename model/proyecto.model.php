<?php
class proyectoModel
{
    private $pdo;

    public $PROcodigo;
    public $METid;
    public $USUcodigo;
    public $PROcliente;
    public $PROnombre;
    public $PROdescripcion;
    public $PROfechaInicio;
    public $PROfechaFin;
    public $PROestado;

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

    public function ListarProyecto()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM sgcsPROpProyecto as pro 
                                            inner join  sgcsmetpmetodologia as met on pro.METid=met.METid 
                                            inner join sgcsusutusuario as usu on usu.USUcodigo=pro.USUcodigo 
                                            order by pro.PROfechaInicio DESC");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }

        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function ContadorProyecto()
    {
        try
        {
            $result = array();
            $stm = $this->pdo->prepare("SELECT MAX(PROcodigo+1) AS idPRO FROM sgcsPROpProyecto");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function RegistrarProyecto(ProyectoModel $data)
    {
        //print_r($_POST);
        try 
        {
        $sql = "INSERT INTO sgcsPROpProyecto (PROcodigo,METid,USUcodigo,PROcliente,PROnombre,PROdescripcion,PROfechaInicio,PROfechaFin,PROestado) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
            array(
                $data->PROcodigo,
                $data->METid,
                $data->USUcodigo,
                $data->PROcliente,
                $data->PROnombre,
                $data->PROdescripcion,
                $data->PROfechaInicio,
                $data->PROfechaFin,
                $data->PROestado
                )
            );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function ActualizarProyecto($data)
    {
        try
        {
            $sql = "UPDATE sgcsPROpProyecto SET
                        METid     = ?,
                        USUcodigo = ?,
                        PROcliente   = ?,
                        PROnombre = ?,
                        PROdescripcion = ?,
                        PROfechaInicio = ?,
                        PROfechaFin = ?,
                        PROestado = ?
                    WHERE PROcodigo = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                    array(
                        $data->METid,
                        $data->USUcodigo,
                        $data->PROcliente,
                        $data->PROnombre,
                        $data->PROdescripcion,
                        $data->PROfechaInicio,
                        $data->PROfechaFin,
                        $data->PROestado,
                        $data->PROcodigo
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function ListarMetodologia()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM sgcsMETpMetodologia");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function ListarEtapa()
    {
        try
        {
            $result = array();
            $stm = $this->pdo->prepare("SELECT * FROM sgcsETAtEtapa");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function ListarEntregable()
    {
        try
        {
            $result = array();
            $stm = $this->pdo->prepare("SELECT * FROM sgcsENTtEntregable");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function ListarProyectoEntregable()
    {
        try
        {
            $result = array();
            $stm = $this->pdo->prepare("SELECT * FROM sgcspentproyectoentregable as pen 
                                            inner join sgcsenttentregable ent on pen.ENTid=ent.ENTid 
                                            inner join sgcsetatetapa as eta on ent.ETAid=eta.ETAid");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function ListarProyectoEquipo()
    {
        try
        {
            $result = array();
            $stm = $this->pdo->prepare("SELECT * FROM sgcspeqtproyectoequipo as peq 
                                            inner join sgcsUSUtUsuario as usu on usu.USUcodigo=peq.USUcodigo 
                                            inner join sgcsroltrol as rol on rol.ROLid=peq.ROLid");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function ListarAsignarTarea()
    {
        try
        {
            $result = array();
            $stm = $this->pdo->prepare("SELECT * FROM sgcsatatasignartarea as ata 
                                            inner join sgcspentproyectoentregable pen on ata.PENid=pen.PENid 
                                            inner join sgcspropproyecto pro on pro.PROcodigo=pen.PROcodigo
                                            inner join sgcsenttentregable as ent on pen.ENTid=ent.ENTid
                                            inner join sgcsusutusuario as usu on ata.ATAresponsable=usu.USUcodigo");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function ListarRol()
    {
        try
        {
            $result = array();
            $stm = $this->pdo->prepare("SELECT * FROM sgcsROLtRol where ROLid>2");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function ListarUsuario()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM sgcsUSUtUsuario as usu 
                                                    inner join sgcsTUStTipoUsuario as tus on usu.TUSid=tus.TUSid 
                                                    inner join sgcsesptespecialidad as esp on esp.ESPid=usu.ESPid 
                                                 WHERE tus.TUSid ='2'");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function ListarCliente()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM sgcsUSUtUsuario as usu 
                                                    inner join sgcsTUStTipoUsuario as tus on usu.TUSid=tus.TUSid 
                                                    inner join sgcsesptespecialidad as esp on esp.ESPid=usu.ESPid 
                                                where tus.TUSid ='3'");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Obtener($PROcodigo)
    {
        try
        {
            $stm = $this->pdo->prepare("SELECT * FROM sgcsPROpProyecto as pro 
                                            inner join  sgcsMETpmetodologia as met on pro.METid=met.METid 
                                            inner join sgcsUSUtusuario as usu on usu.USUcodigo=pro.USUcodigo 
                                            WHERE PROcodigo = ?");
            $stm->execute(array($PROcodigo));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function ObtenerEntregable($ENTid)
    {
        try
        {
            $stm = $this->pdo->prepare("SELECT * FROM sgcsPENtproyectoentregable as pen 
                                            inner join sgcsenttentregable as ent on pen.ENTid=ent.ENTid  
                                            inner join sgcsetatetapa as eta on ent.ETAid=eta.ETAid
                                            WHERE pen.ENTid = ?");
            $stm->execute(array($ENTid));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function EliminarProyecto($PROcodigo)
    {
        try
        {
            $stm = $this->pdo
                        ->prepare("DELETE FROM sgcsPROpProyecto WHERE PROcodigo = ?");

            $stm->execute(array($PROcodigo));
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

}