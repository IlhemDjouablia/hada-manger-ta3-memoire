<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the values from the form
    $attendance = $_POST['attendance'];
    $id = $_POST['id'];
    $currentDate = date("Y-m-d"); // Get the current date

    // Include the database connection file
    include('../../config/conn.php');

    // Loop through the attendance values and insert them into the att table
    foreach ($attendance as $key => $value) {
        $state = $value;
        $intern_name = $id;
        $idst = $_POST['idst'][$key]; // Retrieve the corresponding idst value

        // Insert the values into the att table
        $sql = "INSERT INTO att (id_student, date, state, intern_name) VALUES ('$idst', '$currentDate', '$state', '$intern_name')";
        if (!mysqli_query($conn, $sql)) {
            // If an error occurred during insertion, redirect with an error message
            header("Location: ../take.php?id=$id");
            exit();
        }
    }

    // Redirect to the success page after inserting all the values
    header("Location: ../attendence.php?id=$id");
    exit();

    // Close the database connection
    mysqli_close($conn);
}
?>
