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
              <center> <span class="white-text titulo-partes-projeto"> Quase todo lixo eletrônico do Brasil é descartado de maneira errada! </span> </center>
            </div>
        </div>
    <div class="col s2"></div>
  </div>
</div>

  <div class="slider">
    <ul class="slides">

      <li>
        <img src="imagens/residuos-03.png">
        <div class="caption center-align">
        </div>
      </li>

      <li>
        <img src="imagens/residuos-02.png">
        <div class="caption center-align">
        </div>
      </li>

      <li>
        <img src="imagens/residuos-01.png">
        <div class="caption center-align">
        </div>
      </li>  

      <li>
        <img src="imagens/residuos-04.jpg">
        <div class="caption center-align">
        </div>
      </li> 

      <li>
        <img src="imagens/residuos-05.jpg">
        <div class="caption center-align">
        </div>
      </li> 

      <li>
        <img src="imagens/residuos-06.jpg">
        <div class="caption center-align">
        </div>
      </li> 

      <li>
        <img src="imagens/residuos-07.jpg">
        <div class="caption center-align">
        </div>
      </li> 

    </ul>
  </div>

<script type="text/javascript">
  $(document).ready(function(){
    $('.slider').slider();
  });
</script>

<div class="container">

<div class="toggle">
	<p id="texto-residuos">
		Dezoito meses é o tempo médio de vida de um novo smartphone. Conforme um novo aparelho chega às lojas,
		outros tantos são aposentados e, assim, o que era um artigo quase fundamental, vira um problema.
		<br>
		O mesmo acontece com computadores, televisões, videogames e câmeras fotográficas: no final, sobram
		44,7 milhões de toneladas de lixo eletrônico todo ano, o equivalente a 4,5 mil torres Eiffel.
		<br>
		A estimativa é que, em média, sejam descartados 6,7 quilos de lixo eletrônico para cada habitante do
		nosso planeta. No Brasil, o problema não é menor. Sétimo maior produtor do mundo, com 1,5 mil toneladas
		por ano, estima-se que em 2018 cada um de nós jogará fora pelo menos 8,3 quilos de eletrônicos.
		<br>
		Apesar de um estudo com números de 2016 ter demonstrado que o reaproveitamento do material descartado naquele
		ano poderia render R$240 bilhões de reais em todo planeta, apenas 20% do lixo eletrônico do planeta é reciclado.
		Por aqui, somente 3% são coletados da forma adequada.
		<br>
		<span id="fonte-residuos"><b>Fonte:</b> Revista Gallileu - Reportagem de Maio de 2018</span>
		<br>
    <br>
    <span class="titulo-materiais-reciclados">Quais materiais podem ser reciclados?</span> 
    <br>
    <br>
    <p id="texto-residuos">
      O processo de reciclagem do lixo eletrônico começa com a coleta ou recebimento do material. Em seguida, os aparelhos são desmontados por um processo chamado manufatura reversa, que é o movimento inverso ao de uma linha de montagem. Cada material é classificado de acordo com categorias, por exemplo: plásticos, metais, placas de circuito, vidros, metais pesados, elementos químicos, etc.
      <br>
      Os materiais que podem ser reciclados são encaminhados para esse fim. A reciclagem de lixo eletrônico pode ser realizada nos centros que realizam a separação ou em empresas especializadas em cada tipo de material. O material a ser reciclado é reduzido por trituração ou compactação para reduzir os custos com transporte.
      Também podemos reutilizar materiais como: plásticos, metais, carcaças de computadores e afins, cabos, fios e materiais não contaminantes.
      <br>
      <span id="fonte-residuos"><b>Fonte:</b> Resell - Como Funciona a Reciclagem de Lixo Eletrônico? </span>
    </p>
	</p>
</div>  

  <div class="row">
    <div class="col s2"></div>
        <div class="col s8">
            <div class="card-panel teal light-green accent-4">
              <center> <span class="white-text titulo-partes-projeto"> Veja na tabela abaixo, o tempo de decomposição dos principais componentes e elementos que estão presentes em smartphones e eletrônicos em geral. </span> </center>
            </div>
        </div>
    <div class="col s2"></div>
  </div>

    <div class="row">
      <table class="striped tabela-residuos centered">
        <thead>
          <tr>
              <th>#</th>
              <th>Produto</th>
              <th>Anos</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>1</td>
            <td>Pilhas</td>
            <td>100 a 500</td>
          </tr>
          <tr>
            <td>2</td>
            <td>Metais</td>
            <td>450</td>
          </tr>
          <tr>
            <td>3</td>
            <td>Plásticos</td>
            <td>450</td>
          </tr>
          <tr>
            <td>4</td>
            <td>Vidro</td>
            <td>4.000 a 1.000.000</td>
          </tr>
          <tr>
            <td>5</td>
            <td>Alumínio</td>
            <td>200 a 500</td>
          </tr>
           <tr>
            <td>6</td>
            <td>Borracha</td>
            <td>Indeterminado</td>
          </tr>
        </tbody>
      </table>

      <center class="fonte-fim"><span id="fonte-residuos"><b>Fonte:</b> Delta Saneamento e Setor Reciclagem</span></center>
      
  </div>

</div>

<?php

	include "rodape.php";

?>

</body>
</html>
