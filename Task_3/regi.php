<?php
// Start the session
session_start();
include 'conn.php';

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

<?php
include 'conn.php';
if(isset($_POST['submit'])) {
    $username =mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password =mysqli_real_escape_string($conn,$_POST['password']);
    $cpassword= mysqli_real_escape_string($conn,$_POST['cpassword']);
    // $user_type = mysqli_real_escape_string($conn,$_POST['user_role']);

    $pass=password_hash($password,PASSWORD_BCRYPT,);// FOR THE PASSWORD TO ENCRYPTION 
    $cpass=password_hash($cpassword,PASSWORD_BCRYPT,);
     
    $emailquery=" select * from regis where email='$email'";
    $query=mysqli_query($conn, $emailquery);
    $emailcount=mysqli_num_rows($query);
    if($emailcount>0) {

        // echo "email already exists";
        $_SESSION['status']="email already exists";
        header('location: regi.php');

}
else{
    if($password===$cpassword){
        if($user_type = $_POST['user_role']){
                $query = "INSERT INTO regis (name, email,password,cpassword,role)  
            VALUES('$username','$email','$pass','$cpass','$user_type')";
                mysqli_query($conn, $query);
                // echo 'alert("New admin successfully created!!")';
            $_SESSION['status']="$username(admin registered successfully)";
            header('location: home.php');
            } 
            else
             {
                $query = "INSERT INTO regis (name, email, password,cpassword,role) 
            VALUES('$username','$email','$pass','$cpass','$user_type')";
                mysqli_query($conn, $query);
                $_SESSION['status']=" $username.(user registered successfully)";
                header('location: login.php');
                // echo "<script>alert('New user successfully created!!');</script>";
             }
           
            // $query2=mysqli_query($conn, $insertquery2);

    //     $insertquery=" insert into regis(name,email,,password,cpassword) values('$username','$email','$pass','$cpass','$role')";
    //   $iquery=mysqli_query($conn, $insertquery);
    //   if() {
    //     echo "success";
    //   }else{
    //     echo "error";
    //   }
         }else{
        // echo "password does not match";
        $_SESSION['status']="password does not match";
        header('location: regi.php');

    }

}
}

?>




<html>

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

<!-- <body>
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <form method="POST" action="">

        <div class="container">
            <div><input name="name" class="form control" placeholder="Full name" type="text" required></div>
            <div><input name="email" class="form control" placeholder="Email Address" type="email" required></div>
            <div><input name="password" class="form control" placeholder="Create a password" type="password" required>
            </div>
            <div><input name="cpassword" class="form control" placeholder="Repeat a password" type="password" required>
            </div>
            <div class="form-group">
                <label for="">Role -> </label>
                <select name="user_role" class="form-control" required>
                    <option selected required>Select the Role</option>
                    <option value="0" name="user">Customer</option>
                    <option value="1" name="admin">Admin</option>
                </select>
            </div>
            <div>
                <button type="submit" name="submit">Create Account</button>
                <p class="text-center">Have an account?<a href="login.php">Log in</a></p>
            </div>
        </div>
    </form> -->

<body>
    <html>
    <div class="container">
        <form method="POST" action="" style="max-width:500px;margin:auto">
            <div class="shibu">
                <h2>Register</h2>
            </div>
            <!-- <h2 style="text-align: center;">Register</h2> -->
            <div>

                <div class="input-container">
                    <i class="fa fa-user icon"></i>
                    <input class="input-field" type="text" placeholder="Username" name="name" required>
                </div>

                <div class="input-container">
                    <i class="fa fa-envelope icon"></i>
                    <input class="input-field" type="email" placeholder="Email" name="email" required>
                </div>

                <div class="input-container">
                    <i class="fa fa-key icon"></i>
                    <input class="input-field" type="password" placeholder="Password" name="password" required>
                </div>
                <div class="input-container">
                    <i class="fa fa-key icon"></i>
                    <input class="input-field" type="password" placeholder="Repeat Password" name="cpassword" required>
                </div>
                <div class="input-container">
                    <!-- <label for="">Role</label> -->
                    <select name="user_role" class="input-field" required>
                        <option class="input-field" selected required>Select the Role</option>
                        <option value="0" name="user">Customer</option>
                        <option value="1" name="admin">Admin</option>
                    </select>
                </div>
                <div>
                    <button type="submit" name="submit" class="btn">Create Account</button>
                    <p style="color:#ff6600;">Have an account?<a href="login.php">Log in</a></p>
                </div>
            </div>
        </form>

</body>

</html>