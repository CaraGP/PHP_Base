<?php
if (isset($_GET['id'])) {
  try {
    $dbh = new PDO('mysql:host=database;dbname=todolist', 'master', 'masteryolo');
    $id = $_GET['id'];

    $sql = "SELECT * FROM todos WHERE id = :id";
    $statement = $dbh->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->execute();

    $todo = $statement->fetch(PDO::FETCH_ASSOC);
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
} else {
  echo "Something went wrong!";
  exit;
}
 ?>
