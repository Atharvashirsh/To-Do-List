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
        <h1>To Do List</h1>
        <form id="new-task-form" action="index.php" method="post">
            <input type="text" id="new-task-input" name="task" placeholder="Enter your Task" />
            <input type="submit" id="new-task-submit" value="Add task" name="submit" />
        </form>

        <?php

        include 'db_conn.php';
        if (isset($_POST['submit']) && $_POST['task'] != "") {

            $task = $_POST['task'];
            $sql = "INSERT INTO `listitems` (`message`) VALUES ('$task')";
            $result = mysqli_query($conn, $sql);
        }

        ?>
    </header>

    <main>
        <section class="task-list">
            <h2>Tasks</h2>
            <div id="tasks">

                <?php
                include 'db_conn.php';
                $sql = "SELECT * FROM `listitems`";
                $result = mysqli_query($conn, $sql);
                $num = mysqli_num_rows($result);


                for ($i = 0; $i < $num; $i++) {
                    $row = mysqli_fetch_assoc($result);
                    echo "<div id='tasks'>
                            <div class='task'>
                                <div id='displaytask'>$row[message]</div>
                                <div class='actions'>
                                    <form method='post'>
                                        <button name='edit-btn'><a href='/php/update.php?id=$row[sno]' class='edit' style='text-decoration-line: unset;'>Edit</a></button>
                                        <button name='delete-btn'><a href='/php/delete.php?id=$row[sno]' class='delete'style='text-decoration-line: unset;'>Delete</a></button>
                                    </form>
                                </div>
                            </div>
                        </div>";
                }
                ?>
            </div>
        </section>
    </main>
</body>

</html>