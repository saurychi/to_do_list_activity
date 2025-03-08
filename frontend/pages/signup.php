<?php
    include('../components/header.php');
?>
<style>
    <?php include("../css/signup.css")?>
</style>

<main>
    <form method="post">
        <h1>Sign Up</h1>
        <input type="text" id="username" name="username" placeholder="Enter username..."><br>

        <input type="email" id="email" name="email" placeholder="Enter email..."><br>

        <input type="password" id="password" name="password" placeholder="Enter password..."><br>

        <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm password..."><br>

        <br>

        <button type="button"> Sign Up </button>
        <br>
        <a href="./login.php">Already have an account?</a>
    </form>
</main>

<?php
    include('../components/footer.php'); 
?>
