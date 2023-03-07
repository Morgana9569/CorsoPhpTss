-- Active: 1678177573379@@127.0.0.1@3306@form_in_php
use form_in_php;

CREATE TABLE regione (
    id_regione int NOT NULL AUTO_INCREMENT,
    nome VARCHAR(99) not NULL,
    PRIMARY KEY(id_regione)
    --FOREIGN KEY () REFERENCES ()
);

CREATE TABLE province (
    id_province int NOT NULL AUTO_INCREMENT,
    nome VARCHAR(99) not NULL,
    sigla CHAR(2) not NULL,
    PRIMARY KEY(id_province),
    Foreign Key (id_regione) REFERENCES regione(id_regione)

);

drop table regione;
drop table province;

insert INTO regione (nome) VALUES('Valle d\'Aosta/Vallée d\'Aoste');
insert INTO province (nome) VALUES('Barletta-Andria-Trani');

select * from regione;

select * from province;

TRUNCATE TABLE regione;

