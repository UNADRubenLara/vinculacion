<?php

class UsersController
{
    private $model;

    public function __construct()
    {
        $this->model = new UsersModel();
    }

    public function lst($user_data = array())
    {
        return $this->model->list_users();
    }

        public function set($user_data = array())
    {
        return $this->model->set($user_data);
    }

    public function get($user_id = '')
    {
        return $this->model->get($user_id);
    }

    public function delete($username = '')
    {
        return $this->model->deldelete($username);
    }

}