let clientes = {
    lista: [
        {nome: "Jose", id: 2, nascimento: "Bom Jardim"},
        {nome: "Miguel", id: 3, nascimento: "Nova Friburgo"},
        {nome: "Hanan", id: 4, nascimento: "Cachoeiras de Macacu"},
    ]
}

document.addEventListener("DOMContentLoaded", (ev) => {
    ev.preventDefault()
    let tabela = document.getElementsByTagName("tbody")[0]
    clientes.lista.forEach(cliente => {
        let linha = document.createElement("tr")
        tabela.appendChild(linha)

        let colunaNome = document.createElement("td")
        colunaNome.textContent = cliente.nome
        tabela.appendChild(colunaNome)
        
        let colunaNascimento = document.createElement("td")
        colunaNascimento.textContent = cliente.nascimento
        tabela.appendChild(colunaNascimento)
    })
})