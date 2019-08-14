<?php
	require_once("admin/conexao/conecta.php");
	require("admin/functions/limita-texto.php");
?>


<?php
        if(isset($_SERVER['HTTP_USER_AGENT']) && preg_match('/bot|googlebot|bingboot|yahoo|crawl|slurp|spider/i', $_SERVER['HTTP_USER_AGENT']) || strpos($_SERVER["HTTP_USER_AGENT"], "facebookexternalhit/") !== false || strpos($_SERVER["HTTP_USER_AGENT"], "Facebot") !== false ) {

        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
            date_default_timezone_set('America/Sao_Paulo');
            $data = date('d/m/Y');
            $page = $_SERVER['REQUEST_URI'];
            $origem = 'visita';


            $sql = "SELECT * from contador WHERE date='".$data."' AND IP='".$ip."' AND page='".$page."' ORDER BY id DESC LIMIT 3";
        	try{
        		$resultado = $conexao->prepare($sql);
        		$resultado->execute();
        		$contar = $resultado->rowCount();

        		if($contar > 0 ){
        			while($exibe = $resultado->fetch(PDO::FETCH_OBJ)){


                    }
        	    }else{
                cadastrarvisita($ip, $data, $origem, $page);
        	}
        	}catch(PDOException $erro){ echo $erro;}





          }
        ?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>POSTAGEM TAL</title>
<link rel="stylesheet" type="text/css" href="css/reset.css" media="all">
<link rel="stylesheet" type="text/css" href="css/estilo.css" media="all">
<link rel="stylesheet" type="text/css" href="css/blog-home.css" media="all">
<!-- Bootstrap core CSS -->
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="css/blog-home.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Inclusão do programa de Extensão Tradições do Semi-árido Piauiense</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Sobre</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Equipe T</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">espaço 3</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
	<div class="divcenter">
    
    
    	<ul class="boxposts" id="pgPost">
        
<?php
	if(isset($_GET['id'])){
		$idUrl = $_GET['id'];
	}
	$sql = "SELECT * from tb_postagens WHERE exibir='Sim' AND id=:id LIMIT 1";
	try{
		$resultado = $conexao->prepare($sql);
		$resultado->bindParam('id',$idUrl, PDO::PARAM_INT);
		$resultado->execute();
		$contar = $resultado->rowCount();
		
		if($contar > 0 ){
			while($exibe = $resultado->fetch(PDO::FETCH_OBJ)){
?>        
        	<li>            	
                <span class="thumb">
                	<img src="upload/postagens/<?php echo $exibe->imagem;?>" alt="<?php echo $exibe->titulo;?>" title="<?php echo $exibe->titulo;?>" width="166" height="166">
                </span>
                <span class="content">
                	<h1><?php echo $exibe->titulo;?></h1>
                    <p><?php echo ($exibe->descricao)?></p>
                    <a href="http://localhost/ProjetoInteggle/integgle/upload/documentos/<?php echo $exibe->documento;?>" target="_blank">Download do documento</a>
                    <div class="footer_post">
                    	<a href="javascript:history.back()">Voltar para página anterior</a>
                        <span class="datapost">Data de Publicação: <strong><?php echo $exibe->data;?></strong></span>
                        <?php

                $consultar  = "SELECT * FROM contador WHERE page='".$page."'";


                $result = $conexao->prepare($consultar);
		        $result->execute();
		        $totalRegistros = $result->rowCount();

                echo "<br><br><p> Total de visitas nessa postagem: ".$totalRegistros." </p><br><br><br>";
            ?>







                    </div><!-- footer post -->
                </span>
                <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<div><h1 font-color: #99999
>Compartilhe! 
    <a href="https://www.facebook.com/sharer/sharer.php?u=http://www.conectaverdade.com/post.php?id=<?php echo $idUrl;?>" title="Share on Facebook" target="_blank" class="btn btn-facebook"><i class="fa fa-facebook"></i> Facebook</a>

</h1></div>

<div class="fb-comments" data-href="http://techvida.com.br/sermoes/post.php?id=<?php echo $idUrl;?>" data-width="100%" data-numposts="5"></div>


           
                  
        </ul>





    </div><!-- div center -->

                
            </li>  
<?php
}//while
	}else{
		echo '<li>Não existe post cadastrados no sistema</li>';
	}
				
	}catch(PDOException $erro){ echo $erro;}
?>            
        
        
</body>
</html>