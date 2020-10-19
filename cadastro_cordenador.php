<?php
session_start();
?>
<!--**
 * @author bit Brasilia 
 * @pagina desenvolvida usando FullCalendar e Bootstrap 4,
 * o código é aberto e o uso é free, 
 * porém lembre-se de conceder os créditos ao desenvolvedor.
 *-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8' />
        <meta http-equiv="Content-Language" content="pt-br">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='css/core/main.min.css' rel='stylesheet' />
        <link href='css/daygrid/main.min.css' rel='stylesheet' />
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/personalizado.css?<?=time();?>">

        <script src='js/core/main.min.js'></script>
        <script src='js/interaction/main.min.js'></script>
        <script src='js/daygrid/main.min.js'></script>
        <script src='js/core/locales/pt-br.js'></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="js/personalizado.js?<?=time();?>"></script>
        <? 
        include'conexao.php';
        include'menu_superior.php';
        ?>
    </head>
    <body>
    
       <? if (isset($_POST) &&(!empty($_POST)) && $_POST['session']==session_id()){ 
      
      

    foreach ($_POST as $key => $value) {

      
        echo "<tr>";
        echo "<br>";
        echo $key;
        echo "</td>";
        echo "<br>";
        echo $value;
        echo "</td>";
        echo "</tr>";
    }



 if( !isset($_SESSION['envio']) ) { 
     // include "conexao.php";
     $nome=trim($_POST['nome']);
     $sobre_nome=trim($_POST['sobre_nome']);
     $local_trabalho=trim($_POST['local_trabalho']);
     $numero_registro_profissional=trim($_POST['numero_registro_profissional']);
     $profissao=trim($_POST['profissao']);
     $numero_registro_profissional=trim($_POST['numero_registro_profissional']);
     $data=date('y-m-d h:i:s');
     $session=$_POST['session'];
     $endereco=trim($_POST['endereco']);
     ///se coordenador////
     $nivel=trim("coord");
     $senha=trim($_POST['senha']);
     $setor=trim($_POST['setor']);
     $stmt = $conexao->prepare("INSERT INTO usuario (nome,sobrenome,local_trabalho,numero_registro_profissional,profissao,senha,data_cadastro,session,endereco,nivel,setor) VALUES (?,?,?,?,?, ?,?,?,?,?,?)");
     $stmt->bindParam(1, $nome);
     $stmt->bindParam(2, $sobre_nome);
     $stmt->bindParam(3, $local_trabalho);
     $stmt->bindParam(4, $numero_registro_profissional);
     $stmt->bindParam(5, $profissao);
     $stmt->bindParam(6, $senha);
     $stmt->bindParam(7, $data);
     $stmt->bindParam(8, $session);
     $stmt->bindParam(9, $endereco);
     $stmt->bindParam(10, $nivel);
     $stmt->bindParam(11, $setor);
     $cad_user_ok=$stmt->execute();   
     if($cad_user_ok){ 
     $_SESSION['envio']="1";
    }  }
     ?>
     <div class="alert alert-light" role="alert">
  <h4 class="alert alert-dark">Cadastro de Coordenador de Serviço Realizado com sucesso!</h4>
  <p> SE FOR USUARIO DIRECIONAR BUSCAR ESCALA </p>
  <hr>
  <p class="mb-0"></p>
</div><?
$nome=$_POST['nome'];
$senha=$_POST['senha'];

$stmt = $conexao->prepare("SELECT * FROM usuario WHERE nome = :nome and senha = :senha");

$stmt->bindValue(":nome", $_POST['nome']);
$stmt->bindValue(":senha", ($_POST['senha']));
$stmt->execute();
//$stmt = $conexao->prepare("SELECT * FROM usuario WHERE nome=$nome");
if ($stmt->execute()) {
/* Return number of rows that were deleted */
$count = $stmt->rowCount();
if($count=='1'){
    while ($login = $stmt->fetch(PDO::FETCH_OBJ)) {
      echo  $_SESSION['nome']=$login->nome; echo '</br>';
      echo  $_SESSION['sobrenome']=$login->sobrenome;echo '</br>';
      echo  $_SESSION['id_coordenado']=$login->id_coordenado;echo '</br>';
      echo  $_SESSION['local_trabalho']=$login->local_trabalho;echo '</br>';
      echo  $_SESSION['session']=$login->session;echo '</br>';
      echo  $_SESSION['id']=$login->id;echo '</br>';
      echo  $_SESSION['nivel']=$login->nivel;echo '</br>';
      echo  @$login->nivel;echo '</br>';

        
      header('Location: cadastrar_setor.php');
    }
  }
}


 exit();    }
