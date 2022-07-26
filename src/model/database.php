<?php

declare(strict_types=1);

class Database {

	protected function connectDb()
	{
		try{
			$db = new PDO(
                'mysql:host=188.166.24.55;dbname=jepsen6-psr;chartset=utf8',
                'psr',
                'w3Gk7HhlpZnRiwJL');
		    return $db;
	    } catch(Exception $e){
	        die('Error : '.$e->getMessage());
	    }
	}
}
