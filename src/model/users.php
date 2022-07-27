<?php

declare(strict_types=1);

require 'database.php';

class Users extends Database {
   
    //To display all the users
    public function getUsers()
    {

        $db = $this->connectDb();
        
        $req = $db->query('SELECT * FROM users');

        $users = [];

        while (($row = $req->fetch())) {
            $user = [
                'firstname' => $row['firstname'],
                'lastname' => $row['lastname'],
                'nickname' => $row['nickname'],
                'email' => $row['email'],
                'password' => $row['password'],
            ];
    
            $users[] = $user;
        }
    
        return $users;
    }
}

$users = new Users();