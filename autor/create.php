<?php

include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['nome'];
    $nacionalidade = $_POST['nacionalidade'];
    $ano = $_POST['ano_nascimento'];

    $sql = " INSERT INTO autores (nome,nacionalidade,ano_nascimento) VALUE ('$name','$nacionalidade','$ano')";

    if ($conn->query($sql) === true) {
            echo "Registrado criado com sucesso.";
        } else {
            echo "Erro " . $sql . '<br>' . $conn->error;
        }
        $conn->close();
    
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
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>

        <label for="nacionalidade">Nacionalidade:</label>
        <input type="text" name="nacionalidade" required>

        <label for="ano_nascimento">Ano de Nascimento:</label>
        <input type="text" name="ano_nascimento" required>
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