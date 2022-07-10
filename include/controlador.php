<?php
include_once("../classes/Cliente.php");
include_once("../classes/Animal.php");
//Get
if (isset($_GET['rota'])) {
    switch ($_GET['rota']) {
        case "cadastrar_cliente":
            include("../include/cadastrarCliente.php");
            break;

        case "visualizar_cliente":
            include("../include/visualizarCliente.php");
            break;

        case "editar_cliente":
            include("../include/editarCliente.php");
            break;
        case "cadastrar_animal":
            include("../include/cadastrarAnimal.php");
            break;
        case "visualizar_animal":
            include("../include/visualizarAnimal.php");
            break;
            
    }
}


//Post
if (isset($_POST['formCadastrarCliente'])) {
    $objCliente = new Cliente();
    $objCliente->setNome($_POST['nomeCliente']);
    $objCliente->setCPF($_POST['cpfCliente']);
    $objCliente->setEmail($_POST['emailCliente']);
    $objCliente->setCidade($_POST['cidadeCliente']);
    $objCliente->setRua($_POST['ruaCliente']);
    $objCliente->setTelefone($_POST['telefoneCliente']);
    
    $objCliente->cadastrar();

} else if (isset($_POST['formEditarCliente'])) {
    $objCliente = new Cliente();
    $objCliente->setNome($_POST['nomeCliente']);
    $objCliente->setCPF($_POST['cpfCliente']);
    $objCliente->setEmail($_POST['emailCliente']);
    $objCliente->setID($_POST['idCliente']);
    $objCliente->setCidade($_POST['cidadeCliente']);
    $objCliente->setRua($_POST['ruaCliente']);
    $objCliente->setTelefone($_POST['telefoneCliente']);
    $objCliente->editar();

}

if (isset($_POST['formCadastrarAnimal'])) {
    $objAnimal = new Animal();
    $objAnimal->setTipo($_POST['tipoAnimal']);
    $objAnimal->setNome_animal($_POST['nomeAnimal']);
    $objAnimal->setNome_dono($_POST['nomedonoAnimal']);
    $objAnimal->setCPF_dono($_POST['cpfdonoAnimal']);
    
    $objAnimal->cadastrar();

} else if (isset($_POST['formEditarAnimal'])) {
    $objAnimal = new Animal();
    $objAnimal->setTipo($_POST['tipoAnimal']);
    $objAnimal->setNome_animal($_POST['nomeAnimal']);
    $objAnimal->setNome_dono($_POST['nomedonoAnimal']);
    $objAnimal->setCPF_dono($_POST['cpfdonoAnimal']);
    
    $objCliente->editar();

}


