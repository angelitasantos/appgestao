<?php

    class Negocio {

        //Atualizar dados do negócio
        public function updateBusiness(
            $razaosocial,$nomeconhecido,$endereco,$numero,$complemento,
            $cep,$bairro,$cidade,$contato,$celular1,
            $celular2,$telefone,$cnpj,$inscest,$inscmun) {
            $sql = MySql::conectar()->prepare("UPDATE `tb_adm.negocios` SET 
                razaosocial = ?,nomeconhecido = ?,endereco = ?,numero = ?,complemento = ?,
                cep = ?,bairro = ?,cidade = ?,contato = ?,celular1 = ?,
                celular2 = ?,telefone = ?,cnpj = ?,inscest = ?,inscmun = ? WHERE CIN = ?");
            if($sql->execute(array(
                $razaosocial,$nomeconhecido,$endereco,$numero,$complemento,
                $cep,$bairro,$cidade,$contato,$celular1,
                $celular2,$telefone,$cnpj,$inscest,$inscmun,$_SESSION['CIN']))) {
                return true;
            }else {
                return false;
            }
        }//Fim da Função updateBusiness
        

        //Verificar se o e-mail já foi cadastrado para algum negócio
        public static function existsBusiness($email){
            $sql = MySql::conectar()->prepare("SELECT `id` FROM `tb_adm.negocios` WHERE email = ?");
            $sql->execute(array($email));
            if($sql->rowCount() == 1){
                return true;
            }else{
                return false;
            }
        }//Fim da Função existsBusiness


        //Cadastrar um novo negócio para acessar o painel
        public static function insertBusiness(
                $CIN,$email,$usuario,$senha,$razaosocial,
                $nomeconhecido,$endereco,$numero,$complemento,$cep,
                $bairro,$cidade,$uf,$contato,$celular1,
                $celular2,$telefone,$ramoatividade,$cnpj,$inscest,
                $inscmun,$dataregistro) {
			$sql = MySql::conectar()->prepare("INSERT INTO `tb_adm.negocios` VALUES (null,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
			$sql->execute(array(
                $CIN,$email,$usuario,$senha,$razaosocial,
                $nomeconhecido,$endereco,$numero,$complemento,$cep,
                $bairro,$cidade,$uf,$contato,$celular1,
                $celular2,$telefone,$ramoatividade,$cnpj,$inscest,
                $inscmun,$dataregistro));
        }//Fim da Função insertBusiness


        //Cadastrar categoria geral no painel
        public static function insertGeral(
            $CIN,$descricao,$slug) {
            $sql = MySql::conectar()->prepare("INSERT INTO `tb_cad.categorias` VALUES (null,?,?,?)");
            $sql->execute(array($CIN,$descricao,$slug));
        }//Fim da Função insertGeral



    }//Fim da Class Usuario

?>