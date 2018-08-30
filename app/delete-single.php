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

            $success = "Todo successfully deleted";
            if($result == false)
                {
                    echo "This has failed";
                }
            } catch(PDOException $error)
                {
                    echo "$sql <br> $error->getMessage()";
                }
    }

try {
    $dbh = new PDO('mysql:host=database;dbname=todolist', 'master', 'masteryolo');

    $sql = "SELECT * FROM todos";

    $statement = $dbh->prepare($sql);
    $statement->execute();

    $result = $statement->fetchAll();

    if($result == false)
        {
            echo "This has failed";
        }
    } catch(PDOException $error)
        {
            echo "$sql <br> $error->getMessage()";
        }
?>

<?php require "templates/header.php"; ?>

<h2>Delete Todo</h2>

<br>
<?php if ($success) echo $success; ?>
<br>

<br>
<a href="index.php">| Back to home |</a>
<a href="list.php">| View list of Todos |</a>
<a href="create.php">| Create a new Todo |</a>

<?php require "templates/footer.php"; ?>
