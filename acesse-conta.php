<?php
	session_start();
	if(!isset($_SESSION['email']) && !isset($_SESSION['senha'])){
		header("Location: login.php");
	}
 ?>
<!DOCTYPE html>
<html>
<head>

	<title>xxxx - Eridanus</title>

	<?php

		include "cabecalho.php";

	?>

</head>
<body>






<?php

	include "rodape.php";

?>


</body>
</html>
