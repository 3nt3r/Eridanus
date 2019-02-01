<script type="text/javascript" src="js/painel.js">

</script>
<?php
session_start();
include "cabecalho.php";

include "conexao.php";

$consulta = "select nome, sobrenome,email,senha from usuario where id=?";
$prepare = $banco->prepare($consulta);
$prepare->bind_param("i", $_SESSION['id']);
$prepare->bind_result($nome, $sobrenome, $email, $senha);
$prepare->execute();
$prepare->store_result();
$prepare->fetch();
?>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/materialize.js"></script>
<link rel="stylesheet" type="text/css" href="css/materialize.min.css">
<div class="row" style="margin-top: 10vw;">
<form id="alterar">
  <div class="row">
    <div class="input-field col s6">
      <input id="first_name" type="text" class="validate" disabled value="<?php echo $nome; ?>"  name="nome_cad">
      <label for="first_name">Nome:</label>
    </div>
    <div class="input-field col s6">
      <input id="last_name" type="text" class="validate" disabled value="<?php echo $sobrenome; ?>" name="sobrenome_cad">
      <label for="last_name">Sobrenome:</label>
    </div>
  </div>
  <div class="row">
    <div class="input-field col s8">
      <input id="email" type="email" class="validate" disabled value="<?php echo $email;  ?>" name="email_cad">
      <label for="email">Email:</label>
      <span class="erro" id="erroE"></span>
    </div>
  </div>
  <button class="btn light-green accent-4" id="btncad" type="button" style="margin-right: 15px;">Editar dados
<i class="material-icons right">edit</i>
<button class="btn light-green accent-4" id="btncads" type="button">Alterar senha
<i class="material-icons right">edit</i>
</button>
<button class="btn light-green accent-4" id="btnsalvar" type="submit" style="display: none;">Salvar
<i class="material-icons right">done</i>

</button>
<div id="preloader">
 <div class="preloader-wrapper small active">
	<div class="spinner-layer spinner-blue">
		<div class="circle-clipper left">
			<div class="circle"></div>
		</div><div class="gap-patch">
			<div class="circle"></div>
		</div><div class="circle-clipper right">
			<div class="circle"></div>
		</div>
	</div>

	<div class="spinner-layer spinner-red">
		<div class="circle-clipper left">
			<div class="circle"></div>
		</div><div class="gap-patch">
			<div class="circle"></div>
		</div><div class="circle-clipper right">
			<div class="circle"></div>
		</div>
	</div>

	<div class="spinner-layer spinner-yellow">
		<div class="circle-clipper left">
			<div class="circle"></div>
		</div><div class="gap-patch">
			<div class="circle"></div>
		</div><div class="circle-clipper right">
			<div class="circle"></div>
		</div>
	</div>

	<div class="spinner-layer spinner-green">
		<div class="circle-clipper left">
			<div class="circle"></div>
		</div><div class="gap-patch">
			<div class="circle"></div>
		</div><div class="circle-clipper right">
			<div class="circle"></div>
		</div>
	</div>
 </div>
</div>
</form>
</div>
