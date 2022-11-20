<?php
session_start();
if (!isset($_SESSION["logado"]) || $_SESSION["logado"] != TRUE) {
	header("Location: login.php");
}

//conectar com o banco de dados
$conexao = mysqli_connect("localhost", "root", "", "adibas");
if ($_SESSION["funcao"] === "cliente") {
	$sql = "SELECT * FROM `tbcliente` where idCliente='" . $_SESSION["idCliente"] . "'";
}
$resultado = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../style/style.css" />
    <link rel="stylesheet" href="../style/style2.css" />
    <script src="../bootstrap\node_modules\bootstrap\dist\js\bootstrap.bundle.js"></script>
    <title>Cliente</title>
  </head>

  <body class="bg-primary">
    <!-- NAVBAR -->
    <nav class="navbar bg-primary shadow-lg" style="flex-wrap: nowrap">
      <div class="container-fluid" style="margin: 0">
        <a class="navbar-brand" href="../index.php"><img src="../imagens/Adibas.png" alt="Logo" width="50" height="32"></a>
        <div class="d-grid gap-1">
          <a href="../prod.php" style="text-align:center;"><button class="btn btn-primary" type="button" style="width: 40vw;	">Produtos</button></a>
        </div>

        <div>
          <a href="login.php"><button type="button" class="btn btn-primary">
              <?php
              if (!isset($_SESSION["logado"]) || $_SESSION["logado"] != TRUE) {
                echo "Login";
              } else {
                echo '<img src="../imagens/icons/user.svg" alt="User" width="50" height="32">';
              }
              ?>
            </button></a>
          <button class="navbar-toggler" type="button">
            <a href="../carrinho.php"><img src="../imagens/icons/cart2.svg" alt="Carrinho" width="32" height="32"></a>
          </button>
        </div>
      </div>
    </nav>
    
    <div class="center-90" style="margin: 0 !important; padding: 0 !important">
      <div
        class="rounded-3 border shadow-lg bg-white"
        style="width: 80vw; padding: 1rem 1.5rem; min-height: 70vh"
      >
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button
              class="nav-link"
              id="disabled-tab"
              data-bs-toggle="tab"
              data-bs-target="#disabled-tab-pane"
              type="button"
              role="tab"
              aria-controls="disabled-tab-pane"
              aria-selected="false"
              disabled
            >
              Olá, user!😃
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button
              class="nav-link active"
              id="home-tab"
              data-bs-toggle="tab"
              data-bs-target="#home-tab-pane"
              type="button"
              role="tab"
              aria-controls="home-tab-pane"
              aria-selected="true"
            >
              Meus dados
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button
              class="nav-link"
              id="profile-tab"
              data-bs-toggle="tab"
              data-bs-target="#profile-tab-pane"
              type="button"
              role="tab"
              aria-controls="profile-tab-pane"
              aria-selected="false"
            >
              Meus pedidos
            </button>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div
            class="tab-pane fade show active"
            id="home-tab-pane"
            role="tabpanel"
            aria-labelledby="home-tab"
            tabindex="0"
            style="padding: 1.5rem 0;"
          >
            
          <table align=center class="table table-hover shadow-lg" style="width: 80% !important;">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Rua</th>
                <th>Bairro</th>
                <th>Telefone</th>
              </tr>
            </thead>
            <tbody>
              <?php
              while ($linha = mysqli_fetch_array($resultado)) {
              echo "<tr>";
              echo "<td width='5%'>" . $linha["idCliente"] . "</td>";
              echo "<td width='20%'>" . $linha["nome"] . "</td>";
              echo "<td width='15%'>" . $linha["email"] . "</td>";
              echo "<td width='15%'>" . $linha["rua"] . "</td>";
              echo "<td width='15%'>" . $linha["bairro"] . "</td>";
              echo "<td width='15%'>" . $linha["fone"] . "</td>";
              $dados = "idCliente=" . $linha["idCliente"] .
                  "&nome=" . $linha["nome"] .
                  "&email=" . $linha["email"] .
                  "&rua=" . $linha["rua"] .
                  "&bairro=" . $linha["bairro"] .
                  "&fone=" . $linha["fone"];
                
                  echo "</tr>";
              }     
              mysqli_close($conexao);
              ?>
              </tbody>
            </table>

            <?php
              echo "<a href=\"alterarCliente.php?$dados\"><button type='button' class='btn btn-primary' style='margin: 1rem 0;'>Alterar dados pessoais</button></a>";
      
              echo "<a href=\"trocarSenhaCliente.php?$dados\"><button type='button' class='btn btn-primary' style='margin: 1rem 1rem;'>Alterar senha</button></a>";
            ?>
            <form action="sair.php">
              <button type="submit" class="btn btn-primary">Sair da conta</button>
          </form>
          </div>
          <div
            class="tab-pane fade"
            id="profile-tab-pane"
            role="tabpanel"
            aria-labelledby="profile-tab"
            tabindex="0"
            style="padding: 1.5rem 0;"
          >
            <div class="grid-p">

              <div class="card mb-3" style="max-width: 540px">
                <div class="row g-0">
                  <div class="col-md-4 p-3">
                    <img src="../imagens/box-seam.svg" class="img-fluid rounded-start" alt="box" width="100%"/>
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">Pedido NºX</h5>
                      <p class="card-text">
                        Itens do pedido
                      </p>
                      <div class="alert alert-primary" role="alert">
                        Status: A caminho!
                      </div>
                      <div class="alert alert-status" role="alert">
                        Status: Entregue!
                      </div>
                      <button type="button" class="btn btn-outline-primary"><img src="../imagens/icons/repeat.svg" alt="">  Repetir Compra</button>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
