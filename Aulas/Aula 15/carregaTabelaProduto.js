document.addEventListener("DOMContentLoaded", (ev) => {
    ev.preventDefault()
    let tabela = document.getElementsByTagName("tbody")[0]
    fetch("http://localhost:3000/produtos").then(
        async response => {
            let produtos = await response.json()
            produtos.forEach(produto => {
                let linha = document.createElement("tr")
                tabela.appendChild(linha)
        
                let colunaNome = document.createElement("td")
                colunaNome.textContent = produto.nome
                tabela.appendChild(colunaNome)
                
                let colunaCategoria = document.createElement("td")
                colunaCategoria.textContent = produto.categoria
                tabela.appendChild(colunaCategoria)
        
                let colunaPreco = document.createElement("td")
                colunaPreco.textContent = produto.preco
                tabela.appendChild(colunaPreco)
                
                let colunaEstoque = document.createElement("td")
                colunaEstoque.textContent = produto.estoque ? "Sim" : "Não"
                tabela.appendChild(colunaEstoque)
            })
        }
    )
})