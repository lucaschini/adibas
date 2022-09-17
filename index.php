<?php
session_start();
//conectar com o banco de dados
$conexao = mysqli_connect("localhost", "root", "", "dogao");
$sql = "SELECT * FROM `tbproduto` where `ativo`='s' and `promocao`='s' order by produto";
$resultado = mysqli_query($conexao, $sql);

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Dogão Lanches</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style/style.css">

	<script src="bootstrap\node_modules\bootstrap\dist\js\bootstrap.bundle.js"></script>

</head>

<body>
	<nav class="navbar bg-primary" style="flex-wrap: nowrap">
		<div class="container-fluid" style="margin: 0">
			<a class="navbar-brand" href="#">Navbar</a>
			<div>
				<a class="navbar-brand" href="#">Navbar</a>
				<a class="navbar-brand" href="#">Navbar</a>
				<a class="navbar-brand" href="#">Navbar</a>
			</div>

			<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
				<div class="offcanvas-header">
					<h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
					<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
				</div>
				<div class="offcanvas-body" style="padding: 0">
					<div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-white" style="width: 380px">
						<a href="/" class="d-flex align-items-center flex-shrink-0 p-3 link-dark text-decoration-none border-bottom">
							<svg class="bi pe-none me-2" width="30" height="24">
								<use xlink:href="#bootstrap" />
							</svg>
							<span class="fs-5 fw-semibold">List group</span>
						</a>
						<div class="list-group list-group-flush border-bottom scrollarea">
							<a href="#" class="list-group-item list-group-item-action active py-3 lh-sm" aria-current="true">
								<div class="d-flex w-100 align-items-center justify-content-between">
									<strong class="mb-1">List group item heading</strong>
									<small>Wed</small>
								</div>
								<div class="col-10 mb-1 small">
									Some placeholder content in a paragraph below the heading
									and date.
								</div>
							</a>
							<a href="#" class="list-group-item list-group-item-action py-3 lh-sm">
								<div class="d-flex w-100 align-items-center justify-content-between">
									<strong class="mb-1">List group item heading</strong>
									<small class="text-muted">Tues</small>
								</div>
								<div class="col-10 mb-1 small">
									Some placeholder content in a paragraph below the heading
									and date.
								</div>
							</a>
							<a href="#" class="list-group-item list-group-item-action py-3 lh-sm">
								<div class="d-flex w-100 align-items-center justify-content-between">
									<strong class="mb-1">List group item heading</strong>
									<small class="text-muted">Mon</small>
								</div>
								<div class="col-10 mb-1 small">
									Some placeholder content in a paragraph below the heading
									and date.
								</div>
							</a>

							<a href="#" class="list-group-item list-group-item-action py-3 lh-sm" aria-current="true">
								<div class="d-flex w-100 align-items-center justify-content-between">
									<strong class="mb-1">List group item heading</strong>
									<small class="text-muted">Wed</small>
								</div>
								<div class="col-10 mb-1 small">
									Some placeholder content in a paragraph below the heading
									and date.
								</div>
							</a>
							<a href="#" class="list-group-item list-group-item-action py-3 lh-sm">
								<div class="d-flex w-100 align-items-center justify-content-between">
									<strong class="mb-1">List group item heading</strong>
									<small class="text-muted">Tues</small>
								</div>
								<div class="col-10 mb-1 small">
									Some placeholder content in a paragraph below the heading
									and date.
								</div>
							</a>
							<a href="#" class="list-group-item list-group-item-action py-3 lh-sm">
								<div class="d-flex w-100 align-items-center justify-content-between">
									<strong class="mb-1">List group item heading</strong>
									<small class="text-muted">Mon</small>
								</div>
								<div class="col-10 mb-1 small">
									Some placeholder content in a paragraph below the heading
									and date.
								</div>
							</a>
							<a href="#" class="list-group-item list-group-item-action py-3 lh-sm" aria-current="true">
								<div class="d-flex w-100 align-items-center justify-content-between">
									<strong class="mb-1">List group item heading</strong>
									<small class="text-muted">Wed</small>
								</div>
								<div class="col-10 mb-1 small">
									Some placeholder content in a paragraph below the heading
									and date.
								</div>
							</a>
							<a href="#" class="list-group-item list-group-item-action py-3 lh-sm">
								<div class="d-flex w-100 align-items-center justify-content-between">
									<strong class="mb-1">List group item heading</strong>
									<small class="text-muted">Tues</small>
								</div>
								<div class="col-10 mb-1 small">
									Some placeholder content in a paragraph below the heading
									and date.
								</div>
							</a>
							<a href="#" class="list-group-item list-group-item-action py-3 lh-sm">
								<div class="d-flex w-100 align-items-center justify-content-between">
									<strong class="mb-1">List group item heading</strong>
									<small class="text-muted">Mon</small>
								</div>
								<div class="col-10 mb-1 small">
									Some placeholder content in a paragraph below the heading
									and date.
								</div>
							</a>
							<a href="#" class="list-group-item list-group-item-action py-3 lh-sm" aria-current="true">
								<div class="d-flex w-100 align-items-center justify-content-between">
									<strong class="mb-1">List group item heading</strong>
									<small class="text-muted">Wed</small>
								</div>
								<div class="col-10 mb-1 small">
									Some placeholder content in a paragraph below the heading
									and date.
								</div>
							</a>
							<a href="#" class="list-group-item list-group-item-action py-3 lh-sm">
								<div class="d-flex w-100 align-items-center justify-content-between">
									<strong class="mb-1">List group item heading</strong>
									<small class="text-muted">Tues</small>
								</div>
								<div class="col-10 mb-1 small">
									Some placeholder content in a paragraph below the heading
									and date.
								</div>
							</a>
							<a href="#" class="list-group-item list-group-item-action py-3 lh-sm">
								<div class="d-flex w-100 align-items-center justify-content-between">
									<strong class="mb-1">List group item heading</strong>
									<small class="text-muted">Mon</small>
								</div>
								<div class="col-10 mb-1 small">
									Some placeholder content in a paragraph below the heading
									and date.
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</nav>
	<h1 align='center'>Aproveite a Promoção</h1>
	<table border=1 align=center width=80%>
		<thead>
			<tr>
				<th colspan="3">Descrição do Produto</th>
				<th>De</th>
				<th>Por</th>
				<th>Adicionar ao carrinho</th>
			</tr>
		</thead>
		<tbody>
			<?php
			while ($linha = mysqli_fetch_array($resultado)) {
				echo "<tr>";
				echo "<td align='center' width='200'><img width='180' src='imagens/" . $linha["nomeFoto"] . "'></td>";
				echo "<td align='center'><h1>" . $linha["produto"] . "</h1></td>";
				echo "<td align='center'><h1>" . $linha["descricaoProduto"] . "</h1></td>";
				echo "<td align='center'><h1><s>" . $linha["precoVenda"] . "</h1></s></td>";
				echo "<td align='center'><h1>" . $linha["precoPromocao"] . "</h1></td>";
				echo "<td align='center' width=120>" .
					"<a href=\"carrinho.php?acao=adicionar&idProduto=" . $linha["idProduto"] . "\"><img width=\"20%\" src=\"adicionar.png\"> </a>" .
					"</td>";
			?>


			<?php

				echo "</td>";
				echo "</tr>";
			}

			?>
		</tbody>
	</table>
	<p></p>
	<?php
	$sql = "SELECT * FROM `tbproduto` where `ativo`='s' and `promocao`='n' order by produto";
	$resultado = mysqli_query($conexao, $sql);

	?>
	<h1 align='center'>Lista de Produtos</h1>
	<table border=1 align=center width=80%>
		<thead>
			<tr>
				<th colspan="3">Descrição do Produto</th>
				<th>Preço</th>
				<th>Adicionar ao carrinho</th>
			</tr>
		</thead>
		<tbody>
			<?php
			while ($linha = mysqli_fetch_array($resultado)) {
				echo "<tr>";
				echo "<td align='center' width='180'><img width='160' src='imagens/" . $linha["nomeFoto"] . "'></td>";
				echo "<td align='center'><h3>" . $linha["produto"] . "</h3></td>";
				echo "<td align='center'><h3>" . $linha["descricaoProduto"] . "</h3></td>";
				echo "<td align='center'><h3>" . $linha["precoVenda"] . "</h3></td>";
				echo "<td  align='center' width=120>" .
					"<a href=\"carrinho.php?acao=adicionar&idProduto=" . $linha["idProduto"] . "\"><img width=\"20%\" src=\"adicionar.png\"> </a>" .
					"</td>";
			?>


			<?php

				echo "</td>";
				echo "</tr>";
			}

			mysqli_close($conexao);
			?>
		</tbody>
	</table>
	<p></p>

	<form action="carrinho.php">
		<input type="hidden" name="acao" value="limpar">
		<button type='submit'>Limpar carrinho</button>
	</form>
	<p></p>
	<form action="carrinho.php">
		<input type="hidden" name="acao" value="finalizar">
		<button type='submit'>Conferir carrinho</button>
	</form>
	<p></p>

</body>

</html>