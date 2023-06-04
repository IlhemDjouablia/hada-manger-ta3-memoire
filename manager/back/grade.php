<?php
// Retrieve form data
$idreq = $_POST['idreq'];
$idst = $_POST['idst'];
$grade1 = $_POST['discipline'];
$grade2 = $_POST['aptitudes'];
$grade3 = $_POST['initiative'];
$grade4 = $_POST['capacites'];
$grade5 = $_POST['connaissances'];
$gradeFinale = $_POST['note_finale'];

// Include the database connection
include('../../config/conn.php');

// Perform the database insert
$sql = "INSERT INTO `grade`(`id_req`, `id_student`, `grade1`, `grade2`, `grade3`, `grade4`, `grade5`, `grade_finale`) 
        VALUES ('$idreq','$idst','$grade1','$grade2','$grade3','$grade4','$grade5','$gradeFinale')";

if ($conn->query($sql) === TRUE) {
    // Data inserted successfully
    $internNameQuery = "SELECT intern_name FROM request WHERE id_req = '$idreq'";
    $result = $conn->query($internNameQuery);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $internName = $row['intern_name'];
        header("Location: ../grades.php?id=$internName");
        exit();
    } else {
        header("Location: ../grade.php?idreq=$idreq&idst=$idst");
        exit();
    }
} else {
    // Error in the database insert
    header("Location: ../grade.php?idreq=$idreq&idst=$idst");
    exit();
}

$conn->close();
?>
