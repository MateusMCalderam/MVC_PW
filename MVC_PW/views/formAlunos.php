<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Biblioteca</title>
</head>
<body>
    <h1>Cadastro de Alunos</h1>
    <a href="index.php">Voltar para a listagem</a>
    <form action="salvarAlunos.php" method="POST">
        <input type="hidden" name="id" value="<?php echo isset($aluno) ? $aluno->getId() : ''; ?>">
        
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="<?php echo isset($aluno) ? $aluno->getNome() : ''; ?>" placeholder="Nome do aluno" required>
        <br>

        <label for="data_nasc">Data de Nascimento:</label>
        <input type="date" name="data_nasc" id="data_nasc" value="<?php echo isset($aluno) ? $aluno->getDataNasc() : ''; ?>" required>
        <br>

        <label for="id_curso">ID do Curso:</label>
        <input type="number" name="id_curso" id="id_curso" value="<?php echo isset($aluno) ? $aluno->getIdCurso() : ''; ?>" placeholder="ID do curso" required>
        <br>

        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" id="cpf" value="<?php echo isset($aluno) ? $aluno->getCpf() : ''; ?>" placeholder="CPF" required>
        <br>

        <button type="submit">Salvar</button>
    </form>
</body>
</html>
