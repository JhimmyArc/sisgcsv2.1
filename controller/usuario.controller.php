<?php
require_once 'model/usuario.model.php';
require_once 'model/rol.model.php';
require_once 'model/especialidad.model.php';

class UsuarioController{

    private $modelUsuario;

    public function __CONSTRUCT(){
        $this->modelUsuario = new usuarioModel();
        $this->modelEspecialidad = new especialidadModel();
    }

    //Llamado plantilla principal
    public function Index(){
        $USUAR = new usuarioModel();
        if(isset($_REQUEST['us'])){
            $USUAR = $this->modelUsuario->ObtenerUsuario($_REQUEST['us']);
        }
    	require_once 'view/admin/header.phtml';
        require_once 'view/admin/usuario/usuario.phtml';
        require_once 'view/admin/footer.phtml';   
    }

    public function Perfil(){
        $USUAR = new usuarioModel();
        if(isset($_REQUEST['us'])){
            $USUAR = $this->modelUsuario->ObtenerUsuario($_REQUEST['us']);
        }
        require_once 'view/admin/header.phtml';
        require_once 'view/admin/usuario/perfil.phtml';
        require_once 'view/admin/footer.phtml';   
    }

    public function GuardarUsuario(){
        $USUAR = new UsuarioModel();

        //Captura de los datos del formulario (vista).
        $USUAR->TUSid = $_REQUEST['TUSid'];
        $USUAR->ESPid = $_REQUEST['ESPid'];
        $USUAR->USUnombre = $_REQUEST['USUnombre'];
        $USUAR->USUapellido = $_REQUEST['USUapellido'];
        $USUAR->USUtelefono = $_REQUEST['USUtelefono'];
        $USUAR->USUdniruc = $_REQUEST['USUdniruc'];
        $USUAR->USUcorreo = $_REQUEST['USUcorreo'];
        $USUAR->USUusuario = $_REQUEST['USUusuario'];
        $USUAR->USUclave = password_hash($_REQUEST['USUclave'],PASSWORD_DEFAULT);
        $USUAR->USUestado = $_REQUEST['USUestado'];
        $USUAR->USUfechaNacimiento = date('Y-m-d',strtotime($_REQUEST['USUfechaNacimiento']));
        $USUAR->USUempresa = $_REQUEST['USUempresa'];
        $USUAR->USUcodigo = $_REQUEST['USUcodigo'];
    
        //Registro y Actualizacion al modelo usuario.
        if($USUAR->USUcodigo != '' ? 
           $this->modelUsuario->ActualizarUsuario($USUAR) : 
           $this->modelUsuario->RegistrarUsuario($USUAR));

        //header() es usado para enviar encabezados HTTP sin formato.
        //"Location:" No solamente envía el encabezado al navegador, sino que
        //también devuelve el código de status (302) REDIRECT al
        //navegador
        header($USUAR->USUcodigo > 0 
                        ? 'Location: index.php?c=usuario&tu'.$USUAR->TUSid.'&us='.$USUAR->USUcodigo
                        : 'Location: index.php?c=usuario'
                        );
    }

    public function GuardarCliente(){
        $USUAR = new UsuarioModel();

        //Captura de los datos del formulario (vista).
        $USUAR->TUSid = $_REQUEST['TUSid'];
        $USUAR->ESPid = $_REQUEST['ESPid'];
        $USUAR->USUnombre = $_REQUEST['USUnombre'];
        $USUAR->USUapellido = $_REQUEST['USUapellido'];
        $USUAR->USUtelefono = $_REQUEST['USUtelefono'];
        $USUAR->USUdniruc = $_REQUEST['USUdniruc'];
        $USUAR->USUcorreo = $_REQUEST['USUcorreo'];
        $USUAR->USUusuario = $_REQUEST['USUusuario'];
        $USUAR->USUclave = password_hash($_REQUEST['USUclave'],PASSWORD_DEFAULT);
        $USUAR->USUestado = $_REQUEST['USUestado'];
        $USUAR->USUfechaNacimiento = date('Y-m-d',strtotime($_REQUEST['USUfechaNacimiento']));
        $USUAR->USUempresa = $_REQUEST['USUempresa'];
        $USUAR->USUcodigo = $_REQUEST['USUcodigo'];
    
        //Registro y Actualizacion al modelo usuario.
        if($USUAR->USUcodigo != '' ? 
           $this->modelUsuario->ActualizarUsuario($USUAR) : 
           $this->modelUsuario->RegistrarUsuario($USUAR));

        //header() es usado para enviar encabezados HTTP sin formato.
        //"Location:" No solamente envía el encabezado al navegador, sino que
        //también devuelve el código de status (302) REDIRECT al
        //navegador
        header($USUAR->USUcodigo > 0 
                        ? 'Location: index.php?c=proyecto&tu'.$USUAR->TUSid.'&us='.$USUAR->USUcodigo
                        : 'Location: index.php?c=proyecto'
                        );
    }

}

?>