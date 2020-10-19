<? 

$stmt = $conexao->prepare("SELECT id,local,numero_tecnicos_turno,setor,tipo_escala FROM setor  WHERE id_cordenador=:id    ORDER BY id DESC");
$stmt->bindValue(":id", $_SESSION['id']);
$stmt->execute();
//$stmt = $conexao->prepare("SELECT * FROM usuario WHERE nome=$nome");
 if ($stmt->execute()) {
?><table class="table">
<thead>
         <tr>
           <th scope="col">#</th>
           <th scope="col">Local</th>
           <th scope="col">setor</th>
           <th scope="col">Tipo escala</th>
           <th scope="col">Número de Tecnicos por plantao</th>
         </tr>
       </thead><tbody><?
$count = $stmt->rowCount();
     if($count >0){
         ?>  
             <?
    while ($login = $stmt->fetch(PDO::FETCH_OBJ)) {
        ?>
        <tr>
      <th scope="row"><?= $login->id;?> </th>
      <td><?= $login->local;?> </td>
      <td><?= $login->setor;?> </td>
      <td><?= $login->tipo_escala;?></td>
      <td><?= $login->numero_tecnicos_turno;?></td>
    </tr>
   
      </li><?
        
    }
    ?> </ul><?
}


} ?></tbody></table><?