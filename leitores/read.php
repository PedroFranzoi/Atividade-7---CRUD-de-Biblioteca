<?php

include '../db.php';


$sql = "SELECT * FROM leitores";

$result = $conn->query($sql);

if($result->num_rows > 0){

    echo "<table border = '1'>
        <tr>
            <th> Nome </th>
            <th> Email </th>
            <th> Telefone </th>
        </tr>
    ";

    while($row = $result->fetch_assoc()){

        echo "<tr>
                <td> {$row['nome']} </td>
                <td> {$row['email']} </td>
                <td> {$row['telefone']} </td>
                <td>
                    <a href='update.php?id={$row['id_leitor']}'>Utualizar</a>
                </td>
                <td>
                    <a href='delete.php?id={$row['id_leitor']}'>Deletar</a>
                </td>
            </tr>
        ";
    }
    echo "</table>";
    echo "<a href='create.php'>Criar Registro</a>";
}else{
    echo "Nenhum produto registrado.";
    echo "<a href='create.php'>Criar Registro</a>";
}

$conn -> close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    
</body>
</html>