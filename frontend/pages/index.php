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

<main>
    <h1>Tasks</h1>
    <div id="filter_container">
        <div>
            <label for="options">Status:</label>
            <select id="options" name="options">
                <option value="1">Pending</option>
                <option value="2">Done</option>
            </select>
        </div>
        <a href="add_task.php">Add Task<span class="material-symbols-outlined">add</span></a>
    </div>

    <div id="tasks_container">
        <?php
            include('../../backend/config.php');
            $rows  = mysqli_query($conn, "SELECT * FROM tasks");
            $i = 1;
        ?>

        <?php foreach($rows as $row) : ?>
        <ul>
            <li id= <?php echo $row["task_id"]; ?>>
                <div>
                    <h2><?php echo $row["task_name"]; ?></h2>
                    <p><?php echo $row["description"]; ?></p>
                    <p>Due: <?php echo $row["expiry_date"]; ?></p>
                </div>
                <div>
                    <a href="edit_task.php?id=<?php echo $row["task_id"]; ?>">Edit</a>

                    <input type="checkbox" class="status-checkbox" data-id="<?php echo $row["task_id"]; ?>"
                    <?php echo ($row["status"] === "done") ? "checked" : ""; ?>>
                </div>
            </li>
        </ul>
        <?php endforeach; ?>
    </div>
</main>
<?php
    include('../components/footer.php');
?>
