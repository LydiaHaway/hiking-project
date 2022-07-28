<?php

declare(strict_types=1);

require_once 'database.php';

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

        $hikesID = [];

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

            $hikesID[] = $hike;
        }

        return $hikesID;
    }
 
}


$hikes = new Hikes();