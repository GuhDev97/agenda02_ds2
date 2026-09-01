<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabuada</title>
</head>
<body>
    <?php
   function desenharTabuada($numero) {
        echo '<h1>Tabuada do ' . $numero . '</h1>';
        echo '<table border="1">';
        echo '<tr><th>Operação</th><th>Resultado</th></tr>';
        for ($i = 0; $i <= 10; $i++) {
            echo '<tr>';
            echo '<td>' . $numero . ' x ' . $i . '</td>';
            echo '<td>' . ($numero * $i) . '</td>';
            echo '</tr>';
        }
        echo '</table><br>';
    } 
    if (isset($_POST["btnCalcular"])) {
        $v = $_POST["txtValor"];
        desenharTabuada($v);
    } else {
        if (isset($_POST["btnGerar"])) {
            for ($j = 0; $j <= 15; $j++) {
                desenharTabuada($j);
            }
        } else {
            $t = -1;
            if (isset($_POST["btn0"]))
                $t = 0;
            elseif (isset($_POST["btn1"]))
                $t = 1;
            elseif (isset($_POST["btn2"]))
                $t = 2;
            elseif (isset($_POST["btn3"]))
                $t = 3;
            elseif (isset($_POST["btn4"]))
                $t = 4;
            elseif (isset($_POST["btn5"]))
                $t = 5;
            elseif (isset($_POST["btn6"]))
                $t = 6;
            elseif (isset($_POST["btn7"]))
                $t = 7;
            elseif (isset($_POST["btn8"]))
                $t = 8;
            elseif (isset($_POST["btn9"]))
                $t = 9;
            elseif (isset($_POST["btn10"]))
                $t = 10;

            if ($t != -1) {
                desenharTabuada($t);
            } else {
                echo '<p>Nenhum botão foi pressionado.</p>';
            }
        }
    }
    ?>


</body>
</html>