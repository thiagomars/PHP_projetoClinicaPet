<?php
include_once("../classes/Conexao.php");
include_once("../classes/Utilidades.php");
class Animal
{

    private $tipo;
    private $nome_animal;
    private $nome_dono;
    private $cpf_dono;
    
    public $retornoBD;
    public $conexaoBD;

    public function  __construct()
    {
        $objConexao = new Conexao();
        $this->conexaoBD = $objConexao->getConexao();
        $this->utilidades = new Utilidades();
    }

    public function getTipo()
    {
        return $this->tipo;
    }
    public function getNome_animal()
    {
        return $this->nome_animal;
    }
    public function getNome_dono()
    {
        return $this->nome_dono;
    }
    public function getCPF_dono()
    {
        return $this->cpf_dono;
    }

    public function setTipo($tipo)
    {
        return $this->tipo = $tipo;
    }
    public function setNome_animal($nome_animal)
    {
        return $this->nome_animal = $nome_animal;
    }
    public function setNome_dono($nome_dono)
    {
        return $this->nome_dono = $nome_dono;
    }
    public function setCPF_dono($cpf_dono)
    {
        return $this->cpf_dono = $cpf_dono;
    }

    public function cadastrar()
    {

        if ($this->getCPF_dono() != null and $this->getNome_animal() != null) {

            $interacaoMySql = $this->conexaoBD->prepare("INSERT INTO animal (tipo, nome_animal, nome_dono, cpf_dono) 
            VALUES (?, ?, ?, ?)");
            $interacaoMySql->bind_param('ssss', $this->getTipo(), $this->getNome_animal(), $this->getNome_dono(), $this->getCPF_dono());
            $retorno = $interacaoMySql->execute();

            $id = mysqli_insert_id($this->conexaoBD);

            return $this->utilidades->validaRedirecionar($retorno, $id, "admin.php?rota=visualizar_animal", "O animal foi cadastrado com sucesso!");
        } else {
            return $this->utilidades->mesagemParaUsuario("Erro, cadastro não realizado! CPF do dono não foi infomado.");
        }
    }
    public function editar()
    {

        if ($this->getId() != null) {

            $interacaoMySql = $this->conexaoBD->prepare("UPDATE  animal set  tipo=?, nome_dono=?
            where nome_animal=? AND cpf_dono=?");
            $interacaoMySql->bind_param('ssss', $this->getTipo(), $this->getNome_dono(), $this->getNome_animal(), $this->getCPF_dono());
            $retorno = $interacaoMySql->execute();
            if ($retorno === false) {
                trigger_error($this->conexaoBD->error, E_USER_ERROR);
            }

            $id = mysqli_insert_id($this->conexaoBD);

            return $this->utilidades->validaRedirecionar($retorno, $this->getId(), "admin.php?rota=visualizar_animal", "Os dados do animal foram alterados com sucesso!");
        } else {
            return $this->utilidades->mesagemParaUsuario("Erro! Nome do animal e CPF não foi infomado.");
        }
    }

    public function selecionarPorNomeAnimal($nome_animal)
    {
        $sql = "select * from animal where nome_animal= '$nome_animal' ";
        $this->retornoBD = $this->conexaoBD->query($sql);
    }
    public function selecionarAnimais()
    {
        $sql = "select * from animal";
        $this->retornoBD = $this->conexaoBD->query($sql);
    }
    
    public function deletar($nome_animal)
    {
        $sql = "DELETE from animal where nome_animal='$nome_animal'";
        $this->retornoBD = $this->conexaoBD->query($sql);
        $this->utilidades->validaRedirecionaAcaoDeletar($this->retornoBD, 'admin.php?rota=visualizar_animal', 'O animal foi deletado com sucesso!');
    }
}
