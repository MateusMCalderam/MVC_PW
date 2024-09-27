<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Biblioteca</title>
</head>
<body>
    <h1>Listagem de Alunos</h1>
    <a href="alunos.php?destino=form">Incluir Novo Aluno</a>
    <a href="livro.php?destino=list">Ver Livros</a>
    <?php if (empty($alunos)): ?>
        <p>Nenhum aluno adicionado!</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Data de Nascimento</th>
                    <th>Curso</th>
                    <th>CPF</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($alunos as $aluno): ?>
                    <tr>
                        <td><?php echo $aluno->getNome(); ?></td>
                        <td><?php echo $aluno->getDataNasc(); ?></td>
                        <td><?php echo $aluno->getNomeCurso(); ?></td>
                        <td><?php echo $aluno->getCpf(); ?></td>
                        <td>
                            <a href="alunos.php?destino=form&id=<?php echo $aluno->getId(); ?>">Editar</a>
                            <br>
                            <a href="excluirAluno.php?id=<?php echo $aluno->getId(); ?>">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
