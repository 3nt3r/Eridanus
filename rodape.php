<footer class="page-footer light-green accent-4">
  <div class="container">
    <div class="row">
      <div class="col l6 s12">
        <a href="index.php"> 
          <img src="imagens/eridanus-pequeno.png"> 
        </a>
        <p class="grey-text text-lighten-4 frase-rodape">"Mudanças são necessárias. Reciclagem não é só no meio ambiente, mas também no ambiente do nosso ser." - Daniel Carvalho</p>
      </div>
      <div class="col l4 offset-l2 s12">
        <h5 class="white-text">Acompanhe-nos</h5>
        <ul>
          <li><a class="grey-text text-lighten-3" href="#">Facebook</a></li>
          <li><a class="grey-text text-lighten-3" href="#">Instagram</a></li>
          <li><a class="grey-text text-lighten-3" href="#">Youtube</a></li>
          <li><a class="grey-text text-lighten-3" href="contato.php">Fale Conosco</a></li>
          <?php 
            if (!isset($_SESSION['email'])) {
              echo "<li><a class=\"grey-text text-lighten-3\" href=\"login-admin.php\">Administrador</a></li>";
            }
          ?>
          
        </ul>
      </div>
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container">
      © 2019 Copyright Eridanus
      <a class="grey-text text-lighten-4 right" href="https://softwarecalisto.000webhostapp.com" target="_blank">Desenvolvido por Calisto Software</a>
    </div>
  </div>
</footer>
