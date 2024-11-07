<?php
session_start();
require_once('conexao.php');

function transformarStatus($status) {
    if ($status == 0) {
        return "Não Finalizada";
    } elseif ($status == 1) {
        return  "Em Andamento";
    } else {
        return "Concluída";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Tarefa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Criar Tarefa <i class="bi bi-clipboard-data"></i>
                        <a href="index.php" class="btn btn-danger float-end">Voltar</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="acoes.php" method="POST">
                        <div class="mb3">
                            <label for="txtNome">Nome</label>
                            <input type="text" name="txtNome" id="txtNome" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="txtDescricao">Descrição da Tarefa</label>
                            <input type="text" name="txtDescricao" id="txtDescricao" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="txtDataLimite">Data Limite da Tarefa</label>
                            <input type="date" name="txtDataLimite" id="txtDataLimite" class="form-control">
                        </div>
                        <div class="mb-3">
                            <button type="subtmit" name="create_tarefa" class="btn btn-primary float-end">Criar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>