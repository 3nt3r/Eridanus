<?php

  session_start();

  if(!isset($_SESSION['email_admin']) && !isset($_SESSION['senha_admin'])){
    header("Location: login.php");
  }
  include "conexao.php";
  $id_proj = $_SESSION[$_POST["data"]];
  $status = $_POST["status"];
  $motivo = $_POST["motivo"];
  $consulta = "update projeto set status_atual = ?, observacoes = ? where codigo = ?";
  $prepare = $banco->prepare($consulta);
  $prepare->bind_param("ssi", $status, $motivo, $id_proj);
  $prepare->execute();
  
?>

<script type="text/javascript">
  window.open(document.referrer,'_self');
</script>
