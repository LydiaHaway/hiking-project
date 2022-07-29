<?php

declare(strict_types=1);

require_once 'database.php';

class Users extends Database
{

    //To display all the users
    public function getUsers()
    {

        $db = $this->connectDb();

        $req = $db->query('SELECT * FROM users');

        $users = [];

        while (($row = $req->fetch())) {
            $user = [
                'ID' => $row['ID'],
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
                'email' => $row['email'],
                'password' => $row['password'],
            ];

            $usersID[] = $user;
        }

        return $usersID;
    }

    // insert 

    public function subscription()
    {

        $db = $this->connectDb();

        $pass = password_hash($_POST["password"], PASSWORD_BCRYPT);

        $req = $db->query('INSERT INTO users(firstname, lastname, 
        nickname, email, password) VALUES(:firstname, :lastname, 
        :nickname, :email, :password )');

        $req->bindValue(':firstname', $_POST['firstname']);
        $req->bindValue(':lastname', $_POST['lastname']);
        $req->bindValue(':nickname', $_POST['nickname']);
        $req->bindValue(':email', $_POST['email']);
        $req->bindValue(':password', $pass);

        $req->execute();
    }
}

$users = new Users();
