<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>

	<title>Eridanus</title>

  <script type="text/javascript" src="js/jquery.min.js"></script>

	<?php

		include "cabecalho.php";

	?>

</head>
<body>

<?php

	include "menu.php";

 ?>

  <div class="slider">
    <ul class="slides">
      <li>
        <img src="imagens/inicio-1.jpg">
        <div class="caption center-align conteudo-slide-index">
          <h3 class="conteudo-carousel-titulo flow-text">João de Paula</h3>
          <h5 class="light grey-text text-lighten-3 carousel-pgindex conteudo-carousel flow-text">"Lixo eletrônico é tudo aquilo e você vê, lê e acha que não serve para nada, então outros reciclam, selecionam e constroi o seu pensamento."</h5>
        </div>
      </li>
      <li>
        <img src="imagens/inicio-1.jpg">
        <div class="caption center-align conteudo-slide-index">
          <h3 class="conteudo-carousel-titulo flow-text">Dijalma A. Moura</h3>
          <h5 class="light grey-text text-lighten-3 conteudo-carousel flow-text">"O luxo vem do lixo. A lixeira está cheia de luxo."</h5>
        </div>
      </li>
      <li>
        <img src="imagens/inicio-1.jpg">
        <div class="caption center-align conteudo-slide-index">
          <h3 class="conteudo-carousel-titulo flow-text">Daniel Carvalho</h3>
          <h5 class="light grey-text text-lighten-3 conteudo-carousel flow-text">"Mudanças são necessárias. Reciclagem não é só no meio ambiente, mas também no ambiente do nosso ser."</h5>
        </div>
      </li>      
    </ul>
  </div>

<script type="text/javascript">
  $(document).ready(function(){
    $('.slider').slider();
  });
</script>

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
           <center><a href="projetos-usuarios.php" class="btn-centro">Saiba mais</a></center>
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
           <center><a href="residuos.php" class="btn-centro">Saiba mais</a></center>
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
           <center><a href="locais.php" class="btn-centro">Saiba mais</a></center>
         </div>
       </div>
     </div>

 		<div class="col s12 m6 l3">
       <div class="card write">
         <div class="card-content white-text">
           <span class="card-title black-text">Objetos</span>
					 <hr>
           <p class="black-text">Nesta tela, ficará a amostra, todos os anúncios de resíduos dos usuários. Ao
 					clicar no botão, você será redirecionado a bate-papo diretamente com o anunciante.</p>
         </div>
         <div class="card-action">
           <center><a href="trocas.php" class="btn-centro">Saiba mais</a></center>
         </div>
       </div>
     </div>
   </div>
   
<?php

	include "rodape.php";

?>

</body>
</html>
