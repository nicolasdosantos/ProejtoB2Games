async function busca() {

    let pesquisa = document.querySelector(".inputs input").value.trim();
    let chave = "21c27a97348344efa234fcb12383ba3e";

    if (pesquisa === "") {
        alert("Digite o nome do jogo!");
        return;
    }

    let link = `https://api.rawg.io/api/games?search=${encodeURIComponent(pesquisa)}&key=${chave}`;

    try {

        let resposta = await fetch(link);
        let dados = await resposta.json();

        if (!dados.results || dados.results.length === 0) {
            mensagem("Nenhum jogo encontrado!");
            return;
        }

        let jogo = dados.results[0];

        games(jogo);

    } catch (erro) {
        console.log(erro);
        mensagem("Erro ao buscar o jogo!");
    }
}


function games(jogo) {

    limparCard();

    let tela = document.querySelector(".content");

    let caixa = document.createElement("div");
    caixa.className = "card-jogo";

    caixa.innerHTML = `
        <img src="${jogo.background_image}" alt="Imagem do jogo">
        <h2>${jogo.name}</h2>

        <p><strong>Nota:</strong> ${jogo.rating} / 5</p>
        <p><strong>Lançamento:</strong> ${jogo.released}</p>
        <p><strong>Metacritic:</strong> ${jogo.metacritic ? jogo.metacritic : "Sem nota"}</p>
    `;


    let dadosParaSalvar = {
        nome: jogo.name,
        nota: jogo.rating,
        lancamento: jogo.released,
        metacritic: jogo.metacritic
    };

    fetch("../php/pesquisa.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(dadosParaSalvar)
    })

    tela.appendChild(caixa);
}


function mensagem(texto) {

    limparCard();

    let tela = document.querySelector(".content");

    let caixa = document.createElement("div");
    caixa.className = "card-jogo";

    caixa.innerHTML = `<h2>${texto}</h2>`;

    tela.appendChild(caixa);
}

function limparCard() {

    let caixa = document.querySelector(".card-jogo");

    if (caixa) {
        caixa.remove();
    }
}