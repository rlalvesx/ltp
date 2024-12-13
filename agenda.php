<?php
session_start();

if (!isset($_SESSION['contatos'])) {
    $_SESSION['contatos'] = [];
}

$mensagem = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $nome = htmlspecialchars($_POST["nome"] ?? '');
    $telefone = htmlspecialchars($_POST["telefone"] ?? '');
    $email = htmlspecialchars($_POST["email"] ?? '');
    $estado = htmlspecialchars($_POST["estado"] ?? '');

    if (empty($nome) || empty($telefone) || empty($email) || empty($estado)) {
        $mensagem = "<span class='erro'>Preencha todos os campos!</span>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $mensagem = "<span class='erro'>E-mail inválido!</span>";
    } elseif (!preg_match('/^[0-9\-\+\(\) ]+$/', $telefone)) {
        $mensagem = "<span class='erro'>Telefone inválido! Use apenas números e caracteres permitidos.</span>";
    } else {
        $_SESSION['contatos'][] = [
            "nome" => $nome,
            "telefone" => $telefone,
            "email" => $email,
            "estado" => $estado,
        ];
        $mensagem = "<span class='sucesso'>O contato foi adicionado com sucesso!</span>";
    }
}
?>