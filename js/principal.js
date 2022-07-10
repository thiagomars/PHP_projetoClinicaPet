function deletarCliente(cod){

    if(confirm('Você tem certeza que deseja deletar este cliente?')){
        $.post("../include/deletarRegistros.php", 
        {
            idClienteDeletar:cod
        },
        function(valor){
            $("#mensagem").html(valor);
        }
        );
    }
}

function deletarAnimal(nome){

    if(confirm('Você tem certeza que deseja deletar este cliente?')){
        $.post("../include/deletarRegistros.php", 
        {
            nomeAnimalDeletar:nome
        },
        function(valor){
            $("#mensagem").html(valor);
        }
        );
    }else{
        alert("teste")
    }
}

