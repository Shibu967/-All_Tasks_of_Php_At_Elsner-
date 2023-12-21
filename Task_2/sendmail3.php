<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send mail</title>
</head>

<body>
    <form method="post" enctype="multipart/form-data">
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
                <label for=""> Enter Messages</label><br>
                <textarea name=" message" id="" cols="50" rows="5" placeholder="Enter Messages"></textarea>

            </div>


            <div>
                <input type="file" name="image" id="" /><br><br>
                <button type="submit" name="send" value="submit">submit</button>

            </div>
        </div>

    </form>
</body>

</html>

<?php

if (isset($_POST['send'])){

$file_name=$_FILES['image']['name'];
$file_size=$_FILES['image']['size'];
$file_tmp=$_FILES['image']['tmp_name'];
$file_type=$_FILES['image']['type'];

if (move_uploaded_file($_FILES['image']['tmp_name'],$file_name)){

    echo "The file named:".$_FILES['image']['name']." has been uploaded";
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




}




?>