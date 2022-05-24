<?php
//Esta indicando qual classe esta usando
class ProdutoModel

{
    //esta exibindo  as declarações dos campos que foi inserido
    // no banco de dados do produtos
    public $id, $nome, $descricao, $codigo;
    public $data_entrada, $categoria;
    public $estoque, $fornecedor;

    public $rows;

    //indica de o método da classe é público,podendo ser acessada
    // em outros pontos do  código e tambem pode ser usada em outras classes.
   //e tambem fala do método save que vai chamar a DAO pra salvar 
   //no banco de dados as informações
    public function save()
    {
        include 'DAO/ProdutoDAO.php';

        $dao = new ProdutoDAO();
       
        if(empty($this->id)) 
        {           
            $dao->insert($this);
        } else {
            $dao->update($this); 
        }
    

    } 
                
    public function getAllRows()
    {
        include 'DAO/ProdutoDAO.php';
    
        $dao =new ProdutoDAO();
    
        $this->rows = $dao->select();
    }

    public function GetByid(int $id)
    {
        include 'Dao/ProdutoDao.php';
    
        $dao = new ProdutoDAO();
    
        $obj = $dao->selectById($id);
    
        return($obj) ? $obj : new ProdutoModel();
    }
    
    public function delete(int $id)
    {
        include'DAO/ProdutoDAO.php';
    
        $dao = new ProdutoDAO();
    
        $dao->delete($id);
    }
    

}      
