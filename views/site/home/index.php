<main>

    <section class="banner" id="banner">

        <h2>
            Bem-vindo à Nossa Pizzaria!
        </h2>

        <p>
            As melhores pizzas da cidade, feitas com amor e ingredientes frescos.
        </p>

        <div class="text-center">
            <a href="<?php echo $url; ?>/pedido" class="btn btn-danger">Faça seu pedido</a>
            <a href="<?php echo $url; ?>/menu" class="btn btn-danger">Menu</a>
        </div>

    </section>


    <section class="opcoes" id="opcoes">
        <div class="container">
            <h2>
                Nossas Opções de Pizzas
            </h2>
            <div class="row">

                <div class="col-md-4">
                    <div class="imagem" id="imagem1" style="background-image: url('<?php echo $url; ?>/assets/img/pizza1.jpg');"></div>
                    <p>
                        Pizza Margherita
                    </p>
                </div>

                <div class="col-md-4">
                    <div class="imagem" id="imagem2" style="background-image: url('<?php echo $url; ?>/assets/img/pizza2.jpg');"></div>
                    <p>
                        Pizza Pepperoni
                    </p>
                </div>

                <div class="col-md-4">
                    <div class="imagem" id="imagem3" style="background-image: url('<?php echo $url; ?>/assets/img/pizza3.jpg');"></div>
                    <p>
                        Pizza Quatro Queijos
                    </p>
                </div>

            </div>
        </div>
    </section>

    <section class="quem-somos" id="quem-somos">

        <div class="container">

            <h2>
                Quem Somos
            </h2>

            <p>
                Na nossa pizzaria, oferecemos uma experiência única com pizzas artesanais, preparadas com os melhores ingredientes. Venha nos visitar!
            </p>

        </div>

    </section>

    <section class="contato" id="contato">

        <main class="container">

            <center>


                <div class="toClone" style="display:none;">
                    <label class="titulo-frase"></label>
                    <br />
                    <input class="valor-frase" type="text" name="frase[]" id="nome-texto" />
                    <br />
                    <div class="btn btn-warning btn-remover-um remover" id="">Remover</div>
                    <br />
                </div>

                <form id="contact-form" class="formulario">

                    <h3>Entre em Contato</h3>
                    <br />
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label>Nome</label>
                                <input class="form-control" name="nome" type="text" />
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label>E-Mail</label>
                                <input class="form-control" name="email" type="text" />
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label>Telefone</label>
                                <input class="form-control" name="phone" type="text" />
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label>Mensagem</label>
                                <textarea class="form-control" name="descricao"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
                <br />
                <div class="btn btn-success" id="button-test">Enviar</div>
            </center>
        </main>
    </section>
</main>