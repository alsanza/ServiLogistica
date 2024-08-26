drop database if exists post;
create database if not exists post char set utf8 collate utf8_general_ci;
use post;
drop table if exists persona;
create table if not exists persona(
ID int not null auto_increment,
tipo_doc varchar (25) not null,
documento varchar (25) not null,
nombres varchar (50) not null,
apellidos varchar (50) not null,
imagen varchar (50) not null,
estado int not null,
fech_nacimiento date not null,
fech_registro timestamp,
primary key (ID)
)engine=InnoDB char set utf8 collate utf8_spanish2_ci;
