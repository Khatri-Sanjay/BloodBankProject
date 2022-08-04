<?php
    if(isset($_POST['btn']))
    {
        header('location: ../admin/requestInfo.php');
    }
?>

<style>
    div {
    width: 350px;
    border: 15px solid red;
    padding: 100px;
    margin-top: 140px;
    margin-left: 400px;
    box-shadow: 30px 40px #888888;
    }   
    .msg{
    /* display: flex;
    justify-content: center; */
    color: red;
    font-weight: bold;
    font-size: 30px;
    }
    button{
        font-weight: bold;
        font-size: 15px;
        color: gray;
        /* border: 10px; */
    }
</style>

<div class="msg">
    <center>
        <h3>Reject Mail has sent succesfully</h3>
        <button name="btn"><a href="../admin/requestInfo.php">OK</a></button>
    </center>

</div>


