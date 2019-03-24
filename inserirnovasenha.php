<?php
  if(isset($_POST["verificador"]) && isset($_POST["codigo"])){
    $verificador = $_POST["verificador"];
    $codigo = $_POST["codigo"];
    include "conexao.php";
    $consulta = "select * from recuperacao where verif = ? and cod = ?";
    $prepare = $banco->prepare($consulta);
    $prepare->bind_param("ss", $verificador, $codigo);
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
<form action="redefinirsenha.php" method="post">
  <div class="row">
    <div class="col s1 m1 l4"></div>
    <div class="col s10 m10 l4">
    <div class="row">
      <div class="input-field col s12 m12 l12">
        <input id="senhaNova" type="password" class="validate"  name="senhaNova">
        <label for="senhaNova">Nova Senha:</label>
      </div>

      <div class="input-field col s12 m12 l12">
        <input id="senhaConf" type="password" class="validate"  name="senhaConf">
        <label for="senhaConf">Confirme a senha:</label>
        <p class="erro" id='erroSenha'></p>
        <input class="esconde" type="text" name="verificador" value="<?php echo $verificador ?>">
        <input class="esconde" type="text" name="codigo" value="<?php echo $codigo ?>">
      </div>
      <button class="btn light-green accent-4 disabled" id="bntRedefinirSenha" type="submit"> Alterar senha <i class="material-icons right">edit</i> </button>
    </div>
  </div>
    <div class="col s1 m1 l4"></div>
  </div>



</form>
<?php

  include "rodape.php";

?>

</body>
</html>
