<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Bootstrap → Arquivo CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        #container_car{
            border-radius: 18px;
            transition: 600ms;
            
        }

        #container_car:hover{
          cursor: pointer;
          box-shadow:  #737373 0px 0px 45px;
          transition: 600ms;
        }

        .text_shadow{
          text-shadow: 0.1em 0.1em 0.4em black;
        }



        .jumbotron-with-background {
          background-image: url(imagens/fundo.png);
          background-position:center;
          background-repeat: no-repeat;
          background-size: cover;
        }

        #container-card{
          max-width: 80vw;
          
        }

        .card-config{
          transition: 150ms;
          margin: 30px 0px 30px 0px;
        }

        .card-config:hover{
          cursor: pointer;
          box-shadow:  rgb(204, 204, 204) 0px 0px 15px 0px;
          transition: 150ms;
        }
        
    </style>

</head>
<body>

    <!-- Bootstrap → Arquivo JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Includes dos Arquivos php -->
    <?php
      include 'nav.php';
      include 'conexao.php';
      
      $consulta = $cn->query('select * from vw_jogos;');
      
      $consultacar = $cn->query('select template_jg, nome_jg, preco_jg, carossel_position from vw_jogos where cod_jg > 1;');
      $exibe = $consulta->fetch(PDO::FETCH_ASSOC);

      $consultafirst = $cn->query('select template_jg, nome_jg, preco_jg, carossel_position from vw_jogos where carossel_position = "First";');
      $firstslide = $consultafirst->fetch(PDO::FETCH_ASSOC); 
    ?>




<!-- Jumbotron -->
<div class="jumbotron jumbotron-fluid jumbotron-with-background">
  <div class="container">
    <h1 class="display-4 text-light">IN.Line</h1>
    <p class="lead text-light">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
  </div>
</div>

<!-- Carrossel de slides -->
<div class="container-fluid">
    <div class="row justify-content-center align-items-center">
        <div class="col-sm-7 col-sm-offset-7">
            <div id="carouselExampleIndicators" class="carousel slide w-100" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              </ol>
              <div  id="container_car" class="carousel-inner">

                <!-- Carrosel da classse active -->
                <div class="carousel-item active">
                    <img class="d-block w-100" src="imagens/<?php echo $firstslide['template_jg'];?>.png" alt="<?php echo $firstslide['carossel_position'];?> slide">
                    <div class="carousel-caption d-none d-md-block">
                      <h5 class="text_shadow"><?php echo $firstslide['nome_jg'];?></h5>
                      <p class="text_shadow"><?php echo $firstslide['preco_jg'];?></p>
                    </div>
                  </div>


                <?php while($carrossel = $consultacar->fetch(PDO::FETCH_ASSOC)){ ?>
                  
                  <!-- Carrossel sem a classe active -->
                  <div class="carousel-item">
                    <img class="d-block w-100" src="imagens/<?php echo $carrossel['template_jg'];?>.png" alt="<?php echo $carrossel['carossel_position'];?> slide">
                    <div class="carousel-caption d-none d-md-block">
                      <h5 class="text_shadow"><?php echo $carrossel['nome_jg'];?></h5>
                      <p class="text_shadow">R$ <?php echo $carrossel['preco_jg'];?></p>
                    </div>
                  </div>

                <?php }; ?>
                
              </div>

              <!-- Botões do carrossel -->
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
        </div>
    </div>
</div><!-- Fim do container do carrossel -->




<!--
<div class="card-deck">

    <div class="card" style="width: 13rem;">
      <img class="card-img-top" src="imagens/reddead_capa.png" class="img-responsive" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Red Dead Redemption 2</h5>
        <p class="card-text"> Teste </p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
      
    </div>

</div>
-->

<div id="container-card" class="container-fluid">
  <div class="row">


    <div class="col-sm-3">
      <div class="card card-config" style="width: 13rem;">
          <img class="card-img-top" src="imagens/reddead_capa.png" class="img-responsive" alt="Card image cap" style="width:100%;">
          <div class="card-body">
            <h5 class="card-title">Red Dead Redemption 2</h5>
            <p class="card-text"> Teste </p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
      </div>
    </div>

    <div class="col-sm-3">
      <div class="card card-config" style="width: 13rem;">
          <img class="card-img-top" src="imagens/reddead_capa.png" class="img-responsive" alt="Card image cap" style="width:100%;">
          <div class="card-body">
            <h5 class="card-title">Red Dead Redemption 2</h5>
            <p class="card-text"> Teste </p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
      </div>
    </div>

    <div class="col-sm-3">
      <div class="card card-config" style="width: 13rem;">
          <img class="card-img-top" src="imagens/reddead_capa.png" class="img-responsive" alt="Card image cap" style="width:100%;">
          <div class="card-body">
            <h5 class="card-title">Red Dead Redemption 2</h5>
            <p class="card-text"> Teste </p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
      </div>
    </div>

    <div class="col-sm-3">
      <div class="card card-config" style="width: 13rem;">
          <img class="card-img-top" src="imagens/reddead_capa.png" class="img-responsive" alt="Card image cap" style="width:100%;">
          <div class="card-body">
            <h5 class="card-title">Red Dead Redemption 2</h5>
            <p class="card-text"> Teste </p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
      </div>
    </div>

    <div class="col-sm-3">
      <div class="card card-config" style="width: 13rem;">
          <img class="card-img-top" src="imagens/reddead_capa.png" class="img-responsive" alt="Card image cap" style="width:100%;">
          <div class="card-body">
            <h5 class="card-title">Red Dead Redemption 2</h5>
            <p class="card-text"> Teste </p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
      </div>
    </div>


  </div>
</div>


</body>
</html>
<?php include 'footer.html' ?>