async function carregarHistorico() {
    let area = document.querySelector(".lista");

    try {
        let resposta = await fetch("../data/historico.json");

        if (!resposta.ok) {
            area.innerHTML = "<h2>Nenhum histórico encontrado.</h2>";
            return;
        }

        let lista = await resposta.json();

        if (!lista || lista.length === 0) {
            area.innerHTML = "<h2>Nenhuma pesquisa salva ainda.</h2>";
            return;
        }

        area.innerHTML = ""; 

        for (let i = lista.length - 1; i >= 0; i--) {
            let item = lista[i];

            let card = document.createElement("div");
            card.className = "game";

            card.innerHTML = `
                <h2>${item.nome}</h2>
                <p><strong>Nota:</strong> ${item.nota}</p>
                <p><strong>Lançamento:</strong> ${item.lancamento}</p>
                <p class="data"><strong>Data da pesquisa:</strong> ${item.data}</p>
            `;

            area.appendChild(card);
        }

    } catch (erro) {
        console.log(erro);
        area.innerHTML = "<h2>Erro ao carregar o histórico.</h2>";
    }
}

carregarHistorico();