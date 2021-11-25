<?php
/*================================================================================ 
* Objetivo: Arquivo responsavel para excluir usuários
* Data de criação: 11/11/2021
* Data de atualização: 11/11/2021
* Autor: Ingrid
==================================================================================*/

    //importe do arquivo para conectar no banco de dados
    require_once ('conexao.php');
    //import do arquivo de configurações do sistema
    require_once ('../modulo/config.php');

    //declaração de variaveis
    $nome = (string) null;
    $login = (string) null;
    $nickname = (string) null;
    $senha = (string) null;
    $email = (string) null;
    $dataAtual = (string) null;
    $id = (int) 0;
     
    //valida se o botão foi clicado
    if(isset($_POST['btnEnviar'])){
        //recebe o id do registro que devera ser atualizado que foi encaminhado pelo action do form na index
        $id = $_GET['id'];

        //recebe dados do formulario
        $nome = $_POST['txtNome'];
        $login = $_POST['txtLogin'];
        $nickname = $_POST['txtNickName'];
        $senha = $_POST['txtSenha'];
        $email = $_POST['txtEmail'];
        $dataAtual = date('Y-m-d');
 
        //fazer tratamentos de erro conforme a necessidade
 
        //inserir dados no BD
        $sql = "update tblusuarios set 
                    nome = '".$nome."',
                    login = '".$login."',
                    nickname = '".$nickname."',
                    senha = '".$senha."', 
                    email = '".$email."',
                    dataCadastro = '".$dataAtual."'
                    
                where idUsuario = ".$id;
 
        //executa no BD e valida
        $conexao = conexaoMysql();
        if(mysqli_query($conexao, $sql)){
            echo(REGISTRO_ATUALIZADO);
        }else{
            echo(ERRO_BD);
        }
     }
 
?>