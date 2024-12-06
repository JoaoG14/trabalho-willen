<?php

class AdminCheck
{

    private $adminData;
    private $adminSession;

    public function __construct()
    {
        $this->adminData        = new AdminData;
        $this->adminSession     = new AdminSession;
    }

    public function check($login)
    {

        return $this->adminData->getLogin($login);
    }

    public function checkUsernameAndPassword($login, $password, $dbLogin, $dbPassword)
    {

        if (strtolower($login) !== strtolower($dbLogin)) {
            return false;
        }

        if ($password !== $dbPassword) {
            return false;
        }

        return true;
    }

    public function saveData($data)
    {

        $pdo = array(
            'id'        => $data['id'],
            'name'      => $data['name'],
            'login'     => $data['login'],
            'password'  => $data['password'],
        );

        $this->adminSession->save($pdo);
    }

    public function userChecker($login, $password)
    {


        $data = $this->adminData->getUser($login);

        if ($data && $this->checkUsernameAndPassword($login, $password, $data['login'], $data['password'])) {
            $this->saveData($data);
            return true;
        }

        return false;
    }

    public function login($login, $password)
    {


        if ($this->userChecker($login, hash('sha512', $password))) {
            return true;
        }

        return false;
    }
}
