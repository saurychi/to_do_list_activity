<?php
    session_start();

    if(!isset($_SESSION["user"])){
        header("Location: ../pages/login.php");
    }
    $status = $_COOKIE["status"];
    include('../components/header.php');
?>
<style>
    <?php include("../css/index.css")?>
</style>

<main>
    <h1>Tasks</h1>
    <div id="filter_container">
        <div>
            <label for="options">Status:</label>
            <select id="options" name="options" class="status-filter">
                <option value="pending" <?php echo ($status == 'pending') ? 'selected' : ''; ?>>pending</option>
                <option value="done" <?php echo ($status == 'done') ? 'selected' : ''; ?>>done</option>
            </select>
        </div>
        <a href="add_task.php">Add Task<span class="material-symbols-outlined">add</span></a>
    </div>

    <div id="tasks_container">
        <?php
            include('../../backend/config.php');
            $status = $_COOKIE["status"];
            // echo $status;
            $rows  = mysqli_query($conn, "SELECT * FROM tasks WHERE status='$status'");
            $i = 1;
        ?>

        <ul>
        <?php foreach($rows as $row) : ?>
            <li id= <?php echo $row["task_id"]; ?>>
                <a href="edit_task.php?id=<?php echo $row["task_id"]; ?>">
                    <div>
                        <h2><?php echo $row["task_name"]; ?></h2>
                        <p><?php echo $row["description"]; ?></p>
                        <p>Due: <?php echo $row["expiry_date"]; ?></p>
                    </div>
                    <input type="checkbox" class="status-checkbox" data-id="<?php echo $row["task_id"]; ?>"
                    <?php echo ($row["status"] === "done") ? "checked" : ""; ?>>
                </a>
            </li>
        <?php endforeach; ?>
        </ul>
    </div>
</main>
<?php
    include('../components/footer.php');
?>
