<?php

function getHikes()
{

    try {

        $database = new PDO(
            'mysql:host=188.166.24.55;dbname=jepsen6-psr;chartset=utf8',
            'psr',
            'w3Gk7HhlpZnRiwJL'
        );
    } catch (PDOException $e) {
        die('Erreur: ' . $e->getMessage());
    }

    $statement = $database->query(
        "SELECT * FROM hikes"
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
