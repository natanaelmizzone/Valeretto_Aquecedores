## VALERETTO

# Sistema WEB de Gestão de Produtos
Este é um sistema web no formato ecommercer de **```GESTÃO DE PRODUTOS```**, está sendo desenvolvido em **``HTML``**, **``CSS``**, **``PHP``**, **``JAVASCRIPT``** e **``MySQLi``**, estilizado com **``Bootstrap``**, para documentação em **``MARKDOWN``** e estruturação **``FIGMA``**. O projeto conta com um painel administrativo protegido por sessões de login, definido para o gerenciamento o controle total de produtos ``**(CRUD)**``, também realizamos o software na ***IE*** ``Visual Studio - C# (CSharp)`` para cadastro e saida de produto diretamente com o administrador/vendedor.

## Funcionalidades Principais
 Área Administrativa (Painel Administrativo):

- Autenticação independente para o Administrador.-

- Bloqueio e trava de segurança por sessões **(session_start)** contra acessos diretos via URL.

- Listagem e cadastros em tempo real de todos os produtos.

- **CRUD** de Produtos: **Cadastrar**, **Visualizar**, **Editar** e **Excluir**, protegido contra usuários não autorizados.

# Estrutura do Banco de Dados (MySQL)

O sistema utiliza uma tabela, estruturada da seguinte forma:

---

```sql
Tabela de Produtos (tb_produto)
CREATE TABLE tb_produto (
    id_produto INT AUTO_INCREMENT PRIMARY KEY,
    nome_produto VARCHAR(100) NOT NULL,
    descricao_produto VARCHAR(1000),
    preco_produto DECIMAL(10,2) NOT NULL,
    estoque_produto INT(5) NOT NULL,
    imagem_produto VARCHAR(255)
);
```

---


# Projeto

Abaixo está a organização de cada arquivo no repositório:

```
Inicio

index.php>

# Conteúdo de inclusão nas paginas

inc-conexao.php> Conexão com o Banco de Dados (MySQLi)
inc-cabecalho.php> Inicio do site e links do Bootstrap
inc-rodape.php> Rodapé do site
inc-banner.php> banner principal do site
inc-categoria-inicio.php> Categoria de produtos no inicio da pagina
inc-categoria-rodape.php> Carrousel de parceiros.
inc-depoimento.php> Depoimentos de Clientes
inc-main.php> Conteudo de visualização dos Produtos cadastrados.
inc-menu.php> Menu de acesso a outros links do site.

# Páginas interativas

pag-blog.php> Página informativo.
pag-historia.php> Hsitoria da empresa.
pag-contato.php> Informativo de como entrar em contato com a empresa.


* **Administrador / Produtos**

admin-login.php> Acesso do Administrador
admin-validar.php> Valida email e senha do administrador
admin-trava.php> Trava de segurança para quem não for Admin
pag-admin.php> Painel Administrativo listando os produtos
admin-sair.php> Faz o logout do administrador
produto-formulario.php> Tela de cadastro de novos produtos
produto-visualizar.php> Tela de detalhes de um produto específico
produto-editar.php> Tela de alteração de dados do produto
produto-excluir.php> Script do banco que deleta o produto no banco
produto-atualizar.php> Salva os produtos cadastrados em cards na tela inicial.

```


* **FIGMA: Caso de Uso - Fluxograma - DER (Diagrama)**


```
https://www.figma.com/board/RgMUPqTYb7iAYrL9TCX8i7/CASO-DE-USO-E-FLUXOGRAMA?node-id=0-1&p=f&t=QxOB3TBdOoiQ9E9t-0
```

* **FIGMA: MoodBoard - SiteMap - WireFrame/Prótotipo**


```
https://www.figma.com/design/3wvLkSiIYYMDsv2H6IPb6L/PROJETO-INTEGRADOR--c%C3%B3pia-?t=QxOB3TBdOoiQ9E9t-0
```


# Como Executar o Projeto Localmente
  
1.	Clone este repositório para a pasta pública do seu servidor local atráves do ``XAMPP``: clique em start no ``Apache`` e no ``MySQL``, aguarde conectar.
2.	Importe o banco de dados utilizando o ``DBeaver``, selecionando também o ``MySQL``.
3.	Acesse o projeto no ``VScode``, abra o terminal na aba acima.
4.	Escreva o local do seu computador ``"php -S localhost:"``
5.	Abra o navegador e acesse:
o	Index: ```http://localhost/"numero que vai gerar"/index.php```
o	Área do Admin: ```http://localhost/"numero que vai gerar"/admin-login.php 
o Ou apenas ```http://localhost/```
7.	Irá reproduzir o conteúdo em conformidade no navegador.
   
# Validação de segurança

Para criação de um ecommercer deve-se utilizar todos os metodos mais seguros contra vazamento de informações.

ARealizamos algumas aplicações no Projeto fora do escopo atrvés de algumas pesquisas e estudos:

* **Prepared Statements (Consultas Preparadas):** Todos os comandos de inserção e busca utilizam mysqli_prepare. Isso neutraliza completamente ataques de ``SQL Injection``, juntamente com ``JavaScript`` validando a segunrança do formulário contra inserção de ``<script>``.
  
* **Proteção de Páginas via Sessão:** Arquivos cruciais como ``pag-admin.php``, ``produto-excluir.php``, ``produto-editar.php`` e ``produto-formulario.php``, ``produto-visualizar.php`` incluem o script ``admin-trava.php`` na primeira linha. Se um usuário não autenticado tentar acessar o link diretamente, a execução é abortada ``(exit())`` e ele é redirecionado ao login.

* **Proteção Cross-Site Scripting (XSS):** Todas as saídas de dados vindas de requisições ``URL ($_GET)`` ou banco de dados utilizam a função ``htmlspecialchars()`` antes de serem exibidas na tela ao invés de utilizar apenas o ``if e else``.

## Bibliografia/Referência:
### Sites para estudo e aperfeiçoamento do código;

* **HTML**
  
```
https://developer.mozilla.org/pt-BR/docs/Web/HTML/Reference/Elements
````

* **PHP**
```
https://www.php.net/manual/pt_BR/index.php
```

* **PHP MySQLi**
```
https://www.php.net/manual/pt_BR/book.mysqli.php
```

* **JavaScript**
```
https://developer.mozilla.org/pt-BR/docs/Web/JavaScript/Guide
```

* **Bootstrap**
```
https://getbootstrap.com/
```

* **W3 SCHOOLS**
```
https://www.w3schools.com/
```

* **FREE FRONTEND**
```
https://freefrontend.com/bootstrap-cards/
```

* **ADOBE COLOR**
```
https://color.adobe.com/
```

* **C#(CSHARP)**
```
https://learn.microsoft.com/pt-br/dotnet/csharp/
```

* **DBDESIGN**
  
```
https://dbdesign.io/pt-BR/
```

