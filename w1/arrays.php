<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $arr = array('cat', 'dog', 'pengiun', 'bird', 'elephant');
    $title = 'Animals';
    ?>
    <h1><?php echo $title; ?></h1>
    <ul>   
    <?php for ($index = 0; $index < count($arr); $index++) { ?>
        <li><?php echo $arr[$index]?> </li>    
    <?php } ?>
    </ul> 
</body>
</html>