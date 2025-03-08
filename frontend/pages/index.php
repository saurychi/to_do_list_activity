<?php
    session_start();

    if(!isset($_SESSION["user"])){
        header("Location: ../pages/login.php");
    }
    include('../components/header.php');
?>
<style>
    <?php include("../css/index.css")?>
</style>
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
            include('../../backend/config.php');
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
            </td>
            <td>
                <input type="checkbox" class="status-checkbox" data-id="<?php echo $row["task_id"]; ?>"
                <?php echo ($row["status"] === "done") ? "checked" : ""; ?>>
            </td>
        </tr>
        <?php endforeach; ?>

    </table>

    <br><br>

    <a href="add_task.php">Add Task</a>

<?php
    include('../components/footer.php');
?>
