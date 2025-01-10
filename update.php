<link rel="stylesheet" href="style.css">
<?php

require 'db_connection.php';

if (isset($_GET['id'])) {
    $id = new MongoDB\BSON\ObjectId($_GET['id']);

    // Localizar o registro a ser editado
    $filter = ['_id' => $id];
    $query = new MongoDB\Driver\Query($filter);
    $cursor = $manager->executeQuery('sistema_cursos.clientes', $query);
    $cliente = current($cursor->toArray());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = new MongoDB\BSON\ObjectId($_POST['id']);
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cursos = explode(',', $_POST['cursos']); // Divide os cursos por vírgula

    // Preparar a atualização
    $bulk = new MongoDB\Driver\BulkWrite;
    $bulk->update(
        ['_id' => $id],
        ['$set' => ['nome' => $nome, 'email' => $email, 'telefone' => $telefone, 'cursos' => $cursos]]
    );

    // Executar a atualização
    $manager->executeBulkWrite('sistema_cursos.clientes', $bulk);

    header('Location: index.php?status=updated');
    exit(); // Impede a execução de mais código após o redirecionamento
}
// Converte o array de cursos para uma string separada por vírgulas (se existir)
$cursosString = isset($cliente->cursos) ? implode(',', $cliente->cursos) : '';
?>

<!-- Formulário de edição -->
<form action="update.php" method="post">
    <input type="hidden" name="id" value="<?= $cliente->_id ?>">
    Nome: <input type="text" name="nome" value="<?= $cliente->nome ?>"><br>
    Email: <input type="text" name="email" value="<?= $cliente->email ?>"><br>
    Telefone: <input type="number" name="telefone" value="<?= $cliente->telefone ?>"><br>
    Cursos: <input type="text" name="cursos" value="<?= $cursosString ?>"><br>
    <input type="submit" value="Atualizar Cliente">
</form>