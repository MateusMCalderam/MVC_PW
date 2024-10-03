<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Biblioteca - Cadastro de Retiradas de Livros</title>
</head>
<body>
    <h1>Cadastro de Retiradas de Livros</h1>
    <a href="retiradas.php?destino=list">Voltar para a listagem</a>
    <form action="retiradas.php?destino=save" method="POST">
        <input type="hidden" name="id" value="<?php echo isset($retirada) ? $retirada->getId() : ''; ?>">

        <label for="nome_aluno">Nome do Aluno:</label>
        <input list="alunos" name="id_aluno" id="nome_aluno" required>
        <datalist id="alunos">
            <?php foreach ($alunos as $aluno): ?>
                <option value="<?php echo $aluno->getNome(); ?>" 
                    data-id="<?php echo $aluno->getId(); ?>">
                </option>
            <?php endforeach; ?>
        </datalist>
        <br>

        <label for="nome_livro">Livro:</label>
        <input list="livros" name="id_livro" id="nome_livro" required>
        <datalist id="livros">
            <?php foreach ($livros as $livro): ?>
                <option value="<?php echo $livro->getTitulo(); ?>" 
                    data-id="<?php echo $livro->getId(); ?>">
                </option>
            <?php endforeach; ?>
        </datalist>
        <br>

        <label for="data_retirada">Data de Retirada:</label>
        <input type="date" name="data_retirada" id="data_retirada" value="<?php echo isset($retirada) ? $retirada->getDataRetirada() : ''; ?>" required>
        <br>

        <label for="data_devolucao">Data de Devolução:</label>
        <input type="date" name="data_devolucao" id="data_devolucao" value="<?php echo isset($retirada) ? $retirada->getDataDevolucao() : ''; ?>" required>
        <br>

        <button type="submit">Salvar</button>
    </form>
</body>
</html>
