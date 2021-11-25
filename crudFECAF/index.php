<?php
    //importe do arquivo para conectar no banco de dados
    require_once ('bd/conexao.php');

    //abre a conexão com o BD e guarda em uma variavel local
    $conexao = conexaoMysql();

    //Declaração de variaveis
    $modo = (string) null;
    $id = (int) 0;
    $nome = (string) null;
    $login = (string) null;
    $nickName = (string) null;
    $senha = (string) null;
    $email = (string) null;
    
    //essa variavel sera utilizada no action do form para diferenciar as ações de inserir um novo registro ou atualizar um registro existente
    $action = (string) "bd/inserirUsuario.php";

    //valida se existe a variavel modo e a variavel id na url do navegador, se existir é pq foi clicado no botão editar
    if(isset($_GET['modo']) && isset($_GET['id'])){
        //recebe o conteudo da variavel modo em (MAIUSCULO)
        $modo = strtoupper($_GET['modo']);
        $id = $_GET['id'];
        //valida se a variavel modo tem o valor editar
        if($modo == 'EDITAR'){
            //script para buscar no BD
            $sql = "select * from tblusuario where idusuario=".$id;

            //executa o script no BD
            $select = mysqli_query($conexao, $sql);

            //valida se existe algum registro no BD e converte o resultado em um array
            if($arrayRegistro = mysqli_fetch_assoc($select)){
                //recebe os dados do BD e guarda em variaveis locais
                $nome = $arrayRegistro['nome'];
                $login = $arrayRegistro['login'];
                $nickName = $arrayRegistro['nickname'];
                $senha = $arrayRegistro['senha'];
                $email = $arrayRegistro['email'];

                //altera o arquivo que sera chamado pelo forms, pois precisamoos editar os dados
                $action = "bd/editarUsuario.php?id=".$id;
            }
        }
    }

?>

<!DOCTYPE>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title> Cadastro de Usuários </title>
        <link rel="stylesheet" type="text/css" href="style/style.css">
        <script src="js/jquery.js"></script>
        <script>
            $(document).ready(function (){
                //função para abrir a modal
                $('.pesquisar').click(function () {
                    $('#containerModal').fadeIn(2000);

                    //funcao para pegar o id do registro e enviar para a modal visualizar dados
                        //this - serve para pegarmos exatamente o elemento que foi criado
                        //.attr - serve para pegarmos um atributo da tag html
                    let idUsuario = $(this).attr("data-id");
                    $.ajax({
                        type: "GET",
                        url: "visualizarDados.php",
                        data: {id: idUsuario},
                        success: function (dados){
                            $('#modal').html(dados);
                            
                        }
                    });
                    //alert(id);
                });
                //funcao para fechar o modal
                $('.excluir').click(function () {
                    $('#containerModal').fadeOut();
                });
            });
        </script>
    </head>
    <body>
        <div id="containerModal">
            <img src="img/trash.png" alt="Excluir" title="Excluir" class="excluir">
            <div id="modal">

            </div>
        </div>

        <div id="cadastro"> 
            <div id="cadastroTitulo"> 
                <h1> Cadastro de Usuários </h1>
            </div>
            <div id="cadastroInformacoes">
                               
                <form action="<?=$action?>" name="frmCadastro" method="post" >
                   
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Nome: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtNome" value="<?=$nome?>" placeholder="Digite seu Nome" maxlength="100">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> NickName: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtNickName" value="<?=$nickName?>" placeholder="Digite seu NickName" maxlength="100">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Login: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtLogin" value="<?=$login?>" placeholder="Digite seu login" maxlength="100">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Senha: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="password" name="txtSenha" value="<?=$senha?>" placeholder="Digite sua senha" maxlength="20">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Email: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="email" name="txtEmail" value="<?=$email?>" placeholder="Digite seu Email" maxlength="100">
                        </div>
                    </div>
                    <div class="enviar">
                        <div class="enviar">
                            <input type="submit" name="btnEnviar" value="Salvar">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div id="consultaDeDados">
            <table id="tblConsulta" >
                <tr>
                    <td id="tblTitulo" colspan="5">
                        <h1> Lista de Usuários</h1>
                    </td>
                </tr>
                <tr id="tblLinhas">
                    <td class="tblColunas destaque"> Nome </td>
                    <td class="tblColunas destaque"> NickName </td>
                    <td class="tblColunas destaque"> Login </td>
                    <td class="tblColunas destaque"> Opções </td>
                </tr>
                
                <?php
                    //script para listar os dados do BD
                    $sql = "select * from tblusuario order by idUsuario desc";
                    //Executa no BD o script e guarda o retorno da variavel select
                    $select = mysqli_query($conexao, $sql);
                    //coverte o resultado do BD em um array de dados
                    while ($arrayUsuarios = mysqli_fetch_assoc($select))
                    {

                ?>
               
                    <tr id="tblLinhas">
                        <td class="tblColunas registros"><?=$arrayUsuarios['nome']?></td>
                        <td class="tblColunas registros"><?=$arrayUsuarios['nickname']?></td>
                        <td class="tblColunas registros"><?=$arrayUsuarios['login']?></td>
                        <td class="tblColunas registros">
                            <a href="index.php?modo=editar&id=<?=$arrayUsuarios['idusuario']?>">
                                <img src="img/edit.png" alt="Editar" title="Editar" class="editar">
                            </a>
                            <a onclick="return confirm('Deseja realmente excluir?');" href="bd/excluirUsuario.php?modo=excluir&id=<?=$arrayUsuarios['idusuario']?>">
                                <img src="img/trash.png" alt="Excluir" title="Excluir" class="excluir">
                            </a>
                            <img data-id="<?=$arrayUsuarios['idusuario']?>" src="img/search.png" alt="Visualizar" title="Visualizar" class="pesquisar">
                        </td>
                    </tr>

                <?php
                    }
                ?>
            </table>
        </div>
    </body>
</html>