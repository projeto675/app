<? 

$stmt = $conexao->prepare("SELECT id,local,numero_tecnicos_turno,setor,tipo_escala,numero_de_equipes,numero_tec_total  FROM setor  WHERE id_cordenador=:id    ORDER BY id DESC");
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
           <th scope="col"> Tecnicos por equipe </th>
           <th scope="col">Número de equipes</th>
           <th scope="col">Total de Tecnicos do  setor</th>
           <th scope="col">ação</th>
         </tr>
       </thead><tbody><?
 $count = $stmt->rowCount();
     if($count >0){?> <button type="button" class="btn btn-light">Você  tem setor <?=$count;?>  cadastrados</button> <?
    while ($login = $stmt->fetch(PDO::FETCH_OBJ)) {
        ?>
        <tr>
      <th scope="row"><?= $login->id;?> </th>
      <td><?= $login->local;?> </td>
      <td><?= $login->setor;?> </td>
      <td><?= $login->tipo_escala;?></td>
      <td><?= $login->numero_tecnicos_turno;?></td>
      <td><?= $login->numero_de_equipes;?></td>
      <td><?= $login->numero_tec_total;?></td>
      <td><button type="button" class="btn btn-info"><a href="/app/app/montar_equipe.php?setor=<?=$login->id;?>">Gerenciar</a></button</td>

    </tr>
   
      </li><?
        
    }
    ?> </ul><?
} else{ ?><button type="button" class="btn btn-light">Você  não tem setor cadastrados</button><?}


} ?></tbody></table><?