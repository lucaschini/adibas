<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Adibas</title>
	<link rel="stylesheet" href="../style/style.css" />
	<link rel="stylesheet" href="../style/style2.css" />
	<link rel="stylesheet" href="../style/styleadm.css">
	<script src="../bootstrap\node_modules\bootstrap\dist\js\bootstrap.bundle.js"></script>

	<meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body class="bg-secondary">
	<?php
	session_start();
	if (!isset($_SESSION["logado"]) || $_SESSION["logado"] != TRUE) {
		header("Location: login.php");
	}
	if ($_SESSION["funcao"] !== "gerente") {
		header("Location: index.php");
	}
	if (isset($_POST["idFunc"])) {
		if (($_SESSION["funcao"] === "gerente")) {
			$idFunc = $_POST["idFunc"];
			$sql =  "UPDATE `tbfunc` SET `ativo` = 'n' WHERE `tbfunc`.`idFunc` = $idFunc;";
			$conexao = mysqli_connect("localhost", "root", "", "adibas");

			// executando instrução SQL
			$resultado = @mysqli_query($conexao, $sql);
			if (!$resultado) {
				die('Query Inválida: ' . @mysqli_error($conexao));
				echo "<form action='listarFuncionario.php'> onsubmit='window.onsubmit = function() { return true; };'";
				echo "<button type='submit'>Voltar</button>";
				echo "</form>";
			}
			header("Location: listarFuncionario.php");
		}
	}
	?>
	<div class="center">
		<div class="container">
			<h1 id="mensagem" style="color:red;"></h1>
			<div class="row align-items-center rounded-3 border shadow-lg bg-white" style="padding: 2rem; justify-content: space-around">
				<div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
					<main class="form-signin w-100 m-auto">
						<h1 align='center'> Excluir Funcionário </h1>
						<h1 id="mensagem" style="color:red;"></h1>
						<form action="excluirFuncionario.php" method="post">

							<input type="hidden" name="idFunc" value="<?php echo $_GET["idFunc"]; ?>">

							email: <?php echo $_GET["email"]; ?><p></p>
							Nome: <?php echo $_GET["nome"]; ?><p></p>
							Função: <?php echo $_GET["funcao"]; ?><p></p>

							<button type="submit" class="btn btn-secondary">Excluir este Funcionário</button>
							<p></p>
						</form>

						<form action="listarFuncionario.php">
							<button type='submit' class="btn btn-secondary">Voltar</button>
						</form>

					</main>
				</div>
			</div>
		</div>
	</div>
</body>

</html>