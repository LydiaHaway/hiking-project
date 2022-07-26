<?php

declare(strict_types=1);

require 'database.php';

class Hikes extends Database {
   
    //To display all the hikes
    public function getHikes()
    {

        $db = $this->connectDb();
        
        $req = $db->query('SELECT * FROM hikes');

        $hikes = [];

        while (($row = $req->fetch())) {
            $hike = [
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
}