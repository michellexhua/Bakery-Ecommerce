<?php

	
	$name = filter_input(INPUT_POST, 'name');
	$email = filter_input(INPUT_POST, 'email');
	$text = filter_input(INPUT_POST, 'message');
	$subject = filter_input(INPUT_POST, 'subject');

	$host = 'localhost';
	$dbusername = 'hua112';
	$dbpassword = 'Password!';
	$dbname = "hua112_web-based";

	// Create connection
	$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
	if (mysqli_connect_error()) {
		die("Connection failed: (" . mysqli_connect_errno() .') ' . mysqli_connect_error());
	}
	else{
		$sql = "INSERT INTO customers (name, email, subject, text)
        VALUES ('$name','$email','$subject','$text')";
        if ($conn->query($sql)){
        	echo "New record is inserted successfully!";
        }
        else{
        	echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }    

    $to = 'demo@site.com';
    $name = $_POST["name"];
    $email= $_POST["email"];
    $text= $_POST["message"];
    $subject= $_POST["subject"];
    


    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= "From: " . $email . "\r\n"; // Sender's E-mail
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    $message ='<table style="width:100%">
        <tr>
            <td>'.$name.'  '.$subject.'</td>
        </tr>
        <tr><td>Email: '.$email.'</td></tr>
        <tr><td>phone: '.$subject.'</td></tr>
        <tr><td>Text: '.$text.'</td></tr>
        
    </table>';

    if (@mail($to, $email, $message, $headers))
    {
        echo 'The message has been sent.';
    }else{
        echo 'failed';
    }

?>
