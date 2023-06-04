<?php
// Retrieve form data
$idreq = $_POST['idreq'];

$grade1 = $_POST['discipline'];
$grade2 = $_POST['aptitudes'];
$grade3 = $_POST['initiative'];
$grade4 = $_POST['capacites'];
$grade5 = $_POST['connaissances'];
$gradeFinale = $_POST['note_finale'];

// Include the database connection
include('../../config/conn.php');

// Perform the database update
$sql = "UPDATE `grade`
        SET `grade1` = '$grade1',
            `grade2` = '$grade2',
            `grade3` = '$grade3',
            `grade4` = '$grade4',
            `grade5` = '$grade5',
            `grade_finale` = '$gradeFinale'
        WHERE `id_req` = '$idreq'";

if ($conn->query($sql) === TRUE) {
    // Data updated successfully
    $internNameQuery = "SELECT intern_name FROM request WHERE id_req = '$idreq'";
    $result = $conn->query($internNameQuery);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $internName = $row['intern_name'];
        header("Location: ../viewgrade.php?id=$internName&idreq=$idreq");
        exit();
    } else {
        header("Location: ../viewgrade.php?id=$internName&idreq=$idreq");
        exit();
    }
} else {
    // Error in the database update
    header("Location: ../viewgrade.php?id=$internName&idreq=$idreq");
    exit();
}

$conn->close();
?>
