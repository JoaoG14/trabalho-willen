<?php $url = $this->helpers['URLHelper']->getURL(); ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Faça seu Pedido</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/assets/css/site/estilo.css" />
</head>
<body>

    <div class="container">
        <h2 class="text-center">Faça seu Pedido</h2>
        <form id="order-form">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" required>
            </div>
            <div class="form-group">
                <label for="pedido">Pedido (ex: Pizza Margherita)</label>
                <input type="text" class="form-control" id="pedido" name="pedido" required>
            </div>
            <div class="form-group">
                <label for="endereco">Endereço</label>
                <textarea class="form-control" id="endereco" name="endereco" required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Enviar Pedido</button>
        </form>
    </div>

    <script src="<?php echo $url; ?>/assets/libs/jquery.js"></script>
    <script>
        $(document).ready(function() {
            $('#order-form').on('submit', function(e) {
                e.preventDefault();
                var formData = $(this).serialize(); // Serialize form data

                $.ajax({
                    url: "<?php echo $url; ?>/submitOrder", // URL to the submitOrder method
                    type: 'POST',
                    data: formData,
                    dataType: 'JSON',
                    success: function(response) {
                        alert(response.message); // Show success message
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        // Log the error details
                        console.error("Error details:", textStatus, errorThrown);
                        alert('Erro ao enviar o pedido: ' + jqXHR.responseText); // Show error message
                    }
                });
            });
        });
    </script>
</body>
</html>
