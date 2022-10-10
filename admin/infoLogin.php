<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Adibas</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/style2.css">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

    <script src="bootstrap\node_modules\bootstrap\dist\js\bootstrap.bundle.js"></script>


</head>

<body>
    <nav class="navbar bg-primary" style="flex-wrap: nowrap">
        <div class="container-fluid" style="margin: 0">
            <a class="navbar-brand" href="../index.php"><img src="../imagens/Adibas.png" alt="Logo" width="50" height="32"></a>
            <div class="d-grid gap-1">
                <a href="prod.php" style="text-align:center;"><button class="btn btn-primary" type="button" style="width: 40vw;	">Produtos</button></a>
            </div>

            <div>
                <a href="admin/login.php"><button type="button" class="btn btn-primary">Login</button></a>
                <button class="navbar-toggler" type="button">
                    <a href="../carrinho.php"><img src="../imagens/icons/cart2.svg" alt="Carrinho" width="32" height="32"></a>
                </button>
            </div>
        </div>
    </nav>


    <div class="center"  style="margin: 0 !important; padding: 0 !important;">
        <div class="container">
            <h1 id="mensagem" style="color:red;"></h1>
            <div class="row align-items-center rounded-3 border shadow-lg bg-white" style="padding: 2rem; justify-content: space-around">
                <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
                    <main class="form-signin w-100 m-auto">
                        <?php
                        if ((isset($_SESSION["logado"])) && ($_SESSION["logado"] == TRUE)) {
                            echo "Olá, " . $_SESSION['nome'];
                            echo "<br>ID de usuário: " . $_SESSION['idCliente'];
                            echo "<br>Email: " . $_SESSION['email'];
                            echo "<br>Rua: " . $_SESSION['rua'];
                            echo "<br>Bairro: " . $_SESSION['bairro'];
                            echo "<br>Telefone: " . $_SESSION['fone'];
                        } else {
                            header("location: login.php");
                        }
                        ?>

                        <form action="../index.php">
                            <button type="submit" class="btn btn-primary">Voltar</button>
                        </form>
                        <br>
                        <form action="sair.php">
                            <button type="submit" class="btn btn-primary">Sair da conta</button>
                        </form>
                    </main>
                </div>
            </div>
        </div>
    </div>

</body>

</html>