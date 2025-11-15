<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receitas da vovó</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php
    $arquivo = 'data.json';
    $json_string = file_get_contents($arquivo); //Fiz uma pesquisa de como utilizar arquivos json no php porque sempre fiz dentro do proprio php como string;

    if($json_string === false){
        die("Erro: não foi possivel ler o arquivo JSON.");
    }

    $receitas = json_decode($json_string, true);

    $id = $_GET['id'] ?? null;

    if($id !== null){
        foreach($receitas as $receita){
            if($receita['id'] == $id){
                $receitaSelecionada = $receita;
                break;
            }
        }
    ?>
    <header class="banner">
        <a href="index.php" class="btnVoltar">Voltar</a>
        <img src="<?php echo $receitaSelecionada['thumbnail']; ?>">
        <h1><?php echo $receitaSelecionada['titulo'];?></h1>
    </header>

    <main>
        <div class="conteudo">
            <div class="ingredientes">
                <h4>ingredientes:</h4>
                <ul>
                    <?php
                    foreach($receitaSelecionada['ingredientes'] as $ingrediente){
                        echo "<li>" . $ingrediente . "</li>";
                    }
                    ?>
                </ul>
            </div>
            <div class="desc">
                <?php echo "<p>" . $receitaSelecionada['desc'] . "</p>"?>
            </div>
        </div>
        <hr>
        <div class="passo">
            <h4>Passo a passo</h4>
            <ul>
                <?php
                $i = 0; // <- Maaneira mais simples que eu encontrei para buscar as fotos sem criar um loop dentro de outro loop //
                foreach($receitaSelecionada['passo-a-passo'] as $passo ){
                    echo "<li>" . "<img src='" . $receitaSelecionada['imagens-url'][$i] . "'/>" . $passo . "</li>";
                    $i++;
                }
                ?>
            </ul>
        </div>
    </main>
    <?php
    }   
    else{
    ?>
    <header>
        <div class="titulo">
            <h1>Bem-vindo!</h1>
            <h4>Receitas da vovó</h4>
            <p>Comida simples, gostosa e feita com amor ❤️</p>
        </div>
        <div class="imagemtitulo">
            <img src="https://cdn.stocksnap.io/img-thumbs/960w/grandmother-child_ZK25PFAY2G.jpg">
        </div>
    </header>
    <hr>
    <main>
        <div class="busca">
            <a href="index.php" class="btn">Limpar pesquisa</a>
            <form action="index.php" method="get">
                <input type="text" name="busca" placeholder="Nome da receita ou ingrediente..." class="input" required>
                <button type="submit" class="btn">Buscar</button>
            </form>
        </div>
        <div class="cards">
            <?php
                $busca = $_GET['busca'] ?? null;

                if($busca){
                    $busca = strtolower($busca);
                    $receitas = array_filter($receitas, function($r) use ($busca) {
                        $titulo = strtolower($r['titulo']);
                        $tags = strtolower(implode(" ", $r['tags']));

                        return strpos($titulo, $busca) !== false || strpos($tags, $busca) !== false;
                    }); // Precisei do chatGPT pra acertar a sintaxe, mas usei a lógica igual a uma arrow function do JS //
                }

                foreach($receitas as $receita){
                    echo "
                    <div class='card'>
                        <img src='" . $receita['thumbnail'] . "'>
                        <div class='cardConteudo'>
                            <h4>" . $receita['titulo'] . "</h4>
                            <p>" . $receita['desc'] . "</p>
                            <a href='index.php?id=" . $receita['id'] . "' class='btnCard'>Ver Receita</a>
                        </div>
                    </div>";
                }
            ?>
        </div>
    </main>
    <?php
    }
    ?>

    <p id="copy">&copy; 2025 Receitas da Vovó — Desenvolvido por Diogo A. C. Leite.</p>
</body>
</html>