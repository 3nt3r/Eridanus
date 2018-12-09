
<a href="index.php"><img src="imagens/eridanus-menu.png" id="foto-menu"></a>
<table id="login-cadastro" class="hide-on-med-and-down">
  <tr>
    <td><a href="login.php" style="text-decoration: none; color: #64DD17;"> Entre </a></td>
  </tr>
  <tr>
    <td><a href="cadastre-se.php" style="text-decoration: none; color: #64DD17;"> Cadastre-se </a></td>
  </tr>
</table>

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
