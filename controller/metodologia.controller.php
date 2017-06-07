<?php
require_once 'model/metodologia.model.php';
require_once 'model/proyectoentregable.model.php';

class MetodologiaController{

    private $modelMetodologia;

    public function __CONSTRUCT(){
        $this->modelMetodologia = new metodologiaModel();
    }

    //Llamado plantilla principal
    public function Index(){
        $METOD = new MetodologiaModel();
        if(isset($_REQUEST['me'])){
            $METOD = $this->modelMetodologia->ObtenerMetodologia($_REQUEST['me']);
        }
        require_once 'view/admin/header.phtml';
        require_once 'view/admin/metodologia/metodologia.phtml';
        require_once 'view/admin/footer.phtml';   
    }

    public function GuardarMetodologia(){
         //print_r($_REQUEST);
        $METOD = new MetodologiaModel();

        //Captura de los datos del formulario (vista).
        $METOD->METnombre = $_REQUEST['METnombre'];
        $METOD->METdescripcion = $_REQUEST['METdescripcion'];
        $METOD->METid = $_REQUEST['METid'];
    
        //Registro y Actualizacion al modelo metodologia.
        if($METOD->METid != '' ? 
           $this->modelMetodologia->ActualizarMetodologia($METOD) : 
           $this->modelMetodologia->RegistrarMetodologia($METOD));

        //header() es usado para enviar encabezados HTTP sin formato.
        //"Location:" No solamente envía el encabezado al navegador, sino que
        //también devuelve el código de status (302) REDIRECT al
        //navegador
        header($METOD->METid > 0 
                        ? 'Location: index.php?c=metodologia&me='.$METOD->METid 
                        : 'Location: index.php?c=metodologia'
                        );
    }
}

?>