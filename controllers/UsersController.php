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

    public function add($user_data = array())
    {
        return $this->model->add($user_data);
    }

    public function set($user_data = array())
    {
        return $this->model->set($user_data);
    }

    public function get($user_id = '')
    {
        return $this->model->get($user_id);
    }

    public function del($username = '')
    {
        return $this->model->del($username);
    }

}