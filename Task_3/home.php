<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

?>



<?php
// Start the session
session_start();
include 'conn.php';
?>


<?php
if (isset($_SESSION['status'])) {
    $message = $_SESSION['status'];
    unset($_SESSION['status']);
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <samp>' . $message . '</samp>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>HTML Project</title>
</head>

<body>
    <!--Start Header-->
    <table id="header" border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#f3971b">
        <tr>
            <td>
                <table border="0" width="85%" cellpadding="15" cellspacing="0" align="center">
                    <tr>
                        <td>
                            <font face="arial" color="#000000" size="5">
                                <span class="fa fa-user-circle" aria-hidden="true"></span>
                                Shibu kumari
                            </font>
                        </td>
                        <td>
                            &nbsp;
                        </td>
                        <td>
                            <a href="#home">
                                <font face="arial" color="#ffffff" size="4">Home</font>
                            </a>
                        </td>
                        <td>
                            <a href="#about">
                                <font face="arial" color="#ffffff" size="4">About</font>
                            </a>
                        </td>
                        <td>
                            <a href="regi.php">
                                <font face="arial" color="#ffffff" size="4">SignUp</font>
                            </a>
                        </td>
                        <td>
                            <a href="login.php">
                                <font face="arial" color="#ffffff" size="4">Login</font>
                            </a>
                        </td>
                        <td>
                            <a href="logout.php">
                                <font face="arial" color="#ffffff" size="4">Logout</font>
                            </a>
                        </td>

                    </tr>
                </table>
            </td>
            <table id="home" border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#292929">
                <tr>
                    <td>
                        <table border="0" width="85%" cellpadding="15" cellspacing="0" align="center">
                            <tr>
                                <td align="center" valign="middle">
                                    <h3>
                                        <font face="arial" color="#ffffff" size="6">
                                            Hi, I'm Shibu kumari
                                        </font>
                                    </h3>

                                    <h2>
                                        <font face="arial" color="#f3971b" size="7">
                                            Web developer
                                        </font>
                                    </h2>
                                </td>
                            </tr>
                        </table>
                    </td>

                </tr>
            </table>
            <table id="about" border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#292929">
                <tr>
                    <td>
                        <table border="0" width="85%" cellpadding="15" cellspacing="0" align="center">
                            <!-- Heading Start-->
                            <tr>
                                <td height="180" align="center" valign="middle" colspan="2">
                                    <font face="arial" color="#f3971b" size="6">
                                        About Me
                                    </font>
                                    <hr width="70" color="#f3971b">

                                </td>
                            </tr>
                            <!--Heading End-->
                            <tr>
                                <td width="40%">
                                <img src="service1.png" alt="Shibu kumari" width="90%" style="border-radius: 50%;">

                                </td>
                                <td width="60%">
                                    <font face="arial" color="#ffffff" size="4">
                                        <h2>
                                            I am a web developer.
                                        </h2>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora laudantium ea
                                        consequuntur nemo fugiat consequatur a ducimus amet fugit cupiditate quos
                                        placeat
                                        perferendis maiores explicabo voluptates similique nisi reiciendis, quas quis
                                        doloremque
                                        cumque, labore quo ipsum eligendi! Eius totam nemo facere nisi quas eaque
                                        corrupti
                                        voluptate esse dicta, voluptates quos odit qui eligendi est beatae impedit
                                        asperiores
                                        magnam! Eligendi officiis architecto aperiam, voluptatum iure optio debitis id
                                        nihil
                                        reprehenderit similique, esse incidunt blanditiis odio eos sequi perferendis
                                        non,
                                        repellat soluta qui asperiores! Dolorem temporibus rem aut quaerat quas fugiat
                                        reiciendis quam dicta, in a possimus est voluptates, ratione eaque amet.
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    &nbsp;
                                </td>
                            </tr>
                        </table>
                    </td>

                </tr>


            </table>