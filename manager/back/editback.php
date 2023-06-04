<?php
include "../../config/conn.php";
session_start();

$img_folder = '../img/';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fname = $_POST['fname'];
    $comp = $_POST['company'];
    $email = $_SESSION['emailm'];

    if (isset($_FILES['pp']['name']) && !empty($_FILES['pp']['name'])) {
        $img_name = $_FILES['pp']['name'];
        $tmp_name = $_FILES['pp']['tmp_name'];
        $error = $_FILES['pp']['error'];

        if ($error === 0) {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_to_lc = strtolower($img_ex);

            $allowed_exs = array('jpg', 'jpeg', 'png');
            if (in_array($img_ex_to_lc, $allowed_exs)) {
                $new_img_name = uniqid($fname, true) . '.' . $img_ex_to_lc;
                $img_upload_path = $img_folder . $new_img_name;

                if (!is_dir($img_folder)) {
                    mkdir($img_folder);
                }

                $old_pp = $_SESSION['pm'];
                if (!empty($old_pp)) {
                    $old_pp_des = $img_folder . $old_pp;
                    if (unlink($old_pp_des)) {
                        // Image deleted successfully
                    } else {
                        // Failed to delete image or already deleted
                    }
                }

                move_uploaded_file($tmp_name, $img_upload_path);

                $sql = "UPDATE manager SET name_manager='$fname', company_manager='$comp', profile_manager='$new_img_name' WHERE email_manager='$email'";

                $result = mysqli_query($conn, $sql);

                if ($result) {
                    $sql2 = "SELECT * FROM manager WHERE email_manager='$email'";
                    $result2 = mysqli_query($conn, $sql2);

                    if (mysqli_num_rows($result2) === 1) {
                        $row = mysqli_fetch_assoc($result2);
                        $_SESSION['idm'] = $row['id_manager'];
                        $_SESSION['namem'] = $row['name_manager'];
                        $_SESSION['emailm'] = $row['email_manager'];
                        $_SESSION['pm'] = $row['profile_manager'];
                        $_SESSION['companym'] = $row['company_manager'];
                        header("Location: ../index.php?flsql2");
                        exit();
                    } else {
                        header("Location: ../index.php?flsql3");
                        exit();
                    }
                } else {
                    header("Location: ../index.php?flsql3");
                    exit();
                }
            } else {
                header("Location: ../index.php?error=You can't upload files of this type");
                exit();
            }
        } else {
            header("Location: ../index.php?error=Unknown error occurred!");
            exit();
        }
    } else {
        $sql = "UPDATE manager SET name_manager='$fname', company_manager='$comp' WHERE email_manager='$email'";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            $sql2 = "SELECT * FROM manager WHERE email_manager='$email'";
            $result2 = mysqli_query($conn, $sql2);

            if (mysqli_num_rows($result2) === 1) {
                $row = mysqli_fetch_assoc($result2);
                $_SESSION['idm'] = $row['id_manager'];
                $_SESSION['namem'] = $row['name_manager'];
                $_SESSION['emailm'] = $row['email_manager'];
                $_SESSION['pm'] = $row['profile_manager'];
                $_SESSION['companym'] = $row['company_manager'];
                header("Location: ../index.php?flsql2");
                exit();
            } else {
                header("Location: ../index.php?flsql3");
                exit();
            }
        } else {
            header("Location: ../index.php?flsql3");
            exit();
        }
    }
} else {
    header("Location: ../index.php?error=Error");
    exit();
}
?>
