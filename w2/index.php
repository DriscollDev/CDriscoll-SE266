<?php 
include "../includes/header.php";


$firstName = '';
$lastName = '';
$married = False;
$birthDate = '';
$height = '';
$weight = 0;
$error = '';
$feet = 0;
$inches = 0;

$age = 0;
$bmi = 0;
$bmiClassification = ''; 

/*
When the form is submitted, you must validate for:

    First name cannot be an empty string
    Last name cannot be an empty string
    A selection must be made for the Married field
    Birth date must be a valid date
    Height must be a valid number 
        (No negative heights or mega-giants)
    Weight must be a valid number
        (No negative weights or unrealistically heavy weights)


*/

if (isset($_POST['patient_submit'])){
    //First Name Validation
    if(filter_input(INPUT_POST, 'firstName') != ''){
        $firstName = filter_input(INPUT_POST, 'firstName');
    }
    else{
        $error .= 'Must enter a valid first name <br/>';
    }
    //Last Name Validation
    if(filter_input(INPUT_POST, 'lastName') != ''){
        $lastName = filter_input(INPUT_POST, 'lastName');
    }
    else{
        $error .= 'Must enter a valid last name <br/>';
    }
    //Marriage Status
    $married = filter_input(INPUT_POST, 'married');
    //Birth Date Input
    $birthDate = filter_input(INPUT_POST, 'birthDate');
    //Height Validation
    if(filter_input(INPUT_POST, 'feet', FILTER_VALIDATE_INT)){
        $feet = filter_input(INPUT_POST, 'feet', FILTER_VALIDATE_INT);
        $height = $feet . ' ft ';
    }
    else{
        $error .= 'height (ft) is not a valid number <br/>';
    }
    if(filter_input(INPUT_POST, 'inches', FILTER_VALIDATE_INT)){
        $inches = filter_input(INPUT_POST, 'inches', FILTER_VALIDATE_INT);
        $height .= $inches . ' in';
    }
    else{
        $error .= 'height (in) is not a valid number <br/>';
    }
    //Weight Validation
    if(filter_input(INPUT_POST, 'weight', FILTER_VALIDATE_FLOAT)){
        $weight = filter_input(INPUT_POST, 'weight', FILTER_VALIDATE_FLOAT);
    }
    else{
        $error .= 'weight is not a valid number <br/>';
    }

    if(empty($error)){
        $age = date_diff(date_create($birthDate), date_create('now'))->y;
        $kgs = $weight * 0.453592;
        $meters = ($feet * 12 + $inches) * 0.0254;
        $bmi = $kgs / ($meters * $meters);
        if($bmi < 18.5){
            $bmiClassification = 'Underweight';
        }
        elseif($bmi >= 18.5 && $bmi < 24.9){
            $bmiClassification = 'Normal Weight';
        }
        elseif($bmi >= 25 && $bmi < 29.9){
            $bmiClassification = 'Overweight';
        }
        elseif($bmi >= 30){
            $bmiClassification = 'Obese';
        }
    }
    else{
        $error .= 'Please correct the errors above';
    }

}
?>
<style>
    .hide{
        display: none;
    }
</style>
<h1>Patient Intake Form</h1>
<div class="form-wrapper">

    <form name="patientIntake" method="post">
        
        <div class="form-control">
            <label for="firstName">First Name:</label><br/>
            <input type="text" id="firstName" name="firstName" value="<?= $firstName; ?>">
        </div>

        <div class="form-control">
            <label for="lastName">Last Name:</label><br />
            <input type="text" name="lastName" value="<?= $lastName; ?>">
        </div>

        <div class="form-control">
            <label for="married">Married?:</label><br />
            <input type="checkbox" name="married" value=true <?= $married ? 
            'checked' : ''; ?>>
        </div>

        <div class="form-control">
            <label for="birthDate">Date of Birth:</label><br />
            <input type="date" name="birthDate" value="<?= $birthDate; ?>">
        </div>

        <div class="form-control">
            <label for="height">Height:</label><br />
            <input type="number" name="feet" value="<?= $feet; ?>" min="0" max="9"> feet
            <input type="number" name="inches" value="<?= $inches; ?>" min="0" max="11"> inches
        </div>

        <div class="form-control">
            <label for="weight">Weight (in Pounds):</label><br />
            <input type="number" step="0.1" name="weight" value="<?= $weight; ?>">
        </div>

        <div class="form-submit">
            <input type="submit" name="patient_submit" value="Submit">
        </div>

    </form>

</div>

<div>
<p style="color: red;"><?= $error; ?></p>


<div id="confirm" class="<?= empty($error) & isset($_POST['patient_submit']) ? '' : 'hide' ?>">
    <h2>Form Results</h2>
    <p>Name: <?= $firstName . ' ' . $lastName ?></p>
    <p>Married: <?=  $married ? 
                'True' : 'False'; ?></p>
    <p>Birth Date: <?= date_format(date_create($birthDate),'m-d-Y'); ?></p>
    <p>Height: <?= $height; ?></p>
    <p>Weight: <?= $weight; ?></p>
    <p>Age: <?= $age;?> </p>
    <p>BMI: <?= round($bmi,2);?></p>
    <p>BMI Classification: <?= $bmiClassification;?></p>


</div>
<?php include "../includes/footer.php" ?>