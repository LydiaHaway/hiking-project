<?php

declare(strict_types=1);

require_once 'database.php';

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
    //To display One user
    public function getUser(int $id)
    {

        $id;

        $db = $this->connectDb();

        $req = $db->prepare('SELECT *
        FROM users
        WHERE id= :id');


        $req->bindValue(':id', $id);

        $req->execute();

        $usersID = [];

        while (($row = $req->fetch())) {
            $user = [
                'ID' => $row['ID'],
                'firstname' => $row['firstname'],
                'lastname' => $row['lastname'],
                'nickname' => $row['nickname'],
            ];

            $usersID[] = $user;
        }

        return $usersID;
    }
}

$users = new Users();