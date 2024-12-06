<?php

class UsersController
{
    public function submituser()
    {

        $id             = (isset($_POST['id'])) ? filter_var($_POST['id']) : null;
        $name           = filter_var($_POST['nome']);
        $email          = filter_var($_POST['email']);
        $phone          = filter_var($_POST['phone']);
        $document       = filter_var($_POST['cpf']);
        $gender         = filter_var($_POST['sexo']);
        $description    = filter_var($_POST['descricao']);
        $password       = (isset($_POST['password'])) ? filter_var($_POST['password']) : null;

        $photo          = $_FILES['photo-user'];

        $result = new PersonsCrud;
        $result = $result->submitform($id, $name, $email, $phone, $document, $gender, $description, $password, $photo);

        echo json_encode(array(
            'result' => $result
        ));
    }

    public function removePerson()
    {
        $id = $_POST['id'];

        $result = new PersonsCrud;
        $result = $result->removePerson($id);

        echo json_encode(array(
            'result' => $result
        ));
    }
}
