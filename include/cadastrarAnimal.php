<?php
if (isset($_SESSION['administrador'])){
?>

<div class="container">
    <div class="row">
        <div class="col-10">
            <form method="POST" action="">
                <div class="mb-4">
                    <label for="tipoanimal" class="form-label">TIPO DO ANIMAL</label>
                    <input type="text" class="form-control" id="tipo-animal" aria-describedby="tipoAnimalHelp" name="tipoAnimal" >
                    <div id="tipoAnimalHelp" class="form-text"></div>
                </div>

                <div class="mb-4">
                    <label for="nomeanimal" class="form-label">NOME DO ANIMAL</label>
                    <input type="text" class="form-control" id="nome-animal" aria-describedby="nomeAnimalHelp" name="nomeAnimal" >
                    <div id="nomeAnimalHelp" class="form-text"></div>
                </div>

                <div class="mb-4">
                    <label for="nomedono" class="form-label">NOME DO DONO DO ANIMAL</label>
                    <input type="text" class="form-control" id="nomedono-animal" aria-describedby="nomedonoHelp" name="nomedonoAnimal" >
                    <div id="nomedonoHelp" class="form-text"></div>
                </div>
               
                <div class="mb-4">
                    <label for="cpfdono" class="form-label">CPF DO DONO</label>
                    <input type="text" class="form-control" id="cpfdono-animal" aria-describedby="cpfdonoHelp" name="cpfdonoAnimal" >
                    <div id="cpfdono" class="form-text"></div>
                </div>
               
                <input type="hidden" name="formCadastrarAnimal">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>


        </div>
    </div>
</div>
<?php

}else{
    header("Location:../index.html");
}
?>