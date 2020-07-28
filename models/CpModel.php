<?php


class CpModel
{
    function __construct()
    {
        $this->connection = new SingleConnection();
        $data = array();
        try {
            $stmt = $this->connection->prepare("SELECT * FROM `colonias`");
            $stmt->execute();
            $data = $stmt->fetchAll();
        } catch (Exception $ex) {

        }
        return $data;
        }

    }
