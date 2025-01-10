<?php
    require 'cursos.php';

    // Verifica se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['acao'] === 'cadastrar_cliente') {
        // Recebe os dados do formulário
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $cursos = explode(',', $_POST['cursos']); // Divide os cursos por vírgula
        
        // Chama a função para criar o cliente
        try {
            $nomeCliente = criarCliente($nome, $email, $telefone, $cursos);
            echo "<p class='success'>Cliente $nomeCliente cadastrado com sucesso!</p>";
        } catch (Exception $e) {
            echo "<p class='error'>Erro ao cadastrar cliente: " . $e->getMessage() . "</p>";
        }
    }

    // Verifica se há um status de sucesso passado via URL
    if (isset($_GET['status']) && $_GET['status'] === 'deleted') {
        echo "<p class='success'>Cliente deletado com sucesso!</p>";
    }
    if (isset($_GET['status']) && $_GET['status'] === 'updated') {
        echo "<p class='success'>Cliente editado com sucesso!</p>";
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Clientes e Cursos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Sistema de Clientes e Cursos</h1>

    <!-- Formulário para cadastro de cliente -->
    <form action="index.php" method="POST">
        <h2>Cadastro de Cliente</h2>
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" required>

        <label for="cursos">Cursos (separados por vírgula):</label>
        <input type="text" id="cursos" name="cursos" required>

        <input type="hidden" name="acao" value="cadastrar_cliente">
        <button type="submit">Cadastrar Cliente</button>
    </form>

    <?php
        listarClientes();
    ?>
</body>
</html>
