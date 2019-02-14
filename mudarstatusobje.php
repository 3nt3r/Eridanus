<?php
  session_start();
  if(!isset($_SESSION['email_admin']) && !isset($_SESSION['senha_admin'])){
    header("Location: login.php");
  }
  include "conexao.php";
  $id_obje = $_SESSION[$_POST["data"]];
  $status = $_POST["status"];
  $consulta = "update objeto set status_atual = ? where id = ?";
  $prepare = $banco->prepare($consulta);
  $prepare->bind_param("si", $status, $id_obje);
  $prepare->execute();
?>
