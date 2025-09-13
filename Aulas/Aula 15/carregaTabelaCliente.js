document.addEventListener("DOMContentLoaded", (ev) => {
  ev.preventDefault()
  let tabela = document.getElementsByTagName("tbody")[0]
  fetch("http://localhost:3000/clientes").then(async (response) => {
    let clientes = await response.json()
    console.log(clientes)
    clientes.forEach((cliente) => {
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
})
