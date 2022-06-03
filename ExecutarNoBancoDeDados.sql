CREATE TABLE genero (
	codGenero SERIAL PRIMARY KEY,
    	genero VARCHAR
);

CREATE TABLE filmes (
	codFilme SERIAL PRIMARY KEY,
    	nomefilme VARCHAR,
    	posterfilme VARCHAR,
    	sinopsefilme VARCHAR,
    	codGenero int references genero(codgenero)
);

CREATE TABLE usuario (
	id SERIAL PRIMARY KEY,
    	nome VARCHAR,
    	email VARCHAR,
    	senha VARCHAR   
);

CREATE VIEW view_filmegenero 
AS SELECT codfilme,nomefilme,filmes.codgenero,genero ,posterfilme,sinopsefilme 
FROM filmes, genero 
WHERE filmes.codgenero = genero.codgenero;


INSERT INTO genero(genero) VALUES ('Generico');

INSERT INTO filmes (nomefilme,posterfilme,codgenero,sinopsefilme) VALUES ('Cinema','https://d1csarkz8obe9u.cloudfront.net/posterpreviews/movie-theater-poster-template-b7bbf00c3aab56f52e95d67fe65c655f_screen.jpg?ts=1636970736','1','Coming Soon')

INSERT INTO usuario(nome,senha) VALUES  ('Cest',MD5('1234'));