////////////não exibir formulario se japrencidoe deu tudo ceto ////////
else{ 
  unset( $_SESSION['envio'] ); 
  echo @$_SESSION['envio'];
    ?><form role="form" method="post">        
  <form class="needs-validation" novalidate>
  <div class="form-row">
    <div class="col-md-6 mb-3">
    <label for="validationCustom04"></label>
      <input type="text" class="form-control" name="nome" id="validationCustom01" placeholder="Nome" required>
      <div class="valid-feedback">
       ok
      </div>
    </div>
    <div class="col-md-6 mb-3">
    <label for="validationCustom04"></label>
      <input type="text" class="form-control"  name="sobre_nome"id="validationCustom02" placeholder="Sobre Nome" required>
      <div class="valid-feedback">
        ok
      </div>
    </div>
  </div>



		
				<input type="text" name="endereco"  class="form-control" placeholder="Cidade Onde trabalha" size="30" value="" id="inputString" onKeyUp="lookup(this.value);" onBlur="fill();" />
				
			<div class="suggestionsBox " id="suggestions" style="display: none;">
				<div class="suggestionList" id="autoSuggestionsList">
					 
				</div>
			</div>






  
  <div class="form-row">
    <div class="col-md-6 mb-3">
    <label for="validationCustom04"></label>
      <input type="text" class="form-control" name="local_trabalho" placeholder="local de trabalho" id="validationCustom03" required>
      <div class="invalid-feedback">
        Please provide a valid city.
      </div>
    </div>
   
   

 
 


    
    
  



    <div class="col-md-6 mb-3">
      <label for="validationCustom05"></label>
      <input type="number" class="form-control" name="numero_registro_profissional"  placeholder="CPF ou Nunmero de Inscrição conselho " required>
      <div class="invalid-feedback">
        Please provide a valid zip.
      </div>
    </div>


    
    <div class="col-md-5 mb-5">
      <label for="validationCustom05">Senha </label>
      <input type="password"  name="senha"class="form-control" id="validationCustom05" placeholder="escolha uma senha" required>
      <small id="passwordHelpBlock" class="form-text text-muted">
 escolha uma senha com minino 6 digitos para acesso ao app </small>
      <div class="invalid-feedback">
        Please provide a valid zip.
      </div>
    </div>

    <div class="col-md-5 mb-5">
      <label for="validationCustom05">Repetir Senha </label>
      <input type="password" name="repetir_senha" class="form-control" id="validationCustom05" placeholder="escolha uma senha" required>
      <small id="passwordHelpBlock" class="form-text text-muted">
 escolha uma senha com minino 6 digitos para acesso ao app </small>
      <div class="invalid-feedback">
        Please provide a valid zip.
      </div>
    </div>



  </div>
  
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
      <label class="form-check-label" for="invalidCheck">
        Agree to terms and conditions
      </label>
      <div class="invalid-feedback">
        You must agree before submitting.
      </div>
    </div>
  </div>
  <input type="hidden" name="session" value="<?=session_id();?>" />
  <button class="btn btn-primary" type="submit">Salvar</button>
</form>
<br>
<div class="alert alert-secondary" role="alert">
  <h4 class="alert-heading">Proxima Etapa </h4>
  <p>Você fará cadastro os setores de sua coordenação e as equipes de enfermagem </p>
  <hr>
 
</div>
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

 
  
 
</form>
<? } ?>
<script type="text/javascript">

  var idContador = 0;
      
  function exclui(id){
    var campo = $("#"+id.id);
    campo.hide(200);
  }

  $( document ).ready(function() {
    
    $("#btnAdicionaEmail").click(function(e){
      e.preventDefault();
      var tipoCampo = "email";
      adicionaCampo(tipoCampo);
    })
    
    $("#btnAdicionaTelefone").click(function(e){
      e.preventDefault();
      var tipoCampo = "telefone";
      adicionaCampo(tipoCampo);
    })
    
    function adicionaCampo(tipo){

      idContador++;
      
      var idCampo = "campoExtra"+idContador;
      var idForm = "formExtra"+idContador;
    
      var html = "";
      
      html += "<div style='margin-top: 8px;' class='input-group' id='"+idForm+"'>";
      html += "<input type='text' name='setor"+idCampo+"'id='"+idCampo+"' class='form-control novoCampo' placeholder='Setores de sua Cordenação'/>";
      html += "<span class='input-group-btn'>";
      html += "<button class='btn' onclick='exclui("+idForm+")' type='button'><span class='fa fa-trash'></span></button>";html += "<button class='btn' onclick='exclui("+idForm+")' type='button'><span class='fa fa-trash'></span></button>";
      html += "</span>";
      html += "</div>";
      
      $("#imendaHTML"+tipo).append(html);
    }
    
    $(".btnExcluir").click(function(){
      console.log("clicou");
      $(this).slideUp(200);
    })
    
    $("#btnSalvar").click(function(){
    
    var mensagem = "";
    var novosCampos = [];
    var camposNulos = false;
    
      $('.campoDefault').each(function(){
        if($(this).val().length < 1){
          camposNulos = true;
        }
      });
      $('.novoCampo').each(function(){
        if($(this).is(":visible")){
          if($(this).val().length < 1){
            camposNulos = true;
          }
          //novosCampos.push($(this).val());
          mensagem+= $(this).val()+"\n";
        }
      });
      
      if(camposNulos == true){
        alert("Atenção: existem campos nulos");
      }else{
        alert("Novos campos adicionados: \n\n "+mensagem);
      }
      
      novosCampos = [];
    })
    
  });
  
  </script>
<script type="text/javascript">
  function lookup(inputString) {
    if(inputString.length == 0) {
      // Hide the suggestion box.
      $('#suggestions').hide();
    } else {
      $.post("listar_cidade.php", {queryString: ""+inputString+""}, function(data){
        if(data.length >1) {
          $('#suggestions').show();
          $('#autoSuggestionsList').html(data);
        }
      });
    }
  } 
  
  function fill(thisValue) {
    $('#inputString').val(thisValue);
    setTimeout("$('#suggestions').hide();", 200);
  }
</script>