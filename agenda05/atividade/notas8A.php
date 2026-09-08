<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas 8A</title>
    <style>
        .nota-vermelha {
            background-color: red;
        }

        .nota-verde {
            background-color: green;
        }
    </style>
</head>

<body>
    <div>
        <h1>Notas 8A</h1>
        <?php
        $notas = array(
            array("aluno" => "Gustavo", "Primeiro Bimestre" => 8.5, "Segundo Bimestre" => 4.0, "Terceiro Bimestre" => 7.5, "Quarto Bimestre" => 8.0),
            array("aluno" => "Liz", "Primeiro Bimestre" => 4.0, "Segundo Bimestre" => 8.5, "Terceiro Bimestre" => 9.5, "Quarto Bimestre" => 8.0),
            array("aluno" => "Tayler", "Primeiro Bimestre" => 7.5, "Segundo Bimestre" => 4.0, "Terceiro Bimestre" => 3.0, "Quarto Bimestre" => 8.5),
            array("aluno" => "Lais", "Primeiro Bimestre" => 10.0, "Segundo Bimestre" => 9.5, "Terceiro Bimestre" => 10.0, "Quarto Bimestre" => 9.0),
            array("aluno" => "Rosemeire", "Primeiro Bimestre" => 6.5, "Segundo Bimestre" => 7.0, "Terceiro Bimestre" => 9.0, "Quarto Bimestre" => 7.5)
        );

        $mediaNotas = array();

        ?>
        <table border="1">
            <tr>
                <th>Aluno</th>
                <th>Primeiro Bimestre</th>
                <th>Segundo Bimestre</th>
                <th>Terceiro Bimestre</th>
                <th>Quarto Bimestre</th>
                <th>Média</th>
            </tr>

            <!-- Aqui começa o loop para exibir as notas dos alunos, aplicando a lógica de cores para notas abaixo de 6.0, colocando uma classe CSS diferente para cada célula de nota -->
            
            <?php foreach ($notas as $nota) { 
                $media = ($nota['Primeiro Bimestre'] + $nota['Segundo Bimestre'] + $nota['Terceiro Bimestre'] + $nota['Quarto Bimestre']) / 4;
                ?>
                <tr>
                    <td><?php echo $nota['aluno']; ?></td>

                    <!-- Se a nota for menor que 6.0, adiciona a classe 'nota-vermelha' -->
                    <td class="<?php echo ($nota['Primeiro Bimestre'] < 6.0) ? 'nota-vermelha' : 'nota-verde'; ?>">
                        <?php echo $nota['Primeiro Bimestre']; ?>
                    </td>

                    <td class="<?php echo ($nota['Segundo Bimestre'] < 6.0) ? 'nota-vermelha' : 'nota-verde'; ?>">
                        <?php echo $nota['Segundo Bimestre']; ?>
                    </td>

                    <td class="<?php echo ($nota['Terceiro Bimestre'] < 6.0) ? 'nota-vermelha' : 'nota-verde'; ?>">
                        <?php echo $nota['Terceiro Bimestre']; ?>
                    </td>

                    <td class="<?php echo ($nota['Quarto Bimestre'] < 6.0) ? 'nota-vermelha' : 'nota-verde'; ?>">
                        <?php echo $nota['Quarto Bimestre']; ?>
                    </td>
                    <td class="<?php echo ($media < 6.0) ? 'nota-vermelha' : 'nota-verde'; ?>">
                        <?php echo number_format($media, 1); ?>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>