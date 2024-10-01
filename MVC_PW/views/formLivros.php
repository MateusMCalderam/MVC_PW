<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Biblioteca</title>
</head>
<body>
    <h1>Cadastro de Livros</h1>
    <a href="index.php">Voltar para a listagem</a>
    <form action="livro.php?destino=save" method="POST">
        <input type="hidden" name="id" value="<?php echo isset($livro) ? $livro->getId() : ''; ?>">
        
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" value="<?php echo isset($livro) ? $livro->getTitulo() : ''; ?>" placeholder="Título do livro" required>
        <br>

        <label for="autores">Autores:</label>
        <input type="text" name="autores" id="autores" value="<?php echo isset($livro) ? $livro->getAutores() : ''; ?>" placeholder="Autores" required>
        <br>

        <label for="editora">Editora:</label>
        <input type="text" name="editora" id="editora" value="<?php echo isset($livro) ? $livro->getEditora() : ''; ?>" placeholder="Editora" required>
        <br>

        <label for="ano_publicacao">Ano de Publicação:</label>
        <input type="number" name="ano_publicacao" id="ano_publicacao" value="<?php echo isset($livro) ? $livro->getAnoPublicacao() : ''; ?>" placeholder="Ano de publicação" required>
        <br>

        <label for="quantidade_exemplares">Quantidade de Exemplares:</label>
        <input type="number" name="quantidade_exemplares" id="quantidade_exemplares" value="<?php echo isset($livro) ? $livro->getQuantidadeExemplares() : ''; ?>" placeholder="Quantidade" required>
        <br>

        <label for="isbn">ISBN:</label>
        <input type="text" name="isbn" id="isbn" value="<?php echo isset($livro) ? $livro->getIsbn() : ''; ?>" placeholder="ISBN" required>
        <br>

        <button type="submit">Salvar</button>
    </form>
</body>
</html>
