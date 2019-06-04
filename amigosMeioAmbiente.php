<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>

	<title>Amigos do Meio Ambiente - Eridanus</title>

  <script type="text/javascript" src="js/jquery.min.js"></script>

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
          <center> <span class="white-text titulo-partes-projeto"> Abaixo está em destaque todas as empresas que colaboram com o nosso projeto! </span> </center>
        </div>
      </div>
    <div class="col s3"></div>
  </div>


  <div class="row">
    <div class="col s6">
      <p class="descricaoAmigo">
        A Oronet Telecom é um provedor de internet banda larga que procura fornecer um serviço de qualidade ao cidadão que procura se conectar com o mundo digital. Temos uma equipe técnica atuando diariamente para atender de forma rápida aos nossos clientes. Atuamos no município de Orocó-PE, a pouco mais de um ano e vem a cada dia crescendo e aperfeiçoando o seu sinal com equipamentos de última geração. A Oronet Telecom procura chegar a localidades remotas, como áreas rurais. Procuramos manter nossos técnicos atualizados e preparados para melhor atender nossos clientes.
      </p>
    </div>
      <div class="col s5">
        <img src="imagens/OroNet.png">
    </div>
    <div class="col s1"></div>
  </div>


  <div class="row">
    <div class="col s5">
      <img src="imagens/maCursos.jpg">
    </div>    
    <div class="col s6">
      <p class="descricaoAmigo">
        MA Cursos é uma empresa educacional que disponibiliza vários cursos em diversas áreas de ensino. Trabalhamos com cursos presenciais e à distancia. Nosso intuito é levar até você o melhor material didático possível e as melhores metodologias de ensino da região. Estamos localizados na R. Cel. Manoel de Sá, em frente a igreja matriz no centro de Salgueiro - PE.
      </p>
    </div>
    <div class="col s1"></div>
  </div>  


<?php

	include "rodape.php";

?>

</body>
</html>
