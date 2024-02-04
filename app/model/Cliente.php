<?php

require_once 'helpers/ModifiedFields.php';

class Cliente{
    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function listar(){
        $sql = "SELECT * FROM Cliente";
        $sql = $this->pdo->query($sql);

        if($sql->rowCount() > 0){
            return $sql->fetchAll();
        } else {
            return array();
        }
    }

    public function adicionar(
        $nome_completo,
        $data_aniversario,
        $num_wpp,
        $email,
        $pf_pj,
        $cep,
        $rua,
        $casa_num,
        $complemento,
        $bairro,
        $cpf_cnpj,
        $rg_ie,
    ){
        $sql = "INSERT INTO Cliente (
            nome_completo,
            data_aniversario,
            num_wpp,
            email,
            pf_pj,
            cep,
            rua,
            casa_num,
            complemento,
            bairro,
            cpf_cnpj,
            rg_ie
        ) VALUES (
            :nome_completo,
            :data_aniversario,
            :num_wpp,
            :email,
            :pf_pj,
            :cep,
            :rua,
            :casa_num,
            :complemento,
            :bairro,
            :cpf_cnpj,
            :rg_ie
        )";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':nome_completo', $nome_completo);
        $sql->bindValue(':data_aniversario', $data_aniversario);
        $sql->bindValue(':num_wpp', $num_wpp);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':pf_pj', $pf_pj);
        $sql->bindValue(':cep', $cep);
        $sql->bindValue(':rua', $rua);
        $sql->bindValue(':casa_num', $casa_num);
        $sql->bindValue(':complemento', $complemento);
        $sql->bindValue(':bairro', $bairro);
        $sql->bindValue(':cpf_cnpj', $cpf_cnpj);
        $sql->bindValue(':rg_ie', $rg_ie);
        $sql->execute();
    }

    public function del($id){
        $sql = "DELETE FROM Cliente WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();
    }

    public function atualizar($id){
        $baseQuery = "UPDATE Cliente";
        $modifiedFields = new ModifiedFields();
        $sql = $this->pdo->prepare($modifiedFields->buildUpdateQuery($baseQuery));
        $modifiedFields->bindValues($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();
    }
}
