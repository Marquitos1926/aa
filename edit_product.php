<?php
// Conetar ao banco de dados
$mysqli = new mysqli("localhost", "root", "", "produtos");

// Verifica a conexão
if ($mysqli->connect_error) {
    die("Falha na conexão: ". $mysqli->connect_error);
}


$id = $_GET['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$description = $_POST['description'];

$stmt = $mysqli->prepare("UPDATE produtos SET name = ?, price = ?, description = ? WHERE id = ?");
$stmt-> bind_param("sdsi", $name, $price, $description, $id);

if ($stmt -> execute()) {
    echo "produto atualizado com sucesso!!";
} else {
    echo "Erro: " . $stmt->error;
}

header("Location: index.html");

?>