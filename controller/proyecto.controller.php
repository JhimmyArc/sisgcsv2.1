<?php
require_once 'model/proyecto.model.php';
require_once 'model/entregable.model.php';
require_once 'model/tarea.model.php';
require_once 'model/proyectoequipo.model.php';
require_once 'model/proyectoentregable.model.php';

class ProyectoController{

    private $model;

    public function __CONSTRUCT(){
        $this->model = new proyectoModel();
        $this->modelEntregable= new entregableModel();
        $this->modelTarea = new tareaModel();
        $this->modelProyectoEquipo = new proyectoequipoModel();
        $this->modelProyectoEntregable = new proyectoentregableModel();
    }

     //Llamado plantilla principal
    public function Index(){
        $PROY = new ProyectoModel();
        $PROE = new ProyectoEquipoModel();
        
        if(isset($_REQUEST['id'])){
            $PROY = $this->model->Obtener($_REQUEST['id']);
        }
        if(isset($_REQUEST['jp'])){
            $PROE = $this->modelProyectoEquipo->ObtenerProyectoEquipo($_REQUEST['jp']);
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

    public function Ver(){
        $PROY = new ProyectoModel();
        
        if(isset($_REQUEST['id'])){
            $PROY = $this->model->Obtener($_REQUEST['id']);
        }

        if($_SESSION['tipousuario_session']==1){
            require_once 'view/admin/header.phtml';
            require_once 'view/admin/proyecto/ver.phtml';
            require_once 'view/admin/footer.phtml'; 
        }
        if($_SESSION['tipousuario_session']==2){
            require_once 'view/personal/header.phtml';
            require_once 'view/personal/proyecto/ver.phtml';
            require_once 'view/personal/footer.phtml'; 
        }   
    }

    public function Equipo(){
        $PROY = new ProyectoModel();
        $PROE = new ProyectoEquipoModel();
        
        if(isset($_REQUEST['id'])){
            $PROY = $this->model->Obtener($_REQUEST['id']);
        }

        if(isset($_REQUEST['jp'])){
            $PROE = $this->modelProyectoEquipo->ObtenerProyectoEquipo($_REQUEST['jp']);
        }

        if($_SESSION['tipousuario_session']==1){
            require_once 'view/admin/header.phtml';
            require_once 'view/admin/proyecto/equipo.phtml';
            require_once 'view/admin/footer.phtml'; 
        }
        if($_SESSION['tipousuario_session']==2){
            require_once 'view/personal/header.phtml';
            require_once 'view/personal/proyecto/equipo.phtml';
            require_once 'view/personal/footer.phtml'; 
       }   
    }

    public function Entregable(){
        $PROY = new ProyectoModel();
        $PROEN = new ProyectoEntregableModel();
        
        if(isset($_REQUEST['id'])){
            $PROY = $this->model->Obtener($_REQUEST['id']);
        }
        if(isset($_REQUEST['pe'])){
            $PROEN = $this->modelProyectoEntregable->ObtenerProyectoEntregable($_REQUEST['pe']);
        }

        if($_SESSION['tipousuario_session']==1){
            require_once 'view/admin/header.phtml';
            require_once 'view/admin/proyecto/entregable.phtml';
            require_once 'view/admin/footer.phtml'; 
        }
        if($_SESSION['tipousuario_session']==2){
            require_once 'view/personal/header.phtml';
            require_once 'view/personal/proyecto/entregable.phtml';
            require_once 'view/personal/footer.phtml'; 
       }   
    }

    public function SolCambio(){
        $PROY = new ProyectoModel();
        $PROEN = new ProyectoEntregableModel();
        
        if(isset($_REQUEST['id'])){
            $PROY = $this->model->Obtener($_REQUEST['id']);
        }
        if(isset($_REQUEST['pe'])){
            $PROEN = $this->modelProyectoEntregable->ObtenerProyectoEntregable($_REQUEST['pe']);
        }

        if($_SESSION['tipousuario_session']==1){
            require_once 'view/admin/header.phtml';
            require_once 'view/admin/proyecto/solcambio.phtml';
            require_once 'view/admin/footer.phtml'; 
        }
        if($_SESSION['tipousuario_session']==2){
            require_once 'view/personal/header.phtml';
            require_once 'view/personal/proyecto/solcambio.phtml';
            require_once 'view/personal/footer.phtml'; 
       }   
    }

    public function Calendario(){
        $PROY = new ProyectoModel();
        $PROEN = new ProyectoEntregableModel();
        
        if(isset($_REQUEST['id'])){
            $PROY = $this->model->Obtener($_REQUEST['id']);
        }
        if(isset($_REQUEST['pe'])){
            $PROEN = $this->modelProyectoEntregable->ObtenerProyectoEntregable($_REQUEST['pe']);
        }

        if($_SESSION['tipousuario_session']==1){
            require_once 'view/admin/header.phtml';
            require_once 'view/admin/proyecto/calendario.phtml';
            require_once 'view/admin/footer.phtml'; 
        }
        if($_SESSION['tipousuario_session']==2){
            require_once 'view/personal/header.phtml';
            require_once 'view/personal/proyecto/calendario.phtml';
            require_once 'view/personal/footer.phtml'; 
       }   
    }

    public function Tarea(){
        $PROY = new ProyectoModel();
        $TARE = new TareaModel();
        
        if(isset($_REQUEST['id'])){
            $PROY = $this->model->Obtener($_REQUEST['id']);
        }
        if(isset($_REQUEST['pe'])){
            $TARE = $this->modelTarea->ObtenerProyectoEntregable($_REQUEST['pe']);
        }

        if($_SESSION['tipousuario_session']==1){
            require_once 'view/admin/header.phtml';
            require_once 'view/admin/proyecto/tarea.phtml';
            require_once 'view/admin/footer.phtml'; 
        }
        if($_SESSION['tipousuario_session']==2){
            require_once 'view/personal/header.phtml';
            require_once 'view/personal/proyecto/tarea.phtml';
            require_once 'view/personal/footer.phtml'; 
       }   
    }

    public function TareaEntregable(){
        $PROY = new ProyectoModel();
        $PROEN = new proyectoentregableModel();
        
        if(isset($_REQUEST['id'])){
            $PROY = $this->model->Obtener($_REQUEST['id']);
        }
        if(isset($_REQUEST['te'])){
            $PROEN = $this->modelProyectoEntregable->ObtenerProyectoEntregable($_REQUEST['te']);
        }

        if($_SESSION['tipousuario_session']==1){
            require_once 'view/admin/header.phtml';
            require_once 'view/admin/proyecto/tareaentregable.phtml';
            require_once 'view/admin/footer.phtml'; 
        }
        if($_SESSION['tipousuario_session']==2){
            require_once 'view/personal/header.phtml';
            require_once 'view/personal/proyecto/tareaentregable.phtml';
            require_once 'view/personal/footer.phtml'; 
       }   
    }

    public function GuardarProyecto(){
        //print_r($_POST);
        $PROY = new ProyectoModel();
        $PROEQ = new ProyectoEquipoModel();

        $PROY->METid = $_REQUEST['METid'];
        $PROY->USUcodigo = $_REQUEST['USUcodigo'];
        $PROY->PROcliente = $_REQUEST['PROcliente'];
        $PROY->PROnombre = $_REQUEST['PROnombre'];
        $PROY->PROdescripcion = $_REQUEST['PROdescripcion'];
        $PROY->PROfechaInicio = date('Y-m-d',strtotime($_REQUEST['PROfechaInicio']));
        $PROY->PROfechaFin = date('Y-m-d',strtotime($_REQUEST['PROfechaFin']));
        $PROY->PROestado = $_REQUEST['PROestado'];
        $PROY->PROcodigo = $_REQUEST['idPRO'];

        $PROEQ->PROcodigo = $_REQUEST['idPRO'];
        $PROEQ->USUcodigo = $_REQUEST['USUcodigo'];
        $PROEQ->ROLid = $_REQUEST['ROLid'];
        $PROEQ->PEQestado = $_REQUEST['PEQestado'];
        $PROEQ->PEQid = $_REQUEST['PEQid'];
        
        if($_REQUEST['PROcodigo'] !='' ? 
           $this->model->ActualizarProyecto($PROY) : 
           $this->model->RegistrarProyecto($PROY));

        if($PROEQ->PEQid != '' ? 
           $this->modelProyectoEquipo->ActualizarProyectoEquipo($PROEQ) : 
           $this->modelProyectoEquipo->RegistrarProyectoEquipo($PROEQ));
        
        header($_REQUEST['PROcodigo'] > 0 
                        ? 'Location: index.php?c=proyecto&id='.$PROY->PROcodigo.'&jp='.$PROEQ->PEQid  
                        : 'Location: index.php?c=proyecto'
                        );
    }

    public function GuardarProyectoEquipo(){
        //print_r($_POST);
        $PROEQ = new ProyectoEquipoModel();

        $PROEQ->PROcodigo = $_REQUEST['PROcodigo'];
        $PROEQ->USUcodigo = $_REQUEST['USUcodigo'];
        $PROEQ->ROLid = $_REQUEST['ROLid'];
        $PROEQ->PEQestado = $_REQUEST['PEQestado'];
        $PROEQ->PEQid = $_REQUEST['PEQid'];
        
        if($PROEQ->PEQid != '' ? 
           $this->modelProyectoEquipo->ActualizarProyectoEquipo($PROEQ) : 
           $this->modelProyectoEquipo->RegistrarProyectoEquipo($PROEQ));
        
        header($PROEQ->PEQid > 0 
                        ? 'Location: index.php?c=proyecto&a=equipo&id='.$PROEQ->PROcodigo.'&jp='.$PROEQ->PEQid  
                        : 'Location: index.php?c=proyecto&a=equipo&id='.$PROEQ->PROcodigo
                        );
    }

    public function GuardarProyectoEntregable(){
        //print_r($_REQUEST);
        $PROEN->PENid = $_REQUEST['PENid'];
        for($i = 0; $i < count($_REQUEST['ENTid']); $i++){
            if($_POST['ENTid'] != ""){

                if(is_array($_POST['ENTid'])){
                  while(list($key,$value) = each($_POST['ENTid'])){
                    $PROEN = new ProyectoEntregableModel();
                    $PROEN->PROcodigo = $_REQUEST['PROcodigo'][$i];
                    $PROEN->PENestado = $_REQUEST['PENestado'][$i]; 
                    $PROEN->ENTid = $value;   

                    if($PROEN->PENid != '' ? 
                       $this->modelProyectoEntregable->ActualizarProyectoEntregable($PROEN) : 
                       $this->modelProyectoEntregable->RegistrarProyectoEntregable($PROEN));
                  }
                }
            }     
        }   
        header($PROEN->PENid > 0 
                        ? 'Location: index.php?c=proyecto&a=entregable&id='.$PROEN->PROcodigo  
                        : 'Location: index.php?c=proyecto&a=entregable&id='.$PROEN->PROcodigo
                        ); 
    }

    public function EliminarProyecto(){
        $this->model->EliminarProyecto($_REQUEST['id']);
        header('Location: index.php?c=proyecto');
    }
    public function EliminarProyectoEntregable(){
        $PROEN = new ProyectoEntregableModel();
        $PROEN->PROcodigo = $_REQUEST['id'];

        $this->modelProyectoEntregable->EliminarProyectoEntregable($_REQUEST['pe']);
        header('Location: index.php?c=proyecto&a=entregable&id='.$PROEN->PROcodigo);
    }
}