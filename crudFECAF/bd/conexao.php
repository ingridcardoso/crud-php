<?php
/*================================================================================ 
* Objetivo: Arquivo para realizar a conexao com o banco de dados mysql
* Data de criação: 20/10/2021
* Data de atualização; 20/10/2021
* Autor: Ingrid
==================================================================================*/

//Estabelece a conexao com o BD Mysql
function conexaoMysql(){
    //elementos para conectar o banco
    $host = (string) ""; //local do banco de dados
    $user = (string) ""; //usuario para autenticação do BD
    $password = (string) ""; //senha para autenticação do BD
    $database = (string) ""; //Database para utilizar o BD
    $conexao = (string) null; //"validacao de funcionamento"

    /* Bibliotecas para estabelecera conexão com o BD pelo PHP
        
        mysql_connect() - é a mais antiga (desatualizada)
        mysqli_connect() - é a mais atual (segurança, performace, atualizada)
        PDO() - é mais especifica pa POO
    */

    //Abre a conexao com o BD atraves da biblioteca mysqli_connect()
    if ($conexao = mysqli_connect($host, $user, $password, $database)){
        return $conexao;
    }else{
        return false;
    }

    //retorna a conexao se ela for estabelecida com sucesso
    return $conexao;
}

?>
