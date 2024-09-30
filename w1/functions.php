<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Functions</title>
</head>
<!-- This is a simple PHP script to display a task -->
<body>
    <?php

    function dd($data) {
        echo '<pre>';
        die(var_dump($data));
        echo '</pre>';
    }

    $task = [
        'title' => 'Finish homework',
        'due' => 'today',
        'assigned_to' => 'John',
        'completed' => false
    ];
    $title = 'Task';
    ?>
    <h1><?php echo $title; ?></h1>
    
    <?php
    dd($task);
    ?>
</body>
</html>