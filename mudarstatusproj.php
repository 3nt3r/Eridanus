<?php

  session_start();

  if(!isset($_SESSION['email_admin']) && !isset($_SESSION['senha_admin'])){
    header("Location: login.php");
  }

  include "conexao.php";

  $id_proj = $_SESSION[$_POST["data"]];
  $status = $_POST["status"];
  $motivo = $_POST["motivo"];

  $consulta = "UPDATE projeto SET status_atual = ?, observacoes = ? WHERE codigo = ?";
  $prepare = $banco->prepare($consulta);
  $prepare->bind_param("ssi", $status, $motivo, $id_proj);
  $prepare->execute();

  $banco->close(); 

  $consulta = "SELECT projeto.titulo, usuario.email FROM projeto INNER JOIN usuario ON codigo = $id_proj and projeto.id_usuario = usuario.id";
  $prepare = $banco->prepare($consulta);
  $prepare->bind_result($nome, $email);
  $prepare->store_result();
  $prepare->execute();
  $prepare->fetch();

  ini_set('display_errors', 1);

  error_reporting(E_ALL);

  $para = $email;
  $assunto = "Mudança de status";
  $mensagem = "Seu projeto $nome mudou de status, veja o que alterou http://projetoeridanus.000webhostapp.com/acesse-conta.php";
  $cabecalho = "Eridanus";

  mail($para,  $assunto, $mensagem, $cabecalho);

  $banco->close(); 
?>

<script type="text/javascript">
  window.open(document.referrer,'_self');
</script>
