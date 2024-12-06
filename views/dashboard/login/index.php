<?php $url = $this->helpers['URLHelper']->getURL(); ?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Intensivo de Programação Web - Login</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/assets/css/estilo.css" />

</head>

<body>

    <section class="content">
        <div class="expanded row">
            <div class="col-md-12">
                <center>
                    <div class="col-md-6" style="margin-top:250px;">
                        <form>
                            <label>Login</label>
                            <input class="form-control" name="login" type="text" />
                            <label>Senha</label>
                            <input class="form-control" name="password" type="password" />
                            <br/>
                            <div class="btn btn-primary btn-login">Entrar</div>
                        </form>
                    </div>
                </center>
            </div>
        </div>
    </section>

    <script>
        var URL = "<?php echo $url; ?>";
    </script>

    <script src="<?php echo $url; ?>/assets/libs/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="<?php echo $url; ?>/assets/js/dashboard/login.js"></script>

</body>