<?php

include('agenda.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Contatos</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1>Gerenciador de Contatos</h1>

    <?php if (!empty($mensagem)): ?>
        <p><?= $mensagem; ?></p>
    <?php endif; ?>

    <form method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" placeholder="Digite o nome" required>
        <br>

        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" placeholder="Digite o telefone" required>
        <br>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" placeholder="Digite o e-mail" required>
        <br>

        <label for="estado">Estado:</label>
        <input type="text" id="estado" name="estado" placeholder="Digite o estado" required>
        <br>

        <button type="submit">Adicionar Contato</button>
    </form>

    <?php if (!empty($_SESSION['contatos'])): ?>
        <h2>Lista de contatos:</h2>
        <?php foreach ($_SESSION['contatos'] as $contato): ?>
            <p>
                <strong>Nome:</strong> <?= htmlspecialchars($contato['nome']); ?><br>
                <strong>Telefone:</strong> <?= htmlspecialchars($contato['telefone']); ?><br>
                <strong>Email:</strong> <?= htmlspecialchars($contato['email']); ?><br>
                <strong>Estado:</strong> <?= htmlspecialchars($contato['estado']); ?>
            </p>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html
