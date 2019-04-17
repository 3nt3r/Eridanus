<?php

  session_start();
  
  if(!isset($_SESSION['email_admin']) && !isset($_SESSION['senha_admin'])){
    header("Location: login.php");
  }
  include "conexao.php";
  $id_obje = $_SESSION[$_POST["data"]];
  $status = $_POST["status"];
  $motivo = $_POST["motivo"];
  $consulta = "update objeto set status_atual = ?, observacoes = ? where id = ?";
  $prepare = $banco->prepare($consulta);
  $prepare->bind_param("ssi", $status, $motivo, $id_obje);
  $prepare->execute();

?>

<script type="text/javascript">
  window.open(document.referrer,'_self');
</script>
