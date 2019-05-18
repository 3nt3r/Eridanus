<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>

	<title>Trocas - Eridanus</title>

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

  <div class="row">
    <div class="col s3"></div>
      <div class="col s6">
        <div class="card-panel teal light-green accent-4">
          <center> <span class="white-text titulo-partes-projeto"> Aqui você encontra algum objeto que pode ser útil para você! </span> </center>
        </div>
      </div>
    <div class="col s3"></div>
  </div>

  <div class="row distancia-div-acima">
    <div class="col s3"></div>
      <div class="col s6">
        <div class="card-panel teal light-green accent-4">
          <center>
            <span class="white-text titulo-partes-objeto">
                Aqui estão disponíveis todos os anúncios de objetos dos nossos usuários. Ao clicar no anúncio, você será redirecionado a uma página com informações sobre o objeto, bem como, um chat para fazer suas negociações com o anunciante. Os acordos serão feitos diretamente entre o usuário e o anunciante. <br>
                Observação: Todos os anúncios passaram por aprovação.
            </span>
          </center>
        </div>
      </div>
    <div class="col s3"></div>
  </div>

<?php

	include "conexao.php";

	$consulta = "SELECT objeto.id, objeto.nome, objeto.descricao, objeto.id_usuario, objeto.data_publicacao, objeto.imagem, usuario.nome, usuario.email, usuario.cidade FROM objeto INNER JOIN usuario ON  status_atual = 'aprovado' and objeto.id_usuario = usuario.id";
	$prepare = $banco->prepare($consulta);
	$prepare->bind_result($idObjeto, $nome, $descricao, $idUsuario, $data, $imagem, $usuario, $email, $cidade);
  $prepare->execute();
  $prepare->store_result();
  $linhasRetornadas = $prepare->num_rows;
	$cont = 1;
	$num = 1;

	echo "<div class='row distancia-topo'>";

  if ($linhasRetornadas == 0) {
    echo "
      <div class='col s12 m6 l3'>
          <div class='card'>
            <div class='card-image'>
              <a href='login.php'>
                <img src='imagens/projetos-usuarios-envie.png' class='imagem-pagina-projetos'>
                <span class='card-title titulo-enviar-projeto'> <b> Nenhum Objeto Encontrado... </b> </span>
              </a>
            </div>
            <div class='card-content'>
                <p> Clique abaixo para enviar um objeto! </p>
            </div>
            <div class='card-action'>
                <a href='login.php' class='botao-ver-projeto btn' style='margin-bottom: 22px'> Enviar Objeto </a>
            </div>
          </div>
      </div>
    ";
  }else{
    echo "
      <div class='col s12 m6 l3'>
          <div class='card'>
            <div class='card-image'>
              <a href='login.php'>
                <img src='imagens/projetos-usuarios-envie.png' class='imagem-pagina-projetos'>
                <span class='card-title titulo-enviar-projeto'> Envie seu Objeto! </span>
              </a>
            </div>
            <div class='card-content'>
                <p> Clique abaixo para enviar um objeto! </p>
            </div>
            <div class='card-action'>
                <a href='login.php' class='botao-ver-projeto btn' style='margin-bottom: 22px'> Enviar Objeto </a>
            </div>
          </div>
      </div>
    ";    
  }

	while($prepare->fetch()){
		if (isset($_SESSION['email'])){
				$verif1 = md5("rjbc".rand($num, $num+1000));
				$verif2 = md5("rjbc".rand($num+1000, $num+2000));
				$_SESSION[$verif1] = $idUsuario;
				$_SESSION[$verif2] = $idObjeto;
				$num += 2000;
				echo "

        <div class='col s12 m6 l3'>
            <div class='card'>

              <div class='card-image'>
                  <img src='imagens-objetos/".md5($email)."/$imagem' class='materialboxed imagem-pagina-projetos'>
                  <span class='card-title titulo-enviar-projeto'> Localidade: $cidade </span>
              </div>

              <div class='card-content'>
                  <p class='truncate'> $descricao </p>
              </div>

              <div class='card-action'>
                  <a href='ver-objeto.php?email=$email&nomeObjeto=$nome&descricaoObjeto=$descricao&idUsuario=$idUsuario&data=$data&imagem=$imagem&nomeUsuario=$usuario&idObjeto=$idObjeto&localidade=$cidade' class='botao-ver-projeto btn'> Negociar </a>
              </div>

            </div>
        </div>
  			";
		}else{
  		echo "
    		<div class='col s12 m6 l3'>
      			<div class='card'>
        			<div class='card-image'>
          				<img src='imagens-objetos/".md5($email)."/$imagem' class='materialboxed imagem-pagina-projetos'>
          				<span class='card-title titulo-enviar-projeto'> Localidade: $cidade </span>
        			</div>
        			<div class='card-content'>
          				<p class='truncate'> $descricao </p>
        			</div>
        			<div class='card-action'>
          				<a href='#' class='botao-ver-projeto btn disabled'> Negociar </a>
        			</div>
      			</div>
    		</div>
  		";
		}
	}

	echo "</div>";

	$prepare-> free_result();
	$banco->close();

?>

<?php

	include "rodape.php";

?>

</body>
</html>
