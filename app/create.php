<?php include "templates/header.php"; ?>

<h2>Add New</h2>
    <form method="post">
        <label for="deadline">Deadline:
            <input name="deadline" type="date" id="deadline"></label>
        <label for="title">Title:
            <input name="title" type="text" id="title"></label>
        <label for="description">Description:
            <input name="description" type="text" id="description"></label>
        <label for="owner">Owner:
            <input name="owner" type="text" id="owner"></label>
     <br>
        <input type="submit" name="submit" value="submit">
    </form>

<?php
if(isset($_POST['submit'])){
    $deadline = $_POST['deadline'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $owner = $_POST['owner'];

    //connect to database
    $dbh = new PDO('mysql:host=database;dbname=todolist', 'master', 'masteryolo');
    $query = "INSERT INTO todos (deadline, title, description, owner) VALUES ('$deadline', '$title', '$description', '$owner')";
    $insertTodo = $dbh->query($query);

    if($insertTodo){
        echo "$title was successfully added to the list.";
    } else {
        echo var_dump($dbh->errorInfo());
    }
}

include "templates/footer.php"; ?>
