//palvras
const paises = [
    "brasil", "canada", "china", "india", "russia", "alemanha", "franca", "italia", "japao",
    "australia", "argentina", "egito", "mexico", "inglaterra", "espanha", "portugal", "holanda", "turquia", "coreia",
    "grecia", "suica", "belgica", "noruega", "dinamarca", "finlandia", "polonia", "suecia", "austria", "hungria",
    "romenia", "chile", "colombia", "peru", "venezuela", "costa-rica", "cuba", "israel", "libano",
    "emiradosarabes", "qatar", "australia", "novazelandia", "filipinas", "singapura", "malasia", "tailandia", "vietna",
    "indonesia", "mongolia"
];


//variaveis
let palavraSecreta = paises[Math.floor(Math.random() * paises.length)];
const letrasErradas = [];
const letrasCorretas = [];
let letra = "";
let erros = 0;
let acabou = false;
let pontos = 0;


console.log(palavraSecreta);

//funcionamento principal do jogo
document.addEventListener("keydown", (evento) => {
    if (acabou) {
        return;
    }
    const keyCode = evento.keyCode;
    
    if (keyCode >= 65 && keyCode <= 90) {
        letra = String.fromCharCode(keyCode).toLowerCase();

        // Analisar letra
        if(letrasCorretas.includes(letra) || letrasErradas.includes(letra)){
            aviso_repeticao();
        }
        else{
            if (palavraSecreta.includes(letra)) {
                letrasCorretas.push(letra);
            } else {
                letrasErradas.push(letra);
                erros ++;
            }
        }

        // Mostrar letra
        const divErradas = document.querySelector(".espacoErradas");
        divErradas.innerHTML = "<h3>Letras erradas</h3>";
        letrasErradas.forEach((letraErrada) => {
            divErradas.innerHTML += `<span>${letraErrada}</span>`;
            divErradas.innerHTML += `<span> </span>`;
        });

        const divCerta = document.querySelector(".palavraCerta");
        divCerta.innerHTML = "";
        palavraSecreta.split("").forEach((letra) => {
        if (letrasCorretas.includes(letra)) {
            divCerta.innerHTML += `${letra}`;
        } else {
            divCerta.innerHTML += `<span> _ </span>`;
        }
        });
        //verificar se o jogo acabou
        checar();
    }

    function aviso_repeticao() {
        console.log("letra repetida");
    }

    function checar() {
        let msg = "";
        const divCerta = document.querySelector(".palavraCerta");

        //verificar se o jogo acabou
        //configurar a mensagem e os pontos de acordo com o resultado.
        if(divCerta.innerHTML === palavraSecreta){
            acabou = true;
            pontos = 10 - erros;
            msg = "voce escapou!";
        }

        if(erros === 10){
            acabou = true;
            pontos = 0;
            msg = "Sua hora chegou!";
        }

        if(acabou){
            document.querySelector(".container").style.filter = "blur(7px)";
            document.querySelector("body").style.backdropFilter = "blur(7px)";
            //aviso caso o jogador perca
            if(pontos === 0){
                document.querySelector(".fim").style.backgroundImage = 'url("https://i.ytimg.com/vi/r91yPViqRX0/maxresdefault.jpg")';
                document.querySelector(".fim").style.borderColor = "crimson";
            }
            //aviso caso o usuario ganhe
            if(pontos>0){
                document.querySelector(".fim").style.backgroundImage = 'url("https://previews.123rf.com/images/vektoria/vektoria2002/vektoria200200063/141085587-man-running-forward-for-record-run-fast-hand-drawn-stickman-cartoon-doodle-sketch-vector.jpg")';
                document.querySelector(".fim").style.borderColor = "darkgreen";
            }

            envio(pontos);

            //aviso de fim de jogo
            document.querySelector(".mensagem").innerHTML = msg;
            document.querySelector(".fim").style.display = "flex";
            console.log(pontos);
            var btn = document.querySelector('#btn');
            btn.addEventListener('click', function () {
                window.location.href = 'menu.php';
            });
        }
    }

    function envio(pontos) {
        $.ajax({
            type: "POST",
            url: "pagpaises.php",
            dataType: 'json',
            data: { pontosphp: pontos }
        });
    }
});

