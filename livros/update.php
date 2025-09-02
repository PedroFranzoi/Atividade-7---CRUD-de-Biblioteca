<?php

include '../db.php';
$sqlAutor = "SELECT id_autor, nome FROM autores";
$resultAutor = $conn->query($sqlAutor);
$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $titulo = $_POST['titulo'];
    $genero = $_POST['genero'];
    $ano_publicacao = $_POST['ano_publicacao'];
    $autor = $_POST['autor'];

    $sql = "UPDATE livros SET titulo ='$titulo', genero= '$genero', ano_nascimento ='$ano_publicacao', autor= '$autor' WHERE id_livro=$id";

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

$sql = "SELECT * FROM livros WHERE id_livro=$id";
$result = $conn -> query($sql);
$row = $result -> fetch_assoc();


?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>

<body>

    <form method="POST" action="update.php?id=<?php echo $row['id_livro'];?>">

        <label for="titulo">Titulo:</label>
        <input type="text" name="titulo" value="<?php echo $row['titulo'];?>" required>

        <label for="genero">Genero:</label>
        <input type="text" name="genero" value="<?php echo $row['genero'];?>" required>

        <label for="ano_publicacao">Ano de Publicação:</label>
        <input type="number" name="ano_publicacao" value="<?php echo $row['ano_publicacao'];?>" required>

        <label for="autor">Autor:</label>
        <select name="tiautorme">
        <?php while ($row = $resultTimes->fetch_assoc()): ?>
            <option value="<?= $row['id_autor'] ?>"><?= $row['nome'] ?></option>
        <?php endwhile; ?>
        </select>

        <input type="submit" value="Atualizar">

    </form>

    <a href="read.php">Ver registros.</a>

</body>

</html>