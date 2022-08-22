<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Dogão Lanches</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="meu.css">
		
	</head>
	
<body>
	<h1 align=center>Dogão Lanches - Página adminstrativa</h1>
	
	<h1 id="mensagem" style="color:red;"></h1>
	
<?php
	session_start();
	if ((isset($_SESSION["logado"]))&&($_SESSION["logado"]== TRUE)) {
		//O funcionario ja efetuou o login então ele volta para a pagina administrativa
		header("Location: index.php");
	} else {
		// Verificando se o usário digitou email e  senha e clicou em "logar"
		if ((isset($_POST["email"]))&&(isset($_POST["senha"]))){
			
	
			$conexao = mysqli_connect("localhost", "root", "", "dogao");
			
			/* 
			
			Verificando se existem funcionario cadastrados. Caso não tenha será
			criado um funcionario chamado supervisor e o ID reiniciado
			
			*/
			
			$sql = "SELECT * FROM `tbFunc`;";
			$resultado = mysqli_query($conexao,$sql);
			if (!($linha = mysqli_fetch_array($resultado))) {
				//reiniciando a chave primaria
				$sql="ALTER TABLE `tbfunc` AUTO_INCREMENT = 0;";
				$resultado = mysqli_query($conexao,$sql);
								
				//criando o usuários supervidor
				$email="supervisor@supervisor.com";
				$senha="supervisor";
				
				$sql="INSERT INTO `tbfunc` (`idFunc`, `email`, `senha`, `nome`, `funcao`) VALUES (NULL, '$email', '$senha', 'supervisor', 'gerente');";
				$resultado = mysqli_query($conexao,$sql);
				
			}
			
			$email=$_POST["email"];
			$senha=$_POST["senha"];
						
			$sql = "SELECT * FROM `tbFunc` WHERE `ativo`='s' AND `email` = '$email' AND `senha` = '$senha'";
			$resultado = mysqli_query($conexao,$sql);
			if ($linha = mysqli_fetch_array($resultado)) {
				$_SESSION["idFunc"] = $linha["idFunc"];				
				$_SESSION["logado"] = TRUE;
				$_SESSION["funcao"] = $linha["funcao"];
				$_SESSION["nome"] = $linha["nome"];
				header("Location: index.php");
		
				} else { ?>
						<script>document.getElementById('mensagem').innerHTML = "Email e/ou Senha inválidados!"</script>
	<?php 
	}
	}
	}	
?>
	<form action="login.php" method="post">
		Email <input type=text name="email" autocomplete="off" required onclick="document.getElementById('mensagem').innerHTML = ''"><p></p>
		Senha <input type=password name="senha" autocomplete="off" required onclick="document.getElementById('mensagem').innerHTML = ''"><p></p>
		<input type=submit value="Logar">
	</form>
</body>
</html>



