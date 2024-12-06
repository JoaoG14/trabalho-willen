(function($, URL) {


    var masks = function() {
        Helpers.phoneMask($('input[name="phone"]'));
        Helpers.cpfMask($('input[name="cpf"]'));
        Helpers.searchTable($('input[name="search"]'));
    }

    var submit = function() {

        $('#contact-form').submit(function(e) {

            var formData = new FormData(this);

            $.ajax({
                url: URL + '/submituser',
                data: formData,
                type: 'POST',
                dataType: 'JSON',
                mimeType: "multipart/form-data",
                contentType: false,
                cache: false,
                processData: false,
                async: false,
                complete: function(response) {

                    if (response.responseJSON.result) {
                        Swal.fire(
                            'Aviso!',
                            'Formulário salvo com sucesso!',
                            'success'
                        ).then((result) => {
                            if (result.value) {
                                window.location.href = URL + "/dashboard/pessoas";
                                return true;
                            }
                        });
                    } else {
                        Swal.fire(
                            'Erro!',
                            'Não foi possível salvar o formulário!',
                            'danger'
                        );
                        return false;
                    }
                }
            });



            e.preventDefault();
            return true;
        });

        $('#contact-form').submit();


    }

    var isValidCPF = function(cpf) {

        if (cpf) {

            CPFValue = cpf;

            $return = true;

            var invalidos = [
                '111.111.111-11',
                '222.222.222-22',
                '333.333.333-33',
                '444.444.444-44',
                '555.555.555-55',
                '666.666.666-66',
                '777.777.777-77',
                '888.888.888-88',
                '999.999.999-99',
                '000.000.000-00'
            ];
            for (i = 0; i < invalidos.length; i++) {

                if (invalidos[i] == CPFValue) {

                    $return = false;

                }

            }

            CPFValue = CPFValue.replace("-", "");
            CPFValue = CPFValue.replace(/\./g, "");

            add = 0;

            for (i = 0; i < 9; i++) {

                add += parseInt(CPFValue.charAt(i), 10) * (10 - i);

            }

            rev = 11 - (add % 11);

            if (rev == 10 || rev == 11) {

                rev = 0;

            }

            if (rev != parseInt(CPFValue.charAt(9), 10)) {

                $return = false;

            }

            add = 0;

            for (i = 0; i < 10; i++) {

                add += parseInt(CPFValue.charAt(i), 10) * (11 - i);

            }

            rev = 11 - (add % 11);

            if (rev == 10 || rev == 11) {

                rev = 0;

            }
            if (rev != parseInt(CPFValue.charAt(10), 10)) {

                $return = false;

            }

            return $return;

        } else {

            return false;

        }

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

        $.ajax({
            url: URL + '/validateemail',
            type: 'POST',
            dataType: 'JSON',
            data: {
                email: $('input[name="email"]').val(),
                id: $('input[name="id"]').val(),
            },
            complete: function(response) {
                if (response.responseJSON.result) {
                    Swal.fire(
                        'Aviso!',
                        'Este E-mail já está registrado!',
                        'warning'
                    );
                    return false;
                }
            }
        });

        if ($('input[name="phone"]').val() == "") {
            Swal.fire(
                'Aviso!',
                'Preencha o campo telefone!',
                'warning'
            );
            $('input[name="phone"]').focus();
            return false;
        }


        if ($('input[name="cpf"]').val() == "") {
            Swal.fire(
                'Aviso!',
                'Preencha o campo CPF!',
                'warning'
            );
            $('input[name="cpf"]').focus();
            return false;
        }

        $.ajax({
            url: URL + '/validadecpfuser',
            type: 'POST',
            dataType: 'JSON',
            data: {
                cpf: $('input[name="cpf"]').val(),
                id: $('input[name="id"]').val(),
            },
            complete: function(response) {
                if (response.responseJSON.result) {
                    Swal.fire(
                        'Aviso!',

                        'Este CPF já está registrado!',
                        'warning'
                    );
                    $('input[name="cpf"]').focus();
                    return false;
                }
            }
        });


        if (!isValidCPF($('input[name="cpf"]').val())) {
            Swal.fire(
                'Aviso!', 'Digite um CPF válido!',
                'warning'
            );
            return false;
        }


        if ($('select[name="sexo"]').val() == "") {
            Swal.fire(
                'Aviso!',
                'Selecione o sexo!',
                'warning'
            );
            $('select[name="sexo"]').focus();
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

        if ($('input[name="password"]').val() != "" && $('input[name="repassword"]').val() == "") {
            Swal.fire(
                'Aviso!',
                'Reinsira uma senha',
                'warning'
            );
            $('input[name="repassword"]').focus();
            return false;
        }

        if ($('input[name="password"]').val() != $('input[name="repassword"]').val()) {
            Swal.fire(
                'Aviso!',
                'As senhas não são iguais!',
                'warning'
            );
            $('input[name="password"]').focus();
            return false;
        }

        return true;
    }

    var submitUser = function() {

        $('body').on('click', '.btn-save', function() {

            var btntype = $(this).attr('data-type');
            var title = "Deseja adicionar o cadastro?";
            var confirm = "Registar";

            if (btntype == 'edit') {
                title = "Deseja editar este cadastro?";
                confirm = "Salvar";
            }

            if (validation()) {
                Swal.fire({
                    title: title,
                    showCancelButton: true,
                    confirmButtonText: confirm,
                    cancelButtonText: `Cancelar`,
                    icon: 'info',
                }).then((result) => {
                    if (result.isConfirmed) {
                        submit();
                    }
                });
            }
        });
    }

    var deleteUser = function() {

        $('body').on('click', '.btn-remove-pessoa', function() {

            var id = $(this).attr('data-id');
            var btn = $(this);

            Swal.fire({
                title: 'Deseja remover este cadastro?',
                showCancelButton: true,
                confirmButtonText: `Remover`,
                cancelButtonText: `Cancelar`,
                icon: 'info',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: URL + '/removePerson',
                        type: 'POST',
                        dataType: 'JSON',
                        data: {
                            id: id
                        },
                        complete: function(response) {

                            if (response.responseJSON.result) {
                                Swal.fire(
                                    'Aviso!',
                                    'Registro removido com sucesso!',
                                    'success'
                                );
                                btn.parent().parent().remove();
                                return true;
                            } else {
                                Swal.fire(
                                    'Erro!',
                                    'Não foi possível remover o registro!',
                                    'danger'
                                );
                                return false;
                            }
                        }
                    });
                }
            });

        });

    }

    var deleteContact = function() {

        $('body').on('click', '.btn-remove-contato', function() {

            var id = $(this).attr('data-id');
            var btn = $(this);

            Swal.fire({
                title: 'Deseja remover este contato?',
                showCancelButton: true,
                confirmButtonText: `Remover`,
                cancelButtonText: `Cancelar`,
                icon: 'info',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: URL + '/removeContact',
                        type: 'POST',
                        dataType: 'JSON',
                        data: {
                            id: id
                        },
                        complete: function(response) {

                            if (response.responseJSON.result) {
                                Swal.fire(
                                    'Aviso!',
                                    'Contato removido com sucesso!',
                                    'success'
                                );
                                btn.parent().parent().remove();
                                return true;
                            } else {
                                Swal.fire(
                                    'Erro!',
                                    'Não foi possível remover o contato!',
                                    'danger'
                                );
                                return false;
                            }
                        }
                    });
                }
            });

        });

    }

    var modalControl = function() {
        $('body').on('click', '.btn-open-contact', function() {

            var id = $(this).attr('data-id');
            var div = $(this);

            $.ajax({
                url: URL + '/getContact',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    id: id
                },
                complete: function(response) {

                    $('.contact-name').html('');
                    $('.contact-email').html('');
                    $('.contact-phone').html('');
                    $('.contact-message').html('');

                    if (response.responseJSON.result) {

                        $('.contact-name').html(response.responseJSON.result['nome']);
                        $('.contact-email').html(response.responseJSON.result['email']);
                        $('.contact-phone').html(response.responseJSON.result['telefone']);
                        $('.contact-message').html(response.responseJSON.result['mensagem']);

                        $('#contactModal').modal('toggle');

                        div.parent().parent().find('.badge').removeClass('badge-danger').addClass('badge-success').html('Lido');

                    } else {
                        Swal.fire(
                            'Erro!',
                            'Não foi possível abrir o contato!',
                            'danger'
                        );
                        return false;
                    }

                }
            });

        });
    }

    var clickFile = function() {
        $('body').on('click', '#btnProfile', function() {

            $('#btnFileProfile').click();

        });
    }

    var photoControl = function() {

        $('body').on('change', '#btnFileProfile', function() {

            var extension = this.files[0].type;

            console.log(extension);

            var input = this;
            var file = this.files[0].size;
            file = Math.round((file / 1024));

            if (file > 1024) {
                Swal('Erro', 'O arquivo não pode possuir mais que 1MB!', 'error');
                $(this).val(null);
                $(this).parent().parent().find('.btn-primary').html('Trocar Foto');
                return false;
            } else if (extension != 'image/jpeg' && extension != 'image/png') {
                Swal('Erro', 'O arquivo deve ser do tipo .png ou .jpg!', 'error');
                $(this).val(null);
                $(this).parent().parent().find('.btn-primary').html('Trocar Foto');
                return false;
            } else if (input.files && input.files[0]) {

                var reader = new FileReader();

                reader.onload = function(e) {
                    $(input).parent().parent().children('.col-photo').children('img').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
                $(this).parent().parent().find('.btn-primary').html('Foto Selecionada');
            }

        });

    }

    var init = function() {
        masks();
        submitUser();
        deleteUser();
        deleteContact();
        modalControl();
        clickFile();
        photoControl();
    }

    $(document).ready(function() {
        init();
    });

})($, URL);