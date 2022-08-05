<?php
    error_reporting(E_ERROR | E_PARSE);
    // header("Location: ../mail/mail2.php")
    $to_email = gettype($_SESSION['email1']);
    $subject = "Blood Request Reject";
    $body = "Your blood request has rejected";
    $headers = "From: khatrisanjay804@gmail.com";

    if (mail($to_email, $subject, $body, $headers)) {
        // $_SESSION['msg'] ="----Email has sent succesfully----";
        echo '<script>alert("Reject Mail has sent succesfully")</script>';
        // header('Location: ../admin/mail/rejectMail.php');
    }else{
        // $_SESSION['msg'] ="----Email unable to sent----";
        echo '<script>alert("Reject Email unable sent succesfully")</script>';
    }
?>     