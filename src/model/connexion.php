<?php

function getHikes()
{
    try {
        $database = new PDO(
            'mysql: host = localhost; dbname = jepsen6-psr; chartset = utf8 ',
            'psr',
            'w3Gk7HhlpZnRiwJL'
        );
    } catch (Exception $e) {
        die('erreur:' . $e->getMessage());
    }

    $statement = $database->query(
        'SELECT * FROM hikes ORDER BY location ASC'
    );

    $hikes = [];

    while (($row = $statement->fetch())) {
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
