<?php
require_once("../../dao/ativoDAO.php");

$ativoDAO = AtivoDAO::getInstance();
$listaAtivos = $ativoDAO->listaAtivos();



?>

<!DOCTYPE html lang="pt-br">
<html>
<head>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<title>Investimentos-->Cadastrar Ordem </title>
</head>
<body>
<div class="container p-3 my-3 bg-dark text-white">
<h1>Cadastro de Ordem</h1>
<div id="painel" class="form-group" >

    <form>
        <label for="ativo">Ativo:</label><br>
        <select id="ativo" name="ativo" class="custom-select">

        <?php
            foreach($listaAtivos as $ativo ){
                print_r($ativo);
        ?>
            <option value="<?php  //echo $ativo["sigla"];  ?>"><?php  //echo $ativo["sigla"];  ?></option>
            
        <?php
            }
        ?>

        </select><br>
        
       
        <label for="operacao">Operação:</label><br>
       
        <select id="operacao" name="operacao" class="custom-select">
            <option value="C">Compra</option>
            <option value="V">Venda</option>
            <option value="D">Day trade</option>
            
        </select><br>
               
        <label for="quantidade">Quantidade:</label><br>
        <input type="number" min="1" id="quantidade" name="quantidade" class="form-control"><br>
        <label for="valor">Valor:</label><br>
        <input type="number" min="0.1" max="5000" id="valor" name="valor" class="form-control"><br>
        <label for="data">Data da Operação:</label><br>
        <input type="date" id="data" name="data"  class="form-control"><br>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
      </form>
      

</div>
</div>
</body>
</html