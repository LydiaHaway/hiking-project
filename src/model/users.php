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
                'is_admin' => $row['is_admin'],
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
                'is_admin' => $row['is_admin'],
            ];

            $usersID[] = $user;
        }

        return $usersID;
    }

    // insert User

    public function subscription()
    {

        $db = $this->connectDb();

        //$pass = password_hash($_POST["password"], PASSWORD_BCRYPT);

        $req = $db->prepare(' INSERT INTO users (ID, firstname, lastname, nickname, 
        email, password, is_admin) VALUES (NULL, :firstname, :lastname, 
        :nickname, :email, :password, :is_admin);
        ');

        $req->bindValue(':firstname', $_POST['firstname']);
        $req->bindValue(':lastname', $_POST['lastname']);
        $req->bindValue(':nickname', $_POST['nickname']);
        $req->bindValue(':email', $_POST['email']);
        $req->bindValue(':password', $_POST['password']);
        $req->bindValue(':is_admin', $_POST['is_admin']);

        $req->execute();
    }

    // update User 

    public function updateUser()
    {

        $db = $this->connectDb();

        $req = $db->prepare('UPDATE users SET firstname = :firstname, lastname = :lastname,
        nickname = :nickname, email = :email, password = :password WHERE users . ID = :id');

        $req->bindParam(':id', $_POST["ID"]);
        $req->bindParam(':firstname', $_POST['firstname']);
        $req->bindParam(':lastname', $_POST['lastname']);
        $req->bindParam(':nickname', $_POST['nickname']);
        $req->bindParam(':email', $_POST['email']);
        $req->bindParam(':password', $_POST['password']);


        $req->execute();
    }
}

$users = new Users();
