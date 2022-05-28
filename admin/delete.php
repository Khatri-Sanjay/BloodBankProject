<?php

    include "../connection/config.php";

    session_start();
    
    if(!isset($_SESSION['username']))
    {
        // not logged in
        header('Location: ../login.php');
        exit();
    }


    $id = $_GET['id'];

    $deleteQuery = "DELETE FROM donorhistory WHERE id='$id'";

    echo $deleteQuery;

    if(mysqli_query($conn,$deleteQuery)){

        header("location:admindonorHistory.php");

        $_SESSION['success'] = "--- Donor Information deleted succedfully ---";
        // echo "delete";

    } else{

        $_SESSION['success'] = "Unable to delete data";
        // echo "unable to delete";
    }


?>