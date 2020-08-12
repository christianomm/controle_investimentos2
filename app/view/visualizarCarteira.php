<?php
    require_once("../../dao/carteiraDAO.php");
    require_once("../model/Ordem.php");
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
    
    
<title>Investimentos-->Visualizar Carteira</title>
    
    
</head>
<body>
<div class="jumbotron text-center" style="margin-bottom:0">
<h1>Minha Carteira de Ações</h1>

</div>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>    
    </ul>
  </div>  
</nav>
<div class="container">



<h2>Carteira de Ativos</h2>
        <table class="table table-dark">
        <tr><td>ATIVO</td><td>QTDE ATUAK</td><td>QTDE ANTERIOR</td><td>PM ATUAL</td><td>PM ANTERIOR</td>
        <td>VALOR IVNESTIDO</td></tr>
    <?php
        
        $carteiraDAO = carteiraDAO::getInstance();
        $carteira = $carteiraDAO->visualizaCarteira();
        
        foreach($carteira as $ativo){
        ?>
        <tr><td><?php echo $ativo[0];?></td><td><?php echo $ativo[1];?></td><td><?php echo $ativo[2];?></td>
        <td><?php echo $ativo[3];?></td><td><?php echo $ativo[4];?></td><td><?php echo $ativo[5];?></td>
        </tr>

     <?php           

        }
        
    ?>

        </table>




</div>    

</body>
</html>