<?php
/* @author Cesar Szpak - Celke - cesar@celke.com.br
 * @pagina desenvolvida usando FullCalendar e Bootstrap 4,
 * o código é aberto e o uso é free,
 * porém lembre-se de conceder os créditos ao desenvolvedor.
 */
if(!isset($_SESSION) ){
    session_start();
    session_id();

}
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DBNAME', 'calendario');

$conn = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME . ';', USER, PASS);

//////////////////////////////////////////////////////////////////////////////////
try {
    $conexao = new PDO("mysql:host=localhost; dbname=calendario", "root", "");
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexao->exec("set names utf8");
} catch (PDOException $erro) {
    echo "Erro na conexão:" . $erro->getMessage();
}
class Database{
    private $hostname = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'calendario';
    private $conexao;

    public function conectar(){
        $this->conexao = null;
        try
        {
            $this->conexao = new PDO('mysql:host=' . $this->hostname . ';dbname=' . $this->database . ';charset=utf8', 
            $this->username, $this->password);
        }
        catch(Exception $e)
        {
            die('Erro : '.$e->getMessage());
        }

        return $this->conexao;
    }
}
