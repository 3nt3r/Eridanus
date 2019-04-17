<?php session_start();  ?>

<!DOCTYPE html>
<html>
<head>

	<title>Locais - Eridanus</title>

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
              <center> <span class="white-text titulo-partes-projeto"> Abaixo, você pode encontrar locais para descarte legal de resíduos eletrônicos! </span> </center>
            </div>
        </div>
    <div class="col s2"></div>
  </div>
</div>

<iframe src="https://www.google.com/maps/d/embed?mid=1oTSE94yl3aDAYyrKyU5Y9CKUji_Nx36M" width="100%" height="550"></iframe>

<?php

	include "rodape.php";

?>

</body>
</html>
