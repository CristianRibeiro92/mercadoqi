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
    <br>
    <hr><br>
    <form id="form1" name="form1" method="post" action="enviarEmail.php">
        <table width="500" border="0" align="center" cellpadding="0" cellspacing="2">
            <tr>
                <td align="right">Nome:</td>
                <td><input type="text" name="nome" id="nome" /></td>
            </tr>
            <tr>
                <td align="right">Assunto:</td>
                <td><input type="text" name="assunto" id="assunto" /></td>
            </tr>
            <tr>
                <td align="right">Mensagem:</td>
                <td><textarea name="mensagem" id="mensagem" cols="45" rows="5"></textarea></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="Enviar" /></td>
            </tr>
        </table>
    </form>
</body>

</html>