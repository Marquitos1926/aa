<?php
// Conetar ao banco de dados
$mysqli = new mysqli("localhost", "root", "", "proutos");

// Verifica a conexão
if ($mysqli->connect_error) {
    die("Falha na conexão: ". $mysqli->connect_error);
}

// Recebero ID do produto a ser excluído
$id = $_GET['id'];

// Excluir produtos do banco de dados
$stmt = $mysqli->prepare("DELETE FROM produtos WHERE id = ?");
$stmr -> bind_param("i", $id);

if ($stmt -> execute()) {
    echo "produto excluído com sucesso!!";
} else {
    echo "Erro: " . $stmt->error;
}
?>