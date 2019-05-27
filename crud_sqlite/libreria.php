<?php
function coger_dato_externo($nomvariable){
   if(isset($_GET[$nomvariable])){
      $variable_imprimir=$_GET[$nomvariable];
   }else{
      if (isset($_POST[$nomvariable])){
         $variable_imprimir=$_POST[$nomvariable];
      }else{
         $variable_imprimir=null;
      }
   }
   return $variable_imprimir;
}
?>