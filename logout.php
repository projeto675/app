<? if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION)){
    session_destroy();
    echo "Saindo...";
    header('Location: index.php');
exit();
    /////falt um sistma de log/////
} ?>