
    <body>
    
     <? if (isset($_POST) &&(!empty($_POST)) && $_POST['session']==session_id() &&($_GET['cadastrar_equpe']!='equipe')){ 
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
      echo  $_SESSION['nivel']=$login->nivel;echo '</br>';
      echo  @$login->nivel;echo '</br>';
      header('Location: index.php');
    }
  }
}


 exit();    }
////////////não exibir formulario se japrencidoe deu tudo ceto ////////
else{ 
  unset( $_SESSION['envio'] ); 
  echo @$_SESSION['envio'];
   

  ////////////////////////aqui escolho qual setor quero criar equipe
  if(($_GET['cadastrar_equpe']!=="equipe")){ ?>
  <form role="form" method="POST" action="?cadastrar_equpe=equipe">        
  <form class="needs-validation" novalidate>
  <div class="simple-login-container">	
  <div class="form-row">
  <div class="col-md-12 mb-6">
  <label for="validationCustom04"></label>
<? //////////////////////select com as opções criadas no banco de dados//////////////
$id_cordenador=$_SESSION['id'];
$stmt = $conexao->prepare("SELECT setor,id_cordenador FROM setor WHERE id_cordenador=:id_cordenador  limit 20 ");
$stmt->bindValue(":id_cordenador", $id_cordenador);
$stmt->execute(); ?>
      <select class="custom-select" name="setor" id="validationCustom04" required>
      	<? if ($stmt->execute()) {
$count = $stmt->rowCount();
     if($count >0){
         
    while ($login = $stmt->fetch(PDO::FETCH_OBJ)) {
        ?> <option value="<?= $login->setor;?>"><?= $login->setor;?></option>
 <? } } }  ?>
      </select>
 </div>  </div>
 <div class="form-row">  
 <div class="col-md-12 mb-3"> 
 	   <label for="validationCustom04"></label>
 	      <label for="validationCustom04"></label>
 <input type="hidden" name="session" value="<?=session_id();?>" />
 <button class="btn btn-primary" type="submit">Salvar</button>
 </div></div>
 </div>
 </form>
 </div>
    <?  } ////?>

<<div class="simple-login-container">
<div class="form-row">
    <div class="col-md-12 mb-3">
    <label for="validationCustom04"></label>
		
				<input type="text"  style="display: none;"   class="form-control" placeholder="Nome do Membro"  value="" id="inputString" onKeyUp="lookup(this.value);" onBlur="fill();" />
				
			<div class="suggestionsBox " id="suggestions" style="display: none;">
				<div class="suggestionList" id="autoSuggestionsList">
					 
				</div>
			</div>
</div></div>

<div class="col-md-12 mb-6">
      <label for="validationCustom04"></label>
<? 
$id_cordenador=$_SESSION['id'];
$stmt = $conexao->prepare("SELECT setor,id_cordenador FROM setor WHERE id_cordenador=:id_cordenador  limit 20 ");

$stmt->bindValue(":id_cordenador", $id_cordenador);
$stmt->execute();
//$stmt = $conexao->prepare("SELECT * FROM usuario WHERE nome=$nome");
  ?>
      <select class="custom-select" name="setor" id="validationCustom04" required>
      	<? if ($stmt->execute()) {
/* Return number of rows that were deleted */
$count = $stmt->rowCount();
     if($count >0){
         ?> 
             <?
    while ($login = $stmt->fetch(PDO::FETCH_OBJ)) {
        ?> <option value="<?= $login->setor;?>"><?= $login->setor;?></option>
 <? }
    ?><?
}


} ?>
      
      </select>
      </div>  </div>


  <div class="form-row">  
  <div class="col-md-12 mb-3"> 
  <input type="hidden" name="session" value="<?=session_id();?>" />
  <button class="btn btn-primary" type="submit">Salvar</button>
</div></div>
</div>
</form>

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