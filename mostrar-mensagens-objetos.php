<?php

	session_start();

	if(!isset($_SESSION['email']) && !isset($_SESSION['senha'])){
	  header("Location: login.php");
	}

  include 'controleDeLog.php';
  inserirLog("O usuário visitou a página minhas mensagens.");

	include "conexao.php";

	$buscar = "SELECT mensagem.id, mensagem.mensagem, mensagem.remetente, mensagem.idObjeto, mensagem.statusResposta, usuario.nome, objeto.nome FROM mensagem INNER JOIN usuario ON mensagem.destinatario = ? and mensagem.remetente = usuario.id INNER JOIN objeto ON objeto.id = mensagem.idObjeto";
	$prepare = $banco->prepare($buscar);
	$procura = $_SESSION['id'];
	$prepare->bind_param("i", $procura);
	$prepare->bind_result($idMensagem, $mensagem, $remetente, $objeto, $statusResposta, $nomeUsuario, $nomeObjeto);
  $prepare->execute();
  $prepare->store_result();
  $linhasRetornadas = $prepare->num_rows;

  $segundaConsulta = "SELECT mensagem.statusResposta FROM mensagem INNER JOIN usuario ON mensagem.destinatario = ? and mensagem.remetente = usuario.id INNER JOIN objeto ON objeto.id = mensagem.idObjeto";
  $segundaConsultaBanco = $banco->prepare($segundaConsulta);
  $usuarioReferido = $_SESSION['id'];
  $segundaConsultaBanco->bind_param("i", $usuarioReferido);
  $segundaConsultaBanco->bind_result($resultadoQuantidade);
  $segundaConsultaBanco->execute();
  $segundaConsultaBanco->store_result();

  $contadorResultadosRespostas = 0;

  while ($segundaConsultaBanco->fetch()) {
    if ($resultadoQuantidade != "Respondida") {
      $contadorResultadosRespostas++;
    }
  }

?>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/materialize.js"></script>
<script type="text/javascript" src="js/painel-usuario.js"></script>
<link rel="stylesheet" type="text/css" href="css/materialize.min.css">

<h5 class="titulo-pagina flow-text"> Mensagens </h5>

<table class="striped responsive-table">

<?php

  $contador = 1;

  if ($linhasRetornadas == 0 or $contadorResultadosRespostas == 0) {

    ?>

    <div class="row">
      <div class="col s3"></div>
        <div class="col s6">
          <div class="card-panel teal light-green accent-4">
            <center> <span class="white-text titulo-partes-projeto"> Nenhuma mensagem encontrada... </span> </center>
          </div>
        </div>
      <div class="col s3"></div>
    </div>

    <?php

  }else{
    ?>

    <tr>
      <th>#</th>
      <th>Remetente</th>
      <th>Mensagem</th>
      <th>Objeto</th>
      <th>Responder</th>
    </tr>

    <?php

    while($prepare->fetch()){


      if ($statusResposta == "Sem resposta") {

        echo "

            <tr>
              <td>$contador</td>
              <td>$nomeUsuario</td>
              <td>$mensagem</td>
              <td>$nomeObjeto</td>
              <td>

              <a class='light-green accent-4 btn modal-trigger' href='#modal$contador'> Responder </a>

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

  }

  $banco->close();

?>

</table>
