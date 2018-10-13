<?php

class User {

    protected $_id;
    protected $_login;
    protected $_lastname;
    protected $_firstname;
    protected $_email;
    protected $_password;
    protected $_createDate;
    protected $_role;


    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            // On récupère le nom du setter correspondant à l'attribut.
            $method = 'set' . ucfirst($key);

            // Si le setter correspondant existe.
            if (method_exists($this, $method)) {
                // On appelle le setter.
                $this->$method($value);
            }
        }
    }

    //Getter
    public function id()
    {
        return $this->_id;
    }

    public function login()
    {
        return $this->_login;
    }

    public function lastname()
    {
        return $this->_lastname;
    }

    public function firstname()
    {
        return $this->_firstname;
    }

    public function email()
    {
        return $this->_email;
    }

    public function password()
    {
        return $this->_password;
    }

    public function createDate()
    {
        return $this->_createDate;
    }

    public function role()
    {
        return $this->_role;
    }

    //Setter
    public function setId($id)
    {
        if ((int)$id) {
            $this->_id = $id;
        }
    }

    public function setLogin($login)
    {
        if (is_string($login)) {
            $this->_login = $login;
        }
    }

    public function setLastname($lastname)
    {
        if (is_string($lastname)) {
            $this->_lastname = $lastname;
        }
    }

    public function setFirstname($firstname)
    {
        if (is_string($firstname)) {
            $this->_firstname = $firstname;
        }
    }

    public function setEmail($email)
    {
        if (is_string($email)) {
            $this->_email = $email;
        }
    }

    public function setPassword($password)
    {
        if (is_string($password)) {
            $this->_password = $password;
        }
    }

    public function setCreateDate($createDate)
    {
        if (is_string($createDate)) {
            $this->_createDate = $createDate;
        }
    }

    public function setRole($role)
    {
        if (is_string($role)) {
            $this->_role = $role;
        }
    }

}