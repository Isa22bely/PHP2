<?php
require_once './conectarbd.php';
$nome = isset($_POST['nomefornecedor']) ? $_POST['nomefornecedor'] : null;
$cnpj = isset($_POST['cnpj']) ? $_POST['cnpj'] : null;
if(empty($nome) || empty($cnpj)){
    echo "Volte e preencha todos os campos";
    exit;
}
$PDO = db_connect();
$sql = "INSERT INTO Loja(nome, cnpj) VALUES(:nome, :cnpj)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':cnpj', $cnpj);

if ($stmt->execute()){
    header('Location: /../HTML/mensagemOk.html');
}
else
{
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}



?>