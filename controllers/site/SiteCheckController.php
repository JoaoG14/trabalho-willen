<?php

class SiteCheckController
{

    public function submitform()
    {

        $name           = filter_var($_POST['nome']);
        $email          = filter_var($_POST['email']);
        $phone          = filter_var($_POST['phone']);
        $description    = filter_var($_POST['descricao']);

        $result = new ContactsCrud;
        $result = $result->submitform($name, $email, $phone, $description);

        echo json_encode(array(
            'result' => $result
        ));
    }
}
