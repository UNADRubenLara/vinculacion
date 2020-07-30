<?php


class UserAddControler
{
    private $model;

    public function __construct()
    {
        $this->model = new UsersModel();
    }
    public function add($user_data = array())
    {
        var_dump($user_data);
        exit();
        //return $this->model->add($user_data);
    }
}