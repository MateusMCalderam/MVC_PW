<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Biblioteca</title>
</head>
<body>
    <h1>Retirada de Livros</h1>
    <a href="retiradas.php?destino=form">Incluir Nova</a>
    <a href="alunos.php?destino=list">Ver Alunos</a>
    <a href="livro.php?destino=list">Ver Livros</a>
    
    <?php if (empty($retiradas)): ?>
        <p>Nenhum retirada realizada!</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Nome Aluno</th>
                    <th>Nome Livro</th>
                    <th>Data Retirada</th>
                    <th>Data Devolução</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($retiradas as $retirada): ?>
                    <tr>
                        <td><?php echo $retirada->getNomeAluno(); ?></td>
                        <td><?php echo $retirada->getNomeLivro(); ?></td>
                        <td><?php echo $retirada->getDataRetirada(); ?></td>
                        <td><?php echo $retirada->getDataDevolucao(); ?></td>
                        <td>
                            <a href="retirada.php?destino=form&id=<?php echo $retirada->getId(); ?>">Editar</a>
                            <br>
                            <a href="retirada.php?destino=remove&id=<?php echo $retirada->getId(); ?>">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
