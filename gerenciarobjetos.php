<?php

session_start();

if(!isset($_SESSION['email']) && !isset($_SESSION['senha'])){
  header("Location: login.php");
}

include "conexao.php";

	//Recebe o número da página Ex: Pagina1, Pagina2...
	$pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
	$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
	
	//Quantidade de itens por página
	$qtd_result_pg = 4;
	
	//Visualização de itens
	$inicio = ($qtd_result_pg * $pagina) - $qtd_result_pg;

$id =(int) $_SESSION["id"];

$consulta = "select id, nome, descricao, observacoes, data_publicacao, status_atual from objeto where id_usuario = ? LIMIT $inicio, $qtd_result_pg";
$prepare = $banco->prepare($consulta);
$prepare->bind_param('i', $id);
$prepare->bind_result($id_obje, $nome, $descricao, $observacoes, $data_publicacao, $status_atual);
$prepare->execute();
$prepare->store_result();
$linhasRetornadas = $prepare->num_rows;

?>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/materialize.js"></script>
<script type="text/javascript" src="js/painel-usuario.js"></script>
<link rel="stylesheet" type="text/css" href="css/materialize.min.css">

<h5 class="titulo-pagina flow-text"> Gerenciar Meus Objetos </h5>

<table class="striped responsive-table">

<?php

  $cont = 1;
  $num = 2000;

  if ($linhasRetornadas == 0) {
    
    ?>

    <div class="row">
      <div class="col s3"></div>
        <div class="col s6">
          <div class="card-panel teal light-green accent-4">
            <center> <span class="white-text titulo-partes-projeto"> Nenhum objeto encontrado... </span> </center>
          </div>
        </div>
      <div class="col s3"></div>
    </div>

    <?php

  }else{
    ?>

      <tr>
        <th>#</th>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Observações</th>
        <th>Status</th>
        <th>Editar</th>
        <th>Excluir</th>
      </tr>

    <?php


    while ($prepare->fetch()) {

      if ($status_atual != "excluido") {
      
        if($status_atual == "em avaliacao"){
          $cor = "rgb(255, 163, 41)";
          $status_certo = "Em avaliação";
        }else if($status_atual == "aprovado"){
          $cor = "rgb(67, 255, 11)";
          $status_certo = "Aprovado";
        }else if($status_atual == "reprovado"){
          $cor = "rgb(255, 9, 0)";
          $status_certo = "Reprovado";
        }

        $num = rand($num,$num + 1000);
        $_SESSION[md5($num)] = $id_obje;

        echo "
          <tr>
            <td>$cont</td>

            <td>$nome</td>

            <td>$descricao</td>
            ";
        if($status_atual == "reprovado"){
          echo "
            <td><a style='background-color: #64dd17;' class='cor-menu-usuario waves-effect waves-light btn modal-trigger' href='#modald$cont'><span style='color: white;'>Ver</span></a>

            <div id='modald$cont' class='modal'>
              <div class='modal-content'>
                <h4>Causa da reprovação</h4>
                <p>$observacoes</p>
              </div>
              <div class='modal-footer'>
                <a href='#!' class='modal-close waves-effect waves-green btn-flat'>Ok</a>
              </div>
            </div>
              ";
            }else{
              echo "<td></td>";
            }

            echo
              "
            <td style='color: $cor;'>$status_certo</td>

            <div id='modale$cont' class='modal'>
              <div class='modal-content'>
                <p style='font-size: 15pt;'>Deseja realmente editar?</p>
                <p>Após o objeto ser editado seu status será alterado para <span style='color: rgb(255, 163, 41)'>'Em avaliação'</span>, e será analisado novamente.</p>
              </div>
              <div class='modal-footer'>
                <a href='#!' class='modal-close waves-effect waves-green btn-flat'>Cancelar</a>
                <a href='#!' class='btnEditarObje modal-close waves-effect waves-red btn-flat' data='".md5($num)."'>Editar</a>
              </div>
            </div>
            <td><a class='modal-trigger' href='#modale$cont'><i class='material-icons' style='color: black;'>edit</i></a></td>
            <div id='modal$cont' class='modal'>
              <div class='modal-content'>
                <p style='font-size: 15pt;'>Deseja realmente excluir?</p>
              </div>
              <div class='modal-footer'>
                <a href='#!' class='modal-close waves-effect waves-green btn-flat'>Cancelar</a>
                <a href='#!' class='btnExcluirObje modal-close waves-effect waves-red btn-flat' data='".md5($num)."'> <span class='reprovar'> Excluir </span> </a>
              </div>
            </div>

            <td><a class='modal-trigger' href='#modal$cont'><i class='material-icons' style='color: red;'>close</i></a></td>

          </tr>
        ";

        $cont++;
      
      }


    }

  }
  
  //Quantidade de linhas no BD
	$result_pg = "SELECT COUNT(id) AS num_result FROM objeto";
	$resultado_pg = mysqli_query($banco, $result_pg);
	$row_pg = mysqli_fetch_assoc($resultado_pg);
	
	
	//Quantidade de páginas
	$quantidade_pg = ceil($row_pg['num_result'] / $qtd_result_pg);
	
	//Limitar links antes e depois
	$max_links = 5;
	
    //Paginação
	echo "<center><ul class='pagination'>
	<li class='waves-effect'><a href='gerenciarobjetos.php?pagina=1'><i class='material-icons'>chevron_left</i></a></li>"; //primeira página
		
	for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
		if($pag_ant >= 1){
			echo "<li class='waves-effect'><a href='gerenciarobjetos.php?pagina=$pag_ant'>$pag_ant</a></li>"; //páginas anteriores a atual
		}
	}
	
	echo "<li class='active'>$pagina</li>"; //página atual que usuário está
	
	for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
		if($pag_dep <= $quantidade_pg){
			echo "<li class='waves-effect'><a href='gerenciarobjetos.php?pagina=$pag_dep'>$pag_dep</a></li>"; // páginas após a atual
		}
	}	
	echo "<li class='waves-effect'><a href='gerenciarobjetos.php?pagina=$quantidade_pg'><i class='material-icons'>chevron_right</i></a></li></center>"; //última página

  $banco->close();

?>

</table>