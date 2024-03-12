<?php
require_once './conectarbd.php';
$id = isset($_GET['id']) ? $_GET['id'] : null;
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$cnpj = isset($_POST['cnpj']) ? $_POST['cnpj'] : null;
if (empty($nome) || empty($cnpj)){
    echo "Volte e preencha todos os campos";
    exit;
}

$PDO = db_connect();
$sql = "UPDATE fornecedor SET nome = :nome WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':cnpj', $cnpj);
$stmr->bindParam(':id', $id, PDO::PARAM_INT);
if ($stmt->execute()){
    header('Location: /../HTML/mensagemOk.html');
}
else{
    echo "Erro ao alterar!";
    print_r($stmt->errorInfo());
}


?>