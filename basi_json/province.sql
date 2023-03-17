-- Agrigento --> Sicilia 
/**
{
    "nome": "Agrigento",
    "sigla": "AG",
    "regione": "Sicilia" --> 15
    "regione_id" : 15
  },

**/

select id_regione from regione WHERE nome = 'Sicilia';

-- regione_id 15

insert into provincia (nome,sigla,id_regione)
VALUES ('Agrigento','AG',15);