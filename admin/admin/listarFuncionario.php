<?php
session_start();
if (!isset($_SESSION["logado"]) || $_SESSION["logado"] != TRUE) {
	header("Location: login.php");
}

//conectar com o banco de dados
$conexao = mysqli_connect("localhost", "root", "", "adibas");
if ($_SESSION["funcao"] === "gerente") {
	$sql = "SELECT * FROM `tbFunc` where `ativo`='s' order by nome";
} else {
	$sql = "SELECT * FROM `tbFunc` where idFunc='" . $_SESSION["idFunc"] . "'";
}
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
	<title>Funcionários</title>
</head>

<body>
	<nav class="navbar bg-secondary" style="flex-wrap: nowrap">
		<div class="container-fluid" style="margin: 0">
			<a class="navbar-brand" href="index.php"><img src="../imagens/Adibas.png" alt="Logo" width="50" height="32"></a>
		</div>
	</nav>
	<div class="center-prod">
		<h1 align='center'>Lista de Funcionários</h1>
		<?php
		if ($_SESSION["funcao"] === "gerente") { ?>
			<form action="incluirFuncionario.php" style="margin: 2rem;">
				<button class="btn btn-secondary" type='submit'>Novo Funcionário</button>
			</form><?php
				} ?>

		<table align=center class="table table-hover shadow-lg" style="width: 80% !important;">
			<thead>
				<tr>
					<th>#ID</th>
					<th>Nome</th>
					<th>email</th>
					<th>Função</th>
					<th>Ação</th>
				</tr>
			</thead>
			<tbody>
				<?php
				while ($linha = mysqli_fetch_array($resultado)) {
					echo "<tr>";
					echo "<td width='5%'>" . $linha["idFunc"] . "</td>";
					echo "<td width='20%'>" . $linha["nome"] . "</td>";
					echo "<td width='15%'>" . $linha["email"] . "</td>";
					echo "<td>" . $linha["funcao"] . "</td>";
					$dados = "idFunc=" . $linha["idFunc"] .
						"&nome=" . $linha["nome"] .
						"&email=" . $linha["email"] .
						"&funcao=" . $linha["funcao"];

					echo	"<td width=120>" .
						"<a href=\"trocarSenhaFuncionario.php?$dados\"><img width=\"20%\" src=\"../imagens/icons/key-fill.svg\"> </a>" .
						"<a href=\"alterarFuncionario.php?$dados\"><img width=\"20%\" src=\"../imagens/icons/pencil-square.svg\"> </a>";
					if (($_SESSION["funcao"] === "gerente") && ($_SESSION["idFunc"] != $linha["idFunc"])) {
						echo "<a href=\"excluirFuncionario.php?$dados\"><img width=\"20%\" src=\"../imagens/icons/x-square-fill.svg\"> </a>";
					}
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
