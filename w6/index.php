<?php
include ("../includes/header.php");
session_start();
?>
<style>
    .button {
        width: 130px;
        background-color: #333;
        text-align: center;
        color: white;
        font-family: sans-serif, serif;
        font-weight: 900;
        padding: 10px;
        border-radius: 2px;
        box-sizing: border-box;
    }

    .button:active {
        background-color: #7c7878;
        border: none;
    }
</style>
<div class="wrapper">
            <?php if(isset($_SESSION['isLoggedIn'])): ?>
                <h1>Welcome <?= ucfirst( $_SESSION['username']); ?></h1>
                <a class="button" href="viewpatients.php">View Patients</a>

                <a class="button" href="logoff.php">Log Out</a>
                
            <?php else: ?>
                <h1>Welcome</h1>
                <a class="button"  href="login.php">Log In</a>
            <?php endif; ?>
        </div>  