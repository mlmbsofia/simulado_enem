<?php
include "../funcoes/funcao_select.php";

$disciplina = $_REQUEST["disciplina"];
$numberOfQuestions = $_REQUEST["numberOfQuestions"];
//$totalNumberOfQuestions = $numberOfQuestions * 2;
$referenciaUnica = array('Geografia', 'Inglês');



?>
<!DOCTYPE html>
<html LANG="pt-BR">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <title>Retorno Função Select</title>
</head>
<body>

    <div class="titulo">
        <h1>Simulação de Avaliação</h1>
        <br>
        <div>
            <?php
                if ($disciplina == false || $numberOfQuestions == 0){
                    ?>
                <h3>Selecione ao menos uma disciplina e/ou ao menos uma questão.</h3>
            <?php
                }
            ?>
        </div>
    </div>
    <?php

    if ($disciplina == "todas" && $numberOfQuestions > 0) {

        $consulta = select("questoes", "referencia");
        foreach (['SORT_REGULAR'] as $flag) {
            $a_new = array_unique($consulta, constant($flag));
            echo "{$flag} ==> ";
            var_dump($a_new);
        }

        if ($consulta == true){

            for ($j = 0; $j < count($referenciaUnica); $j++) {
                echo "<h3>{$referenciaUnica[$j]}</h3>";

                for ($i = 0; $i < $numberOfQuestions; $i++) {

                    if ($consulta['referencia'] == $referenciaUnica[$j]) {
                ?>

                        <div class="container-fluid mb-3" style="max-width: 1000px">
                            <div class="row">
                                <div class="col-10">
                                    <div class="numQuestao"><?php echo "Questão: " . ($i + 1) ?></div>
                                    <div class="titulo-questao"><?php echo $consulta[$i]['titulo']  ?></div>
                                    <div class="subtitulo"><?php echo $consulta[$i]['subtitulo'] ?></div>
                                    <div class="questao"><?php echo $consulta[$i]['questao']?></div>
                                    <div class="img">
                                        <img src="<?php echo $consulta[$i]['subtitulo'] ?>" alt=""></div>
                                    <div class="lista-alternativas">
                                        <form>
                                            <input type="radio" id="alt_a" name="alternativas" value="A" class="form-check-input">
                                            <label for="alt_a" class="form-check-label">A: <?php echo $consulta[$i]['alternativaA']?></label><br>
                                            <input type="radio" id="Alt_b" name="alternativas" value="B" class="form-check-input">
                                            <label for="Alt_b" class="form-check-label">B: <?php echo $consulta[$i]['alternativaB']?></label><br>
                                            <input type="radio" id="Alt_C" name="alternativas" value="C" class="form-check-input">
                                            <label for="Alt_C" class="form-check-label">C: <?php echo $consulta[$i]['alternativaC']?></label><br>
                                            <input type="radio" id="Alt_D" name="alternativas" value="D" class="form-check-input">
                                            <label for="Alt_D" class="form-check-label">D: <?php echo $consulta[$i]['alternativaD']?></label><br>
                                            <input type="radio" id="Alt_E" name="alternativas" value="E" class="form-check-input">
                                            <label for="Alt_E" class="form-check-label">E: <?php echo $consulta[$i]['alternativaE']?></label><br>
                                        </form>
                                        <input type="hidden" id="RespostaCorreta" name="respostaCorreta" value="Correta" hidden="hidden">
                                        <label for="RespostaCorreta">Alternativa correta: <?php echo $consulta[$i]['respostaCorreta']?></label><br>
                                    </div>

                                </div>
                            </div>
                        </div>
    <?php
                    }
            }
            }
        }
    }elseif ($disciplina == true && $numberOfQuestions > 0) {

        $consulta = select("questoes","*", "WHERE referencia = '$disciplina'");

        if ($consulta == true){
            ?>
            <h3>Avaliação de <?php echo $disciplina?></h3>
            <?php
            for ($i = 0; $i < $numberOfQuestions; $i++) {
                ?>

                <div class="container-fluid mb-3" style="max-width: 1000px">
                    <div class="row">
                        <div class="col-10">
                            <div class="numQuestao"><?php echo "Questão: " . ($i + 1) ?></div>
                            <div class="titulo-questao"><?php echo $consulta[$i]['titulo']  ?></div>
                            <div class="subtitulo"><?php echo $consulta[$i]['subtitulo'] ?></div>
                            <div class="questao"><?php echo $consulta[$i]['questao']?></div>
                            <div class="img">
                                <img src="<?php echo $consulta[$i]['subtitulo'] ?>" alt=""></div>
                            <div class="lista-alternativas">
                                <form>
                                    <input type="radio" id="alt_a" name="alternativas" value="A" class="form-check-input">
                                    <label for="alt_a" class="form-check-label">A: <?php echo $consulta[$i]['alternativaA']?></label><br>
                                    <input type="radio" id="Alt_b" name="alternativas" value="B" class="form-check-input">
                                    <label for="Alt_b" class="form-check-label">B: <?php echo $consulta[$i]['alternativaB']?></label><br>
                                    <input type="radio" id="Alt_C" name="alternativas" value="C" class="form-check-input">
                                    <label for="Alt_C" class="form-check-label">C: <?php echo $consulta[$i]['alternativaC']?></label><br>
                                    <input type="radio" id="Alt_D" name="alternativas" value="D" class="form-check-input">
                                    <label for="Alt_D" class="form-check-label">D: <?php echo $consulta[$i]['alternativaD']?></label><br>
                                    <input type="radio" id="Alt_E" name="alternativas" value="E" class="form-check-input">
                                    <label for="Alt_E" class="form-check-label">E: <?php echo $consulta[$i]['alternativaE']?></label><br>
                                </form>
                                <input type="hidden" id="RespostaCorreta" name="respostaCorreta" value="Correta" hidden="hidden">
                                <label for="RespostaCorreta">Alternativa correta: <?php echo $consulta[$i]['respostaCorreta']?></label><br>
                            </div>

                        </div>
                    </div>
                </div>
                <div>

                </div>
                <?php
                echo "<br>";
            }
        }elseif ($disciplina == true && $numberOfQuestions == 0) {
           ?>
            <div class="numZero">
                <h3>Digite a quantidade de questões para a prova!!!</h3>
            </div>
    <?php
        }else{
            ?>
            <div class="numZero">
                <h3>Nenhuma questão encontrada para a disciplina selecionada.</h3>
            </div>
            <?php
    }

    }

    ?>











    <?php

    if ($disciplina == true && $numberOfQuestions > 0) {

    }
    ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
