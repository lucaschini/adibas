<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Adibas</title>
	<link rel="stylesheet" href="../style/style.css" />
	<link rel="stylesheet" href="../style/style2.css" />
	<script src="../bootstrap\node_modules\bootstrap\dist\js\bootstrap.bundle.js"></script>

	<meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body class="bg-primary">
	<?php
	session_start();
	if (!isset($_SESSION["logado"]) || $_SESSION["logado"] != TRUE) {
		header("Location: login.php");
	}

	if (isset($_POST["idCliente"])) {
		$idCliente = $_POST["idCliente"];
		$senhaNova = $_POST["senhaNova"];

		$conexao = mysqli_connect("localhost", "root", "", "adibas");
		$sql =  "UPDATE `tbcliente` SET `senha` = '$senhaNova' WHERE `tbcliente`.`idCliente` = $idCliente;";
		echo $sql;
		// executando instrução SQL
		$resultado = @mysqli_query($conexao, $sql);
		if (!$resultado) {
			die('Query Inválida: ' . @mysqli_error($conexao));
			echo "<form action='menuCliente.php'> onsubmit='window.onsubmit = function() { return true; };'";
			echo "<button type='submit'>Voltar</button>";
			echo "</form>";
		}
		mysqli_close($conexao);
		if ($_SESSION["idCliente"] == $idCliente) {
			session_destroy();
			header("Location: login.php");
		}
		header("Location: menuCliente.php");
	}
	?>
	<div class="center">
		<div class="container">
			<div class="row align-items-center rounded-3 border shadow-lg bg-white" style="padding: 2rem; justify-content: space-around">
				<div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
					<main class="form-signin w-100 m-auto">
						<h1 align='center'> Alteração de Senha </h1>
						<h1 id="mensagem" style="color:red;"></h1>
						<form action="trocarSenhaCliente.php" method="post" onsubmit="verificarDados()">

							<input type="hidden" name="idCliente" value="<?php echo $_GET["idCliente"]; ?>">
							<input type="hidden" name="email" value="<?php echo $_GET["email"]; ?>">
							<input type="hidden" name="nome" value="<?php echo $_GET["nome"]; ?>">
							<input type="hidden" name="senha" id="senhaAntiga" value="<?php echo $_SESSION["senha"]; ?>">

							Email: <?php echo $_GET["email"]; ?><p></p>
							Nome: <?php echo $_GET["nome"]; ?><p></p>
							<p></p>
							Senha Antiga <input type="password" name="senhaAntiga" id="input-senhaAntiga" class="form-control form-adm" onclick="document.getElementById('mensagem').innerHTML = ''">
							<p></p>
							Nova Senha <input type="password" name="senhaNova" id="input-senhaNova" class="form-control form-adm">
							<p></p>
							Confirma Nova Senha <input type="password" name="confirmaSenhaNova" id="input-confirmaSenhaNova" class="form-control form-adm">

							<button type="submit" class="btn btn-primary" style="margin: 1rem 0 1rem 0;">Salvar</button>
							
						</form>
						<form action="menuCliente.php">
							<button type='submit' class="btn btn-primary">Voltar</button>
						</form>

					</main>
				</div>
			</div>
		</div>
	</div>


	<script>
		function verificarDados() {
			var senhaNova = document.getElementById("input-senhaNova").value;
			var confirmaSenhaNova = document.getElementById("input-confirmaSenhaNova").value;
			var senhaAntiga = document.getElementById("senhaAntiga").value;
			var inputSenhaAntiga = document.getElementById("input-senhaAntiga").value;
			if (senhaAntiga != inputSenhaAntiga){
				alert("A senha antiga não está correta!\n\nRecarregue a página.");
				// abortando submit
				document.getElementById("input-senhaAntiga").focus();
				window.onsubmit = function() {
					return false;
				}
			} else if (senhaNova.length < 6) {
				alert("A senha deve ter no mínimo 6 digitos!\n\nRecarregue a página.");
				// abortando submit
				document.getElementById("input-senhaNova").focus();
				window.onsubmit = function() {
					return false;
				}

			} else if (senhaNova !== confirmaSenhaNova) {
				alert("A Senha e Confirma Senha devem ser iguais!\n\nRecarregue a página.");
				// abortando submit
				document.getElementById("input-confirmaSenhaNova").focus();
				window.onsubmit = function() {
					return false;
				};

			} else {
				window.onsubmit = function() {
					return true;
				};
			}
		}

		<?php
		if (isset($_GET["senhaAntigaInvalida"])) { ?>
			var senhaAntigaInvalida = <?php echo "\"" . $_GET["senhaAntigaInvalida"] . "\""; ?>;
			document.getElementById('mensagem').innerHTML = "Senha Antiga inválida!";
		<?php
		} ?>
	</script>
</body>

</html>