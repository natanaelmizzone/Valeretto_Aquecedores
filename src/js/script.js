// Busca o elemento do formulário de produto pelo ID 'formProduto'
const form = document.getElementById('formProduto');

// Se o formProduto existir ele executa o formulario
if (form) {
    // Escuta o evento de envio (submit) do formulário de produto
    form.addEventListener('submit', function(event) {
        
        // Inicializa uma variável de controle para definir se o formulário está correto
        let formularioValido = true;

        // Captura os valores digitados em cada um dos campos do formulário
        const campoNome = document.getElementById('nome').value;
        const campoDescricao = document.getElementById('descricao').value;
        const campoPreco = document.getElementById('preco').value;
        const campoEstoque = document.getElementById('estoque').value;
        const campoImagem = document.getElementById('imagem').value;


        // VALIDAÇÃO DO NOME DO PRODUTO (SELECIONAR)

        // Verifica se o campo de seleção do nome está vazio
        if (campoNome === "") {
        console.log("Erro: Nenhum produto foi selecionado na lista.");
        formularioValido = false; // Define que o formulário possui erro
        } else {
        console.log(`Ok: Produto válido selecionado (${campoNome}).`);
        }

        // VALIDAÇÃO DA DESCRIÇÃO (MÍNIMO ACIMA DE 10, MÁXIMO 1000 + ESPAÇO)

        // Calcula o total de caracteres removendo espaços vazios do início e fim
        const totalCaracteresDescricao = campoDescricao.trim().length;

        // Valida se o campo descrição está vazio
        if (campoDescricao.trim() === "") {
            console.log("Erro: Descrição está vazia.");
            formularioValido = false;
        // Valida se possui 10 caracteres ou menos
        } else if (totalCaracteresDescricao <= 10) {
            // REGRA COMPLEMENTAR: Recusa se o usuário digitar exatamente 10 letras ou menos
            console.log(`Erro: Descrição possui apenas ${totalCaracteresDescricao} caracteres. Digitar apenas 10 letras ou menos não é permitido. O mínimo aceito é 11.`);
            formularioValido = false;
        // Valida se ultrapassou o limite máximo de 1000 caracteres
        } else if (totalCaracteresDescricao > 1000) {
            console.log(`Erro: Descrição muito longa! Possui ${totalCaracteresDescricao} caracteres. O limite máximo é 1000.`);
            formularioValido = false;
        } else {
            // Mantém a regra anterior de exigir espaço após uma palavra (expressão regular)
            const regexEspacoAposPalavra = /[a-zA-Z0-9À-ÿ]+\s+[a-zA-Z0-9À-ÿ]/;

            // Testa se a descrição cumpre o padrão de espaçamento entre palavras
            if (!regexEspacoAposPalavra.test(campoDescricao.trim())) {
                console.log("Erro: Descrição inválida! Você precisa digitar pelo menos duas palavras separadas por espaço.");
                formularioValido = false;
            } else {
                // Expressão regular para garantir que existem letras ou números úteis
                const regexTemTextoUtil = /^(?=.*[a-zA-Z0-9])/;
                // Impede que o usuário envie apenas símbolos especiais na descrição
                if (!regexTemTextoUtil.test(campoDescricao.trim())) {
                    console.log("Erro: Descrição inválida! Não use apenas símbolos.");
                    formularioValido = false;
                } else {
                    console.log("OK: Descrição válida.");
                }
            }
        }


        //VALIDAÇÃO DO PREÇO (ATÉ 5 NÚMEROS ANTES DA VÍRGULA E 2 DEPOIS)

        // Verifica se o campo do preço está totalmente em branco
        if (campoPreco.trim() === "") {
            console.log("Erro: Preço está vazio.");
            formularioValido = false;
        } else {
            // Expressão regular para aceitar formato estruturado como 12345,67
            const regexPrecoRestrito = /^\d{1,5},\d{2}$/;

            // Compara o valor digitado com a regra de formato de preço
            if (!regexPrecoRestrito.test(campoPreco.trim())) {
                console.log("Erro: Preço inválido! Deve ter até 5 números antes da vírgula e exatamente 2 números depois (Exemplo: 12345,67).");
                formularioValido = false;
            } else {
                // Substitui a vírgula por ponto para fazer a conversão numérica no JavaScript
                const precoNumerico = parseFloat(campoPreco.trim().replace(',', '.'));
                
                // Valida se o número é menor/igual a zero ou se a conversão falhou
                if (precoNumerico <= 0 || isNaN(precoNumerico)) {
                    console.log("Erro: Preço inválido! O valor deve ser maior que R$ 0,00.");
                    formularioValido = false;
                } else {
                    console.log("Ok: Preço válido.");
                }
            }
        }


        // VALIDAÇÃO DO ESTOQUE (ACIMA DE 1, MÁXIMO 5 DÍGITOS, APENAS NÚMEROS)

        // Remove os espaços do início e do fim do texto do estoque
        const estoqueLimpo = campoEstoque.trim();
        // Obtém o número total de dígitos digitados para o estoque
        const totalDigitosEstoque = estoqueLimpo.length;

        // Verifica se o campo de estoque foi deixado em branco
        if (estoqueLimpo === "") {
            console.log("Erro: Estoque está vazio.");
            formularioValido = false;
        } else {
            // Expressão regular que aceita apenas dígitos numéricos puros (0-9)
            const regexApenasNumerosPuros = /^\d+$/;

            // Bloqueia caso contenha letras, pontos, espaços ou símbolos de sinal
            if (!regexApenasNumerosPuros.test(estoqueLimpo)) {
                console.log("Erro: Estoque inválido! Digite apenas números inteiros. Letras, pontos, vírgulas ou sinais não são permitidos.");
                formularioValido = false;
            // Bloqueia caso o número de dígitos seja maior que 4
            } else if (totalDigitosEstoque > 4) {
                console.log(`Erro: Estoque inválido! Possui ${totalDigitosEstoque} dígitos. O limite máximo permitido é de 4 dígitos.`);
                formularioValido = false;
            } else {
                // Converte o texto limpo em um número inteiro na base decimal
                const quantidadeEstoque = parseInt(estoqueLimpo, 10);

                // Garante que a quantidade informada seja maior que zero (mínimo 2 unidades)
                if (quantidadeEstoque < 1) {
                    console.log(`Erro: Estoque inválido! O valor digitado foi ${quantidadeEstoque}. Deve ser estritamente acima de 1 (mínimo 2).`);
                    formularioValido = false;
                } else {
                    console.log("Ok: Estoque válido.");
                }
            }
        }


        // VALIDAÇÃO DA URL DA IMAGEM (10 A 100 CARACTERES)

        // Obtém o comprimento total da string do link da imagem
        const totalCaracteresImagem = campoImagem.trim().length;
        // Expressão regular para procurar qualquer espaço em branco na URL
        const regexContemEspacos = /\s/;
        // Expressão regular case-insensitive para validar o formato final do arquivo
        const regexExtensaoImagem = /\.(jpg|jpeg|png|webp)$/i;

        // Verifica se o link da imagem está vazio
        if (campoImagem.trim() === "") {
            console.log("Erro: Link da Imagem está vazio.");
            formularioValido = false;
        // Bloqueia o envio se forem encontrados espaços internos na URL
        } else if (regexContemEspacos.test(campoImagem)) {
            console.log("Erro: Imagem inválida! Não pode conter espaços.");
            formularioValido = false;
        // Limita o tamanho do link entre o intervalo de 10 e 100 caracteres
        } else if (totalCaracteresImagem < 10 || totalCaracteresImagem > 100) {
            console.log(`Erro: O link da imagem tem ${totalCaracteresImagem} letras. Deve ter entre 10 e 100 caracteres.`);
            formularioValido = false;
        // Valida se o link termina com uma das extensões de imagens permitidas
        } else if (!regexExtensaoImagem.test(campoImagem.trim())) {
            console.log("Erro: Imagem inválida! Extensão incorreta.");
            formularioValido = false;
        } else {
            console.log("Ok: Link da Imagem válido.");
        }

        // EM CASO DE ERRO APRESENTA AQUI NO ENVIO

        // Imprime uma mensagem indicando o início do processamento de envio
        console.log("Testando o formulario");

        // Avalia o estado final da validação do formulário de produtos
        if (formularioValido === false) {
            console.log("ALGO DEU ERRADO!");
            event.preventDefault(); // Cancela o envio do formulário e impede o recarregamento
        } else {
            console.log(" Ok, enviado com sucesso!");
        }
    });
}
// Busca o formulário de contato pelo respectivo ID 'formContato'
const formulario = document.getElementById('formContato');

