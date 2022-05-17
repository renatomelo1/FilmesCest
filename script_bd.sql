--  Executar esse comando no gerenciador de banco de dados para o crud conseguir ler os dados 
 create table filmes(
    codFilme serial primary key,
    nomeFilme varchar (200),
    sinopseFilme varchar(8000),
    posterFilme varchar(200)
);

-- DELETE from filmes  WHERE nomefilme = '' ;

-- sintax para inserir filme
insert into filmes(nomeFilme,sinopseFilme,posterfilme) values('Cidade de Deus','Buscapé é um jovem morador da Cidade de Deus que cresce em meio à violência. Com medo de se tornar um bandido, enxerga na fotografia uma oportunidade de ter uma vida digna.','https://www.themoviedb.org/t/p/w300_and_h450_bestv2/pA70WUs7KHiHltfiBN4XEELOXcS.jpg');

select * from filmes;