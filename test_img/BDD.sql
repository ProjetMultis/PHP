drop database if exists testImg;
create database testImg;
  use testImg;

create table utilisateurs
  (
    id int(3) auto_increment not null,
    nom varchar(50),
    prenom varchar(50),
    img varchar(50),
    primary key(id)
  );
