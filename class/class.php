<? public function insert(){

    try{
        $insert = $this->con->conectar()->prepare("INSERT INTO web_cadcli(nm_cliente, email_cliente, senha_cliente, id_identpess, img) values(:nome, :email, :Senha, :value,  :imagem);");
        $insert->bindParam(":nome",  $this->nome, PDO::PARAM_STR);
        $insert->bindParam(":email", $this->email, PDO::PARAM_STR);
        $insert->bindParam("senha", $this->senha, PDO::PARAM_STR);
        $insert->bindPAram(":value", $this->tpessoa, PDO::PARAM_STR);
        $insert->bindParam(":imagem",$this->imagem, PDO::PARAM_STR);

        if($insert->execute()){
            return 'ok';
        }else{
            return 'erro';
        }  
    }catch(PDOexception $erro_1){
        echo 'erro'.$erro_1->getMessage();
    }
}