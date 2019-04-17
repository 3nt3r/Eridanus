<?php

  if(isset($_GET["verif"])){
    $verificador = $_GET["verif"];
    include "conexao.php";
    $consulta = "select * from recuperacao where verif = ?";
    $prepare = $banco->prepare($consulta);
    $prepare->bind_param("s", $verificador);
    $prepare->execute();
    $prepare->store_result();
    if($prepare->num_rows() > 0){

    }else{
      header("Location: esqueci-senha.php");
    }
  }else{
    header("Location: esqueci-senha.php");
  }

?>

<!DOCTYPE html>
<html>
<head>

  <title>Eridanus</title>

  <script type="text/javascript" src="js/jquery.min.js"></script>

  <?php

    include "cabecalho.php";

  ?>

</head>
<body>

<?php

  include "menu.php";

 ?>
 <div class="row">
   <div class="col s2 m2 l2"></div>
       <div class="col s8 m8 l8">
           <div class="card-panel teal light-green accent-4">
             <center> <span class="white-text titulo-partes-projeto">Coloque o código para criar uma nova senha! </span> </center>
           </div>
       </div>
   <div class="col s2 m2 l2"></div>
</div>
<form action="inserirnovasenha.php" method="post">
<div class="row">
<div class="col s1 m2 l3"> </div>
<div class="col s10 m8 l6">
  <div class="row">
    <div class="col m2 l2 s2">
    </div>
    <div class="input-field col m6 l6 s6">
      <input id="codigo" type="text" name="codigo" style="font-size: 18pt">
      <input class="esconde" type="text" name="verificador" value="<?php echo $verificador ?>">
      <label for="codigo">Código</label>
      <br><button id="enviarCod" class="btn light-green accent-4 disabled" type="submit">Enviar</button>
    </div>
    <div class="col m2 l2 s2">

    </div>
  </div>

</div>
 <div class="col s1 m2 l3"> </div>

</div>
</form>
<?php

  include "rodape.php";

?>

</body>
</html>
