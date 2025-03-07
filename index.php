<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h2>Tasks</h2>
    <table border=1>
        <tr>
            <td>task id</td>
            <td>Name</td>
            <td>Description</td>
            <td>Status</td>
            <td>Expiry Date</td>
            <td>Created at</td>
        </tr>
        <?php
            include('config.php');
            $rows  = mysqli_query($conn, "SELECT * FROM tasks");
            $i = 1;
        ?>

        <?php foreach($rows as $row) : ?>
        <tr id= <?php echo $row["task_id"]; ?>>
            <td><?php echo $i++; ?></td>
            <td><?php echo $row["task_name"]; ?></td>
            <td><?php echo $row["description"]; ?></td>
            <td><?php echo $row["status"]; ?></td>
            <td><?php echo $row["expiry_date"]; ?></td>
            <td><?php echo $row["created_at"]; ?></td>
            <td>
                <a href="edit_task.php?id=<?php echo $row["task_id"]; ?>">Edit</a>
                <button type="button" onclick="deleteTask(<?php echo $row['task_id']; ?>)">Delete</button>
            </td>
        </tr>
        <?php endforeach; ?>

    </table>

    <br><br>

    <a href="add_task.php">Add Task</a>

    <?php include('script.php'); ?>
</body>
</html>
