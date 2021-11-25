<?php
/*================================================================================ 
* Objetivo: Arquivo de configuração de variaveis e constantes do projeto 
* Data de criação: 03/11/2021
* Data de atualização: 11/11/2021
* Autor: Ingrid
==================================================================================*/

//configuração para estabelecer o padrão de regionalidade do php
//para data e hora
date_default_timezone_set('America/Sao_Paulo');

const REGISTRO_SALVO = "<script>
                            alert('Registro salvo com sucesso no Banco de Dados!');
                            window.location.href = '../index.php';
                        </script>";

const REGISTRO_EXCLUIDO = "<script>
                                alert('Registro excluido com sucesso!');
                                window.location.href = '../index.php';
                           </script>";

const REGISTRO_ATUALIZADO = "<script>
                                alert('Registro atualizado com sucesso no Banco de Dados!');
                                window.location.href = '../index.php';
                            </script>";

const ERRO_BD = "<script>
                    alert('Não foi possível salvar os dados no Banco de Dados!');
                    window.history.back()';
                </script>";
?>