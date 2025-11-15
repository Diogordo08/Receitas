# Receitas da Vovó 👵 :
Um site simples e acolhedor para exibir receitas caseiras, feito com HTML, CSS e PHP.

## Funcionalidades:
Página de receita com ingredientes e passo a passo <br>
Site totalmente responsivo adaptado para telas menores e celulares <br>
Pesquisar receitas por titulo ou ingredientes (tags) <br>
Dados carregados via JSON: <br>
- O PHP lê o arquivo JSON.  
- Converte o conteúdo em um array associativo.  
- Utiliza foreach para renderizar automaticamente cada parte da receita. 

##  Como instalar e rodar
1. Baixe ou clone o repositório (https://github.com/Diogordo08/Receitas)
2. Abra o projeto no seu servidor local (XAMPP, WAMP etc...)
3. Acesse no navegador: http://localhost/pasta-do-projeto (Pasta padrão: Receitas)

## Tecnologias:
- HTML
- CSS
- PHP
- JSON

## Estrutura JSON:
{<br>
"id": 0, <br>
"titulo": "Exemplo", <br>
"desc": "...", <br><!-- A maioria das descrições das receitas foram feitas utilizando chatGPT -->
"ingredientes": ["...", "..."], <br>
"passo-a-passo": ["...", "..."], <br>
"banner": "caminho/da/imagem", <br>
"imagens-url": ["passo01.jpeg", "passo02.jpeg"] <br>
} <br>

## Desenvolvido por:
Diogo A. C. Leite - Tempo de desenvolvimento aprox: 05:50h
