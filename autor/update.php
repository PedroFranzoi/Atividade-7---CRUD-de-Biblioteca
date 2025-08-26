<?php

include '../db.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['nome'];
    $nacionalidade = $_POST['nacionalidade'];
    $ano = $_POST['ano_nascimento'];

    $sql = "UPDATE autores SET nome ='$name', nacionalidade= '$nacionalidade', ano_nascimento ='$ano' WHERE id_autor=$id";

    if ($conn->query($sql) === true) {
        echo "Registro atualizado com sucesso.
        <a href='read.php'>Ver registros.</a>
        ";
    } else {
        echo "Erro " . $sql . '<br>' . $conn->error;
    }
    $conn->close();
    exit();
}

$sql = "SELECT * FROM autores WHERE id_autor=$id";
$result = $conn -> query($sql);
$row = $result -> fetch_assoc();


?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
</head>

<body>

    <form method="POST" action="update.php?id=<?php echo $row['id_autor'];?>">

        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?php echo $row['nome'];?>" required>

        <label for="nacionalidade">Nacionalidade:</label>
        <input type="text" name="nacionalidade" value="<?php echo $row['nacionalidade'];?>" required>

        <label for="ano_nascimento">Ano de Nascimento:</label>
        <input type="number" name="ano_nascimento" value="<?php echo $row['ano_nascimento'];?>" required>

        <input type="submit" value="Atualizar">

    </form>

    <a href="read.php">Ver registros.</a>

</body>

</html>