<?php

  if(isset($_POST["email"])){
    include "conexao.php";
    $email = $_POST["email"];
    $consulta = "select id from usuario where email = ?";
    $prepare = $banco->prepare($consulta);
    $prepare->bind_param("s", $email);
    $prepare->bind_result($id);
    $prepare->execute();
    $prepare->store_result();
    if($prepare->fetch()){
      $idi = (int) $id;
      $verif = md5("asad".rand(1,43237)."sdsd".rand(1,43823));
      $cod = rand(100,999)."-".rand(100,999);
      $insert = "insert into recuperacao(id_usuario, cod, verif) value(?, ?, ?)";
      $prepare = $banco->prepare($insert);
      $prepare->bind_param("iss", $idi, $cod, $verif);
      $prepare->execute();

      ini_set('display_errors', 1);

      error_reporting(E_ALL);

      $to = $email;
      $subject = "Redefinição de Senha";
      $message = "Para redefir sua senha acesse o seguinte link: http://projetoeridanus.000webhostapp.com/inserircodigo.php?verif=$verif";
      $headers = "Eridanus";

      mail($to, $subject, $message, $headers);

    }else{
      header("Location: esqueci-senha.php?erro=1&email=$email");
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
    <h3 class="teat-text titulo-pagina">Código para redefinição enviado para seu email!</h3>
    <i class="material-icons large" style="color: rgb(100,221,23);">check_circle_outline</i>
  </div>

  <?php

    include "rodape.php";

  ?>

</body>
</html>
