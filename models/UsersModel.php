<?php

class UsersModel
{

    public function __construct($user_data = array())
    {
        $this->connection = new SingleConnection();
      }

    public function list_users()
    {
        $data = array();
        try {
            $stmt = $this->connection->prepare("SELECT * FROM `USERS`");
            $stmt->execute();
            $data = $stmt->fetchAll();
        } catch (Exception $ex) {

        }
        if ($data) {
            return $data;
        }
        return 0;
    }

    public function add($user_data = array())
    {
        //INSERT INTO `USERS` (`idusuario`, `username`, `hidentext`, `address_street`, `phone`, `mail`, `fullname`, `rfc`, `idaddress`, `rol`, `branch`, `companytype`, `status`) VALUES (NULL, 'usr', 'sss', 'address', '4272887384', 'rlarap@homtmail.com', 'Ruben', 'lapa720109', '104049', '2', '5415', '1', '1')

    }
    public function update($user_data = array())
    {
        //UPDATE INTO `USERS` (`idusuario`, `username`, `hidentext`, `address_street`, `phone`, `mail`, `fullname`, `rfc`, `idaddress`, `rol`, `branch`, `companytype`, `status`) VALUES (NULL, 'usr', 'sss', 'address', '4272887384', 'rlarap@homtmail.com', 'Ruben', 'lapa720109', '104049', '2', '5415', '1', '1')

    }
    public function suspend($user_id='')
    {
        //UPDATE `USERS` SET `status` = '2' WHERE `USERS`.`idusuario` = 2 AND `USERS`.`status` = 1

    }
    public function reactivate($user_id='')
    {
        //UPDATE `USERS` SET `status` = '1' WHERE `USERS`.`idusuario` = 2 AND `USERS`.`status` = 2

    }
}
