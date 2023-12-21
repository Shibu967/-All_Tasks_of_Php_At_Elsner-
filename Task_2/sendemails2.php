<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send mail</title>

    <style type="text/css">
    .container {
        left: 25%;
        padding: 100px;

        display: inline-block;
        border: 1px solid green;

    }

    input[type=text] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
    }

    input[type=email] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
    }

    input[type=textarea] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
    }

    input[type=submit] {
        width: 100%;
        background-color: #787C7F;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #B8CAC7;
    }

    div {
        border-radius: 5px;
        background-color: #D7CFCE;
        padding: 20px;
    }
    </style>
</head>

<body>
    <div class="container">
        <form method="post">

            <div class="first">
                <label for="">Enter Name</label><br>
                <input type="text" name="name" id="" placeholder="Enter Name">
            </div>
            <div>
                <label for="">Enter Phone No.</label>
                <input type="text" name="number" id="" placeholder="Enter Phone No.">
            </div>


            <div>
                <label for="">Enter Email Address</label>
                <input type="email" name="email" id="" placeholder="Enter Email Address">
            </div>
            <div>
                <label for="">Enter Subject</label>
                <input type="text" name="subject" id="" placeholder="Enter Subject">
            </div>
            <div>
                <label for=""> Enter Messages</label><br>
                <textarea name=" message" id="" cols="50" rows="5" placeholder="Enter Messages"></textarea>

            </div>


            <div>
                <input type="submit" name="send" value="Submit">

            </div>
    </div>

    </form>
</body>

</html>

<?php




if (isset($_POST['send'])){
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $msg = $_POST['message'];
    $headers = "From: shibukumari822@gmail.com";

    $message =" $name . $msg . $number";


// $to_email =$_POST['email'];
// $subject = $_POST['subject'];;
// $body =$_POST['message'];
// $headers = "From: shibukumari822@gmail.com";


$retval =mail( $email,$subject,$message,$headers);

if( $retval == true ) {

    echo "Message sent successfully...";
}
else {

echo "Message could not be sent...";
}

}
?>