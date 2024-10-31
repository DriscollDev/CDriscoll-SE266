<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <title>Patients</title>
</head>
<body>

    <div class="container">
        
                
     <div class="col-sm-12">
        <h1>Patients</h1>
       
        <a href="./patientDetails.php">Add New Patient</a>

   
    <?php
        
        include './models/model_patient.php';
        
        
        
        $patients = getAllPatients ();
        
        
    ?>
  
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
            ?>
                <tr>
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