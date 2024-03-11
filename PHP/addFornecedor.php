<?php
require_once './conectarbd.php';
$nome = isset($_POST['nomefornecedor']) ? $_POST['nomefornecedor'] : null;
$cnpj = isset($_POST['cnpj']) ? $_POST['cnpj'] : null;
if(empty($nome) || empty($cnpj)){
    echo "Volte e preencha todos os campos";
    exit;
}
$PDO = db_connect();
$sql = "INSERT INTO fornecedor(nome), cnpj VALUES(:nome, :cnpj";



?>