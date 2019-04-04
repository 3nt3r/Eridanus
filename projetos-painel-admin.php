<?php 

	include "conexao.php"; 

	$consulta = "select codigo, titulo, descricao, materiais, imagem, video, autor from projeto where status_atual = 'em avaliacao'";
	$prepare = $banco->prepare($consulta);
	$prepare->bind_result($id_proj, $titulo, $descricao, $materiais, $imagem, $video, $autor);
	$prepare->execute();
	$prepare->store_result();

?>

      <table class="striped">

         <tr>
           <th>#</th>
           <th>Titulo/Descrição/Materiais</th>
           <th>Video/Foto</th>
           <th>Aprovar</th>
           <th>Reprovar</th>
         </tr>

       <?php

        $cont = 1;
        $num = 2000;
        while ($prepare->fetch()) {
          $num = rand($num,$num + 1000);
          $_SESSION[md5($num)] = $id_proj;

          echo "
             <tr>
                <td>$cont</td>
                <td><a style='background-color: #64dd17;' class='cor-menu-usuario btn modal-trigger' href='#modala$cont'><span style='color: white;'>Ver<span></a></td>

                  <div id='modala$cont' class='modal'>
                    <div class='modal-content'>
                      <h4>$titulo</h4>
                      <p>Descrição: <br>$descricao</p>
                      <br>
                      <p>Materiais: <br>$materiais</p>
                    </div>
                    <div class='modal-footer'>
                      <a href='#!' class='modal-close btn-flat'>OK</a>
                    </div>
                  </div>

                <td><a style='background-color: #64dd17;' class='cor-menu-usuario btn modal-trigger' href='#modalb$cont'><span style='color: white;'>Ver<span></a></td>

                  <div id='modalb$cont' class='modal'>
                    <div class='modal-content'>
                      Imagem: <br><img src='imagens-projetos/$autor/$imagem' width='476' height='267'>
                      <br><br>Video: <br><iframe width='476' height='267' src='$video'></iframe>
                    </div>
                    <div class='modal-footer'>
                      <a href='#!' class='modal-close btn-flat'>OK</a>
                    </div>
                  </div>

                  <td><a style='background-color: #64dd17;' class='cor-menu-usuario btn modal-trigger' href='#modalc$cont'><span style='color: white;'><i class='material-icons'>check</i></span></a>

                  <div id='modalc$cont' class='modal'>
                    <div class='modal-content'>
                      <h4>Deseja realmente aprovar o objeto?</h4>
                      <p>Ao aprovar o projeto seu status mudará para aprovado e será apresentado na pagina de Trocas.</p>
                    </div>
                    <div class='modal-footer'>
                      <a href='#!' class='btnMudarStatus modal-close btn-flat' status='aprovado' data='".md5($num)."'>Aprovar</a><a href='#!' class='modal-close waves-effect waves-green btn-flat'>Cancelar</a>
                    </div>


                  <td><a style='background-color: #64dd17;' class='cor-menu-usuario btn modal-trigger' href='#modald$cont'><span style='color: white;'><i class='material-icons'>close</i></span></a>

                  <div id='modald$cont' class='modal'>
                    <div class='modal-content'>
                      <h4>Deseja realmente reprovar o projeto?</h4>
                    </div>
                    <div class='modal-footer'>
                      <a href='#!' class='btnMudarStatus modal-close btn-flat' status='reprovado' data='".md5($num)."'>Reprovar</a><a href='#!' class='modal-close waves-effect waves-green btn-flat'>Cancelar</a>
                    </div>
               </tr>
           ";
           $cont++;
         }

         $banco->close();

       ?>

       </table>
