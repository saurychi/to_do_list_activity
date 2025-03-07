
<?php
    include('../components/header.php');
?>

<style>
    <?php include("../css/signup.css")?>
</style>

<main>
    <form method="post">
        <h1>SignUp</h1>
        <input type="text" id="username" name="username" placeholder="Enter username..."><br>

        <input type="password" id="password" name="password" placeholder="Enter password..."><br>

        <input type="password" id="repassword" name="repassword" placeholder="Re-Enter password..."><br>

        <br>

        <button type="button" onclick="signup();"> SignUp </button>
        <br>
        <a href="./login.php">Already have an account?</a>
    </form>

<main>

<?php
    include('../components/footer.php');
?>
