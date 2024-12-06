(function($, Helpers, URL) {

    var masks = function() {
        Helpers.phoneMask($('input[name="phone"]'));
    }

    var submit = function(form) {
        $.ajax({
            url: URL + '/submitform',
            type: 'POST',
            dataType: 'JSON',
            data: form.serialize(),
            complete: function(response) {

                if (response.responseJSON.result) {
                    Swal.fire(
                        'Aviso!',
                        'Contato registrado com sucesso!',
                        'success'
                    ).then((result) => {
                        if (result.value) {
                            window.location.reload();
                            return true;
                        }
                    });
                } else {
                    Swal.fire(
                        'Erro!',
                        'Não foi possível registrar o contato!',
                        'danger'
                    );
                    return false;
                }
            }
        });

    }

    var validation = function() {

        if ($('input[name="nome"]').val() == "") {
            Swal.fire(
                'Aviso!',
                'Preencha o campo nome!',
                'warning'
            );
            $('input[name="nome"]').focus();
            return false;
        }


        if ($('input[name="email"]').val() == "") {
            Swal.fire(
                'Aviso!',
                'Preencha o campo e-mail!',
                'warning'
            );
            $('input[name="email"]').focus();
            return false;
        }

        if ($('input[name="phone"]').val() == "") {
            Swal.fire(
                'Aviso!',
                'Preencha o campo telefone!',
                'warning'
            );
            $('input[name="phone"]').focus();
            return false;
        }

        if ($('textarea[name="descricao"]').val() == "") {
            Swal.fire(
                'Aviso!',
                'Descreva mais sobre você!',
                'warning'
            );
            $('textarea[name="descricao"]').focus();
            return false;
        }

        return true;
    }

    var insertSubmit = function() {

        $('body').on('click', '#button-test', function() {

            if (validation()) {
                Swal.fire({
                    title: 'Deseja enviar a mensagem?',
                    showCancelButton: true,
                    confirmButtonText: `Enviar`,
                    cancelButtonText: `Cancelar`,
                    icon: 'info',
                }).then((result) => {
                    if (result.isConfirmed) {
                        submit($('#contact-form'));
                    }
                });
            }

        });

    }

    var init = function() {
        insertSubmit();
        masks();
    }

    $(document).ready(function() {
        init();
    });

})($, Helpers, URL);