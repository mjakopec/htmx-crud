<?php

class Dbh {
    private $host     ='localhost';
    private $port     ='3306';
    private $dbname ='test';
    private $user     ='root';
    private $password ='';

    protected function connect(){
        $dsn = 'mysql:host=' . $this->host . ':' . $this->port . ';dbname=' . $this->dbname;
        $pdo = new PDO($dsn, $this->user, $this->password);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
}