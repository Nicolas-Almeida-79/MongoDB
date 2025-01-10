<?php

require 'db_connection.php';

if (isset($_GET['id'])) {
    $id = new MongoDB\BSON\ObjectId($_GET['id']);

    try {
        // Preparar a exclusão
        $bulk = new MongoDB\Driver\BulkWrite;
        $bulk->delete(['_id' => $id]);

        // Executar a exclusão
        $result = $manager->executeBulkWrite('sistema_cursos.clientes', $bulk);

        // Verificar se a exclusão foi bem-sucedida
        if ($result->getDeletedCount() > 0) {
            // Redireciona para o index.php com uma mensagem de sucesso
            header('Location: index.php?status=deleted');
            exit(); // Impede a execução de mais código após o redirecionamento
        } else {
            echo "Nenhum cliente encontrado com esse ID para deletar.";
        }
    } catch (Exception $e) {
        echo "Erro ao deletar cliente: " . $e->getMessage();
    }
} else {
    echo "ID não fornecido!";
}
?>