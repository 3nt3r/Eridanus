$(document).ready(function(){

  $('#btnAlt').click(function(event){
    event.preventDefault();
    $.get("alterarinfo.php", function(data){
      $("#conteudo").html(data);
    })
  });

  $('#bntEnviarObjeto').click(function(event){
    event.preventDefault();
    $.get("enviarObjeto.php", function(data){
      $("#conteudo").html(data);
    });
  });

  $('#btnverobjetos').click(function(event){
    event.preventDefault();
    $.get("objetos-painel-admin.php", function(data){
      $("#conteudo").html(data);
    });
  });

  $('#btnProjetosExcluidos').click(function(event){
    event.preventDefault();
    $.get("projetosExcluidos.php", function(data){
      $("#conteudo").html(data);
    });
  });

  $('#btnObjetosExcluidos').click(function(event){
    event.preventDefault();
    $.get("objetosExcluidos.php", function(data){
      $("#conteudo").html(data);
    });
  });

  $('#bntEnviarProj').click(function(event){
    event.preventDefault();
    $.get("enviarproj.php", function(data){
      $("#conteudo").html(data);
    });
  });

  $('.btnEditarProj').click(function(event){
    event.preventDefault();
    var dado = $(this).attr("data");
    $.post("editarproj.php", "data="+dado,function(data){
      $("#conteudo").html(data);
    });
  });

  $('.btnEditarObje').click(function(event){
    event.preventDefault();
    var dado = $(this).attr("data");
    $.post("editarobje.php", "data="+dado,function(data){
      $("#conteudo").html(data);
    });
  });

  $('.btnExcluirProj').click(function(){
    var dado = $(this).attr("data");
    $.post("excluirproj.php", "data="+dado,function(data){
      $.get("listarproj.php", function(data){
        $("#conteudo").html(data);
      });
    });
  });

  $('.btnExcluirObje').click(function(){
    var dado = $(this).attr("data");
    $.post("excluirobje.php", "data="+dado,function(data){
      $.get("gerenciarobjetos.php", function(data){
        $("#conteudo").html(data);
      });
    });
  });

  $('#btnListarProj').click(function(event){
    event.preventDefault();
    $.get("listarproj.php", function(data){
      $("#conteudo").html(data);
    });
  });

  $('#btncads').click(function(event){
    event.preventDefault();
    $.get("alterarsenha.php", function(data){
      $("#conteudo").html(data);
    })
  });

  $('#gerenciarobjetos').click(function(event){
    event.preventDefault();
    $.get("gerenciarobjetos.php", function(data){
      $("#conteudo").html(data);
    })
  });

  $('.btnMudarStatus').click(function(event){
    event.preventDefault();
    var dado = $(this).attr("data");
    var status = $(this).attr("status");
    var motivo = $("#motivo").val();
    $.post("mudarstatusproj.php", "data="+dado+"&status="+status+"&motivo="+motivo,function(data){
      $.get("projetos-painel-admin.php", function(data){
         $("#conteudo").html(data);
       });
    });
  });

  $('.btnMudarStatusObje').click(function(event){
    event.preventDefault();
    var dado = $(this).attr("data");
    var status = $(this).attr("status");
    var motivo = $("#motivo").val();
    $.post("mudarstatusobje.php", "data="+dado+"&status="+status+"&motivo="+motivo,function(data){
      $.get("objetos-painel-admin.php", function(data){
         $("#conteudo").html(data);
       });
    });
  });

  $('#btncad').click(function(){
    $(this).hide();
    $('#btncads').hide();
    $('#btnsalvar').show();
    $('#first_name').removeAttr("disabled");
    $('#last_name').removeAttr("disabled");
    $('#email').removeAttr("disabled");
  });

  $('#alterar').submit(function(){
    var dados = $(this).serialize();
    $.ajax({
      url: "altera.php",
      type: "post",
      data: dados,
      beforeSend: function(){ $('#preloader').css('display','inline'); $('#btnsalvar').addClass('disabled');}
    })
    .done(function(data){
      $('#preloader').hide();
      $('#btnsalvar').removeClass('disabled');
      $('#btnsalvar').hide();
      $('#first_name').attr("disabled", true);
      $('#last_name').attr("disabled", true);
      $('#email').attr("disabled", true);
      $('#btncad').show();
      $('#btncads').show();
      alert('Dados alterados com sucesso!');
    })
    .fail(function(){
      alert('ok');
    });
    return false;
  });

  $('#alterarSenha').submit(function(){
    var dados = $(this).serialize();
    $('#erroSenhaC').html("");
    $('#erroSenhaI').html("");
    $.ajax({
      url: "altera.php",
      type: "post",
      data: dados,
      beforeSend: function(){$('#preloader').css('display','inline'); $('#alteraSenha').addClass('disabled'); }
    })
    .done(function(data){
      $('#preloader').hide();
      $('#alteraSenha').removeClass('disabled');
      if(data.indexOf("incorreta") >= 0){
        $('#erroSenhaI').html(data);
      }else if(data.indexOf("coincidem") >= 0){
        $('#erroSenhaC').html(data);
      }else if(data.indexOf("certo") >= 0){
        alert("Senha alterada com sucesso! \n Faço o login novamente!");
        window.location.href = "login.php";
      }else{
        alert("erro");
      }
    })
    .fail(function(){
      alert('ok');
    });
    return false;
  });


  $('#btnEnviarMensagem').click(function(event){
    event.preventDefault();
    var mensagem = $("#mensagem").val();
    var verif1 = $(this).attr("verif1");
    var verif2 = $(this).attr("verif2");
    $.ajax({
      url: "enviarmensagem.php",
      type: "post",
      data: "mensagem="+mensagem+"&verif1="+verif1+"&verif2="+verif2,
      beforeSend: function(){$('#btnEnviarMensagem').addClass("disabled"); $("#preEnvio").addClass("active")}
    })
    .done(function(data){
      $('#btnEnviarMensagem').removeClass("disabled");
      $("#preEnvio").removeClass("active")
      if(data.indexOf("sucesso") > -1){
        alert("Mensagem enviada com sucesso!");
        window.location.href = "trocas.php";
      }else{
        alert("Erro ao enviar mensagem por favor tente mais tarde!");
      }
      console.log(data);
    })
    .fail(function(){
      alert('Erro ao enviar mensagem!');
    });
  });


  $("#mensagens").click(function(event){
    event.preventDefault();
    alert("Teste");
  });

  $('.modal').modal();

});
