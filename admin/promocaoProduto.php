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
	if (isset($_POST["novoPrecoPromocao"])) {
		//conectar com o banco de dados
		$conexao = mysqli_connect("localhost", "root", "", "adibas");
		if ($_POST["promocao"] === "n") {
			// colocar em promoção
			$sql = "UPDATE `tbproduto` SET `promocao` = 's' , `precoPromocao`='" . $_POST["novoPrecoPromocao"] . "' WHERE `tbproduto`.`idProduto` = " . $_POST["idProduto"] . ";";
		} else {
			// retira da promocao
			$sql = "UPDATE `tbproduto` SET `promocao` = 'n' WHERE `tbproduto`.`idProduto` = " . $_POST["idProduto"] . ";";
		}
		//Não será realmente excluido. Apenas os será inativado ou seja ativo="n"

		$resultado = mysqli_query($conexao, $sql);
		header("Location: listarProduto.php");
	}
	?>

	<div class="center" style="
	width: 100%;
	height:100%;
  	display: flex;
  	justify-content: center;
  	align-items: center;
	margin-top: 0 !important;
  	margin-bottom: 0 !important;">
		<div class="container">
			<h1 id="mensagem" style="color:red;"></h1>
			<div class="row align-items-center rounded-3 border shadow-lg bg-white" style="padding: 2rem; justify-content: space-around">
				<div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
					<main class="form-signin w-100 m-auto">
						<h1 align='center'> Colocar/Retirar produto em promoção </h1>
						ID# : <?php echo $_GET["idProduto"]; ?> <p></p>
						Prouduto : <?php echo $_GET["produto"]; ?> <p></p>
						Descrição do produto : <?php echo $_GET["descricaoProduto"]; ?> <p></p>
						Preço de Venda : <?php echo $_GET["precoVenda"]; ?> <p></p>
						Promoção : <?php echo $_GET["promocao"]; ?> <p></p>
						Preco Promoção : <?php echo $_GET["precoPromocao"]; ?> <p></p>
						Foto : <p></p> <img width="300" src="../imagens/<?php echo $_GET["nomeFoto"]; ?>">
						<form action="promocaoProduto.php" method="post" onsubmit="verificarPreco()">

							<input type="hidden" name="idProduto" value="<?php echo $_GET["idProduto"]; ?>">
							<input type="hidden" name="promocao" value="<?php echo $_GET["promocao"]; ?>" id="htPromocao">
							<input type="hidden" name="precoVenda" value="<?php echo $_GET["precoVenda"]; ?>" id="htPrecoVenda">
							<input type="hidden" name="precoPromocao" value="<?php echo $_GET["precoPromocao"]; ?>">

							Preço de Promoção <input type="text" name="novoPrecoPromocao" value="<?php echo $_GET["precoPromocao"]; ?>" id="htPrecoPromocao">
							<p></p>
							<button class="btn btn-secondary" type="submit"><?php if ($_GET["promocao"] === "n") {
														echo "Colocar em promoção";
													} else {
														echo "Retirar da promoção";
													} ?></button>
							<p></p>
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
		function verificarPreco() {
			var promocao = document.getElementById("htPromocao").value;
			var precoVenda = parseFloat(document.getElementById("htPrecoVenda").value);
			var precoPromocao = parseFloat(document.getElementById("htPrecoPromocao").value);
			var menorPrecoPossivel = precoVenda * 0.70; // equivale a 30% de desconto
			if ((precoPromocao < precoVenda) && (precoPromocao >= menorPrecoPossivel)) {
				return true;
			} else {
				alert("Preço de promoção: R$ " + precoPromocao +
					"\nPreço de Promoção deve ser menor que o preço de venda: R$ " +
					precoVenda + "\n e maior ou igual a R$ " +
					menorPrecoPossivel);
				// abortando submit
				window.onsubmit = function() {
					return false;
				};
			}
		}
	</script>


</body>

</html>