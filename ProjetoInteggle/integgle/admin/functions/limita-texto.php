<?php
function limitarTexto($texto, $limite){
  $contador = strlen($texto);
  if ( $contador >= $limite ) {      
      $texto = substr($texto, 0, strrpos(substr($texto, 0, $limite), ' ')) . '...';
      return $texto;
  }
  else{
    return $texto;
  }
}

function cadastrarVisita($ip, $data, $origem, $page){

 include ("admin/conexao/conecta.php");

$insert = "INSERT into contador (IP,date, origem, page) VALUES (:IP, :date, :origem, :page)";

try{            
       $result = $conexao-> prepare($insert);
       $result->bindParam(':IP', $ip, PDO::PARAM_STR);
       $result->bindParam(':date', $data, PDO::PARAM_STR);
       $result->bindParam(':origem', $origem, PDO::PARAM_STR);
       $result->bindParam(':page', $page, PDO::PARAM_STR);
        $result->execute();
}catch(PDOException $e){
echo $e;
}
  }
?>
