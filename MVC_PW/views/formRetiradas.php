<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Biblioteca - Cadastro de Retiradas de Livros</title>
</head>
<body>
    <h1>Cadastro de Retiradas de Livros</h1>
    <?php
        if (isset($_GET['erro'])) {
            echo "<p>".$_GET['erro']."</p>";
        }
    ?>
    <a href="retiradas.php?destino=list">Voltar para a listagem</a>
    <form action="retiradas.php?destino=save" method="POST">
        <input type="hidden" name="id" value="<?php echo $retirada->getId() !== null ? $retirada->getId() : ''; ?>">

        <label for="nome_aluno">Nome do Aluno:</label>
        <select name="id_aluno" id="nome_aluno" required>
            <option value="">Selecione um aluno</option>
            <?php foreach ($alunos as $aluno): ?>
                <option value="<?php echo $aluno->getId(); ?>" 
                    <?php echo (isset($retirada) && $retirada->getIdAluno() == $aluno->getId()) ? 'selected' : ''; ?>>
                    <?php echo $aluno->getNome(); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>

        <label for="nome_livro">Livro:</label>
        <select name="id_livro" id="nome_livro" required>
            <option value="">Selecione um livro</option>
            <?php foreach ($livros as $livro): ?>
                <option value="<?php echo $livro->getId(); ?>" 
                    <?php echo (isset($retirada) && $retirada->getIdLivro() == $livro->getId()) ? 'selected' : ''; ?>>
                    <?php echo $livro->getTitulo(); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>

        <label for="data_retirada">Data de Retirada:</label>
        <input type="date" name="data_retirada" id="data_retirada" value="<?php echo isset($retirada) ? $retirada->getDataRetirada() : ''; ?>" required>
        <br>
        
        <button type="submit">Salvar</button>
    </form>
</body>
</html>
