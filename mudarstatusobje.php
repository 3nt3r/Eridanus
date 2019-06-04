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

  $consulta = "SELECT objeto.nome, usuario.email FROM objeto INNER JOIN usuario ON objeto.id = $id_obje and objeto.id_usuario = usuario.id";
  $prepare = $banco->prepare($consulta);
  $prepare->bind_result($nome, $email);
  $prepare->store_result();
  $prepare->execute();
  $prepare->fetch();
  ini_set('display_errors', 1);

  error_reporting(E_ALL);


  $para = $email;
  $assunto = "Mudança de status";
  $mensagem = "Seu objeto $nome mudou de status, veja o que alterou http://projetoeridanus.000webhostapp.com/acesse-conta.php";
  $cabecalho = "Eridanus";

  mail($para,  $assunto, $mensagem, $cabecalho);
?>

<script type="text/javascript">
  window.open(document.referrer,'_self');
</script>
