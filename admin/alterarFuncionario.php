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
	if (!isset($_SESSION["logado"])||$_SESSION["logado"]!= TRUE) {
		header("Location: login.php");
	}
	
	if(isset($_POST["idFunc"])) {
		if (($_SESSION["funcao"]==="gerente")) {
			$idFunc = $_POST["idFunc"];
			$nomeNovo = $_POST["nomeNovo"];
			$emailNovo = $_POST["emailNovo"];
			if ($_SESSION["idFunc"]!=$idFunc) {
				$funcaoNovo = $_POST["funcaoNovo"];
				$sql =  "UPDATE `tbfunc` SET `nome` = '$nomeNovo', `email`='$emailNovo', `funcao`='$funcaoNovo' WHERE `tbfunc`.`idFunc` = $idFunc;";
				
			} else {
				$sql =  "UPDATE `tbfunc` SET `nome` = '$nomeNovo', `email`='$emailNovo' WHERE `tbfunc`.`idFunc` = $idFunc;";
			}	
			$conexao = mysqli_connect("localhost", "root", "", "adibas");
			
			// executando instrução SQL
			$resultado = @mysqli_query($conexao, $sql);
			if (!$resultado) {
				die('Query Inválida: ' . @mysqli_error($conexao));
				echo "<form action='listarFuncionario.php'> onsubmit='window.onsubmit = function() { return true; };'";
				echo "<button type='submit'>Voltar</button>";
				echo "</form>";
			}
			mysqli_close($conexao);
			if ($_SESSION["idFunc"]==$idFunc) {
				session_destroy();
				header("Location: login.php");
			}
			header("Location: listarFuncionario.php");
		} else {
			$idFunc = $_POST["idFunc"];
			$nomeNovo = $_POST["nomeNovo"];
			$emailNovo = $_POST["emailNovo"];
			
			$sql =  "UPDATE `tbfunc` SET `nome` = '$nomeNovo', `email`='$emailNovo' WHERE `tbfunc`.`idFunc` = $idFunc;";
			$conexao = mysqli_connect("localhost", "root", "", "adibas");
			
		echo $sql;	
			$resultado = @mysqli_query($conexao, $sql);
			if (!$resultado) {
				die('Query Inválida: ' . @mysqli_error($conexao));
				echo "<form action='listarFuncionario.php'> onsubmit='window.onsubmit = function() { return true; };'";
				echo "<button type='submit'>Voltar</button>";
				echo "</form>";
			}
			mysqli_close($conexao);
			session_destroy();
			header("Location: login.php");
					
		}
	}
 ?>

<div class="center">
		<div class="container">
			<h1 id="mensagem" style="color:red;"></h1>
			<div class="row align-items-center rounded-3 border shadow-lg bg-white" style="padding: 2rem; justify-content: space-around">
				<div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
					<main class="form-signin w-100 m-auto">
						<h1 class="display-4 fw-bold lh-1">Alteração Dados de Funcionário</h1>
						<h1 id="mensagem" style="color:red;"></h1>
						<form action="alterarFuncionario.php" method="post" onsubmit="verificarDados()">
						<input type="hidden" name="idFunc" value="<?php echo $_GET["idFunc"]; ?>">
						<input type="hidden" name="email" value="<?php echo $_GET["email"]; ?>">
						<input type="hidden" name="nome" value="<?php echo $_GET["nome"]; ?>">
							
							<div class="form-floating" style="margin-top: 1rem">
								<input type="email" class="form-control form-adm"name="emailNovo" value="<?php echo $_GET["email"]; ?>" id="input-email"/>
								<label for="floatingInput">Email </label>
							</div>

							<div class="form-floating" style="margin-top: 1rem">
								<input type="text" class="form-control form-adm"type="text" name="nomeNovo" value="<?php echo $_GET["nome"]; ?>" id="input-nome"/>
								<label for="floatingInput">Nome</label>
							</div>

							<div class="form-floating" style="margin-top: 1rem">
							<?php
							if (($_SESSION["funcao"]==="gerente")&&($_SESSION["idFunc"]!=$_GET["idFunc"])) {?>
							Função: <input type="radio" name="funcaoNovo" value="gerente" <?php if($_GET["funcao"]==="gerente"){ echo "checked";}?>>Gerente 
							<input type="radio" name="funcaoNovo" value="vendedor"  <?php if($_GET["funcao"]==="vendedor"){ echo "checked";}?>>Vendedor 
							<input type="radio" name="funcaoNovo" value="caixa" <?php if($_GET["funcao"]==="caixa"){ echo "checked";}?>>Caixa<p></p><?php
							} ?>	
							</div>
							
							<button type="submit" class="btn btn-secondary" style="margin-bottom: 1.5rem;">Salvar</button>

						</form>

						<form action="listarProduto.php">
							<button type='submit' class="btn btn-secondary">Voltar</button>
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
