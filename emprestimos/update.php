<?php

include '../db.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $dataEmprestimo = $_POST['data_emprestimo'];
    $dataDevolucao = $_POST['data_devolucao'];

    $sql = "UPDATE emprestimos SET data_emprestimo ='$dataEmprestimo', data_devolucao= '$dataDevolucao' WHERE id_emprestimo=$id";

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

$sql = "SELECT * FROM leitores WHERE id_autor=$id";
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

    <form method="POST" action="update.php?id=<?php echo $row['id_leitor'];?>">

        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?php echo $row['nome'];?>" required>

        <label for="email">Email:</label>
        <input type="text" name="email" value="<?php echo $row['email'];?>" required>

        <label for="telefone">Telefone:</label>
        <input type="number" name="telefone" value="<?php echo $row['telefone'];?>" required>

        <input type="submit" value="Atualizar">

    </form>

    <a href="read.php">Ver registros.</a>

</body>

</html>