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
	<link rel="stylesheet" href="style/style2.css">

	<script src="bootstrap\node_modules\bootstrap\dist\js\bootstrap.bundle.js"></script>

</head>

<body>
	<nav class="navbar bg-primary" style="flex-wrap: nowrap">
		<div class="container-fluid" style="margin: 0">
			<a class="navbar-brand" href="#">Logo</a>
			<div class="d-grid gap-1" style="width: 40vw;">
				<button class="btn btn-primary" type="button">Produtos</button>
			</div>

			<div>
				<button type="button" class="btn btn-primary">Login</button>
				<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
				<img src="imagens/icons/cart2.svg" alt="Carrinho" width="32" height="32">
				</button>
			</div>

			<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
				<div class="offcanvas-header">
					<h5 class="offcanvas-title" id="offcanvasNavbarLabel">Carrinho</h5>
					<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
				</div>
				<div class="offcanvas-body" style="padding: 0">
					<div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-white" style="width: 380px">
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

	<div class="container my-5">
		<div class="row align-items-center rounded-3 border shadow-lg" style="padding: 2rem;">
			<div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg">
				<img class="rounded-lg-3" src="imagens/Imagens Tênis PAW/Tênis das Nuvens.jpg" alt="" width="100%">
			</div>
			<div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
				<h1 class="display-4 fw-bold lh-1">Novo Nike Gray Soul</h1>
				<p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
				<div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
					<button type="button" class="btn btn-secondary btn-lg px-4 me-md-2 fw-bold">Quero!</button>
				</div>
			</div>
		</div>
	</div>


	<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
		<div class="carousel-inner" style="height: 40vh; ">
			<div class="carousel-item active" style="height: 40vh; display:flex; justify-content:center; gap:10vw;">
				<div class="card" style="width: 18rem;">
					<img src="..." class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title">Card title</h5>
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						<a href="#" class="btn btn-primary">Go somewhere</a>
					</div>
				</div>
				<div class="card" style="width: 18rem;">
					<img src="..." class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title">Card title</h5>
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						<a href="#" class="btn btn-primary">Go somewhere</a>
					</div>
				</div>
				<div class="card" style="width: 18rem;">
					<img src="..." class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title">Card title</h5>
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						<a href="#" class="btn btn-primary">Go somewhere</a>
					</div>
				</div>
			</div>
		</div>
		<button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
			<span class="carousel-control-prev-icon bg-primary rounded-5" aria-hidden="true" style="padding: 2rem;"></span>
			<span class="visually-hidden">Previous</span>
		</button>
		<button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
			<span class="carousel-control-next-icon bg-primary rounded-5" aria-hidden="true" style="padding: 2rem;"></span>
			<span class="visually-hidden">Next</span>
		</button>
	</div>

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