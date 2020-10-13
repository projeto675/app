<? 
if(isset($_POST['queryString'])) {
include_once'conexao.php';
$queryString = trim('%'.$_POST['queryString'].'%');
$stmt = $conexao->prepare("SELECT nome,uf FROM municipio WHERE nome  LIKE :nome limit 10 ");
$stmt->bindValue(":nome", $queryString);
$stmt->execute();
//$stmt = $conexao->prepare("SELECT * FROM usuario WHERE nome=$nome");
 if ($stmt->execute()) {
/* Return number of rows that were deleted */
$count = $stmt->rowCount();
     if($count >0){
         ?> <ul class="navbar-nav">
             <div class="col-md-12 form-group">  
             <?
    while ($login = $stmt->fetch(PDO::FETCH_OBJ)) {
        ?><li class="nav-item active">
        <a class="nav-link" onClick="fill('<?= $login->nome;?> <?= $login->uf;?>');" href="#"><?= $login->nome;?> <?= $login->uf;?> <span class="sr-only">(Página atual)</span></a>
      </li><?
        
    }
    ?> </ul><?
}


}  }
