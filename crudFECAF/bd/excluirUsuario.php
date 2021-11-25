<?php
/*================================================================================ 
* Objetivo: Arquivo responsavel para excluir usuários
* Data de criação: 03/11/2021
* Data de atualização: 03/11/2021
* Autor: Ingrid
==================================================================================*/

    //importe do arquivo para conectar no banco de dados
    require_once ('conexao.php');
    //import do arquivo de configurações do sistema
    require_once ('../modulo/config.php');

    $modo = (string) null;
    $id = (int) 0;

    if(isset($_GET['modo']) && isset($_GET['id'])){

        //recebe as variaveis encaminhadas no GET pela index
        //strtoupper() ==> converte uma string em maiusculo
        //strtolower() ==> converte uma string em minusculo
        $modo = strtoupper($_GET['modo']);
        $id = $_GET['id'];
        
        //validação para verificar se o conteudo da variavel é EXCLUIR
        if($modo == 'EXCLUIR'){
            //script para deletar um registro
            $sql = "delete from tblusuario where idusuario = " . $id;
            //abre a conexao com o BD
            $conexao = conexaoMysql();

            //valida a excução do codigo
            if (mysqli_query($conexao, $sql)){
                echo(REGISTRO_EXCLUIDO);
            }else{
                echo(ERRO_BD);
            }
        }

    }

    


?>