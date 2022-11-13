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

<body class="center">
    <div style="margin: 0 !important; padding: 0 !important; width: 80vw;">
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