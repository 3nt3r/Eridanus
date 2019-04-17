$(window).resize(function(){
	var largura = $(this).width();
	if(largura < 700){
		$("#foto-menu").css('width', '60%');
		$("#foto-menu").css('height', '80%');
	}else{
		$("#foto-menu").css('width', '');
		$("#foto-menu").css('height', '');
	}
});

$(document).ready(function(){
		$('#form').submit(function(){
			var dados = $( this ).serialize();
			$.ajax({
				type: "POST",
				url: "cadastra.php",
				data: dados,
				beforeSend: function(){
          $("#preloader").css('display','inline');
          $("#btncad").addClass("disabled");
        }
			})
        .done(function(data){
          $("#aviso").hide();
          $("#erroSC").html("");
          $("#erroS").html("");
          $("#erroE").html("");
          $("#preloader").hide();
          $("#btncad").removeClass("disabled");
          $("#password").removeClass("invalid");
          $("#password2").removeClass("invalid");
          $("#email").removeClass("invalid");
          $("#first_name").removeClass("invalid");
          $("#last_name").removeClass("invalid");
          if(data.indexOf("senha1") >= 0){
              $("#password").addClass("invalid");
              $("#password2").addClass("invalid");
              $("#erroSC").html("As senhas não correspondem!");
          }else if(data.indexOf("form") >= 0){
              $("#password").addClass("invalid");
              $("#password2").addClass("invalid");
              $("#email").addClass("invalid");
              $("#first_name").addClass("invalid");
              $("#last_name").addClass("invalid");
              $("#erroSC").html("Favor preencher todos os dados!");
          }else if(data.indexOf("email") >= 0){
              $("#email").addClass("invalid");
              $("#erroE").html("Email já cadastrado!");
          }else if(data.indexOf("sucesso") >= 0){
              $("#cadastro").hide();
              $("#aviso").show();
              $("#aviso").html(data);
          }else{
			$("#cadastro").hide();
			$("#aviso").show();
			$("#aviso").html(data);
          }
        }).fail(function(){
          alert("Não foi possivel enviar os dados!");
        });
			return false;
		});
		
		var re = new RegExp("^[0-9]{3}-[0-9]{3}$", "g");
		$("#codigo").keyup(function(){
			var verif = re.exec($(this).val());
			if(verif != null){
				$("#enviarCod").removeClass("disabled");
				$(this).removeClass("invalid");
			}else{
				$("#enviarCod").addClass("disabled");
				$(this).addClass("invalid");
			}

		});
		$('#senhaConf').keyup(function(){
			if($(this).val() == $("#senhaNova").val()){
				$("#bntRedefinirSenha").removeClass("disabled");
				$(this).removeClass("invalid");
				$(this).addClass("valid");
				$("#erroSenha").html("");
			}else{
				$("#bntRedefinirSenha").addClass("disabled");
				$(this).addClass("invalid");
				$("#erroSenha").html("As senhas não são iguais!");
			}
		});
	});
