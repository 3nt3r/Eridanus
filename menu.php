<center>
<a href="index.php"><img src="imagens/eridanus-menu.png" id="foto-menu" usemap="admin"></a>
</center>

  <map name="admin">
    <area shape="rect" coords="352, 115, 396, 144" href="login-admin.php">
  </map>
  
<?php
	if(!isset($_SESSION['email']) && !isset($_SESSION['senha']) && !isset($_SESSION['nome']) && !isset($_SESSION['id'])){
  ?>  <table id="login-cadastro" class="hide-on-med-and-down">
        <tr>
          <td><a href="login.php" style="text-decoration: none; color: #64DD17;"> Entre </a></td>
        </tr>
        <tr>
          <td><a href="cadastre-se.php" style="text-decoration: none; color: #64DD17;"> Cadastre-se </a></td>
        </tr>
      </table>

  <?php
	}else{

	?>

  <div class="login-cadastro hide-on-med-and-down" style="top: 10%; width: 80em;">
    <a class='dropdown-button btn' id="1" href='#' data-activates='dropdown1' style="background-color: #64dd17;">Olá, <?php echo $_SESSION['nome']; ?>!</a>
    <ul id='dropdown1' class='dropdown-content'>
      <li><a href="acesse-conta.php" style="color: #64dd17;">Meu Painel</a></li>
      <li><a href="sair.php" style="color: #64dd17;">Sair</a></li>
    </ul>
		<ul id='dropdown2' class='dropdown-content'>
      <li><a href="acesse-conta.php" style="color: #64dd17;">Painel</a></li>
      <li><a href="sair.php" style="color: #64dd17;">Sair</a></li>
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
      }
      );
    </script>
  </div>
		<?php
	}
 ?>

  <nav>
    <div class="nav-wrapper" style="background-color: #64DD17; margin-bottom: .3em;">
      <a href="#" data-activates="menu-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul id="nav-mobile" class="left hide-on-med-and-down">
        <li <?php if(strpos($_SERVER['REQUEST_URI'], "index.php") > 0){echo "class='active'";}?>><a href="index.php">Início</a></li>
        <li <?php if(strpos($_SERVER['REQUEST_URI'], "residuos.php")){echo "class='active'";}?>><a href="residuos.php">Resíduos</a></li>
        <li <?php if(strpos($_SERVER['REQUEST_URI'], "projetos.php")){echo "class='active'";}?>><a href="projetos.php">Projetos</a></li>
        <li <?php if(strpos($_SERVER['REQUEST_URI'], "locais.php")){echo "class='active'";}?>><a href="locais.php">Locais</a></li>
        <li <?php if(strpos($_SERVER['REQUEST_URI'], "trocas.php")){echo "class='active'";}?>><a href="trocas.php">Trocas</a></li>
        <li <?php if(strpos($_SERVER['REQUEST_URI'], "projetos-usuarios.php")){echo "class='active'";}?>><a href="projetos-usuarios.php">Público</a></li>
        <li <?php if(strpos($_SERVER['REQUEST_URI'], "contato.php")){echo "class='active'";}?>><a href="contato.php">Contato</a></li>
      </ul>
      <ul id="menu-mobile" class="side-nav">
        <img src="imagens/eridanus-menu.png" id="foto-menu-mobile">
				<?php
						if(!isset($_SESSION['email']) && !isset($_SESSION['senha']) && !isset($_SESSION['nome']) && !isset($_SESSION['id'])){
				?>
				<li><a href="login.php" style="color: #64DD17; 	border: 1px solid #D3D3D3; box-shadow: -1px -1px 2px #D3D3D3;">Entre</a></li>
				<li><a href="cadastre-se.php" style="margin-bottom: 30px; color: #64DD17; border: 1px solid #D3D3D3; box-shadow: -1px -1px 2px #D3D3D3;">Cadastre-se</a></li>
				<?php
			}else{
						?>
						<center>
						<a class='dropdown-button btn' href='#' data-activates='dropdown2' style="background-color: #64dd17;">Olá, <?php echo $_SESSION['nome']; ?>!</a>
					</center>
					<?php
					}
				 ?>
        <li <?php if(strpos($_SERVER['REQUEST_URI'], "index.php") > 0){echo "class='active'";}?>><a href="index.php">Início</a></li>
        <li <?php if(strpos($_SERVER['REQUEST_URI'], "residuos.php")){echo "class='active'";}?>><a href="residuos.php">Resíduos</a></li>
        <li <?php if(strpos($_SERVER['REQUEST_URI'], "projetos.php")){echo "class='active'";}?>><a href="projetos.php">Projetos</a></li>
        <li <?php if(strpos($_SERVER['REQUEST_URI'], "locais.php")){echo "class='active'";}?>><a href="locais.php">Locais</a></li>
        <li <?php if(strpos($_SERVER['REQUEST_URI'], "trocas.php")){echo "class='active'";}?>><a href="trocas.php">Trocas</a></li>
        <li <?php if(strpos($_SERVER['REQUEST_URI'], "projetos-usuarios.php")){echo "class='active'";}?>><a href="projetos-usuarios.php">Público</a></li>
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


