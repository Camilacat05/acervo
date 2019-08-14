
<?php
require_once("admin/conexao/conecta.php");
require("admin/functions/limita-texto.php");

$servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $dbname = "integgle";
    //Criar a conexao
    $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

    $pesquisar = $_POST['pesquisar'];
    $result_cursos = "SELECT * FROM tb_postagens WHERE titulo LIKE '%$pesquisar%' LIMIT 5";
    $resultado_cursos = mysqli_query($conn, $result_cursos);
    $cont = 0;
    while($rows_cursos = mysqli_fetch_array($resultado_cursos)){
        //echo "Postagens: ".$rows_cursos['titulo']."<br>";
        $cont = 1;
?>
        <!doctype html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="css/pesquisa.css" media="all">

<meta charset="utf-8">
<meta charset="utf-8">

<link rel="stylesheet" type="text/css" href="css/reset.css" media="all">
<link rel="stylesheet" type="text/css" href="css/estilo.css" media="all">
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
    <li>
         <span class="thumb" >
                	<img src="upload/postagens/<?php echo $rows_cursos['imagem'];?>" alt="<?php echo $rows_cursos['titulo'];?>" title="<?php echo $rows_cursos['titulo'];?>" width="166" height="166">
                </span>
                <span class="content">
    
                    <h1><?php echo $rows_cursos['titulo'];?></h1>
                    <p><?php echo limitarTexto($rows_cursos['descricao'], $limite=380)?></p>
                    <div class="footer_post">
                        <h6><strong>Categoria: </strong><?php echo $rows_cursos['categoria'];?></h6>
                        <a href="post.php?id=<?php echo $rows_cursos['id'];?>">Segue o artigo Completo</a>
                        <span class="datapost">Data de Publicação: <strong><?php echo $rows_cursos['data'];?></strong></span>
                         <?php
              
                $consultar  = "SELECT * FROM contador WHERE page='/integgle/post.php?id=".$rows_cursos['id']."'";


                $result = $conexao->prepare($consultar);
		        $result->execute();
		        $totalRegistros = $result->rowCount();

               //echo "<br><br><p> Total de visitas nessa postagem: ".$totalRegistros." </p><br><br><br>";
            ?> 
           </div>
          
          </div><!-- footer post -->
                </span>
            </li>
             <!-- Side Widget -->
   
     <!-- Side Widget -->
     
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>





</body>
</html>
<?php
    }
    if($cont == 0) {
    ?> 
       <!doctype html>
        <html>
        <head>
        
        <link rel="stylesheet" type="text/css" href="css/pesquisa.css" media="all">
        
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
            <li>
                <h3>Nenhum dado foi encontrado!</h3>
        
                            </div><!-- footer post -->
                        </span>
                    </li>
                     <!-- Side Widget -->
                
            </div>
            </div>
            </div>
            </div>
             <!-- Side Widget -->
             
          <!-- Bootstrap core JavaScript -->
          <script src="vendor/jquery/jquery.min.js"></script>
          <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        
        
        </body>
        </html>
<?php        
 
    }
?>



