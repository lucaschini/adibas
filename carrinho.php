<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Adibas</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style/style.css" />
	<link rel="stylesheet" href="style/style2.css" />
	<script src="bootstrap\node_modules\bootstrap\dist\js\bootstrap.bundle.js"></script>
</head>

<body class="bg-primary">
	<nav class="navbar bg-primary shadow-lg" style="flex-wrap: nowrap">
		<div class="container-fluid" style="margin: 0">
			<a class="navbar-brand" href="index.php"><img src="imagens/Adibas.png" alt="Logo" width="50" height="32"></a>
		</div>
	</nav>
	<div class="center" style="margin: 0 !important; padding: 0 !important;">
		<div class="rounded-3 border shadow-lg bg-white" style="width:80vw; padding: 2rem; min-height: 70vh;">
			<?php
			session_start();
			if (!isset($_SESSION['carrinho'])) {
				$_SESSION['carrinho'] = array();
			} //adiciona produto

			if (isset($_GET['acao'])) {

				//ADICIONAR CARRINHO
				if ($_GET['acao'] === 'adicionar') {
					$idProduto = intval($_GET['idProduto']);
					if (!isset($_SESSION['carrinho'][$idProduto])) {
						$_SESSION['carrinho'][$idProduto] = 1;
					} else {
						$_SESSION['carrinho'][$idProduto] += 1;
					}
				}

				//REMOVER CARRINHO
				if ($_GET['acao'] === 'limpar') {
					unset($_SESSION['carrinho']);
					$_SESSION['carrinho'] = array();
				}

				//ALTERAR QUANTIDADE
				if ($_GET['acao'] === 'remover') {
					$idProduto = intval($_GET['idProduto']);
					if (isset($_SESSION['carrinho'][$idProduto])) {
						$_SESSION['carrinho'][$idProduto] -= 1;
						echo $_SESSION['carrinho'][$idProduto];
						if ($_SESSION['carrinho'][$idProduto] <= 0) {
							unset($_SESSION['carrinho'][$idProduto]);
						}
					}
				}
			}

			?>
			<center>
				<table width="80%" class="table">
					<thead>
						<tr>
							<th width="144" colspan="3">Descrição do Produto</th>
							<th width="79">Quantidade</th>
							<th width="89">Pre&ccedil;o</th>
							<th width="100">SubTotal</th>
							<th width="64">Remover</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<td>
								<a href="prod.php"><button type='button' class="btn btn-sm btn-outline-primary">Continuar Comprando</button></a>

							</td>
							<td colspan="5">
							</td>
							<td>
								<form action="finalizarCompra.php" width="100%" id="finalizar" onsubmit="verificarCarrinho()">
									<button type='submit' class="btn btn-sm btn-outline-primary">Finalizar Compra</button>
								</form>
							</td>
						</tr>
					</tfoot>
					<tbody>
						<?php
						if (count($_SESSION['carrinho']) == 0) {
							echo "<tr><td colspan='7'><h1>Não há produto no carrinho</h1></td></tr>";
						} else {
							$conexao = mysqli_connect("localhost", "root", "", "adibas");
							$total = 0;
							foreach ($_SESSION['carrinho'] as $idProduto => $qtd) {
								$sql = "SELECT *  FROM tbProduto WHERE `idProduto`= '$idProduto'";
								$resultado = mysqli_query($conexao, $sql);
								while ($linha = mysqli_fetch_array($resultado)) {

									echo "<tr>";
									echo "<td width='100'><img width='100' src='imagens/" . $linha["nomeFoto"] . "'></td>";
									echo "<td>" . $linha["produto"] . "</td>";
									echo "<td>" . $linha["descricaoProduto"] . "</td>";
									if ($linha["promocao"] == "s") {
										$precoUnitario = $linha["precoPromocao"];
									} else {
										$precoUnitario = $linha["precoVenda"];
									}
									$subTotal   = $precoUnitario * $qtd;
									$total += $precoUnitario * $qtd;

									echo "<td>" . number_format($qtd, 2, ',', '.') . "</td>";
									echo "<td>" . number_format($precoUnitario, 2, ',', '.') . "</td>";
									echo "<td>" . number_format($subTotal, 2, ',', '.') . "</td>";
									echo "<td><a href='?acao=remover&idProduto=$idProduto'><img width='60' src='imagens\icons\x-lg.svg'></a></td>";
								}
							}
							$total = number_format($total, 2, ',', '.');
							echo '<tr><td colspan="6">Total</td><td>R$ ' . $total . '</td></tr>';
							$_SESSION["total"] = $total;
						}
						$carrinho = implode("", $_SESSION['carrinho']);
						?>
					</tbody>
					</form>
				</table>
			</center>

			<br><br>

			<?php
			if (!isset($_SESSION["logado"]) || $_SESSION["logado"] != TRUE) {
				echo "<div class='alert alert-primary' role='alert'>Você não está logado</div>";
			} else {
				echo "Logado como " . $_SESSION["nome"] . ".";
				echo "<form action='admin/sair.php'>
						<button type='submit' class='btn btn-sm btn-outline-primary'>Sair</button>
					  </form>";
			}

			?>

			<input type="hidden" id="passa_session" value="<?php echo $carrinho; ?>" />

			<script>
				function voltar() {
					window.onsubmit = function() {
						return true;
					};
				}

				function verificarCarrinho() {
					var carrinho = document.getElementById("passa_session").value;

					if (carrinho == 0) {
						alert("O carrinho está vazio!");
						// abortando submit
						document.getElementById("passa_session").focus();
						window.onsubmit = function() {
							return false;
						};
					} else {
						return true;
					}
				}
			</script>
		</div>
	</div>

</body>

</html>