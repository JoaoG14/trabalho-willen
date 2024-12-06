<?php $url          = $this->helpers['URLHelper']->getURL(); ?>
<?php $location     = $this->helpers['URLHelper']->getLocation(); ?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Admin</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/assets/css/dashboard/base/template.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/assets/css/dashboard/base/radio-score.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/assets/css/dashboard/custom.css" />

</head>

<body>

    <header class="page-header">
        <div class="expanded row">

            <div class="col-md-2 logo">
                <img src="<?php echo $url; ?>/assets/img/logo.png">
            </div>

            <div class="col-md-10 navbar-right text-center" style="background-color: #232323;">
                <div class="toggle-menu" data-open-sidebar>
                    <i class="fa fa-bars" style="margin-left: 10px;"></i>
                </div>

                <div class="mobile logo">
                    <img src="<?php echo $url; ?>/assets/img/logo.png">
                </div>

                <ul class="nav pull-right">
                    <li class="switch-li toggle-sidebar">
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider round"></span>
                        </label>
                    </li>


                    <li class="divider"></li>

                    <li>
                        <a href="javascript:void(0)" onclick="location.reload();">
                            <i class="fa fa-sync-alt"></i>
                        </a>
                    </li>

                    <li class="hide-fullscreen">
                        <a href="javascript:void(0)" data-action="fullscreen">
                            <i class="fa fa-expand"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <section class="content">
        <div class="expanded row app-wrap">

            <div class="col-md-2 c-2">
                <?php require ROOT . '/views/dashboard/shared/menu.php'; ?>
            </div>

            <div class="col-md-10 page">
                <?php require $file; ?>
            </div>

        </div>
    </section>

    <script>
        var URL = "<?php echo $url; ?>";
        var Helpers = {};
    </script>

    <script src="<?php echo $url; ?>/assets/libs/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="<?php echo $url; ?>/assets/js/dashboard/template.js"></script>
    <script src="<?php echo $url; ?>/assets/js/helpers/helpers.js"></script>
    <script src="<?php echo $url; ?>/assets/js/dashboard/script.js"></script>

</body>