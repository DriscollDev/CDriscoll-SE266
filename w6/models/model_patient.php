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

    function getPatient($id){
        global $db;
        $results = [];
        $stmt = $db->prepare('SELECT id, patientFirstName, patientLastName, patientMarried, patientBirthDate FROM patients WHERE id = :id');
        $binds = array(':id' => $id);
        if($stmt->execute($binds) && $stmt->rowCount() > 0){
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        return $results;
    }
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

    function updatePatient($id, $fN, $lN, $m, $bD){
        global $db;
        $stmt = $db->prepare('UPDATE patients SET patientFirstName = :fName, patientLastName = :lName, patientMarried = :married, patientBirthDate = :birthDate WHERE id = :id');
        $binds = array(
                ':id' => $id,
                ':fName'=> $fN,
                ':lName'=> $lN,
                ':married'=> $m,
                ':birthDate'=> $bD);
        if($stmt->execute($binds) && $stmt->rowCount() > 0){
            return true;
        }
        return false;
    }

    function deletePatient($id){
        global $db;
        $stmt = $db->prepare('DELETE FROM patients WHERE id = :id');
        $binds = array(':id' => $id);
        if($stmt->execute($binds) && $stmt->rowCount() > 0){
            return true;
        }
        return false;
    }
    //$patients = getAllPatients();
    //var_dump($patients);
?>
