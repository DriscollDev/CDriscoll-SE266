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

    function ofAge($data) {
        if ($data >= 21) {
            return true;
        } else {
            return false;
        }
    }

    $person1 = [
        'name' => 'John Doe',
        'age' => 23
    ];
    $person2 = [
        'name' => 'Jane Doe',
        'age' => 20
    ];
    $title = 'People';
    ?>
    <h1><?php echo $title; ?></h1>
    <h2>Person 1</h2>
    <ul>   
        <li>
            <strong>Name: </strong> <?php echo $person1['name']; ?>
        </li>
        <li>
            <strong>Age: </strong> <?php echo $person1['age']; ?>
        </li>
        <li>
            <strong>Can Drink: </strong> <?php echo ofAge($person1['age']) ? 
            '<span class="icon">&#9989;</span>' : '<span class="icon">&#10060;</span> '; ?>
        </li>
    </ul>
    <h2>Person 2</h2>
    <ul>   
        <li>
            <strong>Name: </strong> <?php echo $person2['name']; ?>
        </li>
        <li>
            <strong>Age: </strong> <?php echo $person2['age']; ?>
        </li>
        <li>
            <strong>Can Drink: </strong> <?php echo ofAge($person2['age']) ? 
            '<span class="icon">&#9989;</span>' : '<span class="icon">&#10060;</span> '; ?>
        </li>

</body>
</html>