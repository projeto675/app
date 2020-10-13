<? if(!isset($_SESSION) ){
        session_start();
        session_id();

    }
    $id='22';
    $stmt = $conexao->prepare('select * from usuarios where id in ('.$id.')');
  
?>    