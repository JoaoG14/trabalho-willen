(function($, URL) {

    var validation = function() {

        if ($('input[name="login"]').val() == '') {
            Swal.fire(
                'Aviso!',
                'Preencha o login',
                'warning'
            );
            $('input[name="login"]').focus();
            return false;
        }

        $.ajax({
            url: URL + '/validateuser',
            type: 'POST',
            dataType: 'JSON',
            data: {
                login: $('input[name="login"]').val()
            },
            complete: function(response) {
                if (!response.responseJSON.result) {
                    Swal.fire(
                        'Aviso!',

                        'Login não existente!',
                        'warning'
                    );
                    $('input[name="login"]').focus();
                    return false;
                }
            }
        });

        if ($('input[name="password"]').val() == '') {
            Swal.fire(
                'Aviso!',
                'Preencha a senha!',
                'warning'
            );
            $('input[name="password"]').focus();
            return false;
        }

        return true;
    }

    var login = function() {

        $('body').on('click', '.btn-login', function() {

            if (validation()) {
                $.ajax({
                    url: URL + '/userlogin',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {
                        login: $('input[name="login"]').val(),
                        password: $('input[name="password"]').val(),
                    },
                    complete: function(response) {

                        if (response.responseJSON.result) {

                            window.location.href = URL + "/dashboard";
                            return true;
                        } else {
                            Swal.fire(
                                'Erro!',
                                'Senha incorreta!',
                                'danger'
                            );
                            return false;
                        }
                    }
                });
            }

        });

    }

    var init = function() {

        login();

    }

    $(document).ready(function() {
        init();
    });

})($, URL);