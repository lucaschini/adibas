<?php
session_start();
if (!isset($_SESSION["logado"]) || $_SESSION["logado"] != TRUE) {
	header("Location: login.php");
}
if ($_SESSION["funcao"] !== "gerente") {
	header("Location: index.php");
}
if (isset($_POST["idProduto"])) {
	//conectar com o banco de dados
	$conexao = mysqli_connect("localhost", "root", "", "adibas");
	//Não será realmente excluido. Apenas os será inativado ou seja ativo="n"
	$sql = "UPDATE `tbproduto` SET `ativo` = 'n' WHERE `tbproduto`.`idProduto` = " . $_POST["idProduto"] . ";";
	$resultado = mysqli_query($conexao, $sql);
	header("Location: listarProduto.php");
}
?>
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

<body class="bg-secondary">
	<div class="center">
		<div class="container">
			<h1 id="mensagem" style="color:red;"></h1>
			<div class="row align-items-center rounded-3 border shadow-lg bg-white" style="padding: 2rem; justify-content: space-around">
				<div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
					<main class="form-signin w-100 m-auto">
						<h1 class="display-4 fw-bold lh-1">Excluir Produto</h1>
						ID# : <?php echo $_GET["idProduto"]; ?><p></p>
						Prouduto : <?php echo $_GET["produto"]; ?><p></p>
						Descrição do produto : <?php echo $_GET["idProduto"]; ?><p></p>
						Preço de Venda : <?php echo $_GET["precoVenda"]; ?><p></p>
						Promoção : <?php echo $_GET["promocao"]; ?><p></p>
						Preco Promoção : <?php echo $_GET["precoPromocao"]; ?><p></p>
						Foto : <p></p> <img width="300" src="../imagens/<?php echo $_GET["nomeFoto"]; ?>" <p></p>
						<form action="excluirProduto.php" method="post">
						<input type="hidden" name="idProduto" value="<?php echo $_GET["idProduto"]; ?>">
						<button type='submit' class="btn btn-secondary">Excluir este Produto</button><p></p>
						</form>

						<form action="listarProduto.php">
							<button type='submit' class="btn btn-secondary">Voltar</button>
						</form>

					</main>
				</div>
			</div>
		</div>
	</div>

</body>

</html>