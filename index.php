<?php
session_start();
//conectar com o banco de dados
$conexao = mysqli_connect("localhost", "root", "", "adibas");
$sql = "SELECT * FROM `tbproduto` where `ativo`='s' and `promocao`='s' order by produto";
$resultado = mysqli_query($conexao, $sql);

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Adibas</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style/style.css">
	<link rel="stylesheet" href="style/style2.css">
	<!-- Link Swiper's CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

	<script src="bootstrap\node_modules\bootstrap\dist\js\bootstrap.bundle.js"></script>


</head>

<body>
	<nav class="navbar bg-primary" style="flex-wrap: nowrap">
		<div class="container-fluid" style="margin: 0">
			<a class="navbar-brand" href="index.php"><img src="imagens/Adibas.png" alt="Logo" width="50" height="32"></a>
			<div class="d-grid gap-1">
				<a href="prod.php" style="text-align:center;"><button class="btn btn-primary" type="button" style="width: 40vw;	">Produtos</button></a>
			</div>

			<div>
				<a href="admin/login.php"><button type="button" class="btn btn-primary">
						<?php
						if (!isset($_SESSION["logado"]) || $_SESSION["logado"] != TRUE) {
							echo "Login";
						} else {
							echo '<img src="imagens/icons/user.svg" alt="User" width="50" height="32">';
						}
						?>
					</button></a>
				<button class="navbar-toggler" type="button">
					<a href="carrinho.php"><img src="imagens/icons/cart2.svg" alt="Carrinho" width="32" height="32"></a>
				</button>
			</div>
		</div>
	</nav>


	<div class="container my-5">
		<div class="row align-items-center rounded-3 border shadow-lg" style="padding: 2rem;">
			<div class="col-lg-4 offset-lg-1 p-0 overflow-hidden">
				<img class="rounded-lg-3" src="imagens/TENIS PNG/Tênis das Nuvens.png" alt="" width="100%">
			</div>
			<div class="col-lg-7 p-3 p-lg-5 pt-lg-3" style="height: 10vh; display:flex; flex-direction: column; align-items: center; justify-content: center;">
				<h1 class="display-4 fw-bold lh-1">Novo Nike Air Cloud</h1>
				<p class="lead">Confortável e leve, pra quem vive nas nuvens. ☁</p>
				<div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
					<a href="prod.php"><button type="button" class="btn btn-primary btn-lg px-4 me-md-2 fw-bold">Quero!</button></a>
				</div>
			</div>
		</div>
	</div>


	<div class="swiper mySwiper" style="height: 90vh;">
		<div class="swiper-wrapper">
			<div class="swiper-slide">
				<div class="card" style="width: 18em;">
					<img class="card-img-top" src="imagens\TENIS PNG\Tênis Banana.png" alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title">Air Banana</h5>
						<p class="card-text">Simples e pra todas as situações, pra você que não gosta de sair do básico. 🍌</p>
						<a href="prod.php" class="btn btn-primary">Quero!</a>
					</div>
				</div>
			</div>
			<div class="swiper-slide">
				<div class="card" style="width: 18em;">
					<img class="card-img-top" src="imagens\TENIS PNG\Tênis Meia-Noite.png" alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title">Air Midnight</h5>
						<p class="card-text">Para você que busca furtividade e simplicidade, mas deixando sua marca. 🐱‍👤</p>
						<a href="prod.php" class="btn btn-primary">Quero!</a>
					</div>
				</div>
			</div>
			<div class="swiper-slide">
				<div class="card" style="width: 18em;">
					<img class="card-img-top" src="imagens\TENIS PNG\Tênis Cítrico.png" alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title">Air Citric</h5>
						<p class="card-text">Para você que gosta de algo mais ousado, e não tem medo da acidez alheia. 🍋</p>
						<a href="prod.php" class="btn btn-primary">Quero!</a>
					</div>
				</div>
			</div>
			<div class="swiper-slide">
				<div class="card" style="width: 18em;">
					<img class="card-img-top" src="imagens\TENIS PNG\Tênis Maçã.png" alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title">Air Apple</h5>
						<p class="card-text">Para você que quer tirar a gravidade da cabeça e curtir. 🍎</p>
						<a href="prod.php" class="btn btn-primary">Quero!</a>
					</div>
				</div>
			</div>
			<div class="swiper-slide">
				<div class="card" style="width: 18em;">
					<img class="card-img-top" src="imagens\TENIS PNG\Tênis Flor.png" alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title">Air Flower</h5>
						<p class="card-text">Para você que é mais doce, e busca pelo estilo e conforto. 💐</p>
						<a href="prod.php" class="btn btn-primary">Quero!</a>
					</div>
				</div>
			</div>
			<div class="swiper-slide">
				<div class="card" style="width: 18em;">
					<img class="card-img-top" src="imagens\TENIS PNG\Tênis Pitaia.png" alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title">Air Dragon Fruit</h5>
						<p class="card-text">Para você que é diferenciado, e quer mostrar que não é como os outros. 🐉</p>
						<a href="prod.php" class="btn btn-primary">Quero!</a>
					</div>
				</div>
			</div>

		</div>
		<div class="swiper-button-next"></div>
		<div class="swiper-button-prev"></div>
		<div class="swiper-pagination"></div>
	</div>


	<div class="container col-xl-10 col-xxl-8 px-4 py-5">
		<div class="row align-items-center g-lg-5 py-5">
			<div class="col-lg-7 text-center text-lg-start">
				<h1 class="display-4 fw-bold lh-1 mb-3">Inscreva-se na nossa newsletter!😎</h1>

			</div>
			<div class="col-md-10 mx-auto col-lg-5">
				<form class="p-4 p-md-5 border rounded-3 bg-light">
					<div class="form-floating mb-3">
						<input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
						<label for="floatingInput">Endereço de email</label>
					</div>
					<button class="w-100 btn btn-lg btn-primary" type="submit">Quero receber as novidades!</button>
				</form>
			</div>
		</div>
	</div>

	<div class="container">
		<footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
			<p class="col-md-4 mb-0 text-muted">&copy; 2022 Company, Inc</p>

			<a href="index.php" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
				<img src="imagens/Adibas.png" alt="Logo" class="bi me-2" width="40" height="32">
			</a>

			<ul class="nav col-md-4 justify-content-end">
			</ul>
		</footer>
	</div>

	<!-- Swiper JS -->
	<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

	<!-- Initialize Swiper -->
	<script>
		var swiper = new Swiper(".mySwiper", {
			slidesPerView: 3,
			spaceBetween: 0,
			pagination: {
				el: ".swiper-pagination",
				clickable: true,
			},
			navigation: {
				nextEl: ".swiper-button-next",
				prevEl: ".swiper-button-prev",
			},
		});
	</script>
</body>

</html>