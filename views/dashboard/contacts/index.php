<section>
    <div class="card">
        <h3 class="card-header">
            Contatos
        </h3>

        <div class="card-body">
            <input type="text" name="search" class="form-control" placeholder="Busque por nome, e-mail ou telefone..." />
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Email</th>
                                <th scope="col">Telefone</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($contatos as $contato) { ?>
                                <tr>
                                    <td><?php echo $contato['id']; ?></td>
                                    <td><?php echo $contato['nome']; ?></td>
                                    <td><?php echo $contato['email']; ?></td>
                                    <td><?php echo $contato['telefone']; ?></td>
                                    <td>
                                        <?php if ($contato['status'] == 1) { ?>
                                            <span class="badge badge-success">Lido</span>
                                        <?php } else { ?>
                                            <span class="badge badge-danger">Não Lido</span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <div class="btn btn-primary btn-open-contact" data-id="<?php echo $contato['id']; ?>">Visualizar</div>
                                    </td>
                                    <td>
                                        <div class="btn btn-danger btn-remove-contato" data-id="<?php echo $contato['id']; ?>">Remover</div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Contato</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <p><b>Nome:</b> <label class="contact-name"></label></p>
                        </div>
                        <div class="form-group">
                            <p><b>E-Mail:</b> <label class="contact-email"></label></p>
                        </div>
                        <div class="form-group">
                            <p><b>Telefone:</b> <label class="contact-phone"></label></p>
                        </div>
                        <div class="form-group">
                            <p><b>Mensagem:</b></p>
                            <p class="contact-message"></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>