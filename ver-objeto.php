<?php session_start();  ?>

<!DOCTYPE html>
<html>
<head>

	<?php

		if (isset($_GET['email'])) {
			$email = $_GET['email'];
			$nomeObjeto = $_GET['nomeObjeto'];
			$descricaoObjeto = $_GET['descricaoObjeto'];
			$idUsuario = $_GET['idUsuario'];
			$data = $_GET['data'];
			$imagem = $_GET['imagem'];
			$nomeUsuario = $_GET['nomeUsuario'];
			$idObjeto = $_GET['idObjeto'];
			$localidade = $_GET['localidade'];
			$sobrenome = $_GET['sobrenome'];

			include 'controleDeLog.php';
			inserirLog("O usuário visualizou o objeto: $idObjeto em sua página.");

		}else{
			header("Location: index.php");
		}

	?>

	<title> <?php echo $nomeObjeto; ?> - Eridanus </title>

	<?php

		include "cabecalho.php";

	?>

	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/painel-usuario.js"></script>

</head>
<body>

<?php

	include "menu.php";

 ?>

<div class="container">

	<div class="row">
		<div class="col s3"></div>
    		<div class="col s6">
      			<div class="card-panel teal light-green accent-4">
        			<center>
        				<span class="white-text titulo-partes-projeto"> <?php echo $nomeObjeto; ?> </span>
        			</center>
        			<br>
        			<hr>
        			<center>
        				<span class="white-text textos-projeto-ver-projeto"> Usuário Responsável: <?php echo"$nomeUsuario $sobrenome"; ?> </span>
        			</center>
        			<center>
        				<span class="white-text textos-projeto-ver-projeto"> Localidade: <?php echo $localidade; ?> </span>
        			</center>
        			<center>
        				<span class="white-text textos-projeto-ver-projeto"> Data de Envio: <?php echo date("d/m/Y", strtotime($data)); ?> </span>
        			</center>
      			</div>
    		</div>
		<div class="col s3"></div>
	</div>

	<div class="row">
		<div class="col s3"></div>
    		<div class="col s6">
      			<div class="card-panel teal light-green accent-4">
        			<center> <span class="white-text titulo-partes-projeto"> Descrição </span> </center>
      			</div>
    		</div>
		<div class="col s3"></div>
	</div>

	<div class="row">
		<div class="col s2"></div>
    		<div class="col s8">
        		<center> <span class="titulo-partes-projeto descricao-ver-mais"> <?php echo $descricaoObjeto; ?> </span> </center>
    		</div>
		<div class="col s2"></div>
	</div>

  	<div class="row">
  		<div class="col s3"></div>
    		<div class="col s6">
      			<div class="card">
        			<div class="card-image">
          				<img <?php echo "src=\"imagens-objetos/".md5($_GET['email'])."/$imagem\""; ?> class="imagem-ver-projeto responsive-img materialboxed" >
        			</div>
      			</div>
    		</div>
    	<div class="col s3"></div>
  	</div>

	<div class="row" id="areaMensagem">

		<div class="distancia-abaixo-aviso">
			<center>
				<a class="btn light-green accent-4" id="mostrarTodasMensagens"> Ver Mensagens </a>

				<a class="btn light-green accent-4" id="mostrarEnviarMensagem"> Enviar Mensagem </a>
			</center>
		</div>

		<div id="enviarMensagemObjeto">
			<div class="col s3"></div>
	    		<div class="col s6">

					<?php 

						if ($idUsuario == $_SESSION['id']) {
							?>

					<div class="col s1"> </div>
					    <div class="col s10">
					      <div class="card-panel red accent-4">
					        <span class="white-text"> Você não pode enviar uma mensagem para você mesmo! </span>
					      </div>
					    </div>
					<div class="col s1"> </div>

							<?php
						}else{
							?>

			      			<div class="card-panel teal light-green accent-4">
			        			<center> <span class="white-text titulo-partes-projeto"> Envie uma mensagem para o anunciante! </span> </center>
			      			</div>


							  <center>
							  	<a class="red accent-4 btn modal-trigger" href="#modal1"> Dicas de Segurança! </a>
							  </center>

							  <div id="modal1" class="modal">
							    <div class="modal-content">
							      <h4>Leia com atenção!</h4>
							      <p>Não envie dados pessoais para pessoas que você não conheça!</p>
							      <p>Dados como: CPF, RG, número de cartão de crédito, número telefônico, dentre outros documentos e informações pessoais.</p>
							      <p>Caso queira negociar pessoalmente o objeto com o anunciante, procure um lugar público e com muito movimento!</p>
							      <p>Desconfie de qualquer ação inesperada do anunciante, cuidado com golpes!</p>
							      <p>Não temos responsabilidade nenhuma com as negociações feitas por nossos usuários. Então tome bastante cuidado!</p>
							    </div>
							    <div class="modal-footer">
							      <a href="#!" class="modal-close waves-effect waves-green btn-flat"> Ciente </a>
							    </div>
							  </div>			      			

			      			<form method="post"  <?php echo "action='enviarMensagem.php?email=$email&idObjeto=$idObjeto'"; ?> >
			      				
						        <div class="input-field distancia-aviso">
						          <i class="material-icons prefix">mode_edit</i>
						          <textarea id="mensagemObjeto" class="materialize-textarea" name="mensagemObjeto"></textarea>
						          <label for="icon_prefix2">Mensagem</label>
						        </div>

						        <center>
						        	<input type="submit" name="btnEnviarMensagem" class="btn light-green accent-4" value="Enviar">
						        </center>

			      			</form>

							<?php
					}

 				?>

	    		</div>
			<div class="col s3"></div>
		</div>

		<div id="mostrarMensagensRecebidas">

			<?php 

				include "conexao.php";

				$buscar = "SELECT mensagem.mensagem, mensagem.destinatario, mensagem.statusResposta, usuario.nome, resposta.mensagem FROM mensagem INNER JOIN usuario ON usuario.id = mensagem.remetente inner join resposta on resposta.idMensagem = mensagem.id WHERE idObjeto = $idObjeto ORDER BY mensagem.id DESC";
				$prepare = $banco->prepare($buscar);
				$prepare->bind_result($mensagem, $destinatario, $statusResposta, $remetente, $resposta);
				$prepare->execute();
				$prepare->store_result();
				$linhasRetornadas = $prepare->num_rows;

			?>

			<div class="col s3"></div>

	    		<div class="col s6">

	    			<center> <span class="titulo-mensagem"> Perguntas e Respostas </span> </center>

	    			<?php 

	      				if ($linhasRetornadas == 0) {
	      					?>
								<div class="col s1"> </div>
									<div class="col s10">
									    <div class="card-panel red accent-4">
									       <center> <span class="white-text"> Nenhuma mensagem encontrada... </span> </center>
									    </div>
									</div>
								<div class="col s1"> </div>
	      					<?php
	      					}else{
	      						?>

					      			<ul class="collection">

					      				<?php 

						      				while($prepare->fetch()){

						      					if ($statusResposta == "Respondida") {

													echo "
								      					<li class=\"collection-item estilo-perguntas\"> 
								      						<i class=\"material-icons\">chat_bubble_outline</i> 
								      							De <b> $remetente, </b> <br> 
								      							Pergunta: <i> $mensagem </i> <br>
								      							<hr>
								      						<i class=\"material-icons\">chat_bubble</i>
								      							<i> Resposta: $resposta </i>
								      					</li>
							      					";

							      				}

						      				}

					      				?>

					      			</ul>
	      						<?php
	      					}
	    			?>

	    		</div>
			<div class="col s3"></div>

		</div>

	</div>

</div>

<?php

	include "rodape.php";

?>

</body>
</html>
