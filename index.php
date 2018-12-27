<?php session_start();  ?>
<!DOCTYPE html>
<html>
<head>

	<title>Eridanus</title>

	<?php

		include "cabecalho.php";

	?>

</head>
<body>

<?php

	include "menu.php";

 ?>


   <div class="carousel carousel-slider center" style="margin-top: 1.2em;">
    <div class="carousel-item red white-text" href="#one!" style="background-image: url('imagens/inicio-1.jpg'); background-repeat: no-repeat; background-size: 100% 100%;">
      <p class="white-text" style="font-size: 1.1em; margin-top: 20%; text-shadow: 0.1em 0.1em #333; background-color: rgba(100, 221, 23, .7);">Lixo eletrônico é tudo aquilo e você vê, lê e acha que não serve para nada, então outros reciclam, selecionam e constroi o seu pensamento. - João de Paula</p>
    </div>
    <div class="carousel-item amber white-text" href="#two!" style="background-image: url('imagens/inicio-1.jpg'); background-repeat: no-repeat; background-size: 100% 100%;">
      <p class="white-text" style="font-size: 1.1em; margin-top: 20%; text-shadow: 0.1em 0.1em #333; background-color: rgba(100, 221, 23, .7);">Se o descarte do lixo eletrônico for feito de modo incorreto, pode liberar resíduos tóxicos que contaminam o solo e os lençóis freáticos, colocando em risco a saúde pública.</p>
    </div>
  </div>
<script type="text/javascript">$('.carousel.carousel-slider').carousel({
    fullWidth: true,
    indicators: true
  });

</script>
<br>
<br>
  <div class="row">
     <div class="col s12 m6 l3">
       <div class="card write">
         <div class="card-content white-text">
           <span class="card-title black-text">Projetos</span>
					 <hr>
					 <p class="black-text">Nesta página, ficará disponível todos os projetos enviados pelos
 				    usuários da plataforma Eridanus, logo após da equipe Eridanus realizar a aprovação do
 				    mesmo.</p>
         </div>
         <div class="card-action">
           <center><a href="projetos-usuarios.php" style="color: #64DD17; font-weight: bolder;">Saiba mais</a></center>
         </div>
       </div>
     </div>
 		<div class="col s12 m6 l3">
       <div class="card write">
         <div class="card-content white-text">
           <span class="card-title black-text">Resíduos</span>
					 <hr>
           <p class="black-text">Veja informações sobre os resíduos eletrônicos
 					no brasil, bem como, informações sobre a decomposição dos resíduos e quais são úteis
 					para serem reciclados ou não.</p>
         </div>
         <div class="card-action">
           <center><a href="residuos.php" style="color: #64DD17; font-weight: bolder;">Saiba mais</a></center>
         </div>
       </div>
     </div>
 		<div class="col s12 m6 l3">
       <div class="card write">
         <div class="card-content white-text">
           <span class="card-title black-text">Locais</span>
					 <hr>
           <p class="black-text">Nesta página, estará disponível locais na cidade de Salgueiro - PE, onde os
 					usuários poderão descartar os resíduos e também, locais que apoiam o projeto de
 					alguma forma.</p>
         </div>
         <div class="card-action">
           <center><a href="locais.php" style="color: #64DD17; font-weight: bolder;">Saiba mais</a></center>
         </div>
       </div>
     </div>
 		<div class="col s12 m6 l3">
       <div class="card write">
         <div class="card-content white-text">
           <span class="card-title black-text">Trocas</span>
					 <hr>
           <p class="black-text">Nesta tela, ficará a amostra, todos os anúncios de resíduos dos usuários. Ao
 					clicar no botão, você será redirecionado a bate-papo diretamente com o anunciante.</p>
         </div>
         <div class="card-action">
           <center><a href="trocas.php" style="color: #64DD17; font-weight: bolder;">Saiba mais</a></center>
         </div>
       </div>
     </div>
   </div>
   

<?php

	include "rodape.php";

?>


</body>
</html>
