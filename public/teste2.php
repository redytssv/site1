<?php
  session_start();

  $itens = array(['nome' => 'curso1', 'imagem' => './imgs/img1.jpeg', 'preco' => '100'],
                 ['nome' => 'curso2', 'imagem' => './imgs/img1.jpeg', 'preco' => '200'],
                 ['nome' => 'curso3', 'imagem' => './imgs/img1.jpeg', 'preco' => '300']);

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>carrinho</title>
  <style type="text/css">
    *{margin: 0; padding: 0; box-sizing: border-box;}
    h2.title{
      background-color: #069;
      width: 100%;
      padding: 20px;
      text-align: center;
      color: white;
    }
    .carrinho-container{
      display: flex;
      margin-top: 10px;
      margin-bottom: 10px;
    }
    .produtos{
      width: 33.3%;
      padding: 0 30px;
    }
    .produtos img{
      max-width: 100%;
    }
    .produtos a{
      display: block;
      width: 100%;
      padding: 10px;
      color: white;
      background-color: #5fb382;
      text-align: center;
      text-decoration: none;
    }
    .carrionho-iten{
      max-width: 1200px;
      margin: 10px auto;
      padding-bottom: 10px;
      border-bottom: 2px dotted #ccc;
    }
    .carrionho-iten p{
      font-size: 16px;
      color: gray;
    }
  </style>
</head>
<body>
  <h2 class="title">Carrinho com php</h2>
  <div class="carrinho-container">
<?php 
  foreach ($itens as $key => $value) {
?>
  <div class="produtos">
    <img src="<?php echo $value['imagem'] ?>" />
    <a href="?adicionar=<?php echo $key ?>">adicionar ao carrinho</a>
  </div>
<?php  
  }
?>
</div>

<?php 
  if (isset($_GET['adicionar'])) {
    $idProduto = (int) $_GET['adicionar'];
    if (isset($itens[$idProduto])) {
      if (isset($_SESSION['carrinho'][$idProduto])) {
        $_SESSION['carrinho'][$idProduto]['quantidade']++;
      }else {
        $_SESSION['carrinho'][$idProduto] = array('quantidade'=>1,'nome'=>$itens[$idProduto]['nome'],'preco'=>$itens[$idProduto]['preco']);
      }
      echo "<script>alert('O item foi adicionado com sucesso!');</script>";
    } else {
      die('Você não pode adicionar um iten que não existe');
    }
  }
?>

  <h2 class="title">Carrinho</h2>

  <?php  
  foreach ($_SESSION['carrinho'] as $key => $value) {
    echo "<div class='carrionho-iten'>";
    echo '<p>Nome: '.$value['nome'].' | Quantidade: '.$value['quantidade'].' | Preço: '.($value['preco'] * $value['quantidade']).'</p>';
    echo "</div>";
  }
  ?>

</body>
</html>