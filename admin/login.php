<?php
session_start();
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
  <title>Login</title>
</head>

<body class="body-login bg-primary" style="height:100vh;">
  <nav class="navbar bg-primary shadow-lg" style="flex-wrap: nowrap">
    <div class="container-fluid" style="margin: 0">
      <a class="navbar-brand" href="../index.php"><img src="../imagens/Adibas.png" alt="Logo" width="50" height="32"></a>
    </div>
  </nav>

  <?php
  if ((isset($_SESSION["logado"])) && ($_SESSION["logado"] == TRUE) && ($_SESSION["funcao"] == 'gerente')) {
    header("Location: index.php");
  } else if ((isset($_SESSION["logado"])) && ($_SESSION["logado"] == TRUE) && ($_SESSION["funcao"] == 'cliente')) {
    //O cliente ja efetuou o login então ele vai para a página de informações
    header("Location: infologin.php");
  } else {
    // Verificando se o usário digitou email e  senha e clicou em "logar"
    if ((isset($_POST["email"])) && (isset($_POST["senha"]))) {

      $conexao = mysqli_connect("localhost", "root", "", "adibas");
      /* 
			
			Verificando se existem funcionario cadastrados. Caso não tenha será
			criado um funcionario chamado supervisor e o ID reiniciado
			
			*/
      $sql = "SELECT * FROM `tbFunc`;";
      $resultado = mysqli_query($conexao, $sql);

      if (!($linha = mysqli_fetch_array($resultado))) {
        //reiniciando a chave primaria
        $sql = "ALTER TABLE `tbfunc` AUTO_INCREMENT = 0;";
        $resultado = mysqli_query($conexao, $sql);

        //criando o usuário supervidor
        $email = "supervisor@supervisor.com";
        $senha = "supervisor";

        $sql = "INSERT INTO `tbfunc` (`idFunc`, `email`, `senha`, `nome`, `funcao`) VALUES (NULL, '$email', '$senha', 'supervisor', 'gerente');";
        $resultado = mysqli_query($conexao, $sql);
      }

      $email = $_POST["email"];
      $senha = $_POST["senha"];

      $sql = "SELECT * FROM `tbFunc` WHERE `ativo`='s' AND `email` = '$email' AND `senha` = '$senha'";
      $resultado = mysqli_query($conexao, $sql);
      if ($linha = mysqli_fetch_array($resultado)) {
        $_SESSION["idFunc"] = $linha["idFunc"];
        $_SESSION["logado"] = TRUE;
        $_SESSION["funcao"] = $linha["funcao"];
        $_SESSION["nome"] = $linha["nome"];
        header("Location: index.php");
      } else {
        $sql = "SELECT * FROM `tbcliente` WHERE `email` = '$email' AND `senha` = '$senha'";
        $resultado = mysqli_query($conexao, $sql);
        if ($linha = mysqli_fetch_array($resultado)) {
          $_SESSION["idCliente"] = $linha["idCliente"];
          $_SESSION["logado"] = TRUE;
          $_SESSION["nome"] = $linha["nome"];
          $_SESSION['email'] = $linha['email'];
          $_SESSION['senha'] = $linha['senha'];
          $_SESSION['rua'] = $linha['rua'];
          $_SESSION['bairro'] = $linha['bairro'];
          $_SESSION['fone'] = $linha['telefone'];
          $_SESSION["funcao"] = $linha["funcao"];

          header("Location: infologin.php");
        } else { ?>
          <script>
            document.getElementById('mensagem').innerHTML = "Email e/ou Senha inválidados!"
          </script>
  <?php
        }
      }
    }
  }
  ?>
  <?php
  if (!isset($_SESSION["logado"]) || $_SESSION["logado"] != TRUE) {
    if (isset($_POST["email"]) && ($_POST["email"] !== "")) {
      // Inclusão de cliente
      $conexao = mysqli_connect("localhost", "root", "", "adibas");

      $email = $_POST['email'];
      $nome = $_POST['nome'];
      $senha = $_POST['senha'];
      $rua = $_POST['rua'];
      $bairro = $_POST['bairro'];
      $fone = $_POST['fone'];

      $sql = "SELECT * FROM `tbcliente` WHERE `email` = '$email'";
      $resultado = @mysqli_query($conexao, $sql);
      if ($linha = mysqli_fetch_array($resultado)) {
        mysqli_close($conexao);
        header("Location: cadastroCliente.php?emailJaCadastrado=" . $linha["email"]);
      } else {
        // criando a linha de INSERT
        $sql = "INSERT INTO `tbcliente` (`idCliente`, `nome`, `email`, `senha`, `rua`, `bairro`, `fone`, `funcao`) VALUES (NULL, '$nome', '$email', '$senha', '$rua','$bairro', '$fone', 'cliente')";
        // executando instrução SQL
        $resultado = @mysqli_query($conexao, $sql);
        if (!$resultado) {
          die('Query Inválida: ' . @mysqli_error($conexao));
          echo "<form action='infoLogin.php' onsubmit='window.onsubmit = function() { return true; };'>";
          echo "<button type='submit'>Voltar</button>";
          echo "</form>";
        }
        mysqli_close($conexao);
        header("Location: infoLogin.php");
      }
    }
  }
  ?>
  <div class="center">
    <div class="container">
      <h1 id="mensagem" style="color:red;"></h1>
      <div class="row align-items-center rounded-3 border shadow-lg bg-white" style="padding: 2rem; justify-content: space-around">
        <div class="col-lg-4 p-0 overflow-hidden">
          <img class="rounded-lg-3" src="../imagens/login.jpg" alt="" width="100%" />
        </div>
        <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
          <main class="form-signin w-100 m-auto">
            <h1 class="display-4 fw-bold lh-1">Login</h1>



            <form id="form" action="login.php" method="post">
              <div class="form-floating" style="margin-top: 1rem">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" />
                <label for="floatingInput">Email</label>
              </div>

              <div class="form-floating" style="margin-top: 1rem">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="senha" />
                <label for="floatingPassword">Senha</label>
              </div>

              <button class="w-100 btn btn-lg btn-primary" style="margin-top: 1rem" type="submit">
                Entrar
              </button>
              <a href="cadastroCliente.php" class="link-primary">Não tenho uma conta</a>
            </form>
          </main>
        </div>
      </div>
    </div>
  </div>

  <?php
  if (isset($_GET["emailJaCadastrado"])) { ?>
    var emailJaCadastrado = <?php echo "\"" . $_GET["emailJaCadastrado"] . "\""; ?>;
    document.getElementById('mensagem').innerHTML = "Email: "+emailJaCadastrado+" já cadastrado!";<?php
                                                                                                } ?>
</body>

</html>