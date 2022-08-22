<?php
	session_start();
	if (!isset($_SESSION["logado"])||$_SESSION["logado"]!= TRUE) {
		header("Location: login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Dogão Lanches</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/meu.css">

	<script>
	</script>

	</head>
<body>
	<h1 align=center>Dogão Lanches - Página adminstrativa</h1>
	
	
	<?php
	echo "<h1>Seja Bem-Vindo!, ".$_SESSION["nome"]."</h1>";
	if (($_SESSION["funcao"] === "gerente")) {?>
		<form action="listarProduto.php">
		<button type="submit">Proudutos</button>
		</form>
		<p></p>
	<?php }?>
	<form action="listarFuncionario.php">
	<button type="submit">Funcionários</button>
	</form> 
	<p></p>
    <form action="sair.php">
	<button type="submit">sair</button>
	</form>	

</body>
</html> 