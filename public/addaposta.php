<?php 
include("banco.php");

$result = mysqli_query($mysqli, "SELECT * FROM apostas ORDER BY id_ap");
$res = mysqli_fetch_array($result);


$id = $_GET['id'];
$valor = $_GET['value'];



echo $ids;
/*if ($id != $res['id_jogo1']) {
    $result = mysqli_query($mysqli, " UPDATE apostas SET id_jogo1 = $id WHERE 1 ");
} if ($id != $res['id_jogo2']) {
    $result = mysqli_query($mysqli, " UPDATE apostas SET id_jogo2 = $id WHERE 1 ");
} else {
     $result = mysqli_query($mysqli, " INSERT INTO apostas(id_jogo1, result_1, id_jogo2, result_2, id_jogo3, result_3, id_jogo4, result_4, id_jogo5, result_5) VALUES ($id, 'casa', $id, '', $id, '', $id, '', $id, '') ");
}*/
?>