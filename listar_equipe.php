<? 

$stmt = $conexao->prepare("SELECT *  FROM equipe  WHERE id_setor=:id    ORDER BY id DESC");
$stmt->bindValue(":id", $i_setor);
$stmt->execute();
//$stmt = $conexao->prepare("SELECT * FROM usuario WHERE nome=$nome");
 if ($stmt->execute()) {
?><table class="table">
<thead>
         <tr>
           <th scope="col">#</th>
           <th scope="col">Setor</th>
           <th scope="col">Nome</th>
           <th scope="col">Escala</th>
          
         </tr>
       </thead><tbody><?
 $count = $stmt->rowCount();
     if($count >0){?> <button type="button" class="btn btn-light">Você  tem setor <?=$count;?>  cadastrados</button> <?
    while ($login = $stmt->fetch(PDO::FETCH_OBJ)) {
        ?>
        <tr>
      <th scope="row"><?= $login->id;?> </th>
      <td><?= $login->setor;?> </td>
      <td><?= $login->nome;?> </td>
      <td><?= $login->tipo_escala;?> </td>
     

    </tr>
   
      </li><?
        
    }
    ?> </ul><?
} else{ ?><button type="button" class="btn btn-light">Você  não tem setor cadastrados</button><?}


} ?></tbody></table><?