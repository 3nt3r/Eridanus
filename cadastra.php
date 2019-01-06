<?php
	if(isset($_POST['nome_cad']) && isset($_POST['sobrenome_cad']) && isset($_POST['email_cad']) && isset($_POST['senha_cad']) && isset($_POST['senhacomp_cad'])){
				$nome = trim(htmlspecialchars($_POST['nome_cad']));
				$sobrenome = trim(htmlspecialchars($_POST['sobrenome_cad']));
				$email = trim(htmlspecialchars($_POST['email_cad']));
				$senha = trim(htmlspecialchars($_POST['senha_cad']));
				$senhacomp = trim(htmlspecialchars($_POST['senhacomp_cad']));

				if(!empty($nome) && !empty($sobrenome) && !empty($email) && !empty($senha) && !empty($senhacomp)){

				$banco = new mysqli('localhost:3307', 'root', '', 'eridanus');

				if(mysqli_connect_errno()){
					echo 'erroBanco';
					exit;
				}
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
					exit;
				}else{
				$inserir = "INSERT INTO usuario (nome, sobrenome, email, senha) VALUES (?, ?, ?, ?)";

				$prepare = $banco->prepare($inserir);
				$prepare->bind_param("ssss", $nome, $sobrenome, $email, $senha);
				$prepare->execute();
				echo "<h3 class=\"teat-text titulo-pagina\">Cadastro efetuado com sucesso!</h3>
				<i class=\"material-icons large\" style=\"color: rgb(100,221,23);\">check_circle_outline</i>";
			}
			}else{
				echo "senha1";
				exit;
			}
		}else{
				echo "form";
				exit;
		}
	}else{
		echo "form";
		exit;
	}
?>
