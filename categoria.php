<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
<!--CSS-->
<link rel = "stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!--jQuery Livrary-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!--JS Compilado-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

<?php

include 'conexao.php';
include 'nav.php';

$cat = $_GET['cat'];

$consulta = $cn->query("select template_jg, nome_jg, preco_jg, qtd_jg from vw_jogos where cd_categoria = '$cat'");
?>

<div class="container-fluid">
    <div class="row">
        <?php while($exibe = $consulta -> fetch(PDO::FETCH_ASSOC)) { ?>
            <div class="col-sm-3">
                <img src="imagens/<?php echo $exibe['template_jg'] ?>.png" class="img-responsive" style="width: 100%">
                <div><h3><b><?php echo mb_strimwidth($exibe['nome_jg'], 0, 30, '...' );?></b></h3></div>
                <div><h4>R$ <?php echo number_format($exibe['preco_jg'], 2, ',','.' );?></h4></div>
      <div class ="text-center">
        <button class="btn btn-lg btn-block btn-info">
           <span class="glyphicon glyphicon-info-sign"> Detalhes</span>
        </button>
      </div>
      <div class ="text-center" style="margin-top:5px; margin-bottom:5px;">

      <?php if($exibe['qtd_jg'] > 0 ){ ?>

     <button class="btn btn-lg btn-block btn-success">
       <span class="glyphicon glyphicon-piggy-bank"> Comprar</span>
     </button>

<?php } else { ?>
  <button class="btn btn-lg btn-block btn-danger" disabled >
       <span class="glyphicon glyphicon-remove-circle"> Indisponível</span>
     </button>
<?php } ?>
      </div>

    </div>
   <?php } ?>
  </div>
</div>

<?php include 'footer.html' ?>
</body>
</html>

