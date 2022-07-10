<?php
include_once("../classes/Cliente.php");
include_once("../classes/Animal.php");
$objCliente = new Cliente();
$objAnimal = new Animal();

if(isset($_POST['idClienteDeletar'])){
    $objCliente = new Cliente();
    $objCliente->deletar($_POST['idClienteDeletar']);
}

if(isset($_POST['nomeAnimalDeletar'])){
    $objAnimal = new Animal();
    $objAnimal->deletar($_POST['nomeAnimalDeletar']);
}



