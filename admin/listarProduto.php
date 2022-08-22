<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Dogão Lanches</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/meu.css">

	<script>
	</script>

	</head>
<body>
<?php
	session_start();
	if (!isset($_SESSION["logado"])||$_SESSION["logado"]!= TRUE) {
		header("Location: login.php");
	}

	//conectar com o banco de dados
	$conexao = mysqli_connect("localhost", "root", "", "dogao");
	$sql = "SELECT * FROM `tbproduto` where ativo='s'order by produto";
	$resultado = mysqli_query($conexao,$sql); 

?>
<h1 align='center'>Lista de Produtos</h1>
<table border=1 align=center width=90%>
  <thead>
    <tr>
      <th>#ID</th>
	  <th>Foto</th>
      <th>Produto</th>
      <th>Descrição do Produto</th>
      <th>Preço Venda</th>
	  <th>Promoção</th>
	  <th>Preço Procoção</th>
	  <th>Ação</th>
    </tr>
  </thead>
<tbody>
<?php
while($linha = mysqli_fetch_array($resultado)){
	echo "<tr>";
	echo "<td width='5%'>".$linha["idProduto"]."</td>";
	echo "<td width='20%'><img width='30%' src='../imagens/".$linha["nomeFoto"]."'></td>";
	echo "<td width='15%'>".$linha["produto"]."</td>";
	echo "<td>".$linha["descricaoProduto"]."</td>";
	echo "<td>".$linha["precoVenda"]."</td>";
	echo "<td>".$linha["promocao"]."</td>";
	echo "<td>".$linha["precoPromocao"]."</td>";
	$dados="idProduto=".$linha["idProduto"].
	       "&produto=".$linha["produto"].
		   "&descricaoProduto=".$linha["descricaoProduto"].
		   "&precoVenda=".$linha["precoVenda"].
		   "&promocao=".$linha["promocao"].
		   "&precoPromocao=".$linha["precoPromocao"].
		   "&nomeFoto=".$linha["nomeFoto"];
	echo "<td width=120>".
	     "<a href=\"visualizarProduto.php?$dados\"><img width=\"20%\" src=\"visualizar.png\"> </a>".
		 "<a href=\"alterarProduto.php?$dados\"><img width=\"20%\" src=\"edit.png\"> </a>".
		 "<a href=\"excluirProduto.php?$dados\"><img width=\"20%\" src=\"cancel.png\"> </a>".
		 "<a href=\"promocaoProduto.php?$dados\"><img width=\"20%\" src=\"promocao.png\"> </a>".
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
<form action="index.php">
<button type='submit'>Voltar</button>
</form>
<p></p>
<form action="incluirProduto.php">
<button type='submit'>Novo Produto</button>
</form>

</body>
</html>
