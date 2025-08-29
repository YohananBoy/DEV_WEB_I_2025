document.addEventListener("DOMContentLoaded", (ev) => {
  let formCad = document.getElementById("formCadastroVenda")
  formCad.addEventListener("submit", (ev2) => {
    ev2.preventDefault()

    let campoProduto = document.getElementById("idProduto")
    let campoQuantidade = document.getElementById("quantidade")
    let campoData = document.getElementById("data")

    if (
      validaFormulario(
        campoProduto.value,
        campoQuantidade.value,
        campoData.value
      )
    ) {
      formCad.submit()
    }
  })
})

let validaFormulario = (idProduto, quantidade, data) => {
  if (idProduto === "" || quantidade <= 0 || data === "") {
    alert("Preencha todos os campos corretamente!")
    return false
  }
  return true
}
