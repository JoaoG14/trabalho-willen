;
(function($, Helpers) {

    var searchTable = function() {

        $('input[name="search"]').keyup(function() {

            var search = $(this).val().toLowerCase();

            $('table tbody tr').hide();

            if (search == '') {
                $('table tbody tr').show();
                return;
            }

            $($('table tbody td')).each(function() {

                if ($(this).html() != '') {
                    if ($(this).html().toLowerCase().indexOf(search) != -1) {
                        $(this).parent().show();
                    } else if ($(this).html().indexOf(search) != -1) {
                        $(this).parent().show();
                    }
                }
            });
        });
    }

    var cpfMask = function(cpf) {
        var cpf = cpf;
        var mask = '000.000.000-00';
        cpf.mask(mask);
    };

    var phoneMask = function(phone) {

        var phone = phone;

        if (phone.val()) {

            var number = phone.val()[5];

            if (number == 9) {

                phone.mask('(00) 00000-0000');
            } else {

                phone.mask('(00) 0000-0000');
            }

        }

        phone.on('keyup', function() {


            var number = $(this).val()[5];

            if (number == 9) {

                phone.mask('(00) 00000-0000');
            } else {

                phone.mask('(00) 0000-0000');
            }
        });

    };

    Helpers.cpfMask = cpfMask;
    Helpers.phoneMask = phoneMask;
    Helpers.searchTable = searchTable;

})($, Helpers);