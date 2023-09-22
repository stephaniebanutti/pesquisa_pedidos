# Sistema de Gerenciamento de Pedidos

Este é um sistema simples de gerenciamento de pedidos desenvolvido em HTML, JavaScript e PHP. O sistema permite que os usuários pesquisem pedidos por CPF do cliente, visualizem os detalhes dos pedidos e atualizem ou excluam pedidos existentes.

## Recursos Principais

- Pesquisa de pedidos por CPF do cliente.
- Adição de novos pedidos.
- Visualização de detalhes dos pedidos.
- Atualização de informações de pedidos.
- Exclusão de pedidos.

## Como Usar

1. Clone ou baixe este repositório para o seu ambiente local.
2. Configure um servidor web (por exemplo, Apache) para servir os arquivos PHP.
3. Abra o arquivo `pesquisar_cliente.html` em um navegador web.

### Pesquisar Cliente

- Insira o CPF do cliente no campo de pesquisa e clique em "Pesquisar".
- Os resultados dos pedidos relacionados ao cliente serão exibidos na tabela.

### Adicionar Pedido

- Clique no botão "Adicionar Pedido" para abrir o modal de adição de pedido.
- Preencha os campos necessários, como descrição e quantidade.
- Clique em "Salvar" para adicionar o pedido.

### Atualizar Pedido

- Na tabela de resultados, clique no botão "Atualizar Pedido" correspondente ao pedido que você deseja atualizar.
- Isso abrirá um modal com os campos de atualização preenchidos com os dados existentes.
- Faça as alterações desejadas e clique em "Salvar" para atualizar o pedido.

### Excluir Pedido

- Na tabela de resultados, clique no botão "Excluir Pedido" correspondente ao pedido que você deseja excluir.
- Uma confirmação será exibida antes da exclusão.

## Requisitos

- Um servidor web local (por exemplo, Apache).
- PHP instalado no servidor para processar as solicitações do servidor.
- Navegador da web para acessar a interface do usuário.

## Notas

- Este é um projeto de exemplo simples e pode ser expandido com recursos adicionais, autenticação de usuário, validação mais rigorosa e melhorias de interface do usuário.
- O sistema utiliza Bootstrap para o design da interface do usuário e jQuery para interações dinâmicas.

Sinta-se à vontade para personalizar este README de acordo com as necessidades do seu projeto e adicionar informações adicionais, como instalação e configuração específicas.


## Importando Tabelas e Dados do Banco de Dados

Se você deseja configurar o banco de dados para este projeto e importar as tabelas juntamente com dados de exemplo, siga estas etapas:

1. **Configurar o Banco de Dados:** Certifique-se de que você tenha um sistema de gerenciamento de banco de dados (por exemplo, MySQL ou PostgreSQL) instalado e configurado em seu ambiente.

2. **Crie o Banco de Dados:** Crie um banco de dados vazio para o projeto. Você pode fazer isso usando a linha de comando ou uma interface gráfica.

3. **Importe o Esquema do Banco de Dados:** Use o arquivo SQL fornecido para importar a estrutura do banco de dados. Você pode fazer isso executando o seguinte comando em seu terminal (substitua `<seu_banco_de_dados>` pelo nome do seu banco de dados):

   ```shell
   mysql -u seu_usuario -p seu_banco_de_dados < esquema.sql



mysql -u seu_usuario -p seu_banco_de_dados < dados_exemplo.sql
