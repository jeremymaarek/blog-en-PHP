<?php

namespace Blog\jeremy\Model;

class Manager
{
    protected function dbConnect()
    {
        $bdd = new \PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
        return $bdd;
    }

}