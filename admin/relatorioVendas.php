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
    <script src="bootstrap\node_modules\bootstrap\dist\js\bootstrap.bundle.js"></script>
    <title>Relatório de Vendas</title>
</head>

<body>
    <nav class="navbar bg-secondary" style="flex-wrap: nowrap">
        <div class="container-fluid" style="margin: 0">
            <a class="navbar-brand" href="index.php"><img src="../imagens/Adibas.png" alt="Logo" width="50" height="32"></a>
        </div>
    </nav>
    <div class="center-prod">
        <h1 align='center'>Relatório de vendas</h1>
        
        <table align=center class="table table-hover shadow-lg" style="width: 80% !important;">
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
</body>

</html>
