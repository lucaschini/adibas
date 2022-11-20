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
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../style/style.css" />
    <link rel="stylesheet" href="../style/style2.css" />
    <link rel="stylesheet" href="../style/styleadm.css">
    <script src="../bootstrap\node_modules\bootstrap\dist\js\bootstrap.bundle.js"></script>
    <title>Relatório de Vendas</title>
</head>

<body>
    <nav class="navbar bg-secondary" style="flex-wrap: nowrap">
        <div class="container-fluid" style="margin: 0">
            <a class="navbar-brand" href="index.php"><img src="../imagens/Adibas.png" alt="Logo" width="50" height="32"></a>
        </div>
    </nav>
    <div class="center-90" style="margin: 0 !important; padding: 0 !important">
        <div class="rounded-3 border shadow-lg bg-white" style="width: 90vw; padding: 1rem 1.5rem; min-height: 80vh">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-secondary active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                        Vendas Diárias
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-secondary" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">
                        Vendas Mensais
                    </button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0" style="padding: 1.5rem 0;">
                    <table align=center class="table table-hover " style="width: 100% !important;">
                        <thead>
                            <tr>
                                <th width="80">ID do Pedido</th>
                                <th width="80">ID do Cliente</th>
                                <th width="80">ID do Produto</th>
                                <th width="80">Quantidade</th>
                                <th width="80">Total Pago</th>
                                <th width="80">Data</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $conexao = mysqli_connect("localhost", "root", "", "adibas");
                            $sql = "SELECT *  FROM `tbpedido`";
                            $resultado = mysqli_query($conexao, $sql);
                            while ($linha = mysqli_fetch_array($resultado)) {
                                echo "<tr>";
                                echo "<td>" . $linha['idPedido'] . "</td>";
                                echo "<td>" . $linha['idCliente'] . "</td>";
                                echo "<td>" . $linha["idProduto"] . "</td>";
                                echo "<td>" . $linha["quantidade"] . "</td>";
                                echo "<td>" . $linha['precoPago'] . "</td>";
                                echo "<td>" . $linha['data'] . "</td>";
                                echo "</tr>";
                            } ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0" style="padding: 1.5rem 0;">
                    <table align=center class="table table-hover" style="width: 100% !important;">
                        <thead>
                            <tr>
                                <th width="80">ID do Pedido</th>
                                <th width="80">ID do Cliente</th>
                                <th width="80">ID do Produto</th>
                                <th width="80">Quantidade</th>
                                <th width="80">Total Pago</th>
                                <th width="80">Data</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $conexao = mysqli_connect("localhost", "root", "", "adibas");
                            $sql = "SELECT *  FROM `tbpedido`";
                            $resultado = mysqli_query($conexao, $sql);
                            while ($linha = mysqli_fetch_array($resultado)) {
                                echo "<tr>";
                                echo "<td>" . $linha['idPedido'] . "</td>";
                                echo "<td>" . $linha['idCliente'] . "</td>";
                                echo "<td>" . $linha["idProduto"] . "</td>";
                                echo "<td>" . $linha["quantidade"] . "</td>";
                                echo "<td>" . $linha['precoPago'] . "</td>";
                                echo "<td>" . $linha['data'] . "</td>";
                                echo "</tr>";
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>