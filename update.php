<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Fira Sans Font Linking -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans&display=swap" rel="stylesheet" />

    <!-- CSS Linking -->
    <link rel="stylesheet" href="styles.css" />

    <title>ToDo List</title>
</head>

<body>
    <header>
        <h1>Update Task Message</h1>
        <?php
        include 'db_conn.php';

        $id = $_GET['id'];
        $sql1 = "SELECT * FROM `listitems` WHERE sno = $id";
        $result1 = mysqli_query($conn, $sql1);
        $row = mysqli_fetch_assoc($result1);
        ?>
        <form id="new-task-form" method="post">
            <input type="text" id="new-task-input" name="task" value="<?php echo $row['message'] ?>" />
            <input type="submit" id="new-task-submit" value="Update" name="submit" />
        </form>

        <?php
        include 'db_conn.php';
        $id = $_GET['id'];
        if (isset($_POST['submit']) && $_POST['task'] != "") {
            $task = $_POST['task'];
            $sql = "UPDATE `listitems` SET `message` = '$task' WHERE `sno` = '$id'";
            $result = mysqli_query($conn, $sql);
            header("Location: index.php");
        }
        ?>
    </header>
</body>

</html>