-- Active: 1678177573379@@127.0.0.1@3306@form_in_php
use form_in_php;

CREATE TABLE regione (
    id_regione int NOT NULL AUTO_INCREMENT,
    nome VARCHAR(99) not NULL,
    PRIMARY KEY(id_regione)
);

drop table regione;