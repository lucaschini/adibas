<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Adibas</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style/style.css" />
	<link rel="stylesheet" href="style/style2.css" />
	<script src="bootstrap\node_modules\bootstrap\dist\js\bootstrap.bundle.js"></script>
</head>

<body class="bg-primary">
	<div class="center" style="margin: 0 !important; padding: 0 !important;">
		<div class="rounded-3 border shadow-lg bg-white" style="width:80vw; padding: 2rem;">
		<?php
session_start();
if (!isset($_SESSION["logado"]) || $_SESSION["logado"] != TRUE) {
	header("Location: admin/login.php");
} else {
	$idCliente = $_SESSION["idCliente"];

	date_default_timezone_set('UTC');
	$data = date('d/m/Y');

	$conexao = mysqli_connect("localhost", "root", "", "adibas");

	foreach ($_SESSION['carrinho'] as $idProduto => $qtd) {

		$sql = "SELECT *  FROM tbProduto WHERE `idProduto`= '$idProduto'";
		$resultado = mysqli_query($conexao, $sql);
		while ($linha = mysqli_fetch_array($resultado)) {
			$idProduto = $linha["idProduto"];

			if ($linha["promocao"] == "s") {
				$precoUnitario = $linha["precoPromocao"];
			} else {
				$precoUnitario = $linha["precoVenda"];
			}
			$precoPago = $precoUnitario * $qtd;
		}

		$sql = "INSERT INTO `tbpedido` (`idPedido`, `idCliente`, `idProduto`, `quantidade`, `precoPago`, `data`) VALUES (NULL, '$idCliente', '$idProduto', '$qtd', '$precoPago', '$data')";
		$resultado = mysqli_query($conexao, $sql);
	}

	unset($_SESSION['carrinho']);
	$_SESSION['carrinho'] = array();
	echo "<div class='alert alert-primary' role='alert'>Compra registrada com sucesso!</div>";
}
?>
			<form action="index.php">
				<button type='submit' class="btn btn-primary">Voltar às compras</button>
			</form>
		</div>
	</div>
</body>

</html>