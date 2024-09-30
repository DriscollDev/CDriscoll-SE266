<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fizz Buzz</title>
</head>
<body>
    <?php
    /*  Return Fizz Buzz if multiple of 2 and 3 (6)
        Return Fizz if multiple of 2
        Return Buzz if multiple of 3
        Return $num otherwise*/
    function fizzBuzz($num) 
    {
        $return = '';
        if($num % 2 == 0){
            $return .= 'Fizz';
        }
        if($num % 3 == 0){
            $return .= ' Buzz';
        } 
        if($return == ''){
            $return = $num;
        }
        return $return;
    }
    ?>

    <h1>Fizz Buzz</h1>
    <ul>
        <?php
        for($i = 1; $i <= 100; $i++){
            echo '<li>'  . fizzBuzz($i) . '</li>';
        }
        ?>
</body>
</html>