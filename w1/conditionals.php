<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conditionals</title>
</head>
<!-- This is a simple PHP script to display a task -->
<body>
    <?php
    $task = [
        'title' => 'Finish homework',
        'due' => 'today',
        'assigned_to' => 'John',
        'completed' => false
    ];
    $title = 'Task';
    ?>
    <h1><?php echo $title; ?></h1>
    <ul>   
        <li>
            <strong>Name: </strong> <?php echo $task['title']; ?>
        </li>
        <li>
            <strong>Due Date: </strong> <?php echo $task['due']; ?>
        </li>
        <li>
            <strong>Person Responsible: </strong> <?php echo $task['assigned_to']; ?>
        </li>
        <li>
            <strong>Status: </strong> <?php echo $task['completed'] ? 
            '<span class="icon">&#9989;</span>' : '<span class="icon">&#10060;</span> '; ?>
        </li>
    </ul>
</body>
</html>