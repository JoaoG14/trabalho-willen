<?php

class ContactsController extends Controller
{

    public function removeContact()
    {
        $id = $_POST['id'];

        $result = new ContactsCrud;
        $result = $result->removeContact($id);

        echo json_encode(array(
            'result' => $result
        ));
    }

    public function getContact(){

        $id = $_POST['id'];

        $result = new ContactsData;
        $result = $result->getContact($id);

        echo json_encode(array(
            'result' => $result
        ));

    }
}
