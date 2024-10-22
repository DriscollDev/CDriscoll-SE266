<?php include("../includes/header.php"); ?>

<?php
    include "checking.php" ;
    include "savings.php" ;

    $checking = new CheckingAccount ('C123', 1000, '12-20-2019');
    $savings = new SavingsAccount ('S123', 1000, '12-20-2019');
     
    if (isset ($_POST['withdrawChecking'])) 
    {
        if(!$checking->withdrawal($_POST['checkingWithdrawAmount'])){
            echo '<div class="error">Checking withdrawal amount exceeds limit</div>';
        }
    } 
    else if (isset ($_POST['depositChecking'])) 
    {
        $checking->deposit($_POST['checkingDepositAmount']);
    } 
    else if (isset ($_POST['withdrawSavings'])) 
    {
        if(!$savings->withdrawal($_POST['savingsWithdrawAmount'])){
            echo '<div class="error">Savings withdrawal amount exceeds limit</div>';
        }
    } 
    else if (isset ($_POST['depositSavings'])) 
    {
        $savings->deposit($_POST['savingsDepositAmount']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATM</title>
    <link rel="stylesheet" href="../includes/content.css">
    <style type="text/css">
        h1 {
            text-align: center;
        }
       .wrapper {
            width: 600px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 300px 300px;
        }
        .account {
            border: 1px solid black;
            padding: 10px;
        }
        .label {
            text-align: right;
            padding-right: 10px;
            margin-bottom: 5px;
        }
        label {
           font-weight: bold;
        }
        input[type=text] {width: 80px;}
        .error {color: red;}
        .accountInner {
            margin-left:10px;margin-top:10px;
        }
    </style>
</head>
<body>
    <form method="post">  
        <h1>ATM</h1>
        <div class="wrapper">
            
            
            <div class="account">
                <?php echo $checking->getAccountDetails();?>
            </div>
            <div class="account">
                <?php echo $savings->getAccountDetails();?>
            </div>

            <div class="account">
                    
                    <div class="accountInner">
                        <input type="number" value="0" name="checkingWithdrawAmount" value="" />
                        <input type="submit" name="withdrawChecking" value="Withdraw" />
                    </div>
                    <div class="accountInner">
                        <input type="number" value="0" name="checkingDepositAmount" value="" />
                        <input type="submit" name="depositChecking" value="Deposit" /><br />
                    </div>
            
            </div>

            <div class="account">
                
                    
                    <div class="accountInner">
                        <input type="number" value="0" name="savingsWithdrawAmount" value="" />
                        <input type="submit" name="withdrawSavings" value="Withdraw" />
                    </div>
                    <div class="accountInner">
                        <input type="number" value="0" name="savingsDepositAmount" value="" />
                        <input type="submit" name="depositSavings" value="Deposit" /><br />
                    </div>
            
            </div>
        </div>
    </form>
    
</body>
</html>

<?php include("../includes/footer.php"); ?>