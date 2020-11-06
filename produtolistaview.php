<?php

    class ProdutoListaView{

        public static function geraLista($lista){

            echo "
            <form action='cadastro.php' method='post'>
                <div class='row' style='background-color:#555555; color:#FFFFFF;'>
                    <div class='col-md-1'>

                    </div>
                    <div class='col-md-1 text-center'>
                        Código
                    </div>
                    <div class='col-md-2'>
                        Item
                    </div>
                    <div class='col-md-2'>
                        Tipo
                    </div>
                    <div class='col-md-2'>
                        Marca
                    </div>
                    <div class='col-md-1'>
                        Preço
                    </div>
                    <div class='col-md-1'>
                        Quantidade
                    </div>
                    <div class='col-md-1'>
                    
                    </div>
                    <div class='col-md-1'>
                        
                    </div>
                </div>
            ";

            $cont = 0;

            foreach($lista as $produto){
                    $cont++;
                    $cor = "#BBBBBB";
                    if($cont%2 == 0){
                        $cor = "#DDDDDD";
                    }

                    $codigo = $produto->getCodigo();
                    $item = $produto->getItem();
                    $tipo = $produto->getTipo();
                    $marca = $produto->getMarca();
                    $preco = $produto->getPreco();
                    $quantidade = $produto->getQuantidade();
                    $foto = $produto->getFoto();

                    echo "
                        <div class='row' style='background-color: $cor; border: 1px solid #AAAAAA;'>
                            <div class='col-md-1 semEspaco' style='padding-left: 0 !important; padding-right: 0 !important;'>
                                <button class='btn' type='submit' name='selProduto' value= $codigo style='height:100%; width:100%; padding:0px!important;'>
                                    <img src= 'img/$foto' style='height:100%; width:100%;'>
                                </button> 
                            </div>
                            <div class='col-md-1' style='display:flex; align-items:center; justify-content: center;'>
                                <div>$codigo</div>
                            </div>
                            <div class='col-md-2' style='display:flex; align-items:center;'>
                                $item
                            </div>
                            <div class='col-md-2' style='display:flex; align-items:center;'>
                                $tipo
                            </div>
                            <div class='col-md-2' style='display:flex; align-items:center;'>
                                $marca
                            </div>
                            <div class='col-md-1' style='display:flex; align-items:center;'>
                                $preco
                            </div>
                            <div class='col-md-1' style='display:flex; align-items:center;'>
                                $quantidade
                            </div>
                            <div class='col-md-1'>
                                <button class='btn' type='submit' name='delProduto' value= $codigo style='height:100%; background-color:transparent;'>
                                    <img src= 'img/delete.png' style='height:50%; width:100%;'>
                                </button> 
                            </div>
                            <div class='col-md-1'>
                                <button class='btn' type='submit' name='selProduto' value= $codigo style='height:100%; background-color:transparent;'>
                                    <img src= 'img/edit.png' style='height:50%; width:100%;'>
                                </button> 
                            </div>

                        </div>
                    ";


            }

            echo "</form>";


        }

    }



?>