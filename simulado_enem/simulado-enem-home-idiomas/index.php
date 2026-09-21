<?php
$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $acao = $_POST["acao"] ?? "";

    if ($acao === "cadastro") {
        $mensagem = "Você escolheu acessar o cadastro.";
    } elseif ($acao === "login") {
        $mensagem = "Você escolheu acessar o login.";
    }
}

$areas = [
    ["icone" => "⚛", "titulo" => "Ciências da Natureza", "descricao" => "45 questões de Química, Física e Biologia.", "tipo" => "normal"],
    ["icone" => "✎", "titulo" => "Linguagens", "descricao" => "45 questões de Língua Portuguesa, Artes e Educação Física.", "tipo" => "normal"],
    ["icone" => "📐", "titulo" => "Matemática", "descricao" => "45 questões de Matemática.", "tipo" => "normal"],
    ["icone" => "☁", "titulo" => "Ciências Humanas", "descricao" => "45 questões de Geografia, História, Filosofia e Sociologia.", "tipo" => "normal"],
    ["icone" => "📖", "titulo" => "Línguas Estrangeiras", "descricao" => "Escolha o idioma para iniciar as questões.", "tipo" => "idiomas"],
    ["icone" => "⚡", "titulo" => "Proposta de Redação", "descricao" => "Propostas de temas para praticar redação.", "tipo" => "normal"]
];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulado ENEM</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<main class="pagina">

    <section class="inicio">
        <div class="container">

            <?php if ($mensagem !== ""): ?>
                <div class="mensagem"><?= htmlspecialchars($mensagem) ?></div>
            <?php endif; ?>

            <section class="card-estudos">
                <h1>Comece seus estudos hoje!</h1>
                <p>
                    A Escola Maria Luiza Miranda Bastos está incentivando o uso de um site de simulados
                    para o ENEM, tornando os estudos mais práticos e dinâmicos. A plataforma oferece
                    questões, correção rápida e explicações úteis para ajudar na preparação.
                </p>

                <form method="POST" class="acoes">
                    <button type="submit" name="acao" value="cadastro" class="botao botao-rosa">Cadastre-se</button>
                    <button type="submit" name="acao" value="login" class="botao botao-rosa">Login</button>
                </form>
            </section>

            <section class="card-simulados">
                <div class="simulados-texto">
                    <h2>Simulados grátis ENEM<br>para resolver</h2>
                    <a href="#areas" class="botao botao-verde">Clique aqui para fazer!</a>
                </div>

                <div class="simulados-imagem">
                    <img src="assets/ilustracao-simulados.png" alt="Ilustração de estudantes realizando simulados">
                </div>
            </section>

        </div>
    </section>

    <section class="vantagens">
        <div class="container">
            <h2 class="titulo-secao centralizado">Vantagens e Benefícios</h2>

            <div class="beneficios">
                <article class="beneficio">
                    <div class="check">✓</div>
                    <h3>Correção rápida</h3>
                    <p>Saiba onde você está mandando bem e o que precisa melhorar.</p>
                </article>

                <article class="beneficio">
                    <div class="check">✓</div>
                    <h3>Questões do ENEM</h3>
                    <p>Treine com questões organizadas de acordo com cada área.</p>
                </article>

                <article class="beneficio">
                    <div class="check">✓</div>
                    <h3>Fácil acesso</h3>
                    <p>Estude de forma prática e tenha acesso aos simulados quando precisar.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="questoes">
        <div class="container questoes-conteudo">

            <div class="questoes-texto">
                <h2 class="titulo-secao">Questões</h2>
                <p>
                    Treine suas habilidades, teste seus conhecimentos e aprenda de uma maneira
                    mais dinâmica e descomplicada.
                </p>
                <a href="#areas" class="botao botao-saiba">Saiba mais!</a>
            </div>

            <div class="questoes-imagem">
                <img src="assets/estudante-questoes.jpg" alt="Estudante realizando atividades">
            </div>

        </div>
    </section>

    <section class="areas" id="areas">
        <div class="container">
            <div class="linha-separadora"></div>
            <h2 class="titulo-secao">Simulados por área</h2>

            <div class="grade-areas">
                <?php foreach ($areas as $indice => $area): ?>
                    <article class="card-area <?= $area["tipo"] === "idiomas" ? "card-idiomas" : "" ?>">
                        <div class="icone"><?= htmlspecialchars($area["icone"]) ?></div>
                        <h3><?= htmlspecialchars($area["titulo"]) ?></h3>

                        <?php if ($area["tipo"] === "idiomas"): ?>
                            <p class="descricao-idiomas"><?= htmlspecialchars($area["descricao"]) ?></p>

                            <form class="selecao-idiomas" method="GET">
                                <label class="opcao-idioma">
                                    <input type="radio" name="idioma" value="ingles" checked>
                                    <span>EN</span>
                                    <small>Inglês</small>
                                </label>

                                <label class="opcao-idioma">
                                    <input type="radio" name="idioma" value="espanhol">
                                    <span>ES</span>
                                    <small>Espanhol</small>
                                </label>
                            </form>

                            <a href="#" class="botao botao-inicio">Início</a>
                        <?php else: ?>
                            <p><?= htmlspecialchars($area["descricao"]) ?></p>
                            <a href="#" class="botao botao-inicio">Início</a>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <div class="faixa-final"></div>

</main>

</body>
</html>
