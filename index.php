<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="includes/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="includes/cards.css">
</head>
<body>
<div class="navbar">

  <div class="dropdown">
    <button class="dropbtn" onclick="dropDown()">Assignments
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content" id="myDropdown">
      <a href="w1/index.php">Assignment 1</a>
      <a href="w2/index.php">Assignment 2</a>
      <a href="w3/index.php">Assignment 3</a>
      <a href="w4/index.php">Assignment 4</a>
      <a href="w5/index.php">Assignment 5</a>
      <a href="w6/index.php">Assignment 6</a>
      <a href="w7/index.php">Assignment 7</a>
      <a href="w8/index.php">Assignment 8</a>
      <a href="w9/index.php">Assignment 9</a>
      <a href="w10/index.php">Assignment 10</a>
    </div>
  </div> 

  <a href="https://github.com/DriscollDev/CDriscoll-SE266">My GitHub Repo</a>
</div>
<h1>Conor Driscoll's PHP Class Repo</h1>
<hr>
    <div class="row">

        <div class="column">
            <div class="card">
                <h3>PHP Resources</h3>
                <a href="https://www.php.net/docs.php">PHP Docs</a>
                <br>
                <a href="https://www.w3schools.com/php/">W3 Schools</a>
                <br>
                <a href="https://www.killerphp.com/tutorials/object-oriented-php/">Killer PHP</a>
                <p></p>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <h3>Git Resources</h3>
                    <a href="https://docs.github.com/en/get-started/getting-started-with-git">Github</a>
                    <br>
                    <a href="https://git-scm.com/">Official Git Site</a>
                    <br>
                    <a href="https://learngitbranching.js.org/">Git Branching</a>
                    <p></p>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <h3>Things I Like</h3>
                <p>Dungeons and Dragons <br> Magic the Gathering <br> Video Games</p>
            </div>
        </div>

    </div>

    <script>
        /* When the user clicks on the button, 
        toggle between hiding and showing the dropdown content */
        function dropDown() {
        document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(e) {
        if (!e.target.matches('.dropbtn')) {
        var myDropdown = document.getElementById("myDropdown");
            if (myDropdown.classList.contains('show')) {
            myDropdown.classList.remove('show');
            }
        }
        }
    </script>
<?php include "includes/footer.php" ?>