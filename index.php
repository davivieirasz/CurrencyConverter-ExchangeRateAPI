<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <title>Conversor de Moeda</title>
</head>

<body>
    <img src="assets/img/wallpaper.jpg" class="wallpaper">
    <div class="container">
        <h1>Conversor de Moeda</h1>
        <form action="./index.php" method="GET">
            <input type="number" name="valor" placeholder="INFORME O VALOR USD">
            <button type="submit">Converter</button>
            <button onclick="limparTela()">Limpar Dados</button>
        </form>
        <br>
        <h2>RESULTADO:</h2>
        <br>
        <div class="containerPHP">
            <?php
            // Conversor de moeda usando ExchangeRate-API

            //Variáveis
            $moedaBase = $_GET['valor'];
            $moedaDestino = "BRL";

            //Chave API
            require_once 'apiKey.php';

            //Verifica se os dados foram enviados via GET
            if (isset($_GET['valor']) && !empty($_GET['valor'])) {
                $dados = file_get_contents("https://v6.exchangerate-api.com/v6/$apiKey/latest/USD");
                $dados = json_decode($dados, true);
                $taxa = number_format($moedaBase * $dados['conversion_rates']['BRL'], 2);

                echo "<h3>O valor de " .$moedaBase. " USD equivale a " .$taxa. " BRL </h3>";
            }
            if ($moedaBase == 0) {
                echo "<h2>Informe um número válido.</h2>";
            }
            ?>
        </div>
    </div>
    <footer>
        <p>&copy; 2025 Todos os direitos reservados | Desenvolvido por Davi Vieira de Souza</p>
    </footer>
</body>

</html>