<?php
session_start();
include('../config/dbcon.php');

if(isset($_POST['register_btn']))
{
    // Registration code...
}
else if(isset($_POST['login_btn']))
{
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $email = mysqli_real_escape_string($con, $_POST['ParentEmail']);

    // Check admin table
    $admin_login_query = "SELECT * FROM Administrator WHERE password='$password' AND email='$email'";
    $admin_login_query_run = mysqli_query($con, $admin_login_query);

    if(mysqli_num_rows($admin_login_query_run) > 0)
    {
        $_SESSION['auth'] = true;

        $admin_data = mysqli_fetch_array($admin_login_query_run);
        $admin_initials = $admin_data['Initials'];
        $admin_surname = $admin_data['Surname'];

        $_SESSION['auth_admin'] = [
            'AdminName' => "$admin_initials.$admin_surname", // Constructing the admin username
            'AdminEmail' => $email
        ];

        $_SESSION['message'] = "Welome To Admin";
        header('Location: ../admin/index.php');
    }
    else
    {
        // Check parent table
        $parent_login_query = "SELECT * FROM parent WHERE password='$password' AND ParentEmail='$email'";
        $parent_login_query_run = mysqli_query($con, $parent_login_query);

        if(mysqli_num_rows($parent_login_query_run) > 0)
        {
            $_SESSION['auth'] = true;

            $parent_data = mysqli_fetch_array($parent_login_query_run);
            $parent_username = $parent_data['ParentName'];
            $parent_email = $parent_data['ParentEmail'];

            $_SESSION['auth_user'] = [
                'ParentName' => $parent_username,
                'ParentEmail' => $parent_email
            ];

            $_SESSION['message'] = "Logged in Successfully";
            header('Location: ../index.php');
        }
        else
        {
            $_SESSION['message'] = "Invalid Credentials";
            header('Location: ../login.php');
        }
    }
}
?>
