<?php session_start();  ?>

<!DOCTYPE html>
<html>
<head>

	<title>Ajuda - Eridanus</title>

	<script type="text/javascript" src="js/jquery.min.js"></script>

	<?php

		include "cabecalho.php";

	?>

</head>
<body>

<?php

	include "menu.php";

?>

<div class="container distancia-slider">
  <div class="row">
    <div class="col s2"></div>
        <div class="col s8">
            <div class="card-panel teal light-green accent-4">
              <center> <span class="white-text titulo-partes-projeto"> Ajuda </span> </center>
            </div>
        </div>
    <div class="col s2"></div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $('.slider').slider();
  });
</script>

<div class="container">

<div class="toggle">
		<br>
		<h5><b>O que é lixo eletrônico?</b></h5>
		<br>
		<p class="paragrafo-ajuda">
			Lixo eletrônico é todo e qualquer tipo de material produzido a partir do descarte de equipamentos eletrônicos, como eletroeletrônicos (computadores, celulares, tablets e similares), e também eletrodomésticos (geladeiras, fogões, microondas e similares).
		</p>
		<br>
		<p class="paragrafo-ajuda">
			O lixo eletrônico, conhecido também por e-lixo ou RAEE (sigla de Resíduos de Aparelhos Eletroeletrônicos), abrange também os componentes que constituem os eletrônicos, como baterias e pilhas (acumuladores de energia) e demais produtos magnetizados.			
		</p>
		<br>
		<h5><b>Nossa proposta</b></h5>
		<br>
		<p class="paragrafo-ajuda">
			Nossa proposta é realizar a coleta de resíduos eletrônicos e reutilizá-los através de artesanatos criados pelos desenvolvedores deste projeto ou
			pelos seus seguidores e usuários finais. Assim, mostrando a todos que aquele material não precisa ser jogado no lixo, pois, pode ser reutilizado na forma de objetos para decoração,
			ornamentos, brinquedos, arte, e até em formato de novos produtos a partir do reaproveitamento dos resíduos.			
		</p>
		<br>
		<h5><b>Quem pode se cadastrar na plataforma?</b></h5>
		<br>
		<p class="paragrafo-ajuda">
			Qualquer pessoa que esteja disposto a contribuir com o meio ambiente reciclando resíduos eletrônicos, enviando projetos criados a partir do lixo eletrônico, objetos para negociação, 
			ou sendo parceiro na campanha Amigos do Meio Ambiente. Para se cadastrar, é só clicar no botão <b>"Cadastre-se"</b> no topo da página.			
		</p>
		<br>
		<br>
		<h5><b>Como enviar Objetos?</b></h5>
		<br>
		<p class="paragrafo-ajuda">
			Após o cadastro ter sido efetuado, faça o login, e na opção <b>"Enviar Objetos"</b>, preencha todos os campos corretamente e aguarde a aprovação. Os objetos aprovados estarão 
			disponíveis na página "Objetos". Também é possível gerenciar seus objetos na opção <b>"Gerenciar Objetos"</b>.			
		</p>
		<br>
		<h5><b>Como enviar Projetos?</b></h5>
		<br>
		<p class="paragrafo-ajuda">
			Após o cadastro ter sido efetuado, faça o login, e na opção <b>"Enviar Projetos"</b>, preencha todos os campos corretamente e aguarde a aprovação. Os projetos aprovados estarão 
			disponíveis na página "Projetos". Também é possível gerenciar seus projetos na opção <b>"Gerenciar Projetos"</b>.
		</p>	
		<br>
		<h5><b>As informações acima não foram suficientes? <a href="contato.php" class="entrar-em-contato"> Entre em contato conosco </a> e nos diga sua dúvida.</b></h5>
		<br>
		<br>
</div>  

</div>

<?php

	include "rodape.php";

?>

</body>
</html>
