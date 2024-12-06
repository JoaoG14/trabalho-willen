<nav>

    <div class="logo">
        <img src="<?php echo $url; ?>/assets/img/logo.png" />
    </div>
    <div class="menu standard">
        <i class="fa-solid fa-bars fa-2x">

        </i>
    </div>
    <!-- <?php if ($this->helpers['AdminSession']->has()) { ?>

        <a href="<?php echo $url; ?>/logout" class="menu-link">Sair</a>
        <a href="<?php echo $url; ?>/dashboard" class="menu-link">Painel</a>

    <?php } else { ?>
        
        <a href="<?php echo $url; ?>/dashboard/login" class="menu-link">Login</a>
    <?php } ?> -->
   <a href="<?php echo $url; ?>#contato" class="menu-link standard">Contato</a>
    <a href="<?php echo $url; ?>#opcoes" class="menu-link standard">Nossas Pizzas</a>
    <a href="<?php echo $url; ?>#quem-somos" class="menu-link standard">Quem Somos</a>
    <a href="<?php echo $url; ?>#banner" class="menu-link standard">Home</a>
</nav>