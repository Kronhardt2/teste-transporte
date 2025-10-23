<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title> Consulta CEP </title>

    <style>

        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        input[type="text"] {
            padding: 5px;
            width: 150px;
        }

        input[type="submit"] {
            padding: 5px 10px;
        }

        .resultado {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            width: 300px;
            border-radius: 5px;
        }

    </style>
</head>

<body>
    <h1> Consulta CEP </h1>

    <!-- Formulário para o usuário digitar o CEP -->
    <form method="post" action="">
        <label for="cep"> Digite o CEP: </label>
        <input type="text" name="cep" id="cep" required maxlength="8" pattern="\d{8}" placeholder="Ex: 01001000">
        <input type="submit" value="Consultar">
    </form>

    <?php

    //Verifica se o formulário foi enviado (método POST)
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['cep'])) {

        //Pega o CEP informado e remove qualquer caractere que não seja número
        $cep = preg_replace('/\D/', '', $_POST['cep']);

        //Verifica se o CEP tem exatamente 8 números
        if (strlen($cep) !== 8) {
            echo "<p style='color:red;'> CEP inválido! Deve ter 8 números. </p>";
        } else {

            //Monta a URL da API ViaCEP
            $url = "https://viacep.com.br/ws/$cep/json/";

            //Faz a requisição e obtém o conteúdo JSON
            $response = file_get_contents($url);

            //Converte o JSON para um array associativo PHP
            $data = json_decode($response, true);

            //Se a API retornar "erro": true, significa que o CEP não foi encontrado
            if (isset($data['erro'])) {
                echo "<p style='color:red;'> CEP não encontrado! </p>";
            } else {

                //Exibe o resultado formatado em HTML
                echo "<div class='resultado'>";
                echo "<h2> Resultado para CEP: $cep </h2>";
                echo "<p><strong> Rua: </strong> {$data['logradouro']} </p>";
                echo "<p><strong> Bairro: </strong> {$data['bairro']} </p>";
                echo "<p><strong> Cidade: </strong> {$data['localidade']} </p>";
                echo "<p><strong> UF: </strong> {$data['uf']} </p>";
                echo "</div>";
            }
        }
    }
    ?>
</body>

</html>