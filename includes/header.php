<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>SE 266</title>
  <link rel="stylesheet" type="text/css" href="../includes/styles.css">
</head>
<body>

<div class="navbar">
  <a href="../index.php">Home</a>

  <div class="dropdown">
    <button class="dropbtn" onclick="dropDown()">Assignments
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content" id="myDropdown">
      <a href="../w1/index.php">Assignment 1</a>
      <a href="../w2/index.php">Assignment 2</a>
      <!--
      <a href="../w3/index.php">Assignment 3</a>
      <a href="../w4/index.php">Assignment 4</a>
      <a href="../w5/index.php">Assignment 5</a>
      <a href="../w6/index.php">Assignment 6</a>
      <a href="../w7/index.php">Assignment 7</a>
      <a href="../w8/index.php">Assignment 8</a>
      <a href="../w9/index.php">Assignment 9</a>
      <a href="../w10/index.php">Assignment 10</a> 
-->
    </div>
  </div> 

  <a href="https://github.com/DriscollDev/CDriscoll-SE266">My GitHub Repo</a>
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