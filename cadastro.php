<?php
// Obter os dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$idade = $_POST['idade'];
$profissao = $_POST['profissao'];
$salario = $_POST['salario'];
$experiencia = $_POST['experiencia'];

// Exibir os dados
echo "Nome: " . $nome . "<br>";
echo "E-mail: " . $email . "<br>";
echo "Idade: " . $idade . "<br>";
echo "Profissão: " . $profissao . "<br>";
echo "Salário Pretendido: " . $salario . "<br>";
echo "Experiência: " . $experiencia . "<br><br>";

echo "<a href='cadastro.html'>Voltar ao formulário</a>";
?>