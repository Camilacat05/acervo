<?php
	require_once("admin/conexao/conecta.php");
	require("admin/functions/limita-texto.php");
	
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">

<link rel="stylesheet" type="text/css" href="css/reset.css" media="all">
<link rel="stylesheet" type="text/css" href="css/estilo.css" media="all">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sistema de Postagem com PHP PDO - Acervo Digital</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/blog-home.css" rel="stylesheet">

</head>

<body>


    <!-- <titu>
   <font size="10" align="center">Tradições do semiárido piauiense: Acervo digital dos sujeitos, saberes e práticas tradicionais do semiárido  </font>
   
    </titu> -->


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
            <a class="nav-link" href="#">Equipe Técnica</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">espaço 3</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">

        <h1 class="my-4">
          <small></small>
        </h1>

  


	<div class="divcenter">


    	<ul class="boxposts">
		<background-img src="C:\wamp64\www\ProjetoInteggle\integgle\acervo.jpg">

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

<?php

if(empty($_GET['pg'])){}
else{
$pg =$_GET['pg'];
if(!is_numeric($pg)){

	echo '<script language= "JavaScript">
					location.href="index.php";
		</script>';
}

}


if(isset($pg)){ $pg = $_GET['pg'];}else{ $pg = 1;}

$quantidade = 3;
$inicio = ($pg*$quantidade) - $quantidade;


	$sql = "SELECT * from tb_postagens WHERE exibir='Sim' ORDER BY id DESC LIMIT $inicio, $quantidade";
	try{
		$resultado = $conexao->prepare($sql);
		$resultado->execute();
		$contar = $resultado->rowCount();

		if($contar > 0 ){
			while($exibe = $resultado->fetch(PDO::FETCH_OBJ)){
?>

        	<li>
                <span class="thumb" >
                	<img src="upload/postagens/<?php echo $exibe->imagem;?>" alt="<?php echo $exibe->titulo;?>" title="<?php echo $exibe->titulo;?>" width="166" height="166">
                </span>
                <span class="content">
                	<h1><?php echo $exibe->titulo;?></h1>
                    <p><?php echo limitarTexto($exibe->descricao, $limite=380)?></p>
                    <div class="footer_post">
                        <h6><strong>Categoria: </strong><?php echo $exibe->categoria;?></h6>
                        <a href="post.php?id=<?php echo $exibe->id;?>">Segue o artigo Completo</a>
                        <span class="datapost">Data de Publicação: <strong><?php echo $exibe->data;?></strong></span>
                         <?php

                $consultar  = "SELECT * FROM contador WHERE page='/integgle/post.php?id=".$exibe->id."'";


                $result = $conexao->prepare($consultar);
		        $result->execute();
		        $totalRegistros = $result->rowCount();

               //echo "<br><br><p> Total de visitas nessa postagem: ".$totalRegistros." </p><br><br><br>";
            ?>

                    </div><!-- footer post -->
                </span>
            </li>
<?php
}//while
	}else{
		echo '<li>Não existe post cadastrados no sistema</li>';
	}

	}catch(PDOException $erro){ echo $erro;}
?>


        </ul>






<!-- inicio botoes -->

<style>
/* paginacao */

.paginas{width:100%;padding:10px 0;text-align:center;background:#fff;height:auto;margin:10px auto;}
.paginas a{width:auto;padding:4px 10px;background:#eee;color:#999;margin:0px 2.5px;text-decoration:none;font-family:tahoma, "Trebuchet Ms", arial;font-size:13px; }
.paginas a:hover{text-decoration:none;background:#00BA8B; color:#fff;}

<?php
	if(isset($_GET['pg'])){
		$num_pg = $_GET['pg'];
	}else{$num_pg = 1;}
?>

.paginas a.ativo<?php echo $num_pg;?>{background:#00BA8B; color:#483883;}

</style>


<?php
 
    $sql = "SELECT * from tb_postagens";
    try{
			$result = $conexao->prepare($sql);
			$result->execute();
			$totalRegistros = $result->rowCount();
		}catch(PDOException $e){
			echo $e;
		}

		if($totalRegistros <=$quantidade){}
		else{
			$paginas = ceil($totalRegistros/$quantidade);
			if($pg > $paginas){
				echo '<script language= "JavaScript">
					location.href="index.php";
					</script>';}
			$links = 5;

			if(isset($i)){}
			else{$i = '1';}

?>

<div class="paginas">

	<a href="index.php?pg=1">Primeira Página</a>

    <?php
		if(isset($_GET['pg'])){
			$num_pg = $_GET['pg'];
		}

		for($i = $pg-$links; $i <= $pg-1; $i++){
			if($i<=0){}
			else{
	?>

    <a href="index.php?pg=<?php echo $i;?>"  class="ativo<?php echo $i;?>"><?php echo $i;?></a>


<?php  }} ?>


    <a href="index.php?pg=<?php echo $pg;?>" class="ativo<?php echo $i;?>"><?php echo $pg;?></a>


<?php
	for($i = $pg+1; $i <= $pg+$links; $i++){
		if($i>$paginas){}
		else{
?>

	<a href="index.php?pg=<?php echo $i;?>" class="ativo<?php echo $i;?>"><?php echo $i;?></a>

<?php
		}
	}
?>

<a href="index.php?pg=<?php echo $paginas;?>">Última página</a>


</div><!-- paginas -->





<?php
		}
?>

<!-- fim botoes paginacao -->




      <div align="center">
      <?php
        $consultar  = "SELECT * FROM contador";


        $result = $conexao->prepare($consultar);
		$result->execute();
		$totalRegistros = $result->rowCount();

        echo "<br><br><p> TOTAL DE VISITAS: ".$totalRegistros." </p><br><br><br>";
      ?>


      </div>



    </div><!-- div center -->



      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4" style="margin-top:100px;">

        <!-- Search Widget -->
        <div class="card my-4" style="align:right;margin-left:50px;">
          <h5 class="card-header">Search</h5>
          <div class="card-body">
            <div class="input-group">
          <form method="POST" action="Pesquisar.php">  
            <input type="text" class="form-control" name="pesquisar" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-secondary" type="submit">Go!</button>
           </form> 
              </span>
            </div>
          </div>
        </div>

        <!-- 
        <div class="card my-4" style="align:right;margin-left:50px;">
          <h5 class="card-header">Categorias</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">Artesanato</a>
                  </li>
                  <li>
                    <a href="#">Palendas</a>
                  </li>
                  <li>
                    <a href="#">Religiosidades</a>
                  </li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">Ofícios</a>
                  </li>
                  <li>
                    <a href="#">Culinária</a>
                  </li>
                  <li>
                    <a href="#">Música</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
  -->
        <!-- Side Widget -->
        <div class="card my-4" style="align:right;margin-left:50px;">
          <h5 class="card-header">Sobre</h5>
          <div class="card-body">
          Acervo digital dos sujeitos, saberes e práticas tradicionais do semiárido 
          piauiense vinculado ao programa de extensão Tradições do Semiárido Piauiense.
          O objetivo é apresentar o desenvolvimento de mecanismos de registro, preservação
          e divulgação dos saberes e práticas tradicionais do povo habitador do semiárido 
          piauiense através deste acervo digital e web site para esse fim exclusivo.
          </div>
        </div>

      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>





</body>
</html>