<!DOCTYPE html>
<html>
<head>

	<title></title>

	<?php 

		include "cabecalho.php";

	?>

</head>
<body>

<?php 

	include "menu.php";

 ?>















<center><h5><b>Quase todo lixo eletrônico do Brasil é descartado de maneira errada</b></h5></center>
<br>
<div class="w3-content w3-section" style="max-width:1600">
  <img class="mySlides" src="imagens/1.jpg" style="width:100%">
  <img class="mySlides" src="imagens/2.png" style="width:100%">
  <img class="mySlides" src="imagens/3.jpg" style="width:100%">
</div>

<div class="row">
				<div class="col-md-1">
				</div>
				<div class="col-md-7" margin-left: 20px;>
				<br>
				
					<h4>
					<center><h5><b>Cada um de nós produz, em média, 8,3 quilogramas de e-lixo por ano; só 3% segue para centros de reciclagem</b></h5></center>
					</h4>
					<br>
					<p>
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
						<b>Fonte:</b> Revista Gallileu - Reportagem de Maio de 2018
						<br>
					</p>					
				</div>		
				
				<div class="col-md-3">
				<br>
					<h5 class="text-center"><b>
						Decomposição dos Elementos
					</h5>
					<br>
					<table class="table table-sm">
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
					<p><b>Fonte: </b>Delta Saneamento e Setor Reciclagem</p>
				</div>
				<div class="col-md-1">
				</div>
			</div>

<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>
	<script type="text/javascript" src"js/jquery-3.2.1.min.js"></script>


























<?php

	include "rodape.php";

?>


</body>
</html>
