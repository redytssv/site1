<?php
session_start();
ob_start();
include_once("banco.php");


if(isset($_POST['imgPerfil']) || isset($_POST['time_1']) || isset($_POST['imgPerfil2']) || isset($_POST['time_2']) ){
  $img = $_POST['imgPerfil'];
  $img2 = $_POST['imgPerfil2'];
  $time1 = $_POST['time_1'];
  $time2 = $_POST['time_2'];
  mysqli_query($mysqli, "INSERT INTO jogos (time1, img_time1, time2, img_time2) VALUES ('$time1', '$img', '$time2', '$img2')");

}
/*if (isset($_POST['Submit'] )) {

    $time1 = mysqli_real_escape_string($mysqli, $_POST['time1']);
    $time2 = mysqli_real_escape_string($mysqli, $_POST['time2']);

    //$query = mysqli_query($mysqli, "INSERT INTO jogos(time1, time2) VALUES ('$time1', '$time2')");

    header('Location: teste.php');

    $_SESSION['cadastrado'] = '<div style="background-color: green; height: 100px; width: 250px; text-align: center;                                align-items: center; border-radius: 10px;">
                                   <h3 style="color: white; margin-top: 13px;">cadastrado com sucesso!</h3>
                                   </div>';
}*/

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>teste</title>
    <link rel="stylesheet" type="text/css" href="./css.css">
    <link rel="stylesheet" href="./cssteste.css">
     <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>

<body>

  <header>
    <div class="submenu">
        <a href="painelapostas.php">Voltar ao inicio</a>
    </div>
</header>

<main style="height: 450px;">
    <div style="margin-top: 15vh;" class="box">

        <div class="img_box">
            <div class="caixaimg">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class = "image-circu ">
                            <img  id="imgPerfil" src = "./imgs/img1.jpeg" width="100" height="80" />  
                        </div>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <button style="border: none; background: white;" id="btnPerfil">
                            <li class="dropdown-item">
                                <input id="filePerfil" type="file" name="foto" accept="image/*"  style="display: none;">
                                Alterar foto do time
                            </li>
                        </button>
                    </ul>
                </div>
            </div>

            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class = "image-circu ">
                        <img  id="imgPerfil2" src = "./imgs/img1.jpeg" width="100" height="80" />  
                    </div>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <button style="border: none; background: white;" id="btnPerfil2">
                        <li class="dropdown-item">
                            <input id="filePerfil2" type="file" name="foto" accept="image/*"  style="display: none;">
                            Alterar foto do time
                        </li>
                    </button>
                </ul>
            </div>

        </div>

        <div class="formulario">
            
                <input class="time" id="time_1" placeholder="Time1" type="text" name="time1" required>
                <label style="margin-left: 10px;margin-right: 10px;" for="input">X</label>
                <input class="time" id="time_2" placeholder="Time 2" type="text" name="time2" required>
                <button style="text-transform: uppercase;font-weight: bold;color: #fff;background:#007fff" class="bt_add" id="bt_add" name="Submit">Adicionar</button>
            
        </div>                                                                                               

    </div>
</main>
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3">
    <div class="col-md-4 d-flex align-items-center">
      <span style="color:white; margin: auto;">&copy; 2022 Futmoney, Inc</span>
    </div>

    <ul class="nav col-md-4 list-unstyled d-flex">
        <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#whatsapp"/></svg></a></li>
      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"/></svg></a></li>
    </ul>
  </footer>

<script type="text/javascript">
var btnPerfil = document.getElementById("btnPerfil");
var filePerfil = document.getElementById("filePerfil");
var fotoPerfil = document.getElementById("imgPerfil");

var btnPerfil2 = document.getElementById("btnPerfil2");
var filePerfil2 = document.getElementById("filePerfil2");
var fotoPerfil2 = document.getElementById("imgPerfil2");

var button = document.getElementById("bt_add");
var time1 = document.getElementById("time_1");
var time2 = document.getElementById("time_2");



btnPerfil.addEventListener('click', () => {
  filePerfil.click();
});

filePerfil.addEventListener('change',() => {
  let reader = new FileReader();
    reader.onload = () =>{
      fotoPerfil.src = reader.result;
  }
  reader.readAsDataURL(filePerfil.files[0]);
});


btnPerfil2.addEventListener('click', () => {
  filePerfil2.click();
});

filePerfil2.addEventListener('change',() => {
  let reader = new FileReader();
    reader.onload = () =>{  
      fotoPerfil2.src = reader.result;
  }
  reader.readAsDataURL(filePerfil2.files[0]);
});


button.addEventListener('click', () => {
  $.post("addjogos.php",{imgPerfil: fotoPerfil.src, time_1:time1.value, imgPerfil2:fotoPerfil2.src, time_2:time2.value},function(data, status){
        if(status != 'success'){
          console.log("Data: " + data + "\nStatus: " + status);
          alert("Ocorreu algo inesperado, por favor tente novamente, e caso percista, entre em contado com o administrador.");
        }else{
          alert("adicionado com Sucesso! Volte para tela inicial");
      }
      
    });
});
</script>

<script src="https://code.jquery.com/jquery-1.11.2.js"></script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>