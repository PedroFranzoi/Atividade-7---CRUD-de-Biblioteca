<?php

include '../db.php';


$sql = "SELECT * FROM emprestimos";

$result = $conn->query($sql);

if($result->num_rows > 0){

    echo "<table border = '1'>
        <tr>
            <th> Data Emprestimo </th>
            <th> Data Devolucao </th>
        </tr>
    ";

    while($row = $result->fetch_assoc()){

        echo "<tr>
                <td> {$row['data_emprestimo']} </td>
                <td> {$row['data_devolucao']} </td>
                <td>
                    <a href='update.php?id={$row['id_emprestimo']}'>Utualizar</a>
                </td>
                <td>
                    <a href='delete.php?id={$row['id_emprestimo']}'>Deletar</a>
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