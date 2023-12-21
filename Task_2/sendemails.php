<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send mail</title>
</head>

<body>
    <form method="post">
        <div>

            <div>
                <label for="">Email:</label>
                <input type="text" name="email">
            </div>
            <div>
                <label for="">Subject:</label>
                <input type="text" name="subject" id="">
            </div>
            <div>
                <label for="">Messages:</label>
                <input type="text" name="message" id="">

            </div>


            <div>
                <button type="submit" name="send" value="submit">submit</button>

            </div>
        </div>

    </form>
</body>

</html>

<?php
if (isset($_POST['send'])){


$to_email =$_POST['email'];
$subject = $_POST['subject'];;
$body =$_POST['message'];
$headers = "From: shibukumari822@gmail.com";


$retval =mail($to_email, $subject, $body, $headers);

if( $retval == true ) {

    echo "Message sent successfully...";
}
else {

echo "Message could not be sent...";
}

}
?>