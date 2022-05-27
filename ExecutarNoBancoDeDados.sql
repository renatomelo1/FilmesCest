CREATE TABLE filmes (
	codFilme SERIAL PRIMARY KEY,
	titulofilme VARCHAR(50), 
	poster VARCHAR(50),
	sinopsefilme VARCHAR(300)

);

CREATE TABLE usuario (

	id SERIAL PRIMARY KEY,

	nome VARCHAR(50), 

	email VARCHAR(35),
	
	senha VARCHAR(15)
);

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



INSERT INTO genero(genro) VALUES ('Generico');

INSERT INTO filmes (nomefilme,posterfilme,codgenero,sinopsefilme) VALUES ('Cinema','https://d1csarkz8obe9u.cloudfront.net/posterpreviews/movie-theater-poster-template-b7bbf00c3aab56f52e95d67fe65c655f_screen.jpg?ts=1636970736','1','Coming Soon')

INSERT INTO usuario(nome,senha) VALUES  ('RENATO',MD5('1234'));


