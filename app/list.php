<?php
include "templates/header.php";

try{
    $dbh = new PDO('mysql:host=database;dbname=todolist', 'master', 'masteryolo');

    $sql = "SELECT * From todos";

    $statement = $dbh->prepare($sql);
    $statement->execute();

    $result = $statement->fetchAll();
} catch(PDOException $error) {
    echo "$sql <br> $error->getMessage()";
}
?>

<h2>ToDo List</h2>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Deadline</th>
            <th>Title</th>
            <th>Description</th>
            <th>Owner</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($result as $row) : ?>
    <tr>
        <td><?php echo $row["id"]; ?></td>
        <td><?php echo $row["deadline"]; ?></td>
        <td><?php echo $row["title"]; ?></td>
        <td><?php echo $row["description"]; ?></td>
        <td><?php echo $row["owner"]; ?></td>
        <td><a href="update-single.php?id=<?php echo $row["id"]; ?>">Edit</a></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<br>
<a href="index.php">| Back to home |</a> <a href="create.php">| Create a new Todo |</a>

<?php include "templates/footer.php"; ?>
