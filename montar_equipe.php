<? include_once'topo.php';
include_once'menu_superior.php';
include_once'listar_setor_id.php';
if(isset($_POST['nome_tecnico'])){

    $stmt = $conexao->prepare("INSERT INTO equipe (nome,id_setor) VALUES (?,?)");
    $stmt->bindParam(1,$_POST['nome_tecnico']);
    $stmt->bindParam(2,$i_setor);
 
    $cad_user_ok=$stmt->execute();   
    if($cad_user_ok){ 
    $_SESSION['envio']="1";
    }  else {echo "erro ao gravar"; }       
     
}?>
   <form role="form" method="post" > 
   <div class="form-row col-md-12">
   <label for="validationCustom04"></label>
   <div class="col-md-8 mb-3">
             <label for="validationCustom04"></label>
              <input type="text"   name="nome_tecnico"  class="form-control" placeholder="Nome do Membro"  value="" id="inputString" onKeyUp="lookup(this.value);" onBlur="fill();" />
              <div class="suggestionsBox " id="suggestions" style="display: none;">
              <div class="suggestionList" id="autoSuggestionsList"></div>
              </div>
   </div>
  <div class="col-md-3 mb-3"> 
  <label for="validationCustom04"></label>
       <input type="hidden" name="session" value="<?=session_id();?>" />
       <button class="btn btn-primary form-control" type="submit">adicionar á equipe</button></div>
  </div>

</div>
  
 

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

<script type="text/javascript">
 function lookup(inputString) {
   if(inputString.length == 0) {
     // Hide the suggestion box.
     $('#suggestions').hide();
   } else {
     $.post("listar_membros.php", {queryString: ""+inputString+""}, function(data){
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