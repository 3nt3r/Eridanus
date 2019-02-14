<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/materialize.js"></script>
<script type="text/javascript" src="js/painel-usuario.js"></script>

<link rel="stylesheet" type="text/css" href="css/materialize.min.css">
<div class="row distancia-topo-usuario">

<h5 class="titulo-pagina flow-text"> Alterar Senha </h5>

<form id="alterarSenha">

  <div class="row">

    <div class="input-field col s7 m7 l7">
      <input id="senha" type="password" class="validate" name="senha">
      <label for="senha">Senha Atual:</label>
      <p class="erro" id='erroSenhaI'></p>
    </div>

    <div class="input-field col s7 m7 l7">
      <input id="senhaNova" type="password" class="validate"  name="senhaNova">
      <label for="senhaNova">Nova Senha:</label>
    </div>

    <div class="input-field col s7 m7 l7">
      <input id="senhaConf" type="password" class="validate"  name="senhaConf">
      <label for="senhaConf">Confirme a senha:</label>
      <p class="erro" id='erroSenhaC'></p>
    </div>

  </div>

    <button class="btn light-green accent-4" id="alteraSenha" type="submit"> Alterar senha <i class="material-icons right">edit</i> </button>

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
