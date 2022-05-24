<?php

//A classe Controller foi feita para  organizar a ação feita pelo o usuário
//então para quando ele chamar uma função de uma das classes controller,o método
//vai passar por uma View para fazer o include necessario,logo após 
//vai passar pela uma model para fazera busca no sql,para poder mudar o usuário
//para o lugar certo,podendo mudar ele de rota ou a controller pode passa para alguma outra

class ProdutoController
{
    //os métodos abaixo vai servi para alguma View ou model,nesse vai retorna uma View
    public static function  index()
    {
        include 'Model/ProdutoModel.php';

        $model = new ProdutoModel();
        $model->getAllRows();

        include 'View/modules/Produto/ProdutoListar.php';
    }
//nesse tem o formulário do usuário
    public static function form()
    {
        include 'Model/ProdutoModel.php';
        $model =new ProdutoModel();

        if(isset($_GET['id']))
        $model = $model->getBYId((int) $_GET['id']);

        include 'View/modules/Produto/FormProduto.php';
    }
//aqui vai colocar os dados para colocar no no banco e depois salvar
    public static function save() {

        //vai incluir o model
        include 'Model/ProdutoModel.php'; 

//cada campo sento colocado os dados que foram entregues no formulário que o usuario fez
// e usaremos a variável $_POST para enviar essas informações.
        $produto = new ProdutoModel();
        //$produto->idproduto = $_POST['idproduto'];     
        $produto->nome = $_POST['nome'];
        $produto->descricao = $_POST['descricao'];
        $produto->codigo = $_POST['codigo'];
        $produto->estoque = $_POST['estoque'];
        $produto->fornecedor = $_POST['fornecedor'];
        $produto->categoria = $_POST['categoria'];
        $produto->data_entrada = $_POST['data_entrada'];

        //aqui ele esta recorendo ao método save da model.
        $produto->save();
//coloca o usuario em alguma outra rota
        header("Location: /Produto"); 
    }

    public static function delete()
    {
     include 'Model/ProdutoModel.php';

     $produto = new ProdutoModel();

     $produto->delete((int) $_GET['id']);
     header("Location: /Produto");
    }
}