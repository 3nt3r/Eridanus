<?php
	if(isset($_POST['nome_cad']) && isset($_POST['sobrenome_cad']) && isset($_POST['email_cad']) && isset($_POST['senha_cad']) && isset($_POST['senhacomp_cad']) && isset($_POST["cidade_cad"])){
				$nome = trim(htmlspecialchars($_POST['nome_cad']));
				$sobrenome = trim(htmlspecialchars($_POST['sobrenome_cad']));
				$email = trim(htmlspecialchars($_POST['email_cad']));
				$senha = trim(htmlspecialchars($_POST['senha_cad']));
				$senhacomp = trim(htmlspecialchars($_POST['senhacomp_cad']));
				$cidade = trim(htmlspecialchars($_POST["cidade_cad"]));
				if(!empty($nome) && !empty($sobrenome) && !empty($email) && !empty($senha) && !empty($senhacomp)){

				include "conexao.php";

			if($senha == $senhacomp){
				$nome = strval($nome);
				$sobrenome = strval($sobrenome);
				$email = strval($email);
				$senha = md5(strval($senha));

				$verifica = "select email from usuario where email = ?";
				$prepare = $banco->prepare($verifica);
				$prepare->bind_param("s",$email);
				$prepare->bind_result($emailB);
				$prepare->execute();
				$prepare->store_result();
				$prepare->fetch();
				if($emailB == $email){
					echo "email";
					$banco->close();
					exit;
				}else{
				$inserir = "INSERT INTO usuario (nome, sobrenome, email, cidade, senha) VALUES (?, ?, ?, ?, ?)";
				$prepare = $banco->prepare($inserir);
				$prepare->bind_param("sssss", $nome, $sobrenome, $email, $cidade, $senha);
				$prepare->execute();
				mkdir("imagens-projetos/".md5($email), 0777);
				mkdir("imagens-objetos/".md5($email), 0777);
				echo "
					<h3 class=\"teat-text titulo-pagina\">Cadastro efetuado com sucesso!</h3>
					<i class=\"material-icons large\" style=\"color: rgb(100,221,23);\">check_circle_outline</i>
					<h3 class=\"teat-text titulo-pagina\"> Agora faça login no menu principal! </h3>
				";
				$banco->close();
			}
			}else{
				echo "senha1";
				$banco->close();
				exit;
			}
		}else{
			echo "form";
			$banco->close();
			exit;
		}
	}else{
		echo "form";
		$banco->close();
		exit;
	}
?>
