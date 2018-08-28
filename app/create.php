<html>
<head>
    <title>Create Todo list</title>
</head>
<body>
<h1>Create Todo List</h1>
    <form method="post" action="create.php">
        <p>Deadline: </p>
            <input name="deadline" type="date">
        <p>Title: </p>
            <input name="title" type="text">
        <p>Description: </p>
            <input name="description" type="text">
        <p>Owner: </p>
            <input name="owner" type="text">
     <br>
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>

<?
if(isset($_POST['submit'])){
    $deadline = $_POST['deadline'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $owner = $_POST['owner'];
        //echo "you filled deadline $deadline <br> title $title <br> description $description <br> and owner $owner";
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
