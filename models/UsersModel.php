<?php

class UsersModel
{

    public function __construct($user_data = array())
    {
        $this->connection = new SingleConnection();
        foreach ($user_data as $key => $value) {
            $$key = $value;
        }
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
            foreach ($data as $key => $value) {
                $$key = $value;
            }
        }

        if ($data) {
            return $data;
        }

    }

    public function add($user_data = array())
    {
        foreach ($user_data as $key => $value) {
            $$key = $value;
        }
        var_dump($user_data);
        exit();
    }
}
