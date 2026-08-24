    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["txtNome"];
        $valorCompra = $_POST["txtValorCompra"];
        $formaPagamento = $_POST["txtcmbPag"];
        $desconto = 0;

        // ERRO: cálculo incorreto para boleto e depósito
        if ($formaPagamento == "cartao") {
            $desconto = 0;
            $valorFinal = $valorCompra;
            $mensagem = "Olá $nome, sua compra de R$ $valorCompra foi realizada com cartão de crédito. Não há desconto.";
        } elseif ($formaPagamento == "boleto") {
            $desconto = $valorCompra * 0.08; // ERRO: deveria ser 8% para boleto
            $valorFinal = $valorCompra - $desconto;
            $mensagem = "Olá $nome, sua compra de R$ $valorCompra foi realizada com boleto. Seu desconto é de R$ $desconto e o valor final é de R$ $valorFinal.";
        } elseif ($formaPagamento == "deposito") {
            $desconto = $valorCompra * 0.10;
            $valorFinal = $valorCompra - $desconto;
            $mensagem = "Olá $nome, sua compra de R$ $valorCompra foi realizada com depósito. Seu desconto é de R$ $desconto e o valor final é de R$ $valorFinal.";
        } else {
            $mensagem = "Forma de pagamento inválida.";
        }

        // ERRO: mensagem final não mostra valor com desconto
        echo "<div class='w3-panel w3-green'>$mensagem</div>";
    }
    ?>
    <br><br>
    <p>Primeiro fiz a implementação do formulário e do processamento das informações, depois corrigi o erro de calculo nas duas formas de pagamento e criei uma variavel que faz o calculo do desconto.</p>


    <a href='index.php' class='w3-button w3-blue'>Voltar</a>
