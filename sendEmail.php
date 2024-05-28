<?php

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $visitor_email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $email_from = 'boy66929@gmail.com';
    $email_subject = 'New Form Submission, '.$subject;
    $email_body = "Name: $name.\n".
                    "Phone: $phone.\n".
                        "Email: $visitor_email.\n".
                            "Subject: $subject.\n".
                                "Message: $message.\n";

    $to = "rnbd929@gmail.com"; // Your email
    $headers = "From: $email_from \r\n";
    $headers .= "Replay-To: $visitor_email \r\n";
    // Send email
    mail($to,$email_subject,$email_body,$headers);
    // Redirect to main page
    header("Location: contact.html");

?>

<?php
    // Check for form submission
    // if(isset($_POST['submit'])){
    //     $name = $_POST['name'];
    //     $phone = $_POST['phone'];
    //     $visitor_email = $_POST['email'];
    //     $subject = $_POST['subject'];
    //     $message = $_POST['message'];

    //     $email_subject = 'New Form Submission, '.$subject;
    //     $email_body = "Name: $name.\n".
    //                     "Phone: $phone.\n".
    //                         "Email: $visitor_email.\n".
    //                             "Subject: $subject.\n".
    //                                 "Message: $message.\n";

    //     $to = "rnbd929@gmail.com"; // Your email
    //     $headers = "From: My Portfolio \r\n";
    //     $headers .= "Replay-To: $visitor_email\r\n";
    //     // Send email
    //     mail($to,$email_subject,$email_body,$headers);
    //     // Redirect to main page
    //     header("Location: contact.html");
    // }
?>

