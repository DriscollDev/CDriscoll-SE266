<?php   
    include("../includes/header.php");
    include("./models/model_patient.php");

$firstName = '';
$lastName = '';
$married = false;
$birthDate = '';
$error = '';

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
    if($error == ''){
        $results = addPatient($firstName, $lastName, $married ? 1 : 0 , $birthDate);
        header('Location: ./viewPatients.php');
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

    <form name="patientConfirm" method="post">

        <div class="form-submit">
            <input type="submit" name="patient_confirm" value="confirm">
        </div>

    </form>
</div>
<?php include "../includes/footer.php" ?>