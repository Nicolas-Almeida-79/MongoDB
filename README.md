# Sistema de Cadastro de Clientes e Cursos

Este projeto tem como objetivo criar um sistema simples para o cadastro, gerenciamento de clientes e seus cursos associados. O sistema utiliza o MongoDB como banco de dados não relacional e PHP como linguagem de back-end.

## Justificativa
A escolha do MongoDB como banco de dados foi devido ao conhecimento um pouco mais amplo neste banco, além de ser uma opção eficiente para armazenar dados não estruturados. Como o projeto lida com informações variadas e pode se beneficiar da flexibilidade que o MongoDB oferece, ele se mostrou ideal para as necessidades desse sistema.

O PHP foi escolhido como linguagem de back-end, pois é a linguagem com a qual tenho mais experiência, o que facilitou o desenvolvimento, considerando que conheço suas limitações e como trabalhar de forma eficiente com ela.

## Estrutura do Projeto
- `index.php`: Página principal do sistema, onde os clientes são cadastrados e listados.
- `update.php`: Página responsável por editar as informações de um cliente existente.
- `delete.php`: Página que realiza a exclusão de um cliente.
- `style.css`: Arquivo de estilo para formatação e layout do sistema.
- `db_connection.php`: Arquivo responsável pela conexão com o banco de dados MongoDB.
- `cursos.php`: Arquivo contendo a lógica para a criação e listagem de clientes.

## Tecnologias Utilizadas
- MongoDB: Banco de dados não relacional utilizado para armazenar os dados dos clientes.
- PHP: Linguagem de programação usada para desenvolver a parte do back-end.
- HTML/CSS: Tecnologias para a criação da interface do usuário e o layout do sistema.

## Instruções de Execução
### Requisitos:

- PHP instalado no ambiente de desenvolvimento.

- MongoDB instalado e configurado.

- Servidor web como Apache ou Nginx configurado para rodar arquivos PHP.

### Passo a Passo para Execução:

- Clone o repositório:

```git clone https://github.com/seu-usuario/seu-repositorio.git```

- Acesse a pasta do projeto:

```cd seu-repositorio```

- Abra o arquivo `db_connection.php` e configure a conexão com o MongoDB, alterando as credenciais de acesso, se necessário.

- Inicie o servidor PHP:

```php -S localhost:8000```

- Acesse o sistema no seu navegador, indo até:

```http://localhost:8000/index.php```
