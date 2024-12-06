<aside class="col-md-2 sidebar">
    <div class="header-menu">

        <div class="dropdown">
            <button class="btn dropdown-toggle" type="button" id="dropwdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-user-circle"></i>
                <?php echo $this->helpers['AdminSession']->get('name'); ?>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="<?php echo $url; ?>/logout">
                    <i class="fa fa-walking fa-2x"></i>
                    Sair
                </a>
            </div>
        </div>

        <div class="sidebar-links">

            <ul>
                <li>
                    <a href="<?php echo $url; ?>/dashboard" class="<?php echo ($location == 'dashboard') ? 'active' : ''; ?>">
                        <i class="fa fa-home"></i>
                        Home
                    </a>
                </li>
                <li>
                    <a href="<?php echo $url; ?>/dashboard/pessoas" class="<?php echo ($location == 'dashboardpessoas') ? 'active' : ''; ?>">
                        <i class="fa fa-user"></i>
                        Pessoas
                    </a>
                </li>
                <li>
                    <a href="<?php echo $url; ?>/dashboard/contatos" class="<?php echo ($location == 'dashboardcontatos') ? 'active' : ''; ?>">
                        <i class="far fa-address-book"></i>
                        Contatos
                    </a>
                </li>
            </ul>

        </div>

    </div>

</aside>