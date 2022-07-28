<?php

declare(strict_types=1);

require_once 'database.php';

class Tags extends Database
{
    // To display Tag

    public function getTag(int $id)
    {

        $id;

        $db = $this->connectDb();

        $req = $db->prepare('SELECT *
        FROM tags
        WHERE id= :id');


        $req->bindValue(':id', $id);

        $req->execute();

        $tagsID = [];

        while (($row = $req->fetch())) {
            $tag = [
                'ID' => $row['ID'],
                'name' => $row['name'],
            ];

            $tagsID[] = $tag;
        }

        return $tagsID;
    }

    // To display a list of all tags 

    public function getListTags()
    {

        $db = $this->connectDb();

        $req = $db->query('SELECT * FROM tags');

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
}

$tags = new Tags();
