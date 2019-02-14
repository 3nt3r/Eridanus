<?php
	session_start();
	if(!isset($_SESSION['email_admin']) && !isset($_SESSION['senha_admin'])){
		header("Location: login.php");
	}
 include "conexao.php";
 $consulta = "select o.id, o.nome, o.descricao, o.status_atual, o.imagem, u.nome from objeto o join usuario u on o.id_usuario = u.id where status_atual = 'em avaliacao'";
 $prepare = $banco->prepare($consulta);
 $prepare->bind_result($id_obje, $nome, $descricao, $status_atual, $imagem, $nome_cliente);
 $prepare->execute();
 $prepare->store_result();
 ?>
 <meta charset="utf-8">
 <script type="text/javascript" src="js/jquery.min.js"></script>
 <script type="text/javascript" src="js/materialize.js"></script>
 <script type="text/javascript" src="js/painel-usuario.js"></script>
 <link rel="stylesheet" type="text/css" href="css/materialize.min.css">
 <h5 class="titulo-pagina flow-text"> Aprovar Projetos </h5>
 <table class="striped">
   <tr>
     <th>#</th>
     <th>Nome/Descrição</th>
     <th>Foto</th>
     <th>Aprovar</th>
     <th>Reprovar</th>
   </tr>
 <?php
   $cont = 1;
   $num = 2000;
   while ($prepare->fetch()) {
     $num = rand($num,$num + 1000);
     $_SESSION[md5($num)] = $id_obje;
     echo "
       <tr>
          <td>$cont</td>
          <td><a style='background-color: #64dd17;' class='cor-menu-usuario waves-effect waves-light btn modal-trigger' href='#modala$cont'><span style='color: white;'>Ver<span></a></td>
            <div id='modala$cont' class='modal'>
              <div class='modal-content'>
                <h4>$nome</h4>
                <p>Descrição: <br>$descricao</p>
              </div>
              <div class='modal-footer'>
                <a href='#!' class='modal-close waves-effect waves-green btn-flat'>OK</a>
              </div>
            </div>
          <td><a style='background-color: #64dd17;' class='cor-menu-usuario waves-effect waves-light btn modal-trigger' href='#modalb$cont'><span style='color: white;'>Ver<span></a></td>
            <div id='modalb$cont' class='modal'>
              <div class='modal-content'>
                Imagem: <br><img src='imagens-objetos/$nome_cliente/$imagem' width='476' height='267'>
              </div>
              <div class='modal-footer'>
                <a href='#!' class='modal-close waves-effect waves-green btn-flat'>OK</a>
              </div>
            </div>
          <td><button class='btnMudarStatusObje' type='button' status='aprovado' data='".md5($num)."'><i class='material-icons'>check</i></button></td>
          <td><button class='btnMudarStatusObje' type='button' status='reprovado' data='".md5($num)."'><i class='material-icons'>close</i></button></td>
       </tr>
     ";
     $cont++;
   }
   $banco->close();
 ?>
 </table>
