<? 
include_once'conexao.php';
 class cadastrar{
 public function setor_coodenador() {
    include_once'conexao.php';
$stmt = $conexao->prepare("SELECT *FROM usuario   limit 20 ");

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
        ?><li class="nav-item active">
        <a class="nav-link" style="color: #343a40;" onClick="fill('<?= $login->nome;?> <?= $login->sobrenome;?>  <?= $login->local_trabalho;?>');" href="#"><?= $login->nome;?> <?= $login->sobrenome;?> <?= $login->local_trabalho;?> <span class="sr-only">(Página atual)</span></a>
      </li><?
        
    }
    ?> </ul><?
}


} 
} 
 }
