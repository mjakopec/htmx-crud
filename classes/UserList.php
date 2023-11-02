<?php
class UserList {
    private $users = [];

    public function addUser(User $user) {
        $this->users[] = $user;
    }

    public function getUsers() {
        return $this->users;
    }
}