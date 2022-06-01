<?php
include "conexao.php";
include "index.html";
include "sessao.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selecionar</title>
</head>

<body>
    <form method="post">
        <select name="selectgenero">
            <option value="">--Selecione o Gênero--</option>

            <?php
            $conn = pg_connect(" host=localhost port=5432 user=postgres password=cest dbname=postgres");
            $resultado = pg_query($conn, "select * from genero;");

            while ($linhagenero = pg_fetch_assoc($resultado)) {
                echo "<option value=$linhagenero[codgenero] > $linhagenero[genero] </option> ";
            }
            pg_close($conn);
            ?>

            <option value="Apple">Apple</option>
            <option value="Banana">Banana</option>
        </select>
        <input type="submit" value="submit">
    </form>

</body>
Hello <?php echo htmlspecialchars($_POST['selectgenero']); ?>

</html>
<?php
$genero = $_POST['selectgenero'];
echo "$genero";

if (isset($_POST['selectgenero'])) {
    if (!empty($_POST['selectgenero'])) {
        $selected = $_POST['selectgenero'];
        echo "You have chosen: " . $selected;
    } else {
        echo "Please select the value.";
    }
}
?>