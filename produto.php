<?php
    class Produto{
        //PRIMEIRO: ATRIBUTOS (CARACTERISTICAS = VARIAVEIS)
        private $codigo;
        private $item;
        private $tipo;
        private $marca;
        private $preco;
        private $vencimento;
        private $peso;
        private $quantidade;
        private $departamento;
        private $pais;
        private $foto;

        //SEGUNDO: MÉTODOS (AÇÕES = FUNCTIONS)

        //CONSTRUTOR: método que diz como um novo objeto da classe deve ser construido
        public function __construct($codigo, $item, $tipo, $marca, $preco, $vencimento, $peso, $quantidade, $departamento, $pais, $foto)
        {
                $this->codigo = $codigo;
                $this->item = $item;
                $this->tipo = $tipo;
                $this->marca = $marca;
                $this->preco = $preco;
                $this->vencimento = $vencimento;
                $this->peso = $peso;
                $this->quantidade = $quantidade;
                $this->departamento = $departamento;
                $this->pais = $pais;
                $this->foto = $foto;
        }

        //GETTERS: métodos que devolvem o valor de um atributo
        public function getCodigo()
        {
                return $this->codigo;
        }

        public function getItem()
        {
                return $this->item;
        }

        public function getTipo()
        {
                return $this->tipo;
        }

        public function getMarca()
        {
                return $this->marca;
        }

        public function getPreco()
        {
                return $this->preco;
        }

        public function getVencimento()
        {
                return $this->vencimento;
        }

        public function getPeso()
        {
                return $this->peso;
        }

        public function getQuantidade()
        {
                return $this->quantidade;
        }

        public function getDepartamento()
        {
                return $this->departamento;
        }

        public function getPais()
        {
                return $this->pais;
        }

        public function getFoto()
        {
                return $this->foto;
        }

        //SETTERS: métodos que permitem alterar o valor de um atributo
        
        public function setItem($item)
        {
                $this->item = $item;
        }

        public function setTipo($tipo)
        {
                $this->tipo = $tipo;
        }

        public function setMarca($marca)
        {
                $this->marca = $marca;
        }

        public function setPreco($preco)
        {
                $this->preco = $preco;
        }

        public function setVencimento($vencimento)
        {
                $this->vencimento = $vencimento;
        }

        public function setPeso($peso)
        {
                $this->peso = $peso;
        }

        public function setQuantidade($quantidade)
        {
                $this->quantidade = $quantidade;
        }

        public function setDepartamento($departamento)
        {
                $this->departamento = $departamento;
        }

        public function setPais($pais)
        {
                $this->pais = $pais;
        }

        public function setFoto($foto)
        {
                $this->foto = $foto;
        }

        //TOSTRING: método que retorna o objeto em forma de um texto
        public function __toString()
        {
                $texto = "";
                $texto = $texto . "Item: " . $this->item . "<br>";
                $texto = $texto . "Tipo: " . $this->tipo . "<br>";
                $texto = $texto . "Marca: " . $this->marca . "<br>";
                $texto = $texto . "Preço: " . $this->preco . "<br>";
                $texto = $texto . "Vencimento: " . $this->vencimento . "<br>";
                $texto = $texto . "Peso: " . $this->peso . "<br>";
                $texto = $texto . "Quantidade: " . $this->quantidade . "<br>";
                $texto = $texto . "Departamento: " . $this->departamento . "<br>";
                $texto = $texto . "País: " . $this->pais . "<br>";
                return $texto;
        }

        //MÉTODOS ESPECIAIS: qualquer método que não seja construct, get, set ou toString

    }


?>