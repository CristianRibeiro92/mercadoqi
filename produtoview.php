<?php

    class ProdutoView{

        public static function gerarCard($produto){
            $itemProduto = $produto->getItem();
            $tipoProduto = $produto->getTipo();
            $fotoProduto = $produto->getFoto();
            $precoProduto = $produto->getPreco();
            $quantidadeProduto = $produto->getQuantidade();
           
            echo "
            <div class='col-md-4' style='margin-top: 20px;'>
                <div class='img-thumbnail' style='background-color: rgba(0,0,0,0.9); color: white;'>
                    <img src='img/$fotoProduto' style='width: 100%; height: 100%;'>
                    <div class='caption' style='height: 250px;'>
                        <br>
                        <h2 style='font-size: 1.5em;'>$itemProduto</h2>
                        <br>
                        <p style='font-size:0.8em;'>$tipoProduto</p>
                        <br>
                        <p style='color: deeppink; '>Preço: $precoProduto</p>
                        <p style='color: gold; '>Quantidade: $quantidadeProduto</p>
                    </div>
                </div>
            </div>
        
           ";

        }

        
    }
?>