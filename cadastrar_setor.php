<? include_once'topo.php';
include_once'menu_superior.php';
if(isset($_POST['setor'])){

 
   
    $setor=trim( $_POST['setor']);
    $id_cordenador=trim($_SESSION['id']);
    $local_trabalho=trim($_SESSION['local_trabalho']);
    $stmt = $conexao->prepare("INSERT INTO setor (setor,id_cordenador,local,tipo_escala,numero_tecnicos_turno) VALUES (?,?,?,?,?)");
    $stmt->bindParam(1,$setor);
    $stmt->bindParam(2,$id_cordenador);
    $stmt->bindParam(3,$local_trabalho);
    $stmt->bindParam(4,$_POST['tipo_escala']);
    $stmt->bindParam(5,$_POST['numero_tecnicos_turno']);
    $cad_user_ok=$stmt->execute();   
    if($cad_user_ok){ 
    $_SESSION['envio']="1";
    }  else {echo "erro ao gravar"; }       
     
}

?>
<div class="alert alert-secondary" role="alert">
  <h4 class="alert-heading">Nessa Etapa </h4>
  <p>Você fará cadastro os setores de sua coordenação e as equipes de enfermagem </p>
  <hr>
 
</div>
<form role="form" method="post">        
  <form class="needs-validation" novalidate>
  <div class="form-row">
    <div class="col-md-6 mb-3">
    <label for="validationCustom04">Setor</label>
      <input type="text" class="form-control" name="setor" id="validationCustom01" placeholder="Setor" required>
      <small id="passwordHelpBlock" class="form-text text-muted">
 ex UTI Clínica Médica Pronto Socorro </small><div class="valid-feedback">
       ok
      </div>
    </div>
    <div class="col-md-5 mb-3">
      <label for="validationCustom04">Número técnicos por plantao </label>
      <select class="custom-select" name="numero_tecnicos_turno" id="validationCustom04" required>
        <option selected disabled value="2">Número de Técnicos por  plantão </option>
        <option value='1'>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5 </option>
        <option>6</option>
      </select>
      <div class="invalid-feedback">
        Please select a valid state.
      </div>
    </div>  
     
     
    <div class="col-md-12 mb-3"><h4>Tipo de Escada</h4>	 </div> 
    
    <div class="col-md-6 mb-3">
    <input class="form-check-input" type="radio" name="tipo_escala" id="exampleRadios1" value="12X24X12X96" checked>
    <label class="form-check-label" for="exampleRadios1">
    SD,FN,FD,SN,24H,24H,24H,24H,
    </label>
    <small id="passwordHelpBlock" class="form-text text-muted">
    12X24X12X96
  </small>
    </div>

  <div class="col-md-6 mb-3">
      <input class="form-check-input" type="radio" name="tipo_escala" id="exampleRadios1" value="12X36" >
      <label class="form-check-label" for="exampleRadios1">
       SD,FN,FD,FN 
      </label>
      <small id="passwordHelpBlock" class="form-text text-muted">12X36
      </small>
  </div> 
   </div></div>  </div>  
  <div class="form-group">
   
  </div>
  <input type="hidden" name="session" value="<?=session_id();?>" />
  <button class="btn btn-primary" type="submit">Salvar</button>
</form>
<br>
<? include_once'listar_setor.php';?>
<div class="alert alert-secondary" role="alert">
  <h4 class="alert-heading">Proxima Etapa </h4>
  <p>Você fará cadastro os setores de sua coordenação e as equipes de enfermagem </p>
  <hr>
 
</div>

<script>
/////////////////////////////////////script para impedir reemvio pelo botão atualizar//
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
///////////////////////////////////////////////////////////////////////////////////////
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