<?php
require_once 'model/especialidad.model.php';

class EspecialidadController{

    private $model;

    public function __CONSTRUCT(){
        $this->model = new EspecialidadModel();
    }

    //Llamado plantilla principal
    public function Index(){
    	require_once 'view/admin/header.phtml';
        require_once 'view/admin/especialidad/especialidad.phtml';
        require_once 'view/admin/footer.phtml';   
    }

}

?>