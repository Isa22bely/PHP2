<?php
require_once './conectarbd.php';
$id = isset($_GET['id']) ? (int) $_GET['id'] : null;
if (empty($id)){
    echo "ID para alteração não definedo";
    exit;
}
$PDO = db_connect();
$sql = "SELECT id, nome, cnpj FROM Frornecedor WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt = bindParam(' :id', $id, $PDO::PARAM_INT);
$stmt = execute();
$tipo = $stmt->fetch(PDO::FETCH_ASSOC);
if (!is_array($fornecedor)){
    echo "Nenhum cadastro encontrado";
    exit;
}


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>

    </header>
    <div>
    <form action="/editFornecedor.php" method="post">
            <label for="nome">Nome: </label>
            <input type="text" name="nomefornecedor" id="nomefornecedor" value="<?php echo $fornecedor['nomefornecedor'] ?>">
            <label for="cnpj">CNPJ</label>
            <input type="text" name="cnpj" id="cnpj" value="<?php echo $fornecedor['cnpj'] ?>" >

            <input type="hidden" name="id" value="<?php echo $id ?>">
            <button type="submit" id="submit" value="submit">Enviar</button>
            <a href="/index.html">Cancelar</a>
        </form>
    </div>
    
</body>
</html>