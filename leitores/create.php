<?php

include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $sql = " INSERT INTO leitores (nome,email,telefone) VALUE ('$name','$email','$telefone')";

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

</head>

<body>

<div>

    
    <div>
    <h1>Adicionar o Jogador</h1>
     <form method="POST" action="create.php">
    <div>
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>

        <label for="email">Email:</label>
        <input type="text" name="email" required>

        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" required>
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