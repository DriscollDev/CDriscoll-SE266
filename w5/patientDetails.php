<?php   
    include("../includes/header.php");
    include("./models/model_patient.php");

$firstName = '';
$lastName = '';
$married = false;
$birthDate = '';
$error = '';

if(isset($_POST['patient_delete'])){

    $id = filter_input(INPUT_GET, 'patientId');
    deletePatient($id);
    header('Location: index.php');
}

if (isset($_GET['action']) && $_GET['action'] == 'Update'){
    $id = filter_input(INPUT_GET, 'patientId');
    $patient = getPatient($id);
    $firstName = $patient['patientFirstName'];
    $lastName = $patient['patientLastName'];
    $married = $patient['patientMarried'];
    $birthDate = $patient['patientBirthDate'];
}

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
        if (isset($_GET['action']) && $_GET['action'] == 'Update'){
            $results = updatePatient($id, $firstName, $lastName, $married ? 1 : 0 , $birthDate);
        }
        else{
            $results = addPatient($firstName, $lastName, $married ? 1 : 0 , $birthDate);
            
        }
        header('Location: index.php');
    }
}


?>
<style>
    .hide{
        display: none;
    }
</style>
<a href="./index.php">Go back to view</a>
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

        <div> <p> </p></div>
        <div class="form-delete <?= isset($_GET['action']) && $_GET['action'] == 'Update' ? '' : 'hide' ?>">    
            <input class="" type="submit" name="patient_delete" value="Delete" /> 
        </div>
    </form>

</div>

<div>
<p style="color: red;"><?= $error; ?></p>



<?php include "../includes/footer.php" ?>