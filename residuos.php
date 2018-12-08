<!DOCTYPE html>
<html>
<head>

	<title></title>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
 	<script type="text/javascript" src="js/materialize.js"></script>
 	<script type="text/javascript" src="js/materialize.min.js"></script>
 	<script type="text/javascript" src="js/script.js"></script>
	<?php 

		include "cabecalho.php";

	?>

</head>
<body>

<?php 

	include "menu.php";

 ?>




 <h5 id="titulo-texto">Quase todo lixo eletrônico do Brasil é descartado de maneira errada</h5>




  <div class="carousel carousel-slider center" data-indicators="true">
    <div class="carousel-item red white-text" href="#one!" style="background-image: url('imagens/1.jpg'); background-repeat: no-repeat; background-size: 100% 100%;">
      <h2>First Panel</h2>
      <p class="white-text">This is your first panel</p>
    </div>
    <div class="carousel-item amber white-text" href="#two!">
      <h2>Second Panel</h2>
      <p class="white-text">This is your second panel</p>
    </div>
    <div class="carousel-item green white-text" href="#three!">
      <h2>Third Panel</h2>
      <p class="white-text">This is your third panel</p>
    </div>
    <div class="carousel-item blue white-text" href="#four!">
      <h2>Fourth Panel</h2>
      <p class="white-text">This is your fourth panel</p>
    </div>
  </div>



<script type="text/javascript">$('.carousel.carousel-slider').carousel({
    fullWidth: true,
    indicators: true
  });
</script>






	<p id="texto-residuos">
		Dezoito meses é o tempo médio de vida de um novo smartphone. Conforme um novo aparelho chega às lojas, 
		outros tantos são aposentados e, assim, o que era um artigo quase fundamental, vira um problema.
		<br>
		<br>
		O mesmo acontece com computadores, televisões, videogames e câmeras fotográficas: no final, sobram 
		44,7 milhões de toneladas de lixo eletrônico todo ano, o equivalente a 4,5 mil torres Eiffel.
		<br>
		<br>
		A estimativa é que, em média, sejam descartados 6,7 quilos de lixo eletrônico para cada habitante do 
		nosso planeta. No Brasil, o problema não é menor. Sétimo maior produtor do mundo, com 1,5 mil toneladas 
		por ano, estima-se que em 2018 cada um de nós jogará fora pelo menos 8,3 quilos de eletrônicos.
		<br>
		<br>
		Apesar de um estudo com números de 2016 ter demonstrado que o reaproveitamento do material descartado naquele 
		ano poderia render R$240 bilhões de reais em todo planeta, apenas 20% do lixo eletrônico do planeta é reciclado. 
		Por aqui, somente 3% são coletados da forma adequada.
		<br>
		<br>
		<span id="fonte-residuos"><b>Fonte:</b> Revista Gallileu - Reportagem de Maio de 2018</span>
		<br>
	</p>










<table id="tabela-residuos">
						<thead>
							<tr>
								<th>
									#
								</th>
								<th>
									Produto
								</th>								
								<th>
									Anos
								</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									1
								</td>
								<td>
									Pilhas
								</td>								
								<td>
									100 a 500
								</td>
							</tr>
							<tr>
								<td>
									2
								</td>								
								<td>
									Metais
								</td>
								<td>
									450
								</td>
							</tr>
							<tr>
								<td>
									3
								</td>
								<td>
									Plásticos
								</td>
								<td>
									450
								</td>
							</tr>
							<tr>
								<td>
									4
								</td>
								<td>
									Vidro
								</td>
								<td>
									4.000 a 1.000.000
								</td>
							</tr>
							<tr>
								<td>
									5
								</td>
								<td>
									Alumínio
								</td>
								<td>
									200 a 500
								</td>
							</tr>
							<tr>
								<td>
									6
								</td>
								<td>
									Borracha
								</td>
								<td>
									indeterminado
								</td>
							</tr>
						</tbody>
					</table>






















<?php

	include "rodape.php";

?>


</body>
</html>
