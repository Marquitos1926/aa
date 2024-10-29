<?php
// Conetar ao banco de dados
$mysqli = new mysqli("localhost", "root", "", "produtos");

// Verifica a conexão
if ($mysqli->connect_error) {
    die("Falha na conexão: ". $mysqli->connect_error);
}

// Recebere os dados do formulário
$name = $_POST['name'];
$price = $_POST['price'];
$description = $_POST['description'];

// Inserir produtos no banco de dados 
$stmt = $mysqli->prepare("INSERT INTO produtos (name, price, description)
 VALUES (?, ?, ?)");
$stmt->bind_param("sds", $name, $price, $description);

if ($stmt->execute()) {
    echo "Produto adicionado com sucesso!";
} else {
    echo "Erro: " . $stmt->error;
}

// Redirecionar para a página principal
header("Location: index.html");

$stmt->close();
$mysql->close();

?>