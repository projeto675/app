<?php
echo $url=trim($_SERVER['SERVER_NAME']);
if($url=='localhost'){ 
    include_once'conexao_local.php';
    
    echo "sou root";}else{include_once'conexao_remota.php';}

?>