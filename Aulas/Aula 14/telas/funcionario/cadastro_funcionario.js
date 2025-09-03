document.addEventListener("DOMContentLoaded", 
    (ev)=>{     
        let formCad = document.getElementById("formCadastroFuncionario");
        formCad.addEventListener("submit", (ev2)=>{
            ev2.preventDefault();
            let campoNome = document.getElementById("nome");
            let campoTelefone = document.getElementById("telefone");
            let campoSalario = document.getElementById("salario");
            validaFormulario(campoNome.value, campoSalario.value, campoTelefone.value)?formCad.submit():null;
        });
        campoSalario.addEventListener("keyup", (ev2)=>{
            validaSalario(campoSalario, ev2.key);
        });
    }
);
let validaFormulario = (nome, salario, telefone) => {
    return true;
};