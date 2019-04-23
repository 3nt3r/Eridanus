<?php

  session_start();

  if(!isset($_SESSION['email']) && !isset($_SESSION['senha'])){
    header("Location: login.php");
  }

  include "conexao.php";

  $consulta = "SELECT mensagem.conteudo, mensagem.id_emi, mensagem.id_rec, mensagem.id_objeto, objeto.nome, usuario.nome FROM mensagem INNER JOIN objeto on mensagem.id_rec = ? inner join usuario on mensagem.id_emi = usuario.id GROUP BY mensagem.conteudo";
  $prepare = $banco->prepare($consulta);
  $prepare->bind_param("i", $_SESSION['id']);
  $prepare->bind_result($mensagem, $remetente, $destinatario, $idObjeto, $nomeObjeto, $nomeRemetente);
  $prepare->execute();
  $prepare->store_result();

?>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/materialize.js"></script>
<script type="text/javascript" src="js/painel-usuario.js"></script>
<link rel="stylesheet" type="text/css" href="css/materialize.min.css">
<h5 class="titulo-pagina flow-text"> Minhas Mensagens </h5>

<table class="striped">

  <tr>
    <th> Enviada por </th>
    <th> Mensagem </th>
    <th> Objeto </th>
  </tr>

<?php

  $contadorModal = 1;

  while($prepare->fetch()){

    echo "
      <tr>

        <td> $nomeRemetente </td>

        <td>

          <a class='light-green accent-4 btn modal-trigger' href='#modal$contadorModal'> Ver </a>

            <div id='modal$contadorModal' class='modal'>

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

                <a id='btnResponderMensagem' style='background-color: #64dd17; margin-right: 20px' class='btn' destinatario='".$remetente."' remetente='".$destinatario."' objeto='".$idObjeto."'> Enviar </a>

                <a href='#!' class='modal-close btn' style='background-color: #64dd17;'> Fechar </a>

              </div>

            </div>

         </td>

         <td> $nomeObjeto </td>

      </tr>
    ";

    $contadorModal++;

  }

  $prepare-> free_result();

  $banco->close();

?>

</table>
