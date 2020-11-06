<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!--Tags básicas do head-->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Arrays em PHP</title>
    <!--Link dos nossos arquivos CSS e JS padrão-->
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <script src="js/scripts.js"></script>
    <!--Link dos arquivos CSS e JS do Bootstrap-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</head>

<body>

    <?php
    include_once "produto.php";
    include_once "produtoDAO.php";
    include_once "imagem.php";

    session_start();

    if (isset($_SESSION["logado"])) {
        if ($_SESSION["logado"] == false) {
            header("Location: index.php");
        }
    } else {
        header("Location: index.php");
    }

    if (!isset($_SESSION["modo"])) {
        $_SESSION["modo"] = 1;
    }

    $item = "";
    $tipo = "";
    $marca = "";
    $preco = "";
    $vencimento = "";
    $peso = "";
    $quantidade = "";
    $departamento = "";
    $pais = "";
    $foto = "semfoto.jpg";


    if (isset($_POST["botaoAcao"])) {
        if ($_POST["botaoAcao"] == "Gravar") {
            $codigo = null;
            $item = $_POST["item"];
            $tipo = $_POST["tipo"];
            $marca = $_POST["marca"];
            $preco = $_POST["preco"];
            $vencimento = $_POST["vencimento"];
            $peso = $_POST["peso"];
            $quantidade = $_POST["quantidade"];
            $departamento = $_POST["departamento"];
            $pais = $_POST["pais"];
            $arquivo = $_FILES["fileFoto"];
            if ($arquivo != "" && $arquivo != null)
                $foto = Imagem::uploadImagem($arquivo, 2000, 2000, 5000, "img/");
            else
                $foto = "";
            $pAux = new Produto(
                $codigo,
                $item,
                $tipo,
                $marca,
                $preco,
                $vencimento,
                $peso,
                $quantidade,
                $departamento,
                $pais,
                $foto
            );
            if ($_SESSION["modo"] == 1) {
                ProdutoDAO::inserir($pAux);
            } else {
                ProdutoDAO::atualizar($pAux);
            }
        } else if ($_POST["botaoAcao"] == "Excluir") {
            ProdutoDAO::excluir($_POST["item"]);
        }



        //Coloca em modo de inserção caso for clicado no botão Excluir ou Inserir
        //Assim, a próxima vez que o botão gravar for clicado, sabemos se devemos
        //Inserir ou Atualizar o Pokemon. Além disso, também conseguimos saber se
        //devemos recarregar os valores dos inputs ou trazer somente vazio
        if (isset($_POST["botaoAcao"])) {
            if ($_POST["botaoAcao"] == "Excluir" || $_POST["botaoAcao"] == "Limpar") {
                $_SESSION["modo"] = 1; //insercao
            } else if ($_POST["botaoAcao"] == "Cancelar") {
                header("Location: listagem.php");
            } else {
                $_SESSION["modo"] = 2; //atualização
            }
        }
    }

    if (isset($_POST["selProduto"])) {
        $produto = ProdutoDAO::getProduto($_POST["selProduto"]);
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
        $_SESSION["modo"] = 2;
    } else {
        $_SESSION["modo"] = 1;
    }


    ?>


    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <h1>Cadastro de Produtos</h1>
            </div>
        </div>

        <form method="post" action="cadastro.php" enctype="multipart/form-data">
            <br><br>
            <div class="row" id="areaCadastro">
                <div class="col-md-6">
                    <div class="row">
                        <div class="row text-center">
                            <div class="col-md-5 offset-md-2">
                                <input type="submit" name="botaoAcao" value="Gravar" class="btn btn-success" />
                            </div>
                            <div class="col-md-5">
                                <input type="submit" name="botaoAcao" value="Excluir" class="btn btn-danger" />
                            </div>
                            <div class="col-md-5 offset-md-2">
                                <input type="submit" name="botaoAcao" value="Cancelar" class="btn btn-warning" />
                            </div>
                            <div class="col-md-5">
                                <input type="submit" name="botaoAcao" value="Limpar" class="btn btn-primary" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr>
                        </div>
                        <div class="col-md-12">
                            <img src="img/<?php echo $foto; ?>" style="width:100%; height:100%;">
                        </div>
                        <div class="col-md-12">
                            <input type="file" name="fileFoto">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <strong><label for="item">Item</label></strong>
                            <input type="text" name="item" value=<?php echo "$item"; ?>>
                        </div>
                        <div class="col-md-12">
                            <strong><label for="tipo">Tipo</label></strong>
                            <input type="text" name="tipo" value=<?php echo "$tipo"; ?>>
                        </div>
                        <div class="col-md-12">
                            <strong><label for="marca">Marca</label></strong>
                            <input type="text" name="marca" value=<?php echo "$marca"; ?>>
                        </div>
                        <div class="col-md-12">
                            <strong><label for="preco">Preço</label></strong>
                            <input type="text" name="preco" value=<?php echo "$preco"; ?>>
                        </div>
                        <div class="col-md-12">
                            <strong><label for="vencimento">Vencimento</label></strong>
                            <input type="text" name="vencimento" value=<?php echo "$vencimento"; ?>>
                        </div>
                        <div class="col-md-12">
                            <strong><label for="peso">Peso</label></strong>
                            <input type="text" name="peso" value=<?php echo "$peso"; ?>>
                        </div>
                        <div class="col-md-12">
                            <strong><label for="quantidade">Quantidade</label></strong>
                            <input type="text" name="quantidade" value=<?php echo "$quantidade"; ?>>
                        </div>
                        <div class="col-md-12">
                            <strong><label for="departamento">Departamento</label></strong>
                            <input type="text" name="departamento" value=<?php echo "$departamento"; ?>>
                        </div>
                        <div class="col-md-12">
                            <strong><label for="pais">País</label></strong>
                            <input type="text" name="pais" value=<?php echo "$pais"; ?>>
                        </div>
                        <br>
                    </div>
                </div>
            </div>

        </form>


    </div>

    <?php var_dump($_SESSION["modo"]); ?>


</body>