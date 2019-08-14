<?php
    require_once("admin/conexao/conecta.php");
    require("admin/functions/limita-texto.php");
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sistema de Postagem com PHP PDO</title>
<link rel="stylesheet" type="text/css" href="css/reset.css" media="all">
<link rel="stylesheet" type="text/css" href="css/estilo.css" media="all">
</head>

<body>
    <div class="divcenter">
        <ul class="boxposts">
           <?php 
            $stringBusca = $_POST["palavra-busca"];
            $seleciona = "select * from tb_postagens where titulo like '%$stringBusca%' or "
                    . "descricao like '%$stringBusca%'";
            try{
                $result = $conexao->prepare($seleciona);			
                $result->execute();
                $contar = $result->rowCount();
                if($contar == 0){
            ?>
            <li>
                    <span class="content">
                            <h1>Não há resultados</h1>
                            <p>Desculpe, não conseguimos encontrar nenhuma postagem para <strong><?php echo $stringBusca ?></strong></p>
                    </span>
                </li>
            <?php
                }
                else{
                    while($mostraBuscaUnica = $result->FETCH(PDO::FETCH_OBJ)){
            ?>
                <li>
                    <span class="thumb">
                	<img src="upload/postagens/<?php echo $mostraBuscaUnica->imagem;?>" alt="<?php echo $mostraBuscaUnica->titulo;?>" title="<?php echo $exibe->titulo;?>" width="166" height="166">
                    </span>
                    <span class="content">
                            <h1><?php echo $mostraBuscaUnica->titulo;?></h1>
                        <p><?php echo limitarTexto($mostraBuscaUnica->descricao, $limite=380)?></p>
                        <div class="footer_post">
                    	<a href="post.php?id=<?php echo $mostraBuscaUnica->id;?>">Leia o artigo completo</a>
                        <span class="datapost">Data de Publicação: <strong><?php echo $mostraBuscaUnica->data;?></strong></span>
                    </div><!-- footer post -->
                    </span>
                </li>
            <?php
                    }
                }
            ?>
            <?php
                } catch (Exception $ex) {
                echo $ex;
            }
            ?>


        </ul>
    </div>
</body>

