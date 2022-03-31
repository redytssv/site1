<?php 
include("banco.php");

$id = $_GET['id'];

$result = mysqli_query($mysqli, "DELETE FROM jogos WHERE id_jogos=$id");

header("Location:painelapostas.php");
?>