<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
</head>
<body>
    <h2>Edit Task</h2>
    <form method="post">
        <?php
            include('config.php');
            $task_id = $_GET["id"];
            $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tasks WHERE task_id = $task_id"));
        ?>

        <input type="hidden" id="id" name="id" value="<?php echo $row["task_id"]; ?>">

        <label for="task_name">Task:</label><br>
        <input type="text" id="task_name" name="task" value="<?php echo $row['task_name']; ?>"><br>

        <label for="description">Description:</label><br>
        <textarea id="description" name="description"><?php echo $row['description']; ?></textarea><br>

        <label for="expiry_date">Overdue datetime:</label><br>
        <input type="datetime-local" id="expiry_date" name="expiry_date" value="<?php echo $row['expiry_date']; ?>"><br>
        <br>

        <p>Status: <?php echo $row['status']; ?></p>

        <button type="button" onclick="editTask();"> Edit </button>
    </form>
    <br>
    <?php include('script.php'); ?>
    <br><br>
    <a href="index.php">Go back</a>
</body>
</html>
