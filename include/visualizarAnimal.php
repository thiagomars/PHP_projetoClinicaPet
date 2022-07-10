<?php
include_once("../classes/Animal.php");
if (isset($_SESSION['administrador'])){
?>
<div class="row">
    <div class="col-lg-6">
        <!-- Collapsable Card Example -->
        <div class="card shadow mb-8">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Pesquisar Animais</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="nome" class="form-label">NOME DO ANIMAL</label>
                            <input type="text" class="form-control" id="nome-animal" aria-describedby="nomeanimalHelp" name="nomeanimal">
                            <div id="nome" class="form-text"></div>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$objAnimal = new Animal();
//$objCliente->selecionarPorId(11);

if (isset($_POST['nomeanimal']) && !empty( $_POST['nomeanimal'])) {
    $objAnimal->selecionarPorNomeAnimal($_POST['nomeanimal']);
} else {
    $objAnimal->selecionarAnimais();
}

if ($objAnimal->retornoBD != null) {
?>
    <br/>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-hover">
                <tr>
                    <th width="23%">CPF do Dono</th>
                    <th width="23%">Nome Animal</th>
                    <th width="23%">Tipo Animal</th>
                    <th width="23%">Nome Dono</th>
                    <th width="04%">EDITAR</th>
                    <th width="04%">DELETAR</th>
                </tr>

                <?php
 
                while ($retorno = $objAnimal->retornoBD->fetch_object()) {
                    echo '<tr><td>' . $retorno->cpf_dono . '</td><td>' .
                        $retorno->nome_animal . '</td><td>' .
                        $retorno->tipo . '</td><td>'.
                        $retorno->nome_dono . '</td>';

                    echo '<td><a href="?rota=editar_animal&nome_animal='.$retorno->nome_animal.'" class="btn btn-info btn-circle btn-sm"><i class="fas fa-list"></i></a></td>';
                    echo '<td><a href="#" class="btn btn-danger btn-circle btn-sm" onclick=\'deletarAnimal("' . $retorno->nome_animal .'")\';><i class="fas fa-trash"></i></a></td></tr>';
                }

                ?>
            </table>
        </div>
    </div>
<?php
}
}else{
    header("Location:../index.php");
}
?>