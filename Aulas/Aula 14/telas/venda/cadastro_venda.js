document.addEventListener("DOMContentLoaded", (ev) => {
  document.getElementById("btnAddItem").addEventListener("click", adicionaItem);
})

function adicionaItem() {
    const container = document.getElementById("itensContainer");
    const item = container.querySelector(".itemVenda");
    const novoItem = item.cloneNode(true); //cria um clone do html

    novoItem.querySelectorAll("input").forEach(input => input.value = 1);
    novoItem.querySelector("select").selectedIndex = 0;

    container.appendChild(novoItem);
}