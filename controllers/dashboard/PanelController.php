<?php

class PanelController extends Controller
{

    public function home()
    {
        if ($this->helpers['AdminSession']->has()) {

            $this->setLayout('dashboard/shared/layout.php');
            $this->view('dashboard/home/index.php');
        } else {
            header('Location: ' . $this->helpers['URLHelper']->getURL('/dashboard/login'));
        }
    }

    public function login()
    {
        if (!$this->helpers['AdminSession']->has()) {

            $this->view('dashboard/login/index.php');
        } else {

            header('Location: ' . $this->helpers['URLHelper']->getURL('/dashboard'));
        }
    }

    public function contacts()
    {
        if ($this->helpers['AdminSession']->has()) {

            $contacts = new ContactsData;
            $contacts = $contacts->getContacts();

            $this->setLayout('dashboard/shared/layout.php');
            $this->view('dashboard/contacts/index.php', array(
                'contatos' => $contacts
            ));
        } else {
            header('Location: ' . $this->helpers['URLHelper']->getURL('/dashboard/login'));
        }
    }

    public function users()
    {
        if ($this->helpers['AdminSession']->has()) {

            $persons = new PersonsData;
            $persons = $persons->getPersons();

            $this->setLayout('dashboard/shared/layout.php');
            $this->view('dashboard/users/index.php', array(
                'pessoas' => $persons
            ));
        } else {
            header('Location: ' . $this->helpers['URLHelper']->getURL('/dashboard/login'));
        }
    }

    public function addUser()
    {

        if ($this->helpers['AdminSession']->has()) {

            $this->setLayout('dashboard/shared/layout.php');
            $this->view('dashboard/users/add.php');
        } else {
            header('Location: ' . $this->helpers['URLHelper']->getURL('/dashboard/login'));
        }
    }

    public function editUser(array $params)
    {

        if ($this->helpers['AdminSession']->has()) {

            $id = $params[0];

            $person = new PersonsData;
            $person = $person->getPerson($id);

            $this->setLayout('dashboard/shared/layout.php');
            $this->view('dashboard/users/edit.php', array(
                'person' => $person
            ));
        } else {
            header('Location: ' . $this->helpers['URLHelper']->getURL('/dashboard/login'));
        }
    }

    public function logout()
    {

        if ($this->helpers['AdminSession']->has()) {

            $this->helpers['AdminSession']->delete();
            header('Location: ' . $this->helpers['URLHelper']->getURL('/'));
            exit;
        } else {

            header('Location: ' . $this->helpers['URLHelper']->getURL('/dashboard/login'));
            exit;
        }
    }
}
