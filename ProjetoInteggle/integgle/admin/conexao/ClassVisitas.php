<?php

include ("ClassConexao.php");
class ClassVisitas extends ClassConexao{
    private $Id, $Ip , $Data , $Hora , $Limite;

    #Construtor para setar atributos
    public function __construct()
    {
        $this->Id=0;
        $this->Ip=$_SERVER['REMOTE_ADDR'];
        $this->Data=date("d/m/Y");
        $this->Hora=date("H:i");
        $this->Limite=50;
    }

    #Verifica se o usuário recebeu visita recentemente
    public function VerificaUsuario()
    {
        $Select=$this->Conectar()->prepare("select * from visitas where Ip=:ip and Data=:datas order by Id desc");
        $Select->bindParam(":ip",echo $this->Ip,PDO::PARAM_STR);
        $Select->bindParam(":datas",$this->Data,PDO::PARAM_STR);
        $Select->execute();
        if($Select->rowCount() == 0){
            $this->InserindoVisitas();
        }else{
            $FSelect=$Select->fetch(PDO::FETCH_ASSOC);
            $HoraDB=strtotime($FSelect['Hora']);
            $HoraAtual=strtotime($this->Hora);
            $HoraSubtracao=$HoraAtual-$HoraDB;

            if($HoraSubtracao > $this->Limite){
                $this->InserindoVisitas();
            }
        }
        echo "<h1>Visitantes no site: ".$Select->rowCount()."</h1>";
            echo $this->Ip
 }

    #Inseri a visita no banco de dados
    private function InserindoVisitas()
    {
        $Select=$this->Conectar()->prepare("insert into visitas values (:id , :ip , :datas , :hora)");
        $Select->bindParam(":id",$this->Id,PDO::PARAM_STR);
        $Select->bindParam(":ip",$this->Ip,PDO::PARAM_STR);
        $Select->bindParam(":datas",$this->Data,PDO::PARAM_STR);
        $Select->bindParam(":hora",$this->Hora,PDO::PARAM_STR);
        $Select->execute();
    }
}
?>