<?php
// connect to the database
include "../../config/conn.php";

$id = $_GET['id'];

// update the corresponding record in the database
$sql = "UPDATE request SET state = 100 WHERE id_req = $id";
mysqli_query($conn, $sql);

$sql2 = "SELECT * FROM request WHERE id_req = $id";
$result2 = mysqli_query($conn, $sql2);
$row = mysqli_fetch_assoc($result2);
$str_date = $row['str_date'];
$end_date = $row['end_date'];
$idst = $row['id_student'];
$link = "acc.php";
$reason = "Your request has been accepted by the internship manager. Please note that the requests for that period have been directly refused.";

$sql4 = "INSERT INTO student_notif (idst, idreq, link, message) VALUES ('$idst', '$id', '$link', '$reason')";
$result4 = mysqli_query($conn, $sql4);

$sql3 = "UPDATE request SET state = 0 WHERE str_date BETWEEN '$str_date' AND '$end_date' AND id_student = '$idst' and state is null or state = 50";
mysqli_query($conn, $sql3);

header("Location: ../request.php");
exit();
?>
