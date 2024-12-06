<section>
    <div class="card">
        <h3 class="card-header">
            Nossos Clientes
            <a class="btn btn-primary float-right" href="<?php echo $url; ?>/dashboard/pessoa-adicionar">Adicionar Cliente</a>
        </h3>

        <div class="card-body">
            <input type="text" name="search" class="form-control" placeholder="Busque por nome ou telefone..." />

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
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pessoas as $pessoa) { ?>
                                <tr>
                                    <td><?php echo $pessoa['id']; ?></td>
                                    <td><?php echo $pessoa['nome']; ?></td>
                                    <td><?php echo $pessoa['email']; ?></td>
                                    <td><?php echo $pessoa['telefone']; ?></td>
                                    <td><a href="<?php echo $url; ?>/dashboard/pessoa-editar/<?php echo $pessoa['id']; ?>" class="btn btn-primary">Editar</a></td>
                                    <td>
                                        <div class="btn btn-danger btn-remove-pessoa" data-id="<?php echo $pessoa['id']; ?>">Remover</div>
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