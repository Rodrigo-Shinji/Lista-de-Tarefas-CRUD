<?php
session_start();
require_once('conexao.php');

if (isset($_POST['create_tarefa'])){
    $nome = trim($_POST['txtNome']);
    $descricao = trim($_POST['txtDescricao']);
    $dataLimite = trim($_POST['txtDataLimite']);

$sql ="INSERT INTO tarefas (nome, descricao, data_limite) VALUES ('$nome', '$descricao', '$dataLimite')";

mysqli_query($conn, $sql);

header('Location: index.php');
exit();
}

if (isset($_POST['concluir_tarefa'])){
    $tarefaID = mysqli_real_escape_string($conn, $_POST['concluir_tarefa']);
    $sql = "UPDATE tarefas SET status = '2' WHERE id = '$tarefaID'";

    mysqli_query($conn, $sql);

    header('Location: index.php');
    exit();
}

if (isset($_POST['andamento_tarefa'])){
    $tarefaID = mysqli_real_escape_string($conn, $_POST['andamento_tarefa']);
    $sql = "UPDATE tarefas SET status = '0' WHERE id = '$tarefaID'";

    mysqli_query($conn, $sql);

    header('Location: index.php');
    exit();
}

if (isset($_POST['iniciar_tarefa'])){
    $tarefaID = mysqli_real_escape_string($conn, $_POST['iniciar_tarefa']);
    $sql = "UPDATE tarefas SET status = '1' WHERE id = '$tarefaID'";

    mysqli_query($conn, $sql);

    header('Location: index.php');
    exit();
}

if (isset($_POST['delete_tarefa'])){
    $tarefaID = mysqli_real_escape_string($conn, $_POST['delete_tarefa']);
    $sql = "DELETE FROM tarefas WHERE id = '$tarefaID'";

    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        $_SESSION['message'] = "Tarefa excluído com sucesso!";
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = "Não foi possível excluir a tarefa!";
        $_SESSION['type'] = 'error';
    }

    header('Location: index.php');
    exit;
}

if (isset($_POST['edit_tarefa'])){
    $tarefaID = mysqli_real_escape_string($conn, $_POST['tarefa_id']);
    $nome = mysqli_real_escape_string($conn, $_POST['txtNome']);
    $descricao = mysqli_real_escape_string($conn, $_POST['txtDescricao']);
    $dataLimite = mysqli_real_escape_string($conn, $_POST['txtDataLimite']);

    $sql = "UPDATE tarefas SET nome ='{$nome}', descricao = '{$descricao}', data_limite = '{$dataLimite}'";

    $sql .= "WHERE id = '{$tarefaID}'";

    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        $_SESSION['message'] = "Tarefa alterada com sucesso!";
        $_SESSION['mesage'] = 'success';
    } else {
        $_SESSION['message'] = "Não foi possível alterar a tarefa!";
        $_SESSION['type'] = 'error';
    }

    header('Location: index.php');
    exit;
}