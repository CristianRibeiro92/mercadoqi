<?php

    class ProdutoLista{

        private $produtolista = Array();

        public function carregarProdutos(){
            $p1 = new Produto(
                1,
                "Arroz",
                "Tipo 1",
                "Tio João",
                15,
                25/12/2021,
                1,
                10,
                "Alimentos",
                "Brasil",
                "arroztiojoaotipo1.jpg"
            );
            $this->produtolista[] = $p1;
        }

        public function getProdutolista(){
            return $this->produtolista;
        }


    }


?>