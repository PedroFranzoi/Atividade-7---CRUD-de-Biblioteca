<?php

include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $dataEmprestimo = $_POST['data_emprestimo'];
    $dataDevolucao = $_POST['data_devolucao'];

    $sql = " INSERT INTO emprestimos (data_emprestimo,data_devolucao) VALUE ('$dataEmprestimo','$dataDevolucao')";

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
        <label for="data_emprestimo">Data de Emprestimo:</label>
        <input type="date" name="data_emprestimo" required>

        <label for="data_devolucao">Data de Devolucao:</label>
        <input type="date" name="data_devolucao" required>

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