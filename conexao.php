<?php
    class Conexao{
        public static $conexao;

        public static function getConexao(){
            $stringConexao = "mysql:host=localhost;port=3306;dbname=dbprodutos";
            $usuario = "root";
            $senha = ""; //senhas padrão root: vazio, root, 123

            if(!isset(self::$conexao)){

                try{
                    self::$conexao = new PDO($stringConexao, $usuario, $senha);
                    
                } catch(PDOException $e){
                    //posso mostrar mensagens personalizadas de erro
                    //1044: usuário
                    //1045: senha
                    //2002: host
                    $erro = $e->getCode();
                    if($erro == 1049){
                        echo "Base de dados não encontrada.<br>";
                    }
                }
            }

            return self::$conexao;
        }


    }



?>