<?php

try {
    $dbh = new PDO('mysql:host=database;dbname=todolist', 'master', 'masteryolo');
    foreach($dbh->query('SELECT * from todos') as $row) {
        print_r($row);
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
