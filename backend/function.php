<?php
    include('./config.php');

    if(isset($_POST["action"])){
        if($_POST["action"] == "insert"){
            insert();
        } else if($_POST["action"] == "edit"){
            edit();
        } else if($_POST["action"] == "delete"){
            delete();
        } else if ($_POST['action'] == 'update_status') {
            update_status();
        } else if ($_POST['action'] == 'login') {
            login();
        } else if ($_POST['action'] == 'signup') {
            signup();
        } else if ($_POST['action'] == 'logout') {
            logout();
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

    function update_status(){
        global $conn;

        $id = $_POST['id'];
        $status = $_POST['status'];

        $query = "UPDATE tasks SET status='$status' WHERE task_id='$id'";
        if (mysqli_query($conn, $query)) {
            echo "Status updated successfully";
        } else {
            echo "Error updating status: " . mysqli_error($conn);
        }
    }


    // User Authentication

    function signup(){
        global $conn;

        $user_name = $_POST["username"];
        $password = $_POST["password"];

        $query = "INSERT INTO users (user_name, password, status) VALUES ('$user_name', '$password', 'active')";
        mysqli_query($conn, $query);
        echo 'User created successfully!';
        exit();
    }

    function login(){
        global $conn;

        $username = $_POST["username"];
        $password = $_POST["password"];

        $query = "SELECT user_id, user_name, password FROM users WHERE user_name = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) == 0){
            echo "Invalid username or password";
        } else {
            $row = mysqli_fetch_assoc($result);

            session_start();
            $_SESSION["user"] = $row["user_name"];
            echo "Login successful!";

            // header('Location: ../frontend/pages/index.php');
            // echo '<script>window.location.href = "../frontend/pages/index.php";</script>';
            exit();
        }
    }

    function logout() {
        session_start();
        session_destroy();
        echo "Logout successful!";
    }

?>
