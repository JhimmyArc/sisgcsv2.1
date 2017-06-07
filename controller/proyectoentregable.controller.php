<?php
require_once 'model/proyecto.model.php';
require_once 'model/entregable.model.php';
require_once 'model/tarea.model.php';
require_once 'model/proyectoequipo.model.php';
require_once 'model/proyectoentregable.model.php';
require_once 'model/usuario.model.php';

class ProyectoEntregableController{

    private $model;

    public function __CONSTRUCT(){
        $this->model = new proyectoModel();
        $this->modelUsuario = new usuarioModel();
        $this->modelEntregable= new entregableModel();
        $this->modelTarea = new tareaModel();
        $this->modelProyectoEquipo = new proyectoequipoModel();
        $this->modelProyectoEntregable = new proyectoentregableModel();
    }

     //Llamado plantilla principal
    public function Index(){
        $PROY = new ProyectoModel();
        $PROE = new ProyectoEquipoModel();
        $USUAR = new usuarioModel();

        if(isset($_REQUEST['id'])){
            $PROY = $this->model->Obtener($_REQUEST['id']);
        }
        
        if($_SESSION['tipousuario_session']==1){
            require_once 'view/admin/header.phtml';
            require_once 'view/admin/proyecto/proyecto.phtml';
            require_once 'view/admin/footer.phtml'; 
        }
        if($_SESSION['tipousuario_session']==2){
            require_once 'view/personal/header.phtml';
            require_once 'view/personal/proyecto/proyecto.phtml';
            require_once 'view/personal/footer.phtml'; 
        }   
    }

    public function GuardarProyectoEntregable(){
        //print_r($_REQUEST);
        $PROEN = new ProyectoEntregableModel();
        $PROEN->PROcodigo = $_REQUEST['PROcodigo'];
        $PROEN->ENTid = $_REQUEST['ENTid'];
        
        $PROEN->PENresponsable = $_REQUEST['PENresponsable'];
        $PROEN->PENfechaInicio = date('Y-m-d',strtotime($_REQUEST['PENfechaInicio']));
        $PROEN->PENfechaFin = date('Y-m-d',strtotime($_REQUEST['PENfechaFin']));
        $PROEN->PENenlace = $_REQUEST['PENenlace'];
        $PROEN->PENestado = $_REQUEST['PENestado'];
        $PROEN->PENactivo = $_REQUEST['PENactivo'];
        $PROEN->PENprogreso = $_REQUEST['PENprogreso'];
        $PROEN->PENid = $_REQUEST['PENid'];  

        if($PROEN->PENid != '' ? 
           $this->modelProyectoEntregable->ActualizarProyectoEntregable($PROEN) : 
           $this->modelProyectoEntregable->RegistrarProyectoEntregable($PROEN));
        
 
        header($PROEN->PENid > 0 
                        ? 'Location: index.php?c=proyecto&a=entregable&id='.$PROEN->PROcodigo/*'&pe='.$PROEN->PENid */
                        : 'Location: index.php?c=proyecto&a=entregable&id='.$PROEN->PROcodigo
                        ); 
    }

    public function GuardarTarea(){
        //print_r($_REQUEST);

        $PROEN = new ProyectoEntregableModel();
        $ASITA = new TareaModel();

        $PROEN->PROcodigo = $_REQUEST['PROcodigo'];
        $PROEN->PENid = $_REQUEST['PENid'];
        
        $ASITA->PENid = $_REQUEST['PENid'];
        $ASITA->ENTid = $_REQUEST['ENTid'];
        $ASITA->ATAresponsable = $_REQUEST['ATAresponsable'];
        $ASITA->ATAnombre = $_REQUEST['ATAnombre'];
        $ASITA->ATAdescripcion = $_REQUEST['ATAdescripcion'];
        $ASITA->ATAprogreso = $_REQUEST['ATAprogreso'];
        $ASITA->ATAfechaInicio = date('Y-m-d',strtotime($_REQUEST['ATAfechaInicio']));
        $ASITA->ATAfechaFin = date('Y-m-d',strtotime($_REQUEST['ATAfechaFin']));
        $ASITA->ATAestado = $_REQUEST['ATAestado'];
        $ASITA->ATAid = $_REQUEST['ATAid'];  

        if($ASITA->ATAid != '' ? 
           $this->modelTarea->ActualizarTarea($ASITA) : 
           $this->modelTarea->RegistrarTarea($ASITA));
        
 
        header($ASITA->ATAid > 0 
                        ? 'Location: index.php?c=proyecto&a=tareaentregable&id='.$PROEN->PROcodigo.'&te='.$PROEN->PENid
                        : 'Location: index.php?c=proyecto&a=tareaentregable&id='.$PROEN->PROcodigo.'&te='.$PROEN->PENid
                        ); 
    }

    public function EliminarProyectoEntregable(){
        $PROEN = new ProyectoEntregableModel();
        $PROEN->PROcodigo = $_REQUEST['id'];

        $this->modelProyectoEntregable->EliminarProyectoEntregable($_REQUEST['pe']);
        header('Location: index.php?c=proyecto&a=entregable&id='.$PROEN->PROcodigo);
    }
}