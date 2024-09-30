<?php
$stuff = true;
$stuff = 10;
$stuff = array('rocks', 'is cool', 'stinks');


$title = 'Opinions on things';


$myList = array('Chicken', 'fish', 'rice', 'steak', 'soda');
$myListLength = count($myList);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title; ?></title>
    </head>
    <body>
        <h1><?php echo $title; ?></h1>
        
        <ul>   
        <?php for ($index = 0; $index < $myListLength; $index++) 
        { ?>
            <li><?php echo $myList[$index] . " " . $stuff[rand(0, 2)] ?> </li>    
        <?php } ?>
        </ul> 
               
        
    </body>
</html>