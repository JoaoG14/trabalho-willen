<?php

class UsersCheckController
{
    public function validateemail()
    {
        $email = filter_var($_POST['email']);
        $id = (isset($_POST['id'])) ? $_POST['id'] : null;

        $check = new PersonsData;
        $check = $check->checkemail($email, $id);

        echo json_encode(array(
            'result' => $check
        ));
    }

    public function validadecpfuser()
    {
        $cpf = filter_var($_POST['cpf']);
        $id = (isset($_POST['id'])) ? $_POST['id'] : null;

        $check = new PersonsData;
        $check = $check->checkcpf($cpf, $id);

        echo json_encode(array(
            'result' => $check
        ));
    }
}
