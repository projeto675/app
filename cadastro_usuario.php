<? if (isset($_POST) &&(!empty($_POST))){ 
 if(isset( $_SESSION['envio']) &&( $_SESSION['envio']) ) { 
     // include "conexao.php";
     $nome=trim($_POST['nome']);
     $sobre_nome=trim($_POST['sobre_nome']);
     $local_trabalho=trim($_POST['local_trabalho']);
     $numero_registro_profissional=trim($_POST['numero_registro_profissional']);
     $profissao=trim($_POST['profissao']);
     $numero_registro_profissional=trim($_POST['numero_registro_profissional']);
     $data=date('y-m-d h:i:s');
    
     $stmt = $conexao->prepare("INSERT INTO usuario (nome,sobrenome,local_trabalho,numero_registro_profissional,profissao,senha,data_cadastro) VALUES (?, ?,?,?,?,?,?)");
     $stmt->bindParam(1, $nome);
     $stmt->bindParam(2, $sobre_nome);
     $stmt->bindParam(3, $local_trabalho);
     $stmt->bindParam(4, $numero_registro_profissional);
     $stmt->bindParam(5, $profissao);
     $stmt->bindParam(6, $numero_registro_profissional);
     $stmt->bindParam(7, $data);
     $stmt->execute();   
     if($stmt->execute()){ 
      $_SESSION['envio']="1";
     } }
     ?>
     <div class="alert alert-light" role="alert">
  <h4 class="alert alert-dark">Cadastro Realizado com sucesso!</h4>
  <p> SE FOR USUARIO DIRECIONAR BUSCAR ESCALA </p>
  <hr>
  <p class="mb-0"></p>
</div><?
     }
////////////não exibir formulario se japrencidoe deu tudo ceto ////////
else{ 
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
  <div class="form-row">
    <div class="col-md-6 mb-3">
    <label for="validationCustom04"></label>
      <input type="text" class="form-control" name="local_trabalho" placeholder="local de trabalho" id="validationCustom03" required>
      <div class="invalid-feedback">
        Please provide a valid city.
      </div>
    </div>
   
    <div class="col-md-3 mb-3">
      <label for="validationCustom05"></label>
      <input type="number" class="form-control" name="numero_registro_profissional"  placeholder="Número Registro Profissional" required>
      <div class="invalid-feedback">
        Please provide a valid zip.
      </div>
    </div>

    <div class="col-md-3 mb-3">
      <label for="validationCustom04"></label>
      <select class="custom-select" name="profissao" id="validationCustom04" required>
        <option selected disabled value="">Profissão</option>
        <option>COREN-ENF</option>
        <option>COREN-TEC</option>
        <option>CRM</option>
      </select>
      <div class="invalid-feedback">
        Please select a valid state.
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
  <button class="btn btn-primary" type="submit">Salvar</button>
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