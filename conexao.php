<?php

if(!isset($_SESSION) ){
    session_start();
    session_id();
}
if($_SERVER['SERVER_NAME']='localhost'){
    include_once'conexao_local.php';
}else{ 
    include_once'conexao_remota.php';
}