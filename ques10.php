<?php

use PHPMailer\PHPMailer\PHPMailer;
require 'PHPMailer/PHPMailer/src/PHPMailer.php';
require 'PHPMailer/PHPMailer/src/SMTP.php';
require 'PHPMailer/PHPMailer/src/Exception.php';

$mail = new PHPMailer;

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com'; 
$mail->SMTPAuth = true;
$mail->Username = 'anujbhatt023@gmail.com'; 
$mail->Password = 'ahhpjxcbysspuxgz'; 
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $problem = $_POST["problem"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $location = $_POST["location"];
  $phone = $_POST["phone"];
  $description = $_POST["description"];
  $notification = isset($_POST["notification"]) ? "Yes" : "No";

  $to = "anujbhatt023@gmail.com"; 
  $subject = "Sports Website Feedback";
  $message = "Problem Type: $problem\n";
  $message .= "Username: $username\n";
  $message .= "Email: $email\n";
  $message .= "Location: $location\n";
  $message .= "Phone: $phone\n";
  $message .= "Description: $description\n";
  $message .= "Notification of Problem Solved: $notification\n";
  $mail->setFrom('anujbhatt023@gmail.com', 'Anuj Bhatt');
  $mail->addAddress($to, 'Hello');

  $mail->Subject =$subject;
  $mail->Body = $message;

  if ($mail->send()) {
      echo "Email sent successfully.";
  } else {
      echo "Email sending failed. Error: " . $mail->ErrorInfo;
  }
}
?>


<?php
  // $problem = $_POST["problem"];
  // $username = $_POST["username"];
  // $email = $_POST["email"];
  // $location = $_POST["location"];
  // $phone = $_POST["phone"];
  // $description = $_POST["description"];
  // $notification = isset($_POST["notification"]) ? "Yes" : "No";

  // $to = "anujbhatt023@gmail.com"; 
  // $subject = "Sports Website Feedback";
  // $message = "Problem Type: $problem\n";
  // $message .= "Username: $username\n";
  // $message .= "Email: $email\n";
  // $message .= "Location: $location\n";
  // $message .= "Phone: $phone\n";
  // $message .= "Description: $description\n";
  // $message .= "Notification of Problem Solved: $notification\n";

  // $headers = "From: $email" . "\r\n" .
  //   "Reply-To: $email" . "\r\n" .
  //   "X-Mailer: PHP/" . phpversion();

  // if (mail($to, $subject, $message, $headers)) {
  //   echo "Thank you for your feedback! We will review your submission.";
  // } else {
  //   echo "Oops! Something went wrong. Please try again later.";
  // }

 ?>