// Só adiciona o evento se o formContato realmente existir na página
if (formulario) {
    // Escuta o evento de envio (submit) do formulário de contato
    formulario.addEventListener('submit', function(event) {
        
        // Seleciona os elementos de entrada de dados (inputs/textarea) da página
        const campoNome = document.getElementById('contact-name');
        const campoEmail = document.getElementById('contact-email');
        const campoMensagem = document.getElementById('contact-message');

        // Captura e limpa os valores removendo os espaços em branco extras do início e fim
        const nomeValue = campoNome.value.trim();
        const emailValue = campoEmail.value.trim();
        const mensagemValue = campoMensagem.value.trim();

        // Permite apenas letras (incluindo acentos) e espaços
        const apenasLetras = /^[A-Za-zÀ-ÿ ]+$/;
        // Impede tags de script <script> para evitar invasões
        const temScript = /<script\b[^>]*>([\s\S]*?)<\/script>/gi;

        // Campos vazios ou apenas com espaços
        if (nomeValue === "" || emailValue === "" || mensagemValue === "") {
            console.log("Erro: Todos os campos são obrigatórios e não podem conter apenas espaços!");
            event.preventDefault(); // Impede o envio do formulário
            return; // Interrompe a execução da função imediatamente
        }

        // Apenas letras no nome
        if (!apenasLetras.test(nomeValue)) {
            console.log("Erro: O nome deve conter apenas letras!");
            event.preventDefault(); // Impede o envio do formulário
            return; // Interrompe a execução da função imediatamente
        }

        // Conta quantos espaços existem no nome fatiando a string por espaços vazios
        const quantidadeEspacos = nomeValue.split(' ').length - 1;
        // Valida se o usuário informou o sobrenome checando se há pelo menos um espaço
        if (quantidadeEspacos < 1) {
            console.log("Erro: O nome deve conter pelo menos um espaço (digite seu nome completo)!");
            event.preventDefault(); // Impede o envio do formulário
            return; // Interrompe a execução da função imediatamente
        }

        // Verificar se o email tem @
        if (!emailValue.includes('@')) {
            console.log("Erro: O email digitado é inválido (falta o @)!");
            event.preventDefault(); // Impede o envio do formulário
            return; // Interrompe a execução da função imediatamente
        }

        // Proteção contra scripts nocivos (XSS)
        // Testa se a expressão regular de script encontra alguma tag maliciosa em qualquer um dos três campos
        if (temScript.test(mensagemValue) || temScript.test(nomeValue) || temScript.test(emailValue)) {
            console.log("Erro: Tentativa de inserção de script malicioso detectada!");
            event.preventDefault(); // Impede o envio do formulário
            return; // Interrompe a execução da função imediatamente
        }

        // Exibe uma mensagem de sucesso no console caso o fluxo passe por todas as barreiras de validação
        console.log("Formulário de contato válido e enviado com sucesso!");
    });
}
