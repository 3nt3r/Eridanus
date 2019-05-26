<?php session_start();  ?>

<!DOCTYPE html>
<html>
<head>

	<title>Resíduos - Eridanus</title>

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
              <center> <span class="white-text titulo-partes-projeto"> Política de Privacidade </span> </center>
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

<div class="toggle flow-text">
	<p id="texto-residuos">
		<br>
		<h5><b>Política de privacidade</b></h5>
		<p>Todas as suas informações pessoais recolhidas, serão usadas para o ajudar a tornar a 
		sua visita no nosso site o mais produtiva e agradável possível.</p><p>A garantia da confidencialidade dos dados 
		pessoais dos utilizadores do nosso site é importante para o Eridanus.</p><p>Todas as informações pessoais relativas a 
		membros, assinantes, clientes ou visitantes que usem o Eridanus serão tratadas em concordância com a <a href="https://www.cnpd.pt/bin/legis/nacional/lei_6798.htm">Lei da Proteção de Dados 
		Pessoais de 26 de outubro de 1998 (Lei n.º 67/98)</a>.</p><p>A informação pessoal recolhida pode incluir o seu nome, e-mail, número de 
		telefone e/ou telemóvel, morada, data de nascimento e/ou outros.</p><p>O uso do Eridanus pressupõe a aceitação deste Acordo de privacidade.
		A equipa do Eridanus reserva-se ao direito de alterar este acordo sem aviso prévio. Deste modo, recomendamos que consulte a nossa política de
		privacidade com regularidade de forma a estar sempre atualizado.</p>
		
		<h5><b>Os anúncios</b></h5><p>Tal como outros websites, coletamos e utilizamos
		informação contida nos anúncios. A informação contida nos anúncios, inclui o seu endereço IP (Internet Protocol), o seu ISP (Internet Service 
		Provider, como o Sapo, Clix, ou outro), o browser que utilizou ao visitar o nosso website (como o Internet Explorer ou o Firefox), o tempo da 
		sua visita e que páginas visitou dentro do nosso website.</p>
		
		<h5><b>Ligações a Sites de terceiros</b></h5><p>O Eridanus possui ligações para outros sites, 
		os quais, a nosso ver, podem conter informações / ferramentas úteis para os nossos visitantes. A nossa política de privacidade não é aplicada a sites
		de terceiros, pelo que, caso visite outro site a partir do nosso deverá ler a politica de privacidade do mesmo.</p><p>Não nos responsabilizamos 
		pela política de privacidade ou conteúdo presente nesses mesmos sites.</p>
		<br>
		<br>
		
	</p>
</div>  

  

    

</div>

<?php

	include "rodape.php";

?>

</body>
</html>
