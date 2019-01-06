<?php
  session_start();
  $banco = new mysqli("localhost", "root", "", "eridanus");
  if(mysqli_connect_errno()){
    echo "erro";
    exit;
  }
  if(isset($_POST['nome_cad']) && isset($_POST['sobrenome_cad']) && isset($_POST['email_cad']) && isset($_SESSION['id'])){
    $nome = $_POST['nome_cad'];
    $sobrenome = $_POST['sobrenome_cad'];
    $email = $_POST['email_cad'];
    $id = (int) $_SESSION['id'];
    $update = "update usuario set nome = ?, sobrenome = ?, email = ? where id = ?";
    $prepare = $banco->prepare($update);
    $prepare->bind_param("sssi", $nome, $sobrenome, $email, $id);
    $prepare->execute();
    sleep(2); //remover
  }else if(isset($_POST['senha']) && isset($_POST['senhaConf']) && isset($_POST['senhaNova']) && isset($_SESSION['id'])){
    $id = (int) $_SESSION['id'];
    $senha = md5($_POST['senha']);
    $senhaNova = md5($_POST['senhaNova']);
    $senhaConf = md5($_POST['senhaConf']);
    $consulta = 'select senha from usuario where id = ?';
    $prepare = $banco->prepare($consulta);
    $prepare->bind_param("i", $id);
    $prepare->bind_result($senhaB);
    $prepare->execute();
    $prepare->store_result();
    $prepare->fetch();
    if($senha == $senhaB){
      if($senhaConf == $senhaNova){
          $update = "update usuario set senha = ? where id = ?";
          $prepare = $banco->prepare($update);
          $prepare->bind_param("si", $senhaNova, $id);
          $prepare->execute();
          echo "certo";
          $_SESSION = array();
          session_destroy();
          sleep(2); //remover
      }else{
        echo "As senhas não coincidem!";
      }
    }else{
      echo "Senha incorreta!";
    }
  }else{
      header("Location: login.php");
  }
?>
