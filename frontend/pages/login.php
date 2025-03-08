<?php
    include('../components/header.php');
?>
<style>
    <?php include("../css/login.css")?>
</style>

<main>
    <form method="post">
        <h1>Login</h1>
        <input type="text" id="username" name="username" placeholder="Enter username..."><br>

        <input type="password" id="password" name="password" placeholder="Enter password..."><br>

        <br>

        <button type="button" onclick="login();"> Login </button>
        <br>
        <a href="./signup.php">Don't have an account?</a>
    </form>

</main>

<?php
    include('../components/footer.php');
?>
