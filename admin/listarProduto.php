<?php
session_start();
if (!isset($_SESSION["logado"]) || $_SESSION["logado"] != TRUE) {
	header("Location: login.php");
}
if ($_SESSION["funcao"] !== "gerente") {
	header("Location: index.php");
}

//conectar com o banco de dados
$conexao = mysqli_connect("localhost", "root", "", "adibas");
$sql = "SELECT * FROM `tbproduto` where ativo='s'order by produto";
$resultado = mysqli_query($conexao, $sql);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="../style/style.css" />
	<link rel="stylesheet" href="../style/style2.css" />
	<link rel="stylesheet" href="../style/styleadm.css">
	<script src="bootstrap\node_modules\bootstrap\dist\js\bootstrap.bundle.js"></script>
	<title>Produtos</title>
</head>

<body>
	<nav class="navbar bg-secondary" style="flex-wrap: nowrap">
		<div class="container-fluid" style="margin: 0">
			<a class="navbar-brand" href="index.php"><img src="../imagens/Adibas.png" alt="Logo" width="50" height="32"></a>
		</div>
	</nav>
	<div class="center-prod">
		<h1 align='center'>Lista de Produtos</h1>
		<form action="incluirProduto.php" style="margin: 2rem;">
			<button class="btn btn-secondary" type='submit'>Novo Produto</button>
		</form>
		<table align=center class="table table-hover shadow-lg" style="width: 80% !important;">
			<thead>
				<tr>
					<th>#ID</th>
					<th>Foto</th>
					<th>Produto</th>
					<th>Descrição do Produto</th>
					<th>Preço Venda</th>
					<th>Promoção</th>
					<th>Preço Promoção</th>
					<th>Ação</th>
				</tr>
			</thead>
			<tbody>
				<?php
				while ($linha = mysqli_fetch_array($resultado)) {
					echo "<tr>";
					echo "<td width='5%'>" . $linha["idProduto"] . "</td>";
					echo "<td width='20%'><img width='30%' src='../imagens/" . $linha["nomeFoto"] . "'></td>";
					echo "<td width='15%'>" . $linha["produto"] . "</td>";
					echo "<td>" . $linha["descricaoProduto"] . "</td>";
					echo "<td>" . $linha["precoVenda"] . "</td>";
					echo "<td>" . $linha["promocao"] . "</td>";
					echo "<td>" . $linha["precoPromocao"] . "</td>";
					$dados = "idProduto=" . $linha["idProduto"] .
						"&produto=" . $linha["produto"] .
						"&descricaoProduto=" . $linha["descricaoProduto"] .
						"&precoVenda=" . $linha["precoVenda"] .
						"&promocao=" . $linha["promocao"] .
						"&precoPromocao=" . $linha["precoPromocao"] .
						"&nomeFoto=" . $linha["nomeFoto"];
					echo "<td width=120>" .
						"<a href=\"alterarProduto.php?$dados\"><img width=\"20%\" src=\"../imagens/icons/pencil-square.svg\"> </a>" .
						"<a href=\"excluirProduto.php?$dados\"><img width=\"20%\" src=\"../imagens/icons/x-square-fill.svg\"> </a>" .
						"<a href=\"promocaoProduto.php?$dados\"><img width=\"20%\" src=\"../imagens/icons/cash-coin.svg\"> </a>" .
						"</td>";
				?>


				<?php

					echo "</td>";
					echo "</tr>";
				}

				mysqli_close($conexao);
				?>
			</tbody>
		</table>
	</div>
</body>

</html>