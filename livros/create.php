<?php

include '../db.php';

$sqlAutor = "SELECT id_autor, nome FROM autores";
$resultAutor = $conn->query($sqlAutor);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $titulo = $_POST['titulo'];
    $genero = $_POST['genero'];
    $ano_publicacao = $_POST['ano_publicacao'];
    $autor = $_POST['autor'];

    $sql = " INSERT INTO leitores (titulo,genero,ano_publicacao,id_autor) VALUE ('$titulo','$genero','$ano_publicacao','$autor')";

    if($ano_publicacao < 1500 || $ano_publicacao > 2025){
        echo "Coloque o ano de publicação de maneira correta";
    }else{
        if ($conn->query($sql) === true) {
            echo "Registrado criado com sucesso.";
        } else {
            echo "Erro " . $sql . '<br>' . $conn->error;
        }
        $conn->close();
    }
    
    
}

?>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link rel="stylesheet" href="../styles/style.css">

</head>

<body>

<div>

    
    <div>
    <h1>Adicionar o Jogador</h1>
     <form method="POST" action="create.php">
    <div>
        <label for="titulo">Titulo:</label>
        <input type="text" name="titulo" required>

        <label for="genero">Genero:</label>
        <input type="text" name="genero" required>

        <label for="ano_publicacao">Ano Publicacao:</label>
        <input type="text" name="ano_publicacao" required>

        <label for="autor">Autor:</label>
        <select name="tiautorme">
        <?php while ($row = $resultTimes->fetch_assoc()): ?>
            <option value="<?= $row['id_autor'] ?>"><?= $row['nome'] ?></option>
        <?php endwhile; ?>
        </select>
    </div>
        <input type="submit" value="Adicionar">
        <div>
            <a href="read.php">Ver Registros</a>
        </div>
        
</div>

    </form>

</div>
    
</body>


</html>