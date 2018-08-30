<?php

/**
 * Delete a Todo
 */

if (isset($_GET["id"]))
    {
        try {
            $dbh = new PDO('mysql:host=database;dbname=todolist', 'master', 'masteryolo');
            $id = $_GET["id"];

            $sql = "DELETE FROM todos WHERE id = :id";

            $statement = $dbh->prepare($sql);
            $statement->bindValue(':id', $id);
            $result = $statement->execute();

            if($result == false)
                {
                    # echo "This has failed";
                }
            } catch(PDOException $error)
                {
                    # echo "$sql <br> $error->getMessage()";
                }
    }

header( 'Location: list.php?deleted' ) ;
?>
