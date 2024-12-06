<?php $url = $this->helpers['URLHelper']->getURL(); ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Menu - Nossa Pizzaria</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/assets/css/site/estilo.css" />
</head>
<body>

    <div class="container">
        <h2 class="text-center">Nosso Menu</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="<?php echo $url; ?>/assets/img/pizza1.jpg" class="card-img-top" alt="Pizza Margherita">
                    <div class="card-body">
                        <h5 class="card-title">Pizza Margherita</h5>
                        <p class="card-text">Deliciosa pizza com molho de tomate, queijo e manjericão.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="<?php echo $url; ?>/assets/img/pizza2.jpg" class="card-img-top" alt="Pizza Pepperoni">
                    <div class="card-body">
                        <h5 class="card-title">Pizza Pepperoni</h5>
                        <p class="card-text">Pizza com pepperoni, queijo e molho especial.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="<?php echo $url; ?>/assets/img/pizza3.jpg" class="card-img-top" alt="Pizza Quatro Queijos">
                    <div class="card-body">
                        <h5 class="card-title">Pizza Quatro Queijos</h5>
                        <p class="card-text">Uma combinação de queijos deliciosos.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo $url; ?>/assets/libs/jquery.js"></script>
</body>
</html> 