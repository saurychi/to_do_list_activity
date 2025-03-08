
<?php
    session_start();

    if(!isset($_SESSION["user"])){
        header("Location: ../pages/login.php");
    }
    include('../components/header.php');
?>
<style>
    <?php include("../css/add_task.css")?>
</style>

<main>
    <h2>Add Task</h2>
    <form method="post">
        <label for="task_name">Task:</label><br>
        <input type="text" id="task_name" name="task"><br>

        <label for="description">Date:</label><br>
        <textarea id="description" name="description"></textarea><br>

        <label for="expiry_date">Overdue datetime:</label><br>
        <input type="datetime-local" id="expiry_date" name="expiry_date"><br>
        <br>

        <button type="button" onclick="addTask();"> Add </button>
    </form>
    <br><br>
    <a href="index.php">Go back</a>
</main>

<?php
    include('../components/footer.php');
?>
