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
<body class="bg-primary">
<?php
	session_start();
	if (!isset($_SESSION["logado"])||$_SESSION["logado"]!= TRUE) {
		header("Location: login.php");
	}
	
	if(isset($_POST["idCliente"])) {
		$idCliente = $_POST["idCliente"];
		$nomeNovo = $_POST["nomeNovo"];
		$emailNovo = $_POST["emailNovo"];
		$ruaNovo = $_POST["ruaNovo"];
		$bairroNovo = $_POST["bairroNovo"];
		$foneNovo = $_POST["foneNovo"];
		
		$sql = "UPDATE `tbcliente` SET `nome` = '$nomeNovo', `email`='$emailNovo', `rua`='$ruaNovo', `bairro`='$bairroNovo', `fone`='$foneNovo' WHERE `tbcliente`.`idCliente` = $idCliente;";
			
		$conexao = mysqli_connect("localhost", "root", "", "adibas");
		
		// executando instrução SQL
		$resultado = @mysqli_query($conexao, $sql);
		if (!$resultado) {
			die('Query Inválida: ' . @mysqli_error($conexao));
			echo "<form action='menuCliente.php'> onsubmit='window.onsubmit = function() { return true; };'";
			echo "<button type='submit'>Voltar</button>";
			echo "</form>";
		}
		mysqli_close($conexao);
		if ($_SESSION["idCliente"]==$idCliente) {
			session_destroy();
			header("Location: login.php");
		}
		header("Location: menuCliente.php");
	}
 ?>
	
<div class="center">
	<div class="container">
		<h1 id="mensagem" style="color:red;"></h1>
		<div class="row align-items-center rounded-3 border shadow-lg bg-white" style="padding: 2rem; justify-content: space-around">
			<div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
				<main class="form-signin w-100 m-auto">
					<h1 class="display-4 fw-bold lh-1">Alteração de Dados</h1>
					<h1 id="mensagem" style="color:red;"></h1>
					<form action="alterarCliente.php" method="post" onsubmit="verificarDados()">
					<input type="hidden" name="idCliente" value="<?php echo $_GET["idCliente"]; ?>">
					<input type="hidden" name="email" value="<?php echo $_GET["email"]; ?>">
					<input type="hidden" name="nome" value="<?php echo $_GET["nome"]; ?>">
					<input type="hidden" name="rua" value="<?php echo $_GET["rua"]; ?>">
					<input type="hidden" name="bairro" value="<?php echo $_GET["bairro"]; ?>">
					<input type="hidden" name="fone" value="<?php echo $_GET["fone"]; ?>">
						
						<div class="form-floating" style="margin-top: 1rem">
							<input type="email" class="form-control form-adm"name="emailNovo" value="<?php echo $_GET["email"]; ?>" id="input-email"/>
							<label for="floatingInput">Email</label>
						</div>

						<div class="form-floating" style="margin-top: 1rem">
							<input type="text" class="form-control form-adm"type="text" name="nomeNovo" value="<?php echo $_GET["nome"]; ?>" id="input-nome"/>
							<label for="floatingInput">Nome</label>
						</div>

						<div class="form-floating" style="margin-top: 1rem">
							<input type="text" class="form-control form-adm"type="text" name="ruaNovo" value="<?php echo $_GET["rua"]; ?>" id="input-rua"/>
							<label for="floatingInput">Rua</label>
						</div>

						<div class="form-floating" style="margin-top: 1rem">
							<input type="text" class="form-control form-adm"type="text" name="bairroNovo" value="<?php echo $_GET["bairro"]; ?>" id="input-bairro"/>
							<label for="floatingInput">Bairro</label>
						</div>

						<div class="form-floating" style="margin-top: 1rem">
							<input type="text" class="form-control form-adm"type="text" name="foneNovo" value="<?php echo $_GET["fone"]; ?>" id="input-fone"/>
							<label for="floatingInput">Telefone</label>
						</div>
						
						<button type="submit" class="btn btn-primary" style="margin:1.5em auto 1.5rem;">Salvar</button>

					</form>

					<form action="login.php">
						<button type='submit' class="btn btn-primary">Voltar</button>
					</form>

				</main>
			</div>
		</div>
	</div>
</div>

<script>
		function verificarDados() {
		var email = document.getElementById("input-email").value;
		var nome = document.getElementById("input-nome").value;
		if (!validarEmail(email)) {
			alert("Digite um email válido!");
			// abortando submit
			document.getElementById("input-email").focus();
			window.onsubmit = function() { return false; };	
			
		} else if (nome.length<3) {
			alert("O nome deve ter no mínimo 3 caracteres!");
			// abortando submit
			document.getElementById("input-nome").focus();
			window.onsubmit = function() { return false; };

		} else {
			return true;
		}
	}

<?php
	if(isset($_GET["senhaAntigaInvalida"])){ ?>
	    var senhaAntigaInvalida =  <?php echo "\"".$_GET["senhaAntigaInvalida"]."\"";?>;
		document.getElementById('mensagem').innerHTML = "Senha Antiga inválida!";<?php		
	} ?>

</script>
</body>
</html>
