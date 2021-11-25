/***************************************************************
*	Database: dbprojetofecaf
*	Objetivo: Utilizar esse datababase para as aulas de PHP
*	Data: 20/10/2021
*	Autor: Prof. Marcel
*****************************************************************/

#Apaga o database caso já exista
drop database if exists dbprojetofecaf;

#Cria um database no banco de dados
create database dbprojetofecaf;

#Ativa a utilização do database
use dbprojetofecaf;

#Cria a tabela de usuário no database
create table tblusuario (
	idusuario int not null auto_increment primary key,
    nome varchar (80) not null,
    nickname varchar (50) not null,
    login varchar (30) not null,
    senha varchar (50) not null,
    email varchar (50) not null,
	dataCadastro date not null
);

#Insere o primeiro usuário padrão (root) na tabela
insert into tblusuario (nome, nickname, login, senha, dataCadastro)
	values ('Administrador', 'admin', 'root', 'root@root', '2021-10-20');