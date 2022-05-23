<?php
// conecta banco de dados
$conn = pg_connect(" host=localhost port=5432 user=postgres password=cest dbname=postgres") or
    die("Não foi possível conectar ao servidor PostgreSQL" . pg_last_error());

$filmes = pg_query($conn, "select * from filmes;");
