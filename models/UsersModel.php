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

    }
}
