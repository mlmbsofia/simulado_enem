<?php
@$disciplina = $_REQUEST['disciplina'];
@$numberOfQuestions = $_REQUEST['numberOfQuestions'];

echo $disciplina . " = ". $numberOfQuestions;

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <title>Seleção de Disciplinas</title>
</head>
<body>

<form action="retorno_select.php" method="post" class="p-3">
    <div class="row">
        <div class="col-6">
            <label for="disciplina" class="form-label">Escolha uma disciplina:</label><br>
            <select name="disciplina" id="disciplina" class="form-select">
                <option selected></option>
                <option value="matematica">Matemática</option>
                <option value="geografia">Geografia</option>
                <option value="ingles">Inglês</option>
                <option value="todas">Todas as disciplinas</option>
            </select>
        </div>
        <div class="col-3">
            <label for="numberOfQuestions" class="form-label">Digite a qunatidade de questões:</label><br>
            <input type="number" name="numberOfQuestions" id="numberOfQuestions" value="0" min="0" max="10" class="form-control">
        </div>
        <div class="row">
            <div class="d-grid col-2 gap-3 p-3">
                <input type="submit" value="Enviar" class="btn btn-primary d-grid">
            </div>
        </div>
    </div>
</form>

</body>

</html>
