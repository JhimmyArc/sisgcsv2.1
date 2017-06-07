<?php
require_once 'model/rol.model.php';

class RolController{

    private $model;

    public function __CONSTRUCT(){
        $this->modelRol = new rolModel();
    }

    //Llamado plantilla principal
    public function Index(){
        $ROLES = new RolModel();
        if(isset($_REQUEST['ro'])){
            $ROLES = $this->modelRol->ObtenerRol($_REQUEST['ro']);
        }
    	require_once 'view/admin/header.phtml';
        require_once 'view/admin/rol/rol.phtml';
        require_once 'view/admin/footer.phtml';   
    }

     public function GuardarRol(){
        $ROLES = new RolModel();

        //Captura de los datos del formulario (vista).
        $ROLES->ROLnombre = $_REQUEST['ROLnombre'];
        $ROLES->ROLdescripcion = $_REQUEST['ROLdescripcion'];
        $ROLES->ROLestado = $_REQUEST['ROLestado'];
        $ROLES->ROLid = $_REQUEST['ROLid'];
    
        //Registro y Actualizacion al modelo usuario.
        if($ROLES->ROLid != '' ? 
           $this->modelRol->ActualizarRol($ROLES) : 
           $this->modelRol->RegistrarRol($ROLES));

        //header() es usado para enviar encabezados HTTP sin formato.
        //"Location:" No solamente envía el encabezado al navegador, sino que
        //también devuelve el código de status (302) REDIRECT al
        //navegador
        header($ROLES->ROLid > 0 
                        ? 'Location: index.php?c=rol&ro='.$ROLES->ROLid
                        : 'Location: index.php?c=rol'
                        );
    }

}

?>