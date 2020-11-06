<?php
    include "conexao.php";

    class ProdutoDAO{
        
        //Básico de uma classe DAO
        //inserir
        //atualizar
        //excluir

        public static function inserir($produto){
            $con = Conexao::getConexao();
            $sql = $con->
                prepare("insert into produtos values (null,?,?,?,?,?,?,?,?,?,?)");
            
            $item = $produto->getItem();
            $tipo = $produto->getTipo();
            $marca = $produto->getMarca();
            $preco = $produto->getPreco();
            $vencimento = $produto->getVencimento();
            $peso = $produto->getPeso();
            $quantidade = $produto->getQuantidade();
            $departamento = $produto->getDepartamento();
            $pais = $produto->getPais();
            $foto = $produto->getFoto();
            
            $sql->bindParam(1, $item);
            $sql->bindParam(2, $tipo);
            $sql->bindParam(3, $marca);
            $sql->bindParam(4, $preco);
            $sql->bindParam(5, $vencimento);
            $sql->bindParam(6, $peso);
            $sql->bindParam(7, $quantidade);
            $sql->bindParam(8, $departamento);
            $sql->bindParam(9, $pais);
            $sql->bindParam(10, $foto);
            
            $sql->execute();
        }

        //Quero que o excluir possa funcionar de 3 formas:
            //Recebendo um pokemon
            //Recebendo o nome do pokemon
            //Recebendo o código do pokemon
        public static function excluir($produto){
            $con = Conexao::getConexao();
           
            $sql = null;
            if(is_numeric($produto)){
                $sql=$con->prepare("delete from produtos where codigo = ?");
                $sql->bindParam(1, $produto);
            } else if(is_string($produto)){
                $sql=$con->prepare("delete from produtos where item = ?");
                $sql->bindParam(1, $produto);
            } else {
                $item = $produto->getItem();
                $sql=$con->prepare("delete from produtos where item = ?");
                $sql->bindParam(1, $item);
            }
            $sql->execute();  
        }

        public static function atualizar($produto){
            $con = Conexao::getConexao();

            $codigo = $produto->getCodigo();
            $item = $produto->getItem();
            $tipo = $produto->getTipo();
            $marca = $produto->getMarca();
            $preco = $produto->getPreco();
            $vencimento = $produto->getVencimento();
            $peso = $produto->getPeso();
            $quantidade = $produto->getQuantidade();
            $departamento = $produto->getDepartamento();
            $pais = $produto->getPais();
            $foto = $produto->getFoto();

            if($codigo>0){
                if($foto=="" || $foto==null){
                    $sql = $con->prepare("update produtos set item=?, tipo=?, 
                    marca=?, preco=?, vencimento=?, peso=?, quantidade=?, 
                    departamento=?, pais=? where codigo=?");
                    $sql->bindParam(10, $codigo);
                } else {
                    $sql = $con->prepare("update produtos set item=?, tipo=?, 
                    marca=?, preco=?, vencimento=?, peso=?, quantidade=?, 
                    departamento=?, pais=?, foto=? where codigo=?");
                    $sql->bindParam(10, $foto);
                    $sql->bindParam(11, $codigo);
                }
            } else {
                if($foto=="" || $foto==null){
                    $sql = $con->prepare("update produtos set item=?, tipo=?, 
                    marca=?, preco=?, vencimento=?, peso=?, quantidade=?, 
                    departamento=?, pais=? where nome=?");
                    $sql->bindParam(10, $item);
                } else {
                    $sql = $con->prepare("update produtos set item=?, tipo=?, 
                    marca=?, preco=?, vencimento=?, peso=?, quantidade=?, 
                    departamento=?, pais=?, foto=? where nome=?");
                    $sql->bindParam(10, $foto);
                    $sql->bindParam(11, $item);
                }
            }

            $sql->bindParam(1, $item);
            $sql->bindParam(2, $tipo);
            $sql->bindParam(3, $marca);
            $sql->bindParam(4, $preco);
            $sql->bindParam(5, $vencimento);
            $sql->bindParam(6, $peso);
            $sql->bindParam(7, $quantidade);
            $sql->bindParam(8, $departamento);
            $sql->bindParam(9, $pais);
            
            $sql->execute();
            
        }

        //Ao dar um get pokemon (localizando o pokemon no banco e devolvendo uma instancia)
        //queremos que se possa usar ou o código ou o nome
        public static function getProduto($identificacao){
            $con = Conexao::getConexao();
            $sql = null;

            if(is_numeric($identificacao)){
                $sql = $con->prepare("select * from produtos where codigo=?");
                $sql->bindParam(1, $identificacao);
            } else {
                $sql = $con->prepare("select * from produtos where item=?");
                $sql->bindParam(1, $identificacao);
            }

            $sql->setFetchMode(PDO::FETCH_ASSOC);
            $sql->execute();

            $produto = null;
            if($registro = $sql->fetch()){
                $produto = new Produto(
                    $registro["codigo"],
                    $registro["item"],
                    $registro["tipo"],
                    $registro["marca"],
                    $registro["preco"],
                    $registro["vencimento"],
                    $registro["peso"],
                    $registro["quantidade"],
                    $registro["departamento"],
                    $registro["pais"],
                    $registro["foto"]
                );
            }

            return $produto;

        }

        public static function getProdutos($campo, $ordem, $operador, $valor){
            $con = Conexao::getConexao();

            if($operador=="")
                $sql = $con->prepare("select * from produtos order by $campo $ordem");
            else{
                $sql = $con->prepare("select * from produtos where 
                                        $campo $operador ? order by $campo $ordem");
                $sql->bindParam(1, $valor);
            }
            $sql->setFetchMode(PDO::FETCH_ASSOC);
            $sql->execute();

            $produtoLista = array();

            while($registro = $sql->fetch()){
                $produto = new Produto(
                    $registro["codigo"],
                    $registro["item"],
                    $registro["tipo"],
                    $registro["marca"],
                    $registro["preco"],
                    $registro["vencimento"],
                    $registro["peso"],
                    $registro["quantidade"],
                    $registro["departamento"],
                    $registro["pais"],
                    $registro["foto"]
                );
                $produtoLista[] = $produto;
            }

            return $produtoLista;
        }



    }

?>