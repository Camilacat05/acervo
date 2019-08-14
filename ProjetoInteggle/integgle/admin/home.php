 <?php include("includes/header.php");?>
<html>
<head>
</head>
<body>
<?php include("includes/topo.php");?>



<?php
	if(isset($_GET['acao'])){
		$acao = $_GET['acao'];
		
		if($acao=='welcome'){include("pages/inicio.php");}	
		
		// cadastro
		if($acao=='cad-postagem'){include("pages/cad-postagem.php");}
        if($acao=='cad-postagem1'){include("pages1/cad-postagem.php");}

		// exibicao
		if($acao=='ver-postagens'){include("pages/ver-postagens.php");}
        if($acao=='ver-postagens1'){include("pages1/ver-postagens.php");}
		// edicao
		if($acao=='editar-postagem'){include("pages/edt-postagem.php");}
        if($acao=='editar-postagem1'){include("pages1/edt-postagem.php");}


	}else{
		include("pages/inicio.php");
	}

?>




<?php include("includes/footer.php");?>
</body>
</html>
