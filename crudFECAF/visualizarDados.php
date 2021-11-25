<?php

    $id = (int) 0;
    $nome = (string) null;
    $login = (string) null;
    $nickName = (string) null;
    $email = (string) null;

    //recebe o id do registro que sera visualizado na modal
    $id = $_GET['id'];

    require_once('bd/conexao.php');

    $conexao = conexaoMysql();

    //executa o script no banco de dados
    $sql = "select * from tblusuario
            where idusuario = ".$id;

    $select = mysqli_query($conexao, $sql);

    //valida para saber se encontrou algum registro, gera um array

    if ($listUsuario = mysqli_fetch_assoc($select)){
        //guarda os valores do bd em variaveis locais
        $nome = $listUsuario['nome'];
        $nickName = $listUsuario['nickname'];
        $login = $listUsuario['login'];
        $email = $listUsuario['email'];
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Visualizar Dados</title>
    </head>
    <body>
        <table>
            <tr>
                <td colspan="2">Vizualização dos daods de Usuario</td>
            </tr>
            <tr>
                <td>Nome: </td>
                <td><?=$nome?></td>
            </tr>
            <tr>
                <td>Nickname: </td>
                <td><?=$nickName?></td>
            </tr>
            <tr>
                <td>Login: </td>
                <td><?=$login?></td>
            </tr>
            <tr>
                <td>Email: </td>
                <td><?=$email?></td>
            </tr>
        </table>
    </body>
</html>