<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/painel.js">

</script>
<script type="text/javascript">
$(document).ready(function() {
	if($('#linha').height() < $('#conteudo').height())
		$('#linha').height($('#conteudo').height());
});
</script>
<div class="row" id="linha" style="margin-bottom: 0; height: 100%;">
<div class="menu-usuario col l3 m3" style="height: 100%;">


<table>

	<tr>
		<th>
			<center>
				<span style="color: white;"> <i class="material-icons" style="margin-right: 5px;">pan_tool</i> Olá, <?php echo $_SESSION['nome']; ?>!
				</span>
			</center>
		</th>
	</tr>

	<tr>
		<td> <a href="index.php"> <span> <i class="material-icons" style="margin-right: 5px;">home</i> Voltar ao Início </span> </a> </td>
	</tr>





		<tr>
			<td> <a href="informacoes-usuario.php" id="btnAlt"> <span> <i class="material-icons" style="margin-right: 5px;">person</i> Informações do Usuário </span> </a> </td>
		</tr>


		<tr>
			<td> <a href="#"> <span> <i class="material-icons" style="margin-right: 5px;">near_me</i> Enviar Projeto </span> </a> </td>
		</tr>


		<tr>
			<td> <a href="#"> <span> <i class="material-icons" style="margin-right: 5px;">edit</i> Gerenciar Projeto </span> </a> </td>
		</tr>


		<tr>
			<td> <a href="#"> <span> <i class="material-icons" style="margin-right: 5px;">near_me</i> Enviar Objeto </span> </a> </td>
		</tr>


		<tr>
			<td> <a href="#"> <span> <i class="material-icons" style="margin-right: 5px;">edit</i> Gerenciar Objeto </span> </a> </td>
		</tr>


		<tr>
			<td> <a href="sair.php"> <span> <i class="material-icons" style="margin-right: 5px; margin-bottom: 30px;">exit_to_app</i> Sair </span> </a> </td>
		</tr>


	</table>

</div>

<div id="conteudo" class="col l8 m8" style="margin-left: 30px; height: auto;">
	
</div>
</div>
