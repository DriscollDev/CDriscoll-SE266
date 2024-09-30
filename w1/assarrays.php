<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<!-- This is a simple PHP script to display a task -->
<body>
    <?php
    $task = [
        'title' => 'Finish homework',
        'due' => 'today',
        'assigned_to' => 'John'
    ];
    $title = 'Task';
    ?>
    <h1><?php echo $title; ?></h1>
    <ul>   
        <?php foreach ($task as $key => $value) { ?>
            <li><strong><?php echo ($key); ?></strong> <?php echo $value; ?> </li>    
        <?php } ?>
    </ul>
</body>
</html>