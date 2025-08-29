<?
    include("../model/produto.class.php");
    function cadastrarProduto($nome, $preco) {
        $produto = new Produto(null, $nome, $preco);
        $produto->cadastrar();

    }

    function alterarProduto($id, $novoNome, $novoPreco) {
        
    }

    function removerProduto($id) {
        
    }

    function listarProduto($filtroNome) {
        $produtos = Produto::listar($filtroNome);
        echo "<table border='1'><thead><tr><th>Nome</th><th>Preco</th></tr></thead><tbody>";
        foreach($produtos as $produto) {
            echo "<tr><td>".$produto->nome."</td>";
            echo "<td>".$produto->preco."</td>";
        }
        echo "</tbody></table>";

    }

?>