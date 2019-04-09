<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>

	<title>Trocas - Eridanus</title>

	<?php

		include "cabecalho.php";

	?>

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
                Aqui estão disponíveis todos os anúncios de resíduos dos nossos usuários. Ao clicar no anúncio, você será redirecionado ao bate-papo diretamente com o anunciante. Os acordos serão feitos diretamente entre usuário e anunciante. <br>
                Observação: Todos os anúncios passaram por aprovação.
            </span>
          </center>
        </div>
      </div>
    <div class="col s3"></div>
  </div>

<?php

	include "conexao.php";

	$consulta = "SELECT objeto.nome, objeto.descricao, objeto.data_publicacao, objeto.imagem, usuario.nome, usuario.email FROM objeto INNER JOIN usuario ON  status_atual = 'aprovado' and objeto.id_usuario = usuario.id";
	$prepare = $banco->prepare($consulta);
	$prepare->execute();
	$prepare->bind_result($nome, $descricao, $data, $imagem, $usuario, $email);

	echo "<div class=\"row distancia-topo\">";
  	echo "
    	<div class=\"col s12 m6 l3\">
      		<div class=\"card\">
        		<div class=\"card-image\">
              <a href=\"login.php\">
          			<img src=\"imagens/projetos-usuarios-envie.png\" class=\"imagem-pagina-projetos\">
          			<span class=\"card-title titulo-enviar-projeto\"> Envie seu Objeto! </span>
              </a>
        		</div>
        		<div class=\"card-content\">
          			<p> Clique abaixo para enviar um objeto! </p>
        		</div>
        		<div class=\"card-action\">
          			<a href=\"login.php\" class=\"botao-ver-projeto btn\"> Enviar Objeto </a>
        		</div>
      		</div>
    	</div>
  	";

	while($prepare->fetch()){
		if (isset($_SESSION['email'])){

  			echo "
    			<div class=\"col s12 m6 l3\">
      				<div class=\"card\">
        				<div class=\"card-image\">
          					<img src=\"imagens-objetos/".md5($email)."/$imagem\" class=\"materialboxed imagem-pagina-projetos\">
          					<span class=\"card-title titulo-enviar-projeto\"> Enviado por: $usuario </span>
        				</div>
        				<div class=\"card-content\">
          					<p class=\"truncate\"> $descricao </p>
        				</div>
        				<div class=\"card-action\">
          					<a href=\"#\" class=\"botao-ver-projeto btn\"> Negociar </a>
        				</div>
      				</div>
    			</div>
  			";

		}else{

  			echo "
    			<div class=\"col s12 m6 l3\">
      				<div class=\"card\">
        				<div class=\"card-image\">
          					<img src=\"imagens-objetos/".md5($email)."/$imagem\" class=\"materialboxed imagem-pagina-projetos\">
          					<span class=\"card-title titulo-enviar-projeto\"> Enviado por: $usuario </span>
        				</div>
        				<div class=\"card-content\">
          					<p class=\"truncate\"> $descricao </p>
        				</div>
        				<div class=\"card-action\">
          					<a href=\"#\" class=\"botao-ver-projeto btn disabled\"> Negociar </a>
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
