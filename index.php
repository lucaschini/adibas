<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Dogão Lanches</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/meu.css">

	<script>
	</script>

	</head>
<body>
<?php
	session_start();
	//conectar com o banco de dados
	$conexao = mysqli_connect("localhost", "root", "", "dogao");
	$sql = "SELECT * FROM `tbproduto` where `ativo`='s' and `promocao`='s' order by produto";
	$resultado = mysqli_query($conexao,$sql); 

?>
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
while($linha = mysqli_fetch_array($resultado)){
	echo "<tr>";
	echo "<td align='center' width='200'><img width='180' src='imagens/".$linha["nomeFoto"]."'></td>";
	echo "<td align='center'><h1>".$linha["produto"]."</h1></td>";
	echo "<td align='center'><h1>".$linha["descricaoProduto"]."</h1></td>";
	echo "<td align='center'><h1><s>".$linha["precoVenda"]."</h1></s></td>";
	echo "<td align='center'><h1>".$linha["precoPromocao"]."</h1></td>";
	echo "<td align='center' width=120>".
	     "<a href=\"carrinho.php?acao=adicionar&idProduto=".$linha["idProduto"]."\"><img width=\"20%\" src=\"adicionar.png\"> </a>".
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
	$resultado = mysqli_query($conexao,$sql); 

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
while($linha = mysqli_fetch_array($resultado)){
	echo "<tr>";
	echo "<td align='center' width='180'><img width='160' src='imagens/".$linha["nomeFoto"]."'></td>";
	echo "<td align='center'><h3>".$linha["produto"]."</h3></td>";
	echo "<td align='center'><h3>".$linha["descricaoProduto"]."</h3></td>";
	echo "<td align='center'><h3>".$linha["precoVenda"]."</h3></td>";
	echo "<td  align='center' width=120>".
	     "<a href=\"carrinho.php?acao=adicionar&idProduto=".$linha["idProduto"]."\"><img width=\"20%\" src=\"adicionar.png\"> </a>".
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
