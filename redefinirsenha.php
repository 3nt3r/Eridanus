<?php
  if(isset($_POST["verificador"]) && isset($_POST["codigo"]) && isset($_POST["senhaNova"]) && isset($_POST["senhaConf"])){
    $verificador = $_POST["verificador"];
    $codigo = $_POST["codigo"];
    $senhaConf = $_POST["senhaConf"];
    $senhaNova = $_POST["senhaNova"];
    include "conexao.php";
    $consulta = "select id_usuario from recuperacao where verif = ? and cod = ?";
    $prepare = $banco->prepare($consulta);
    $prepare->bind_param("ss", $verificador, $codigo);
    $prepare->bind_result($id);
    $prepare->execute();
    $prepare->store_result();
    if($prepare->fetch() && $senhaNova == $senhaConf){
      $senhaCrip = md5($senhaNova);
      $update = "update usuario set senha = ? where id = ?";
      $prepare = $banco->prepare($update);
      $prepare->bind_param("si", $senhaCrip, $id);
      $prepare->execute();
      $excluir = "delete from recuperacao where verif = ?";
      $prepare = $banco->prepare($excluir);
      $prepare->bind_param("s", $verificador);
      $prepare->execute();
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
 <div style="margin-top: 90px;text-align: center;margin-bottom: 90px;">
 <h3 class="teat-text titulo-pagina">Senha redefida com sucesso!</h3>
 <i class="material-icons large" style="color: rgb(100,221,23);">check_circle_outline</i>
</div>
<?php

  include "rodape.php";

?>

</body>
</html>
