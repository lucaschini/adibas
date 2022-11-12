<?php
session_start();
if (!isset($_SESSION["logado"]) || $_SESSION["logado"] != TRUE) {
	header("Location: login.php");
}
if ($_SESSION["funcao"] !== "gerente") {
	header("Location: index.php");
}
?>
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

<body class="bg-secondary center">

	<div class="container">
		<h1 id="mensagem" style="color:red;"></h1>
		<div class="row align-items-center rounded-3 border shadow-lg bg-white" style="padding: 2rem; justify-content: space-around">
			<div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
				<main class="form-signin w-100 m-auto">
					<h1 class="display-4 fw-bold lh-1">Alterar Produto</h1>
					<form enctype="multipart/form-data" action="upload.php" method="post">
						<input type="hidden" name="acao" value="incluir">
						<input type="hidden" name="idProduto" value="<?php echo $_GET["idProduto"]; ?>">
						<div class="form-floating" style="margin-top: 1rem">
							<input type="text" class="form-control form-adm" id="floatingInput" name="produto" value="<?php echo $_GET["produto"]; ?>" />
							<label for="floatingInput">Produto</label>
						</div>

						<div class="form-floating" style="margin-top: 1rem">
							<input type="text" class="form-control form-adm" id="floatingInput" name="descricaoProduto" value="<?php echo $_GET["descricaoProduto"]; ?>" />
							<label for="floatingInput">Descrição do produto</label>
						</div>

						<div class="form-floating" style="margin-top: 1rem">
							<input type="text" class="form-control form-adm" id="floatingInput" name="precoVenda" value="<?php echo $_GET["precoVenda"]; ?>" />
							<label for="floatingInput">Preço de Venda</label>
						</div>
						<input type="hidden" name="nomeFotoAntiga" value="<?php echo $_GET["nomeFoto"]; ?>">

						<div class="mb-3">
							<img width="300" src="../imagens/<?php echo $_GET["nomeFoto"]; ?>" id="preview">
							<label for="formFile" class="form-label">Selecione a foto:</label>
							<input class="form-control form-adm" type="file" id="img-input" name="imagemProduto">
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
	<script>
		/*
	Este código javascript é responsável por carregar a imagem
	selecionada no componente <img> que esta na tela
	isto permite que a pessoa possa visualizar a fonto antes dela ser enviada para o servidor
	*/
		document.getElementById("img-input").onchange = function() {
			var reader = new FileReader();

			reader.onload = function(e) {
				// get loaded data and render thumbnail.
				document.getElementById("preview").src = e.target.result;
			};

			// read the image file as a data URL.
			reader.readAsDataURL(this.files[0]);
		};
	</script>
</body>

</html>