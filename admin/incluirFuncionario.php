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
	<div class="center">
		<div class="container">
			<h1 id="mensagem" style="color:red;"></h1>
			<div class="row align-items-center rounded-3 border shadow-lg bg-white" style="padding: 2rem; justify-content: space-around">
				<div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
					<main class="form-signin w-100 m-auto">
						<?php
						session_start();
						if (!isset($_SESSION["logado"]) || $_SESSION["logado"] != TRUE) {
							header("Location: login.php");
						}
						if ($_SESSION["funcao"] !== "gerente") {
							header("Location: index.php");
						}
						if (isset($_POST["email"]) && ($_POST["email"] !== "")) {
							// Inclusão de funcionario
							$conexao = mysqli_connect("localhost", "root", "", "adibas");

							$email = $_POST["email"];
							$senha = $_POST["senha"];
							$nome = $_POST["nome"];
							$funcao = $_POST["funcao"];

							$sql = "SELECT * FROM `tbfunc` WHERE `email` = '$email'";

							$resultado = @mysqli_query($conexao, $sql);
							if ($linha = mysqli_fetch_array($resultado)) {
								mysqli_close($conexao);
								header("Location: incluirFuncionario.php?emailJaCadastrado=" . $linha["email"]);
							} else {
								// criando a linha de INSERT
								$sql =  "INSERT INTO `tbFunc` " .
									"(`idFunc`, `ativo`, `email`," .
									"`senha`, `nome`, " .
									"`funcao`) " .
									"VALUES (NULL, 's', '$email', '$senha', " .
									"'$nome', '$funcao');";
								// executando instrução SQL
								$resultado = @mysqli_query($conexao, $sql);
								if (!$resultado) {
									die('Query Inválida: ' . @mysqli_error($conexao));
									echo "<form action='listarFuncionario.php' onsubmit='window.onsubmit = function() { return true; };'>";
									echo "<button type='submit'>Voltar</button>";
									echo "</form>";
								}
								mysqli_close($conexao);
								header("Location: listarFuncionario.php");
							}
						}
						?>
						<h1 class="display-4 fw-bold lh-1">Incluir Funcionário</h1>
						<h1 id="mensagem" style="color:red;"></h1>
						<form action="incluirFuncionario.php" method="post" onsubmit="verificarDados()">
							<input type="hidden" name="acao" value="incluir">
							<div class="form-floating" style="margin-top: 1rem">
								<input type="text" class="form-control form-adm" id="input-email" name="email" onclick="document.getElementById('mensagem').innerHTML = ''"/>
								<label for="floatingInput">Email</label>
							</div>

							<div class="form-floating" style="margin-top: 1rem">
								<input type="text" class="form-control form-adm" name="nome" id="input-nome"/>
								<label for="floatingInput">Nome</label>
							</div>

							<div class="form-floating" style="margin-top: 1rem">
								<input type="password" class="form-control form-adm" name="senha" id="input-senha"/>
								<label for="floatingInput">Senha</label>
							</div>

							<div class="form-floating" style="margin-top: 1rem">
								<input type="password" class="form-control form-adm" name="confirmaSenha" id="input-confirmaSenha"/>
								<label for="floatingInput">Confirma senha</label>
							</div>

							<div style="padding:1rem 0 1rem 0;">
								Função: 
								<input type="radio" name="funcao" value="gerente">Gerente
								<input type="radio" name="funcao" value="vendedor" checked>Vendedor
								<input type="radio" name="funcao" value="caixa">Caixa
							</div>

							<button type="submit" class="btn btn-secondary" style="margin-bottom: 1.5rem;">Salvar</button>

						</form>

						<form action="listarFuncionario.php">
							<button type='submit' class="btn btn-secondary">Voltar</button>
						</form>

					</main>
				</div>
			</div>
		</div>
	</div>
	<script>
		function validarEmail(email) {
			var re = /\S+@\S+\.\S+/;
			return re.test(email);
		}

		function verificarDados() {
			var email = document.getElementById("input-email").value;
			var senha = document.getElementById("input-senha").value;
			var confirmaSenha = document.getElementById("input-confirmaSenha").value;
			var nome = document.getElementById("input-nome").value;
			if (!validarEmail(email)) {
				alert("Digite um email válido!\n\nRecarregue a página.");
				// abortando submit
				document.getElementById("input-email").focus();
				window.onsubmit = function() {
					return false;
				};

			} else if (senha.length < 6) {
				alert("A senha deve ter no mínimo 6 digitos!\n\nRecarregue a página.");
				// abortando submit
				document.getElementById("input-senha").focus();
				window.onsubmit = function() {
					return false;
				}

			} else if (senha !== confirmaSenha) {
				alert("A Senha e Confirma Senha devem ser iguais!\n\nRecarregue a página.");
				// abortando submit
				document.getElementById("input-confirmaSenha").focus();
				window.onsubmit = function() {
					return false;
				};

			} else if (nome.length < 3) {
				alert("O nome deve ter no mínimo 3 caracteres!");
				// abortando submit
				document.getElementById("input-nome").focus();
				window.onsubmit = function() {
					return false;
				};

			} else {
				return true;
			}
		}

		<?php
		if (isset($_GET["emailJaCadastrado"])) { ?>
			var emailJaCadastrado = <?php echo "\"" . $_GET["emailJaCadastrado"] . "\""; ?>;
			document.getElementById('mensagem').innerHTML = "Email: " + emailJaCadastrado + ", já cadastrado!";
		<?php
		} ?>
	</script>
</body>

</html>