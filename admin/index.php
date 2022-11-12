<?php
	session_start();
	if (!isset($_SESSION["logado"])||$_SESSION["logado"]!= TRUE) {
		header("Location: login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Adibas</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../style/style.css">
	<link rel="stylesheet" href="../style/style2.css">
	<link rel="stylesheet" href="../style/styleadm.css">
	<script src="bootstrap\node_modules\bootstrap\dist\js\bootstrap.bundle.js"></script>

	</head>
<body class="center bg-secondary">
<div class="container">
		<div class="row align-items-center rounded-3 border shadow-lg bg-white" style="padding: 2rem; justify-content: center;">
			<div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
				<main class="form-signin w-100 m-auto" style="display:flex; flex-direction:column; align-items:center; gap:2rem; text-align:center;">
				<img src="../imagens/Adibas.png" alt="Logo" width="180" height="128">
				<div style="display:flex; flex-direction:column; gap:2rem; ">
					<?php
						echo "<h1>Seja bem-vindo, ".$_SESSION["nome"]."!</h1>";
						if (($_SESSION["funcao"] === "gerente")) {?>
							<form action="listarProduto.php">
							<button type="submit" class="w-100 btn btn-lg btn-secondary" type="submit">Produtos</button>
							</form>
							
							<form action="relatorioVendas.php">
							<button type="submit" class="w-100 btn btn-lg btn-secondary" type="submit">Relatório de Vendas</button>
							</form>

							<form action="listarFuncionario.php">
							<button type="submit" class="w-100 btn btn-lg btn-secondary" type="submit">Funcionários</button>
							</form> 
							
							<?php } else{ ?>
								<form action="listarFuncionario.php">
									<button type="submit" class="w-100 btn btn-lg btn-secondary">Alterar Dados</button>
								</form> 					
							<?php }?> 
						
						<form action="sair.php">
						<button type="submit" class="w-100 btn btn-lg btn-secondary" type="submit">Sair</button>
						</form>
						</div>
                  </main>
			</div>
		</div>
	</div>
		

</body>
</html> 