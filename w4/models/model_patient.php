<?php
    include (__DIR__ . '/db.php');

    function getAllPatients(){
        global $db;
        $results = [];
        $stmt = $db->prepare('SELECT id, patientFirstName, patientLastName, patientMarried, patientBirthDate FROM patients');
        if( $stmt->execute() && $stmt->rowCount() > 0){
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return $results;
    }

    function getPatient($id){}
    function addPatient($fN, $lN, $m, $bD){
        global $db;
        $stmt = $db->prepare('INSERT INTO patients SET patientFirstName = :fName, patientLastName = :lName, patientMarried = :married, patientBirthDate = :birthDate');
        $binds = array(
                ':fName'=> $fN,
                ':lName'=> $lN,
                ':married'=> $m,
                ':birthDate'=> $bD);
        if($stmt->execute($binds) && $stmt->rowCount() > 0){
            $results = 'Data Added';
        }
        return($results);
    }
    //$patients = getAllPatients();
    //var_dump($patients);
?>
