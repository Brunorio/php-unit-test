# PHP Unit Tests

O objetivo deste projeto é mostrar como escrever testes unitários eficazes para garantir a qualidade do código em um contexto de leilão online, onde os usuários podem dar lances em itens.

## Descrição do Projeto

O projeto é uma aplicação PHP que simula um sistema de leilão. Ele inclui as seguintes funcionalidades:

- Possibilidade de dar lances em itens.
- Avaliação por leiloeiro.

O foco principal deste projeto está na implementação de testes unitários para garantir que todas as funcionalidades do sistema funcionem corretamente.

## Estrutura do Projeto

O projeto está organizado da seguinte forma:

- `src/`: Contém os arquivos PHP com as implementações das funcionalidades do sistema de leilão.
- `tests/`: Contém os testes unitários escritos usando a biblioteca de testes PHPUnit.
- `composer.json`: Arquivo de configuração do Composer para gerenciar as dependências.
- `composer.lock`: Arquivo gerado pelo Composer que lista as versões específicas das dependências.
- `phpunit.xml`: Arquivo de configuração do PHPUnit.

## Requisitos

Para executar este projeto em seu ambiente local, você precisará ter o PHP instalado em sua máquina. Além disso, você precisará do Composer para instalar as dependências e do PHPUnit para executar os testes.

## Configuração e Instalação

Siga estas etapas para configurar e executar o projeto:

1. Clone este repositório em seu computador:

   ```
   git clone https://github.com/Brunorio/php-unit-test.git
   ```

2. Acesse o diretório do projeto:

   ```
   cd php-unit-test
   ```

3. Instale as dependências usando o Composer:

   ```
   composer install
   ```

## Executando os Testes

Para executar os testes unitários, você pode usar o PHPUnit. Certifique-se de estar no diretório raiz do projeto e execute o seguinte comando:

```
composer test
```

Isso iniciará a execução dos testes e exibirá os resultados no terminal.