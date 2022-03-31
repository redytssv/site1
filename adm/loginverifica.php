<?php
session_start();
include('banco.php');

if (empty($_POST['login']) || empty($_POST['senha'])) {
	header("Location: index.php");
	exit();
}

$login = mysqli_real_escape_string($mysqli, $_POST['login']);
$senha = mysqli_real_escape_string($mysqli, $_POST['senha']);

$query = mysqli_query($mysqli, "SELECT * FROM administrador WHERE login = '{$login}' AND senha = '{$senha}' LIMIT 1");
$row = mysqli_num_rows($query);

if ($row == 1) {
	$_SESSION['login'] = $login;
	header('Location: painelapostas.php');
	exit();
}else {
	$_SESSION['naoexiste'] = true;
	header('Location: index.php');
	exit();
}

?>