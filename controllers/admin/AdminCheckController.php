<?php

class AdminCheckController
{
    public function validateuser()
    {
        $login      = filter_var($_POST['login']);

        $result = new AdminCheck;
        $result = $result->check($login);

        echo json_encode(array(
            'result' => $result
        ));
    }

    public function userlogin()
    {
        $login      = filter_var($_POST['login']);
        $password   = filter_var($_POST['password']);

        $result = new AdminCheck;
        $result = $result->login($login, $password);

        echo json_encode(array(
            'result' => $result
        ));
    }

}