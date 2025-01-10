<?php

require 'db_connection.php';

function criarCliente($nome, $email, $telefone, $cursos) {
    global $manager;
    
    $bulk = new MongoDB\Driver\BulkWrite;
    
    $document = [
        "nome" => $nome,
        "email" => $email,
        "telefone" => $telefone,
        "cursos" => $cursos // Array de cursos
    ];
    
    $bulk->insert($document);
    $manager->executeBulkWrite('sistema_cursos.clientes', $bulk);

    return $nome;
}

function listarClientes() {
    global $manager;

    $query = new MongoDB\Driver\Query([]);

    $clientes = $manager->executeQuery('sistema_cursos.clientes', $query);

    echo "<div class='lista-clientes'>";
    echo "<h2>Lista de Clientes</h2>";
    foreach ($clientes as $document) {
        echo "<p>Nome: " . $document->nome . "</p>";
        echo "<p>Email: " . $document->email . "</p>";
        echo "<p>Telefone: " . $document->telefone . "</p>";
        echo "<p>Cursos: " . implode(", ", $document->cursos) . "</p>";
        echo "<p><a href='update.php?id=" . $document->_id . "'>Editar</a> | ";
        echo "<a href='delete.php?id=" . $document->_id . "'>Deletar</a></p>";
    }
    echo "</div>";
}