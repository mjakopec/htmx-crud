<?php

class User {
    private $id;
    private $fname;
    private $lname;
    private $email;

    public function __construct($fname, $lname, $email) {
        $this->fname = $fname;
        $this->lname = $lname;
        $this->email = $email;
    }

    public function getId() {
        return $this->id;
    }

    public function getFname() {
        return $this->fname;
    }
    public function getLname() {
        return $this->lname;
    }

    public function getEmail() {
        return $this->email;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function setFname($fname) {
        $this->fname = $fname;
    }
    public function setLname($lname) {
        $this->lname = $lname;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
}