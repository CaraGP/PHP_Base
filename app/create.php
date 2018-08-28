<?php include "templates/header.php"; ?>

<h2>Add New</h2>
    <form method="post">
        <label><span class="labelTag">Deadline:</span>
            <input name="deadline" type="date"></label>
        <label><span class="labelTag">Title:</span>
            <input name="title" type="text"></label>
        <label><span class="labelTag">Description:</span>
            <input name="description" type="text"></label>
        <label><span class="labelTag">Owner:</span>
            <input name="owner" type="text"></label>
     <br>
        <input type="submit" name="submit" value="submit">
    </form>
    <br>
    <a href="index.php">| Back to home |</a> <a href="list.php">| View list of Todos |</a>

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
