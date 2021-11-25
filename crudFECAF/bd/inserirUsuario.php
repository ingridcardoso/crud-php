<?php
/*================================================================================ 
* Objetivo: Arquivo responsavel de inserir usuarios no BD 
* Data de criação: 03/11/2021
* Data de atualização: 03/11/2021
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
    
    //valida se o botão foi clicado
    if(isset($_POST['btnEnviar'])){
        //recebe dados do formulario
        $nome = $_POST['txtNome'];
        $login = $_POST['txtLogin'];
        $nickname = $_POST['txtNickName'];
        $senha = $_POST['txtSenha'];
        $email = $_POST['txtEmail'];
        $dataAtual = date('Y-m-d');

        //echo($dataAtual);
        //die; //força a parada de execução do apache

        //fazer tratamentos de erro conforme a necessidade

        //inserir dados no BD
        $sql = "insert into tblusuario (nome, login, nickname, senha, email, dataCadastro)
                value('".$nome."', '".$login."', '".$nickname."', '".$senha."', '".$email."', '".$dataAtual."')";

        //executa no BD e valida
        $conexao = conexaoMysql();
        if(mysqli_query($conexao, $sql)){
            echo(REGISTRO_SALVO);
        }else{
            echo(ERRO_BD);
        }
    }

?>