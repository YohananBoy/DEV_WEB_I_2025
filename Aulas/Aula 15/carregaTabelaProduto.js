let produtos = [
    { id: 1, nome: "Arroz", categoria: "Alimentos", preco: 25.90, estoque: true },
    { id: 2, nome: "Feijão", categoria: "Alimentos", preco: 9.50, estoque: true },
    { id: 3, nome: "Detergente", categoria: "Limpeza", preco: 2.50, estoque: false },
    { id: 4, nome: "Shampoo", categoria: "Higiene", preco: 12.90, estoque: true }
  ];

document.addEventListener("DOMContentLoaded", (ev) => {
    ev.preventDefault()
    let tabela = document.getElementsByTagName("tbody")[0]
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
})