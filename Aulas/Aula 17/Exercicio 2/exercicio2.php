    <?php
        require_once "carro.class.php";
        require_once "cliente.class.php";
        require_once "locacao.class.php";
        require_once "locadora.class.php";
        require_once "moto.class.php";

        $cliente1 = new Cliente("Miguel Nunes", "14911025786", "22981867748");
        $cliente2 = new Cliente("Enzo Darcy", "27611939108", "22999521161");
        $cliente3 = new Cliente("Bernardo Marques", "06839802701", "22998223142");

        $carro1 = new Carro("Toyota", "Corolla", 2023, true, 4);
        $carro2 = new Carro("Volkswagen", "Gol", 2019, true, 2);
        $moto1  = new Moto("Yamaha", "MT-07", 2022, true, 689);
        $moto2  = new Moto("Honda", "CB 500F", 2021, true, 471);

        $locacao1 = new Locacao($cliente1, $carro2, 3, 600);
        $locacao2 = new Locacao($cliente3, $moto2, 10, 480);

        $locadora = new Locadora([$cliente1], [$moto1], [$locacao1]);

        $locadora->adicionarCliente($cliente2);
        $locadora->adicionarCliente($cliente3);
        $locadora->adicionarVeiculo($moto2);
        $locadora->adicionarVeiculo($carro1);
        $locadora->adicionarVeiculo($carro2);
        $locadora->registrarLocacao($locacao2);

        echo "Resumo das locações:\n" . $locacao1->exibirResumo() . "\n" . $locacao2->exibirResumo() . "\n";

        do {
            echo "(1 = Registrar locação / 2 = Devolução de veículo / 3 = CRUD Cliente / 4 = CRUD Veículo / 5 = Listar locações e veículos disponíveis / 0 = Sair)\n";
            $resp = trim(fgets(STDIN));
            $select;

            switch ($resp) {
                case 1:
                    echo "Selecione o cliente:\n";
                    foreach ($locadora->clientes as $index => $cliente) {
                        echo $cliente->exibirDados() . " [{$index}]\n";
                    }
                    $select           = trim(fgets(STDIN));
                    $clienteEscolhido = $locadora->clientes[$select];
                    echo "Selecione o veiculo:\n";
                    foreach ($locadora->veiculos as $index => $veiculo) {
                        echo $veiculo->exibirDados() . " [{$index}]\n";
                    }
                    $select           = trim(fgets(STDIN));
                    $veiculoEscolhido = $locadora->veiculos[$select];
                    if (! $veiculoEscolhido->disponivel) {
                        echo "Veículo indisponível\n";
                        break;
                    }
                    echo "Insira quantos dias o veículo será alugado: ";
                    $dias = trim(fgets(STDIN));
                    echo "Insira o valor da diaria: ";
                    $valor = trim(fgets(STDIN));

                    $novaLocacao = new Locacao($clienteEscolhido, $veiculoEscolhido, $dias, $valor);
                    echo "Locação registrada com sucesso\n";
                    $locadora->registrarLocacao($novaLocacao);
                    break;
                case 2:
                    echo "Selecione uma locação:\n";
                    foreach ($locadora->locacoes as $index => $locacao) {
                        echo $locacao->exibirResumo() . " [{$index}]\n";
                    }
                    $select           = trim(fgets(STDIN));
                    $locacaoEscolhida = $locadora->locacoes[$select];
                    $locadora->registrarDevolucao($locacaoEscolhida);
                    echo "Devolução foi feita com sucesso\n";

                    break;
                case 3:
                    echo "(1 = Cadastrar / 2 = Atualizar / 3 = Deletar / 4 = Listar)\n";
                    $select = trim(fgets(STDIN));
                    switch ($select) {
                        case 1:
                            echo "Nome: ";
                            $nome = trim(fgets(STDIN));
                            echo "CPF: ";
                            $cpf = trim(fgets(STDIN));
                            echo "Telefone: ";
                            $telefone = trim(fgets(STDIN));

                            $locadora->adicionarCliente(new Cliente($nome, $cpf, $telefone));
                            echo "Cliente adicionado com sucesso\n";
                            break;
                        case 2:
                            echo "Selecione um cliente:\n";
                            foreach ($locadora->clientes as $index => $cliente) {
                                echo $cliente->exibirDados() . " [{$index}]\n";
                            }
                            $id               = trim(fgets(STDIN));
                            $clienteEscolhido = $locadora->clientes[$id];
                            echo "Se não quiser alterar um atributo, apenas aperte enter\n";
                            echo "Nome: ";
                            $nome = trim(fgets(STDIN));
                            echo "CPF: ";
                            $cpf = trim(fgets(STDIN));
                            echo "Telefone: ";
                            $telefone = trim(fgets(STDIN));

                            $locadora->atualizarCliente($clienteEscolhido, $nome, $cpf, $telefone);
                            echo "Cliente atualizado com sucesso\n";
                            break;
                        case 3:
                            echo "Selecione um cliente:\n";
                            foreach ($locadora->clientes as $index => $cliente) {
                                echo $cliente->exibirDados() . " [{$index}]\n";
                            }
                            $id               = trim(fgets(STDIN));
                            $clienteEscolhido = $locadora->clientes[$id];
                            $locadora->removerCliente($clienteEscolhido);
                            echo "Cliente removido com sucesso\n";
                            break;
                        case 4:
                            $locadora->listarClientes();
                            break;

                    }
                    break;
                case 4:
                    echo "(Carro = 1 / Moto = 2)";
                    $veiculo = trim(fgets(STDIN));
                    switch ($veiculo) {
                        case 1:
                            echo "(1 = Cadastrar / 2 = Atualizar / 3 = Deletar / 4 = Listar)\n";
                            $select = trim(fgets(STDIN));

                            switch ($select) {
                                case 1:
                                    echo "Marca: ";
                                    $marca = trim(fgets(STDIN));
                                    echo "Modelo: ";
                                    $modelo = trim(fgets(STDIN));
                                    echo "Ano: ";
                                    $ano = trim(fgets(STDIN));
                                    echo "Quantidade de portas: ";
                                    $qtdPortas = trim(fgets(STDIN));
                                    $locadora->adicionarVeiculo(new Carro($marca, $modelo, $ano, true, $qtdPortas));
                                    echo "Carro adicionado com sucesso\n";
                                    break;

                                case 2:
                                    echo "Selecione um veiculo:\n";
                                    foreach ($locadora->veiculos as $index => $veiculo) {
                                        if ($veiculo instanceof Carro) {
                                            echo $veiculo->exibirDados() . " [{$index}]\n";
                                        }

                                    }
                                    $id               = trim(fgets(STDIN));
                                    $veiculoEscolhido = $locadora->veiculos[$id];
                                    echo "Se não quiser alterar um atributo, apenas aperte enter\n";
                                    echo "Marca: ";
                                    $marca = trim(fgets(STDIN));
                                    echo "Modelo: ";
                                    $modelo = trim(fgets(STDIN));
                                    echo "Ano: ";
                                    $ano = trim(fgets(STDIN));
                                    echo "Quantidade de portas: ";
                                    $qtdPortas = trim(fgets(STDIN));

                                    $locadora->atualizarCarro($veiculoEscolhido, $marca, $modelo, $ano, "", $qtdPortas);
                                    echo "Carro atualizado com sucesso\n";
                                    break;
                                case 3:
                                    echo "Selecione um veiculo:\n";
                                    foreach ($locadora->veiculos as $index => $veiculo) {
                                        if ($veiculo instanceof Carro) {
                                            echo $veiculo->exibirDados() . " [{$index}]\n";
                                        }

                                    }
                                    $id               = trim(fgets(STDIN));
                                    $veiculoEscolhido = $locadora->veiculos[$id];

                                    $locadora->removerVeiculo($veiculoEscolhido);
                                    echo "Carro removido com sucesso\n";
                                    break;

                            }
                        case 2:
                            echo "(1 = Cadastrar / 2 = Atualizar / 3 = Deletar / 4 = Listar)\n";
                            $select = trim(fgets(STDIN));

                            switch ($select) {
                                case 1:
                                    echo "Marca: ";
                                    $marca = trim(fgets(STDIN));
                                    echo "Modelo: ";
                                    $modelo = trim(fgets(STDIN));
                                    echo "Ano: ";
                                    $ano = trim(fgets(STDIN));
                                    echo "Cilindradas: ";
                                    $cilindradas = trim(fgets(STDIN));
                                    $locadora->adicionarVeiculo(new Moto($marca, $modelo, $ano, true, $cilindradas));
                                    echo "Moto adicionada com sucesso\n";
                                    break;
                                case 2:
                                    echo "Selecione um veiculo:\n";
                                    foreach ($locadora->veiculos as $index => $veiculo) {
                                        if ($veiculo instanceof Moto) {
                                            echo $veiculo->exibirDados() . " [{$index}]\n";
                                        }

                                    }
                                    $id               = trim(fgets(STDIN));
                                    $veiculoEscolhido = $locadora->veiculos[$id];
                                    echo "Se não quiser alterar um atributo, apenas aperte enter\n";
                                    echo "Marca: ";
                                    $marca = trim(fgets(STDIN));
                                    echo "Modelo: ";
                                    $modelo = trim(fgets(STDIN));
                                    echo "Ano: ";
                                    $ano = trim(fgets(STDIN));
                                    echo "Cilindradas: ";
                                    $cilindradas = trim(fgets(STDIN));

                                    $locadora->atualizarMoto($veiculoEscolhido, $marca, $modelo, $ano, "", $cilindradas);
                                    echo "Moto atualizado com sucesso\n";
                                    break;
                                case 3:
                                    echo "Selecione um veiculo:\n";
                                    foreach ($locadora->veiculos as $index => $veiculo) {
                                        if ($veiculo instanceof Moto) {
                                            echo $veiculo->exibirDados() . " [{$index}]\n";
                                        }

                                    }
                                    $id               = trim(fgets(STDIN));
                                    $veiculoEscolhido = $locadora->veiculos[$id];

                                    $locadora->removerVeiculo($veiculoEscolhido);
                                    echo "Moto removida com sucesso\n";
                                    break;

                            }

                    }

                    break;
                case 5:
                    echo "Locações:\n";
                    echo $locadora->listarLocacoes() . "\n\n";
                    echo "Veículos Disponíveis:\n";
                    echo $locadora->listarVeiculosDisponiveis() . "\n";
            }
    } while ($resp != 0);
