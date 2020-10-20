<? 
if(isset($_POST['queryString'])) {
include_once'conexao.php';
$queryString = trim('%'.$_POST['queryString'].'%');
$localtrabalho=$_SESSION['local_trabalho'];
$stmt = $conexao->prepare("SELECT nome,sobrenome,local_trabalho,nivel,id FROM usuario WHERE nome  LIKE :nome AND nivel='user' AND local_trabalho=:localtrabalho  limit 20 ");
$stmt->bindValue(":nome", $queryString);
$stmt->bindValue(":localtrabalho", $localtrabalho);
$stmt->execute();
//$stmt = $conexao->prepare("SELECT * FROM usuario WHERE nome=$nome");
 if ($stmt->execute()) {
/* Return number of rows that were deleted */
$count = $stmt->rowCount();
     if($count >0){
         ?> <ul class="navbar-nav">
             <div class="col-md-12 ">  
             <?
    while ($login = $stmt->fetch(PDO::FETCH_OBJ)) {
      /////////////verificar se ja ha caastro 
      
      $stmt2 = $conexao->prepare("SELECT id_membro,tipo_escala  FROM equipe  WHERE id_membro=:id  AND tipo_escala='Normal'  ORDER BY id DESC");
      $stmt2->bindValue(":id", $login->id);
      $stmt2->execute();
      if ($stmt2->execute()) {
       $count2 = $stmt2->rowCount();
           if($count2 !=1){
            ?><li class="nav-item active">
        <a class="nav-link" style="color: #343a40;" onClick="fill('<?= $login->id;?> /<?= $login->nome;?> <?= $login->sobrenome;?> / <?= $login->local_trabalho;?>');" href="#"><?= $login->id;?> <?= $login->nome;?> <?= $login->sobrenome;?> <?= $login->local_trabalho;?> <span class="sr-only">(Página atual)</span></a>
      </li><?    
      } else{ 
        ?>
      <? 
        }   }
      ///////////////////////////////////////
       
        
    }
    ?> </ul><?
}


}  } 
