<?php
require_once 'model/entregable.model.php';
require_once 'model/metodologia.model.php';
require_once 'model/etapa.model.php';

class EntregableController{

    private $modelEntregable;

    public function __CONSTRUCT(){
        $this->modelEntregable = new entregableModel();
        $this->modelMetodologia = new metodologiaModel();
        $this->modelEtapa = new etapaModel();
    }

    //Llamado plantilla principal
    public function Index(){
        $ENTRE = new EntregableModel();
        if(isset($_REQUEST['en'])){
            $ENTRE = $this->modelEntregable->ObtenerEntregable($_REQUEST['en']);
        }
    	require_once 'view/admin/header.phtml';
        require_once 'view/admin/entregable/entregable.phtml';
        require_once 'view/admin/footer.phtml';   
    }

    public function GuardarEntregable(){
        $ENTRE = new EntregableModel();

        //Captura de los datos del formulario (vista).
        $ENTRE->METid = $_REQUEST['METid'];
        $ENTRE->ENTnombre = $_REQUEST['ENTnombre'];
        $ENTRE->ETAid = $_REQUEST['ETAid'];
        $ENTRE->ENTid = $_REQUEST['ENTid'];
    
        //Registro y Actualizacion al modelo entregable.
        if($ENTRE->ENTid != '' ? 
           $this->modelEntregable->ActualizarEntregable($ENTRE) : 
           $this->modelEntregable->RegistrarEntregable($ENTRE));

        //header() es usado para enviar encabezados HTTP sin formato.
        //"Location:" No solamente envía el encabezado al navegador, sino que
        //también devuelve el código de status (302) REDIRECT al
        //navegador
        header($ENTRE->ENTid > 0 
                        ? 'Location: index.php?c=entregable&me='.$ENTRE->METid.'&en='.$ENTRE->ENTid  
                        : 'Location: index.php?c=entregable'
                        );
    }
}

?>