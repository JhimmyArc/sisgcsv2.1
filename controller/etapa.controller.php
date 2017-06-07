<?php
require_once 'model/etapa.model.php';
require_once 'model/metodologia.model.php';

class EtapaController{

    private $modelEtapa;

    public function __CONSTRUCT(){
        $this->modelEtapa = new etapaModel();
        $this->modelMetodologia = new metodologiaModel();
    }

    //Llamado plantilla principal
    public function Index(){
        $ETAPA = new EtapaModel();
        if(isset($_REQUEST['et'])){
            $ETAPA = $this->modelEtapa->ObtenerEtapa($_REQUEST['et']);
        }
    	require_once 'view/admin/header.phtml';
        require_once 'view/admin/etapa/etapa.phtml';
        require_once 'view/admin/footer.phtml';   
    }

    public function GuardarEtapa(){
        $ETAPA = new EtapaModel();

        //Captura de los datos del formulario (vista).
        $ETAPA->METid= $_REQUEST['METid'];
        $ETAPA->ETAnombre = $_REQUEST['ETAnombre'];
        $ETAPA->ETAdescripcion = $_REQUEST['ETAdescripcion'];
        $ETAPA->ETAid = $_REQUEST['ETAid'];
    
        //Registro y Actualizacion al modelo metodologia.
        if($ETAPA->ETAid != '' ? 
           $this->modelEtapa->ActualizarEtapa($ETAPA) : 
           $this->modelEtapa->RegistrarEtapa($ETAPA));

        //header() es usado para enviar encabezados HTTP sin formato.
        //"Location:" No solamente envía el encabezado al navegador, sino que
        //también devuelve el código de status (302) REDIRECT al
        //navegador
        header($ETAPA->ETAid > 0 
                        ? 'Location: index.php?c=etapa&et='.$ETAPA->ETAid 
                        : 'Location: index.php?c=etapa'
                        );
    }

}

?>