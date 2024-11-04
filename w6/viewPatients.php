<?php
    session_start();

    include("../includes/header.php");
    include './models/model_patient.php';
    $patients = getAllPatients ();
    
    $patientFName = '';
    $patientLName = '';
    $patientmarried = '';

    if(isset($_POST['searchPatients'])){
        $patientFName = filter_input(INPUT_POST,'fName');
        $patientLName = filter_input(INPUT_POST,'lName');
        $patientmarried = filter_input(INPUT_POST,'married');
        
        $patients = searchPatients($patientFName, $patientLName, $patientmarried);
    }
    ?>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<body>

    <div class="container">

        <div class="wrapper">
            <?php if(isset($_SESSION['isLoggedIn'])): ?>
                <a href="logoff.php">Log Out</a>
            <?php else: header('Location: index.php');?>?>
            <?php endif; ?>
        </div>  

    <div class="col-sm-12">
        <h1>Patients</h1>

        <form method="POST" name="searchTeams">
            <div class="wrapper" style="
                                    display: flex; 
                                    align-items: 
                                    center;padding: 2rem 0; 
                                    margin: 2rem 0; 
                                    justify-content: space-evenly; 
                                    background-color: lightgrey; 
                                    border-radius: 2rem;">
                <div class="form-group">
                    <div class="label">
                        <label for="fName" style="color: black;">First Name:</label>
                    </div>
                    <div>
                        <input type="text" id="fName" name="fName" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="label">
                        <label for="lName" style="color: black;">Last Name:</label>
                    </div>
                    <div>
                        <input type="text" id="lName" name="lName" class="form-control" />
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-4">Marital Status:</label> 
                    <div class="col-8">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input name="married" id="married_0" type="radio" class="custom-control-input" value="true"> 
                            <label for="married_0" class="custom-control-label">Married</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input name="married" id="married_1" type="radio" class="custom-control-input" value="false"> 
                            <label for="married_1" class="custom-control-label">Not Married</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input name="married" id="married_2" type="radio" class="custom-control-input" value=""> 
                            <label for="married_2" class="custom-control-label">No Search</label>
                        </div>
                    </div>
                </div> 
               
                <div>
                    &nbsp;
                </div>
                <div>
                    <input class="btn btn-dark" type="submit" name="searchPatients" value="Search" style="margin-top: 0.5rem;"/>
                </div>  

            </div>
        </form>
        <a href="./patientDetails.php?action=Add">Add New Patient</a>

    <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Married</th>
                    <th>Birth Date</th>
                </tr>
            </thead>
            <tbody>
           
            <?php foreach ($patients as $p):
?>              <tr>
                    <td>
                        <form action='index.php' method='post'>
                            <input type="hidden" name="patientId" value="<?= $p['id'];?>"/>
                            <?= $p['id']; ?>
                        </form>
                    </td>
                    <td><?= $p['patientFirstName'] . ' ' . $p['patientLastName']; ?></td>
                    <td><?= $p['patientMarried']  ? 
                        'True' : 'False'; ?></td> 
                    <td><?= $p['patientBirthDate']; ?></td> 
                    <td><a href="patientDetails.php?action=Update&patientId=<?=$p['id']; ?>">Edit</a></td>   
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <br />
        <a href="./patientDetails.php">Add New Patient</a>
    </div>
    </div>
</body>
</html>


<?php include("../includes/footer.php"); ?>