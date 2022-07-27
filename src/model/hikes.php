<?php

declare(strict_types=1);

require 'database.php';

class Hikes extends Database
{

    //To display all the hikes
    public function getHikes()
    {

        $db = $this->connectDb();

        $req = $db->query('SELECT * FROM hikes');

        $hikes = [];

        while (($row = $req->fetch())) {
            $hike = [
                'ID' => $row['ID'],
                'name' => $row['name'],
                'date' => $row['date'],
                'distance' => $row['distance'],
                'duration' => $row['duration'],
                'elevation_gain' => $row['elevation_gain'],
                'description' => $row['description'],
                'location' => $row['location'],
                'update' => $row['update'],
            ];

            $hikes[] = $hike;
        }

        return $hikes;
    }


    //To display one hikes by ID

    public function getHike(int $id)
    {

        $id;

        $id = $_GET["id"];

        $db = $this->connectDb();

        $req = $db->prepare('SELECT *
        FROM hikes
        WHERE id= :id');


        $req->bindValue(':id', $id);

        $req->execute();

        $hikes = [];

        while (($row = $req->fetch())) {
            $hike = [
                'ID' => $row['ID'],
                'name' => $row['name'],
                'date' => $row['date'],
                'distance' => $row['distance'],
                'duration' => $row['duration'],
                'elevation_gain' => $row['elevation_gain'],
                'description' => $row['description'],
                'location' => $row['location'],
                'update' => $row['update'],
                'ID_tags' => $row['ID_tags'],
                'ID_user' => $row['ID_user'],
            ];

            $hikes[] = $hike;
        }

        return $hikes;
    }

    // To display Tags

    public function getTag(int $id)
    {

        $id;

        $db = $this->connectDb();

        $req = $db->prepare('SELECT *
        FROM tags
        WHERE id= :id');


        $req->bindValue(':id', $id);

        $req->execute();

        $tags = [];

        while (($row = $req->fetch())) {
            $tag = [
                'ID' => $row['ID'],
                'name' => $row['name'],
            ];

            $tags[] = $tag;
        }

        return $tags;
    }

    public function getUser(int $id)
    {

        $id;

        $db = $this->connectDb();

        $req = $db->prepare('SELECT *
        FROM users
        WHERE id= :id');


        $req->bindValue(':id', $id);

        $req->execute();

        $users = [];

        while (($row = $req->fetch())) {
            $user = [
                'ID' => $row['ID'],
                'firstname' => $row['firstname'],
                'lastname' => $row['lastname'],
                'nickname' => $row['nickname'],
            ];

            $users[] = $user;
        }

        return $users;
    }
}
