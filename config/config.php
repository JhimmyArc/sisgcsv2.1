<?php
session_start();
class Database 
{ 
    public function Conectar()
    {      
      $pdo = null; 
      try
      {
        $pdo = new PDO(
          //'mysql:host=localhost;dbname=id1125889_sgcs',
          //'id1125889_root',
          //'123456',
          'mysql:host=localhost;dbname=bd_cambios',
          'root',
          '',
          array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
          );
        //Filtrando posibles errores de conexión.
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }

      catch(PDOException $exception)
      {
        echo "Error en la conexion: " . $exception->getMessage();
      }
        return $pdo;
        
    }
    
    public static function corta_palabra($palabra,$num)
    {
            $largo=strlen($palabra);//indicarme el largo de una cadena
            $cadena=substr($palabra,0,$num);
            return $cadena;
    }
    
    public static function ruta()
    {
        ////return "https://sisgcs.000webhostapp.com/";
        return "http://localhost/sisgcs/";
    } 
    
    public function comillas_inteligentes($valor)
    {
        // Retirar las barras
        if (get_magic_quotes_gpc()) {
            $valor = stripslashes($valor);
        }
    
        // Colocar comillas si no es entero
        if (!is_numeric($valor)) {
            $valor = "'" . mysql_real_escape_string($valor) . "'";
        }
        return $valor;
    }
    
    public static function valida_correo($email){
    $mail_correcto = 0;
    //compruebo unas cosas primeras
    if ((strlen($email) >= 6) && (substr_count($email,"@") == 1) && (substr($email,0,1) != "@") && (substr($email,strlen($email)-1,1) != "@")){
       if ((!strstr($email,"'")) && (!strstr($email,"\"")) && (!strstr($email,"\\")) && (!strstr($email,"\$")) && (!strstr($email," "))) {
          //miro si tiene caracter .
          if (substr_count($email,".")>= 1){
             //obtengo la terminacion del dominio
             $term_dom = substr(strrchr ($email, '.'),1);
             //compruebo que la terminaci?n del dominio sea correcta
             if (strlen($term_dom)>1 && strlen($term_dom)<5 && (!strstr($term_dom,"@")) ){
                //compruebo que lo de antes del dominio sea correcto
                $antes_dom = substr($email,0,strlen($email) - strlen($term_dom) - 1);
                $caracter_ult = substr($antes_dom,strlen($antes_dom)-1,1);
                if ($caracter_ult != "@" && $caracter_ult != "."){
                   $mail_correcto = 1;
                }
             }
          }
       }
    }
    if ($mail_correcto)
       return true;
    else
       return false;
 } 
    function chao_tilde($entra)
    {
    $traduce=array( 'á' => '&aacute;' , 'é' => '&eacute;' , 'í' => '&iacute;' , 'ó' => '&oacute;' , 'ú' => '&uacute;' , 'ñ' => '&ntilde;' , 'Ñ' => '&Ntilde;' , 'ä' => '&auml;' , 'ë' => '&euml;' , 'ï' => '&iuml;' , 'ö' => '&ouml;' , 'ü' => '&uuml;');
    $sale=strtr( $entra , $traduce );
    return $sale;
    }
}


?>