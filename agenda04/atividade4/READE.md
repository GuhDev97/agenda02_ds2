# 🧮 Aplicação Tabuada em PHP

> Projeto acadêmico desenvolvido para exemplificar o uso prático de **estruturas de repetição** e **funções personalizadas** em PHP, integrados a um formulário HTML5.

---

## 📌 Sobre o Projeto

A aplicação consiste em uma interface web interativa onde o usuário pode calcular tabuadas de multiplicação de diferentes formas:
1. Digitando um valor customizado no campo de texto.
2. Gerando todas as tabuadas (do 0 ao 10) de forma sequencial com um único clique.
3. Utilizando botões de atalho rápido (0 a 9) para exibição direta.

---

## 🛠️ Tecnologias Utilizadas

* **HTML5:** Estrutura do formulário e elementos de entrada (`index.html`).
* **PHP:** Processamento dos dados, lógica condicional e geração dinâmica das tabelas HTML (`tabuadaAction.php`).
* **W3.CSS / CSS3:** Estilização e organização visual das tabelas e containers.

---

## 🚀 Conceitos de PHP Aplicados

### 1. Funções Personalizadas (`function`)
Para evitar a duplicação de código ao desenhar as tabelas HTML, foi criada a função `desenharTabuada($numero)`. Ela recebe o número desejado por parâmetro, monta o cabeçalho da tabela e executa o laço de repetição.

### 2. Estruturas de Repetição (`for`)
* **Laço Simples:** Utilizado internamente na função `desenharTabuada` para iterar os multiplicadores de 0 a 10.
* **Laço Aninhado:** Utilizado no botão *"Gerar Todas"*, onde um laço `for` principal (de 0 a 10) executa a chamada da função 11 vezes seguidas.

### 3. Controle de Fluxo e Requisições (`$_POST` e `isset`)
Uso do vetor superglobal `$_POST` combinado com verificações de `isset()` e condicionais `if/elseif` para capturar a ação exata disparada pelo usuário no formulário.

---

## 📁 Estrutura do Repositório

```text
├── index.html           # Interface do formulário e botões de atalho
├── tabuadaAction.php    # Processamento lógico, funções e laços de repetição
└── README.md            # Documentação do projeto