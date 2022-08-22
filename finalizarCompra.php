 <?php
	session_start();
	unset($_SESSION['carrinho']);
	$_SESSION['carrinho'] = array();
	echo "Compra registra com sucesso!";
?>
<form action="index.php">
<button type='submit'>continuar comprando</button>
</form>