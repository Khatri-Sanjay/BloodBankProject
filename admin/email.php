<?php
    $to = "khatrisanjay804@gmial.com";
    $subject = "My subject";
    $txt = "Hello world!";
    $headers = "From: khatrisanjay804@gmail.com";

    if(mail($to,$subject,$txt,$headers)){
        echo "Email successfully sent to $to_email...";
    } else {
        echo "Email sending failed...";
    }
?>