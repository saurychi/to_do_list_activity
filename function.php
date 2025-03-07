<?php
    include('config.php');

    if(isset($_POST["action"])){
        if($_POST["action"] == "insert"){
            insert();
        } else if($_POST["action"] == "edit"){
            edit();
        } else if($_POST["action"] == "delete"){
            delete();
        }
    }

    function insert(){
        global $conn;

        $task_name = $_POST["task"];
        $description = $_POST["description"];
        $expiry_date = $_POST["expiry_date"];

        $query = "INSERT INTO tasks (task_name, description, status, expiry_date) VALUES ('$task_name', '$description', 'pending', '$expiry_date')";
        mysqli_query($conn, $query);
        echo "Task added successfully!";
    }

    function edit(){
        global $conn;

        $id = $_POST["id"];
        $task_name = $_POST["task"];
        $description = $_POST["description"];
        $expiry_date = $_POST["expiry_date"];

        $query = "UPDATE tasks SET task_name = '$task_name', description = '$description', expiry_date = '$expiry_date' WHERE task_id = '$id'";
        // echo $query;
        mysqli_query($conn, $query);
        echo "Task updated successfully!";
    }

    function delete(){
        global $conn;

        $id = $_POST["id"];

        $query = "DELETE FROM tasks WHERE task_id = '$id'";
        // echo $query;
        mysqli_query($conn, $query);
        echo "Task deleted successfully!";
    }

?>
