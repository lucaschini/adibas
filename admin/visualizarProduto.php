<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Adibas</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="meu.css">

	</head>
<body>
<?php
	session_start();
	if (!isset($_SESSION["logado"])||$_SESSION["logado"]!= TRUE) {
		header("Location: login.php");
	}
 ?>
<h1 align='center'> Dados do Produto </h1>
<p></p>
<form action="listarProduto.php">
<button type='submit'>Voltar</button>
</form>
<p></p>
ID# : <?php echo $_GET["idProduto"]; ?> <p></p> 
Prouduto : <?php echo $_GET["produto"]; ?> <p></p>
Descrição do produto : <?php echo $_GET["descricaoProduto"]; ?> <p></p>
Preço de Venda : <?php echo $_GET["precoVenda"]; ?> <p></p>
Promoção : <?php echo $_GET["promocao"]; ?> <p></p>
Preco Promoção : <?php echo $_GET["precoPromocao"]; ?> <p></p>
Foto : <p></p> <img width="300" src="../imagens/<?php echo $_GET["nomeFoto"]; ?>"><p></p>

<form action="listarProduto.php">
<button type='submit'>Voltar</button>
</form>
<p></p>

</body>
</html>
