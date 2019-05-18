<center>
<a href="index.php"> <img src="imagens/eridanus-menu.png" id="foto-menu"> </a>
</center>

<?php

	if(!isset($_SESSION['email']) && !isset($_SESSION['senha']) && !isset($_SESSION['email_admin'])){
    ?>

    <table id="login-cadastro" class="hide-on-med-and-down">
      <tr>
        <td> <a href="login.php" class="tabela-login"> Entre </a> </td>
      </tr>
      <tr>
        <td> <a href="cadastre-se.php" class="tabela-login"> Cadastre-se </a> </td>
      </tr>
    </table>

  <?php

	 }else if(isset($_SESSION['email']) && !isset($_SESSION['email_admin'])){

	?>

  <div class="login-cadastro hide-on-med-and-down">

    <a class='dropdown-button btn menu-login' id="1" style="width: 200px;" href='#' data-activates='dropdown1'> Olá, <?php echo $_SESSION['nome']; ?>! </a>

    <ul id='dropdown1' class='dropdown-content'>
      <li><a href="acesse-conta.php" class="cor-menu-usuario"> Meu Painel </a></li>
      <li><a href="sair.php" class="cor-menu-usuario"> Sair </a></li>
    </ul>

		<ul id='dropdown2' class='dropdown-content'>
      <li><a href="acesse-conta.php" class="cor-menu-usuario">Painel</a></li>
      <li><a href="sair.php" class="cor-menu-usuario">Sair</a></li>
    </ul>

    <script type="text/javascript">
      $('#1').dropdown({
        inDuration: 300,
        outDuration: 225,
        constrainWidth: false,
        hover: true,
        gutter: 0,
        belowOrigin: false,
        alignment: 'left',
        stopPropagation: false
      });
    </script>

  </div>

		<?php

	     }else if(!isset($_SESSION['email']) && isset($_SESSION['email_admin'])){

    ?>

  <div class="login-cadastro hide-on-med-and-down">

    <a class='dropdown-button btn menu-login' id="1" style="width: 200px;" href='#' data-activates='dropdown1'> Olá, <?php echo $_SESSION['nome_admin']; ?>! </a>

    <ul id='dropdown1' class='dropdown-content'>
      <li><a href="painel-admin.php" class="cor-menu-usuario"> Meu Painel </a></li>
      <li><a href="sair.php" class="cor-menu-usuario"> Sair </a></li>
    </ul>

    <ul id='dropdown2' class='dropdown-content'>
      <li><a href="painel-admin.php.php" class="cor-menu-usuario">Painel</a></li>
      <li><a href="sair.php" class="cor-menu-usuario">Sair</a></li>
    </ul>

    <script type="text/javascript">
      $('#1').dropdown({
        inDuration: 300,
        outDuration: 225,
        constrainWidth: false,
        hover: true,
        gutter: 0,
        belowOrigin: false,
        alignment: 'left',
        stopPropagation: false
      });
    </script>

  </div>

    <?php
  }

 ?>

  <nav>
    <div class="nav-wrapper menu-dispositivo-movel">

      <a href="#" data-activates="menu-mobile" class="button-collapse"><i class="material-icons">menu</i></a>

        <ul id="nav-mobile" class="left hide-on-med-and-down">
          <li <?php if(strpos($_SERVER['REQUEST_URI'], "index.php") > 0){echo "class='active'";}?>><a href="index.php">Início</a></li>
          <li <?php if(strpos($_SERVER['REQUEST_URI'], "residuos.php")){echo "class='active'";}?>><a href="residuos.php">Resíduos</a></li>
          <li <?php if(strpos($_SERVER['REQUEST_URI'], "locais.php")){echo "class='active'";}?>><a href="locais.php">Locais</a></li>
          <li <?php if(strpos($_SERVER['REQUEST_URI'], "trocas.php")){echo "class='active'";}?>><a href="trocas.php">Objetos</a></li>
          <li <?php if(strpos($_SERVER['REQUEST_URI'], "projetos-usuarios.php")){echo "class='active'";}?>><a href="projetos-usuarios.php"> Projetos </a></li>
          <li <?php if(strpos($_SERVER['REQUEST_URI'], "contato.php")){echo "class='active'";}?>><a href="contato.php">Contato</a></li>
      </ul>

      <ul id="menu-mobile" class="side-nav">

				<?php

          if(!isset($_SESSION['email']) && !isset($_SESSION['senha']) && !isset($_SESSION['nome']) && !isset($_SESSION['id'])){
        ?>

        <div id="distancia-topo-mobile">
				  <li><a href="login.php" class="login-dispositivo-movel">Entre</a></li>
				  <li><a href="cadastre-se.php" class="cadastre-se-dispositivo-m">Cadastre-se</a></li>
        </div>

				<?php

			}else{

					?>

					<center>
						<a class='dropdown-button btn menu-login' href='#' data-activates='dropdown2'>Olá, <?php echo $_SESSION['nome']; ?>!</a>
					</center>

					<?php

					}

				 ?>

          <li <?php if(strpos($_SERVER['REQUEST_URI'], "index.php") > 0){echo "class='active'";}?>><a href="index.php">Início</a></li>
          <li <?php if(strpos($_SERVER['REQUEST_URI'], "residuos.php")){echo "class='active'";}?>><a href="residuos.php">Resíduos</a></li>
          <li <?php if(strpos($_SERVER['REQUEST_URI'], "locais.php")){echo "class='active'";}?>><a href="locais.php">Locais</a></li>
          <li <?php if(strpos($_SERVER['REQUEST_URI'], "trocas.php")){echo "class='active'";}?>><a href="trocas.php">Objetos</a></li>
          <li <?php if(strpos($_SERVER['REQUEST_URI'], "projetos-usuarios.php")){echo "class='active'";}?>><a href="projetos-usuarios.php"> Projetos </a></li>
          <li <?php if(strpos($_SERVER['REQUEST_URI'], "contato.php")){echo "class='active'";}?>><a href="contato.php">Contato</a></li>

			</ul>

    </div>
  </nav>

  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/materialize.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script type="text/javascript" src="js/script.js"></script>

  <script type="text/javascript">
    $(".button-collapse").sideNav();
  </script>
