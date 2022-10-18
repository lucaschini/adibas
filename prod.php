<?php
session_start();
//conectar com o banco de dados
$conexao = mysqli_connect("localhost", "root", "", "adibas");
$sql = "SELECT * FROM `tbproduto` where `ativo`='s' and `promocao`='s' order by produto";
$resultado = mysqli_query($conexao, $sql);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="style/style.css" />
	<link rel="stylesheet" href="style/style2.css" />
	<script src="bootstrap\node_modules\bootstrap\dist\js\bootstrap.bundle.js"></script>
	<title>Produtos</title>
</head>

<body>
	<nav class="navbar bg-primary" style="flex-wrap: nowrap">
		<div class="container-fluid" style="margin: 0">
			<a class="navbar-brand" href="index.php"><img src="imagens/Adibas.png" alt="Logo" width="50" height="32"></a>
			<div class="d-grid gap-1">
				<a href="prod.php" style="text-align:center;"><button class="btn btn-primary" type="button" style="width: 40vw;	">Produtos</button></a>
			</div>

			<div>
				<a href="admin/login.php"><button type="button" class="btn btn-primary">
						<?php
						if (!isset($_SESSION["logado"]) || $_SESSION["logado"] != TRUE) {
							echo "Login";
						} else {
							echo '<img src="imagens/icons/user.svg" alt="User" width="50" height="32">';
						}
						?>
					</button></a>
				<button class="navbar-toggler" type="button">
					<a href="carrinho.php"><img src="imagens/icons/cart2.svg" alt="Carrinho" width="32" height="32"></a>
				</button>
			</div>
		</div>
	</nav>
	<div class="center-prod">
		<h1 align='center'>Aproveite a Promoção</h1>
		<table align=center class="table table-hover shadow-lg" style="width: 80% !important;">
			<thead>
				<tr>
					<th colspan="3">Descrição do Produto</th>
					<th>De</th>
					<th>Por</th>
					<th>Adicionar ao carrinho</th>
				</tr>
			</thead>
			<tbody>
				<?php
				while ($linha = mysqli_fetch_array($resultado)) {
					echo "<tr>";
					echo "<td align='center' width='200'><img width='180' src='imagens/" . $linha["nomeFoto"] . "'></td>";
					echo "<td ><h1>" . $linha["produto"] . "</h1></td>";
					echo "<td ><h1>" . $linha["descricaoProduto"] . "</h1></td>";
					echo "<td ><h1><s>" . $linha["precoVenda"] . "</h1></s></td>";
					echo "<td ><h1>" . $linha["precoPromocao"] . "</h1></td>";
					echo "<td  width=120>" .
						"<a href=\"carrinho.php?acao=adicionar&idProduto=" . $linha["idProduto"] . "\"><img width=\"50%\" src=\"imagens\icons\plus-square-fill.svg\"> </a>" .
						"</td>";
					echo "</td>";
					echo "</tr>";
				}
				?>
			</tbody>
		</table>
		<p></p>
		<?php
		$sql = "SELECT * FROM `tbproduto` where `ativo`='s' and `promocao`='n' order by produto";
		$resultado = mysqli_query($conexao, $sql);
		?>

		<h1 align='center'>Mais vendidos</h1>
		<table align=center class="table table-hover shadow-lg" style="width: 80% !important;">
			<thead>
				<tr>
					<th colspan="3">Descrição do Produto</th>
					<th>Preço</th>
					<th>Adicionar ao carrinho</th>
				</tr>
			</thead>
			<tbody>
				<?php
				while ($linha = mysqli_fetch_array($resultado)) {
					echo "<tr>";
					echo "<td align='center' width='180'><img width='160' src='imagens/" . $linha["nomeFoto"] . "'></td>";
					echo "<td><h3>" . $linha["produto"] . "</h3></td>";
					echo "<td><h3>" . $linha["descricaoProduto"] . "</h3></td>";
					echo "<td><h3>" . $linha["precoVenda"] . "</h3></td>";
					echo "<td width=120>" .
						"<a href=\"carrinho.php?acao=adicionar&idProduto=" . $linha["idProduto"] . "\"><img width=\"50%\" src=\"imagens\icons\plus-square-fill.svg\"> </a>" .
						"</td>";
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