A aplicação funciona como o tradicional jogo de forca, onde o objetivo é adivinhar uma palavra secreta sorteada pelo sistema.
1.CADASTRO
A página de cadastro solicita:

Nome de usuário
E-mail válido
Senha contendo de 8 a 16 caracteres e sua confirmação

MENU
Voce foi condenado a cruel morte pela forca, mas recebe a chance de se salvar, se conseguir adivinhar corretamente uma palavra misteriosa!
Na pagina do menu, o usuario pode escolher entre 5 temas de palavras:
-frutas
-paises
-filmes
-cores
-animais
cada tema possui sua propria pontuação. No menu é possivel ver o leaderboard(ranking) dos jogadores, onde é possivel ordenar por ordem alfabética, pontuação geral ou pontuação de cada tema. Tambem é mostrado no leaderboard a colocação do usuário.
JOGO
O funcionamento do jogo é feito em javascript. Ao apertar uma tecla (obrigatoriamente uma letra) a letra é analisada e mostrada na tela completando espaços da palavra secreta caso correta, ou no espaço destinado a letras erradas com um erro adicionado. A funcao "checar" verifica se o jogo acabou, isso ocorre quando a palavra no espaco de letras corretas é igual a palavra sorteada significando que o jogador ganhou, ou quando a quantidade de letras erradas e consequentemente erros for igual a 10, se o jogo acabou os pontos sao calculados e a mensagem de fim de jogo é exibida redirecionando o usuário ao menu.

BANCO DE DADOS:

CREATE TABLE trabalhoweb (
    id int AUTO_INCREMENT PRIMARY KEY,
    nome varchar (140),
    email varchar (100),
    senha varchar (16),
    pontos int NOT NULL,
    apontos int NOT NULL,
    cpontos int NOT NULL,
    frpontos int NOT NULL,
    fipontos int NOT NULL,
    ppontos int NOT NULL
);
