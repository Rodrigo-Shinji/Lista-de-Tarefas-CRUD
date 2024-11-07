<?php
session_start();
require_once("conexao.php");

$sql = "SELECT * FROM tarefas";
$tarefas = mysqli_query($conn, $sql);

function transformarStatus($status) {
    if ($status == 0) {
        return "Pendente";
    } elseif ($status == 1) {
        return  "Andamento";
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
    <title>Lista de Tarefas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Lista de Tarefas <i class="bi bi-clipboard"></i>
                            <a href="create-tarefa.php" class="btn btn-primary float-end">Adicionar Tarefa</a>
                        </h4>
                            <div class="card-body">
                            <?php include('message.php'); ?>
                                <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nome</th>
                                    <th>Descrição</th>
                                    <th>Status</th>
                                    <th>Data Limite</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php foreach ($tarefas as $tarefa): ?>
                                        <td><?php echo $tarefa['id']; ?></td>
                                        <td><?php echo $tarefa['nome']; ?></td>
                                        <td style="max-width: 125px; line-break: auto;"><?php echo $tarefa['descricao']; ?></td>
                                        <td><?php echo transformarStatus($tarefa['status']); ?></td>
                                        <td><?php echo date('d/m/Y', strtotime($tarefa['data_limite'])); ?></td>
                                        <td>
                                            <form action="acoes.php" method="POST" class="d-inline">
                                                    <button onclick="return confirm('Deseja iniciar a tarefa selecionada?')" name="iniciar_tarefa" type="submit" value="<?=$tarefa['id']?>" class="btn btn-primary btn-sm">Iniciar</button>
                                                </form>
                                                <form action="acoes.php" method="POST" class="d-inline">
                                                    <button onclick="return confirm('Deseja pausar a tarefa selecionada?')" name="andamento_tarefa" type="submit" value="<?=$tarefa['id']?>" class="btn btn-warning btn-sm">Pausar</button>
                                                </form>
                                                <form action="acoes.php" method="POST" class="d-inline">
                                                    <button onclick="return confirm('Deseja concluir a tarefa selecionada?')" name="concluir_tarefa" type="submit" value="<?=$tarefa['id']?>" class="btn btn-success btn-sm">Concluir</button>
                                                </form>
                                                <a href="edit-tarefa.php?id=<?=$tarefa['id']?>" class="btn btn-secondary btn-sm"><i class="bi bi-pencil-fill"></i></a>
                                                <form action="acoes.php" method="POST" class="d-inline">
                                                    <button onclick="return confirm('Deseja excluir a tarefa selecionada?')" name="delete_tarefa" type="submit" value="<?=$tarefa['id']?>" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>