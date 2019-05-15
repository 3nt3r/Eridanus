<?php

	session_start();

	if(!isset($_SESSION['email']) && !isset($_SESSION['senha'])){
	  header("Location: login.php");
	}

	include "conexao.php";

	$buscar = "SELECT mensagem.id, mensagem.mensagem, mensagem.remetente, mensagem.idObjeto, mensagem.statusResposta, usuario.nome, objeto.nome FROM mensagem INNER JOIN usuario ON mensagem.destinatario = ? and mensagem.remetente = usuario.id INNER JOIN objeto ON objeto.id = mensagem.idObjeto";
	$prepare = $banco->prepare($buscar);
	$procura = $_SESSION['id'];
	$prepare->bind_param("i", $procura);
	$prepare->execute();
	$prepare->bind_result($idMensagem, $mensagem, $remetente, $objeto, $statusResposta, $nomeUsuario, $nomeObjeto);

?>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/materialize.js"></script>
<script type="text/javascript" src="js/painel-usuario.js"></script>
<link rel="stylesheet" type="text/css" href="css/materialize.min.css">

<h5 class="titulo-pagina flow-text"> Mensagens </h5>

<table class="striped responsive-table">

  <tr>
    <th>#</th>
    <th>Remetente</th>
    <th>Mensagem</th>
    <th>Objeto</th>
    <th>Responder</th>
  </tr>

<?php

  $contador = 1;

  while($prepare->fetch()){


  	if ($statusResposta == "Sem resposta") {

  		echo "

          <tr>
          	<td>$contador</td>
            <td>$nomeUsuario</td>
            <td>$mensagem</td>
            <td>$nomeObjeto</td>
            <td>

			<a class='light-green accent-4 btn modal-trigger' href='#modal$contador'> Ver </a>

            <div id='modal$contador' class='modal'>
              <div class='modal-content'>
                <h4> Mensagem: </h4>
                <p> $mensagem </p>
              </div>

              <form>
                <div class='input-field col s6'>
                  <textarea id='responderMsg' class='materialize-textarea' required> </textarea>
                  <label> Responder: </label>
                </div>
              </form>

              <div class='modal-footer'>
                <a id='btnResponderMensagem' style='background-color: #64dd17; margin-right: 20px' class='btn' idMensagem='".$idMensagem."'> Enviar </a>
                <a href='#!' class='modal-close btn' style='background-color: #64dd17;'> Fechar </a>
              </div>
            </div>


            </td>
          </tr>

		";

		$contador++;

  	}

	}

  $banco->close();

?>

</table>
