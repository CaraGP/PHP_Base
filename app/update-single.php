<?php
if (isset($_POST['submit']))
    {
        try {
            $dbh = new PDO('mysql:host=database;dbname=todolist', 'master', 'masteryolo');
            $todo = [
                        $id          = $_POST['id'],
                        $deadline    = $_POST['deadline'],
                        $title       = $_POST['title'],
                        $description = $_POST['description'],
                        $owner       = $_POST['owner']
                    ];

            $sql = "UPDATE todos
                    SET
                        deadline = '$deadline',
                        title = '$title',
                        description = '$description',
                        owner = '$owner'
                    WHERE id = $id";

            $statement = $dbh->prepare($sql);
            $result = $statement->execute($todo);
            if($result == false)
                {
                    echo "This has failed";
                }
            } catch(PDOException $error)
                {
                    echo "$sql <br> $error->getMessage()";
                }
    }

if (isset($_GET['id']))
    {
        try {
                $dbh = new PDO('mysql:host=database;dbname=todolist', 'master', 'masteryolo');
                $id = $_GET['id'];

                $sql = "SELECT * FROM todos WHERE id = :id";
                $statement = $dbh->prepare($sql);
                $statement->bindValue(':id', $id);
                $statement->execute();

                $todo = $statement->fetch(PDO::FETCH_ASSOC);
                var_dump($todo);
            } catch(PDOException $error)
                {
                    echo "$sql <br> $error->getMessage()";
                }
    } else
        {
            echo "Something went wrong!";
            exit;
        }
?>

<?php require "templates/header.php"; ?>

<?php if (isset($_POST['submit']) && $statement) : ?>
	<blockquote><?php echo $_POST['title']; ?> successfully updated.</blockquote>
<?php endif; ?>

<h2>Edit a Todo</h2>

<form method="post">
    <?php foreach ($todo as $key => $value) : ?>
        <label><?php echo ucfirst($key); ?></label>
  	        <input type="text" name="<?php echo $key; ?>" value="<?php echo $value; ?>"
        <?php echo ($key === 'id' ? 'readonly' : null); ?>>
    <?php endforeach; ?>
    <br>
    <input type="submit" name="submit" value="Submit">
</form>

<br>
<a href="index.php">| Back to home |</a> <a href="list.php">| View list of Todos |</a> <a href="create.php">| Create a new Todo |</a>

<?php require "templates/footer.php"; ?>
