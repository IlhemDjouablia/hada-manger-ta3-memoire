<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the values from the form
    $attendance = $_POST['attendance'];
    $id = $_POST['id'];
    $date = $_POST['date'];

    // Include the database connection file
    include('../../config/conn.php');

    // Loop through the attendance values and insert them into the att table
    foreach ($attendance as $key => $value) {
        $state = $value;
       
        $idatt = $_POST['id_att'][$key]; // Retrieve the corresponding idst value

        // Insert the values into the att table
        $sql = "UPDATE `att` SET `state`='$state' WHERE id_att = '$idatt'";
        if (!mysqli_query($conn, $sql)) {
        //     $sql2 = "SELECT * FROM att WHERE id_att='$idatt'";
		// $result2 = mysqli_query($conn, $sql2);
          
        // $row = mysqli_fetch_assoc($result2);
        // $id=$row['intern_name'];
        // $date=$row['date'];


            header("Location: ../att.php?id=$id&date=$date");
            exit();
        }
    }

    // Redirect to the success page after inserting all the values
    header("Location: ../attupdate.php?id=$id&date=$date");
    exit();

    // Close the database connection
    mysqli_close($conn);
}
?>
