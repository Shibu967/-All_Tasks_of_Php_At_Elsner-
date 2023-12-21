<?php
session_start();
?>

<?php 
    if(isset($_SESSION['status'])){
        $message = $_SESSION['status'];
        unset($_SESSION['status']);
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <samp>'.$message.'</samp>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>'; 
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
    body {
        background: url(http://wrbbradio.org/wp-content/uploads/2016/10/grey-background-07.jpg) no-repeat center fixed;
        background-size: cover;
    }

    .container {
        background: #2d3e3f;
        width: 500px;
        height: 500px;
        padding-bottom: 20px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        margin: auto;
        padding: 30px 0px 20px 100px;
        border-radius: 5px;
    }

    * {
        box-sizing: border-box;
    }

    .input-container {

        display: -ms-flexbox;
        /* IE10 */
        display: flex;
        width: 100%;
        margin-bottom: 15px;

    }

    .icon {
        padding: 10px;
        background: #ff6600;
        color: white;
        min-width: 50px;
        text-align: center;
    }

    .input-field {
        width: 50%;
        padding: 10px;
        outline: none;
    }

    .input-field:focus {
        border: 2px solid dodgerblue;
    }

    /* Set a style for the submit button */
    .btn {
        background-color: #ff6600;
        color: white;
        padding: 15px 20px;
        border: none;
        cursor: pointer;
        width: 50%;
        opacity: 0.9;
        border-radius: 100px;
    }

    .shibu {
        text-align: rad2deg;
        font-size: large;
        color: #ff6600;
    }

    .btn:hover {
        opacity: 1;
        background-color: #ff6600;
        color: white;
    }
    </style>
</head>

<body>
    <?php
    include 'conn.php';
if (isset($_POST['submit'])) {
    $email=$_POST['email'];
    $password=$_POST['password'];
    // $user_type = $_POST['user_type'];

    $email_search="select * from regis where email='$email' ";
    $query=mysqli_query($conn, $email_search);

    $email_count=mysqli_num_rows($query);

    if ($email_count) {
        $email_pass=mysqli_fetch_assoc($query);

        $db_pass=$email_pass['password'];
        $pass_decode=password_verify($password, $db_pass);

        if ($pass_decode) {
            // echo "login successful";
            // echo "<script>alert('login successful!!');</script>";
            $_SESSION['status']="login successful";
                header('location: home.php');
        }
         else {
            // echo "wrong password";
            // echo "<script>alert('wrong password!!');</script>";
            $_SESSION['status']="wrong password";
                header('location: login.php');
            
        }
    }
     else 
    {
        // echo " invalid email";
        $_SESSION['status']=" invalid email";
        header('location: login.php');
      
}

}

?>


    <html>

    <body>
        <div class="container">

            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST"
                style="max-width:500px;margin:auto">
                <div class="shibu">
                    <h1>login page</h1>
                </div>
                <div class="input-container">
                    <i class="fa fa-envelope icon"></i>
                    <input class="input-field" type="email" placeholder="Email" name="email" required>
                </div>
                <div class="input-container">
                    <i class="fa fa-key icon"></i>
                    <input class="input-field" type="password" placeholder="Password" name="password" required>
                </div>
                <!-- <div>
            <div class="input-group">
                <label>User type</label>
                <select name="user_type" id="user_type">
                    <option value=""></option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div> -->
                <div>
                    <button class="btn" type="submit" name="submit">Login now</button>
                    <p>Not Have an account?<br><a href="regi.php">Register Now </a></p>
                </div>
            </form>
        </div>
    </body>

    </html>