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

    $query = "SELECT * FROM donorhistory WHERE Id=$id";

    $result = mysqli_query($conn,$query);

    $row = mysqli_fetch_assoc($result);   //fetch single row

    // print_r($row);

    // exit();

?>


<?php

if(isset($_POST['submit'])) {
    $name = $_POST['Name'];
    $history = $_POST['History'];
    $email = $_POST['Email'];
    $age = $_POST['Age'];
    $bloodGroup = $_POST['BloodGroup'];
    $gender = $_POST['Gender'];
    $contact = $_POST['Contact'];
    $address = $_POST['Address'];

    $update = "UPDATE donorhistory SET Name='$name', Email='$email', BloodGroup='$bloodGroup', Gender='$gender', Contact='$contact', Address='$address', History='$history' WHERE Id=$id";

    if(mysqli_query($conn,$update)){

        $_SESSION['success'] = "--- Donor Information update succedfully ---";
        // echo '<script>alert("Update succesfully")</script>';
       
    } else {

        $_SESSION['success'] = "Unable to Update data";
        // echo '<script>alert("Unable to Update")</script>';
    }
    
    header("Location: ../admin/admindonorHistory.php");
}
?>

<?php include '../admin/adminHeader.php'?>
    <head>
        <title>Donate Blood Form</title>
    </head>

    <div class="title">
        <h1>Edit Donor History Information</h1>
    </div>

    <div style="float: left; margin-left: 70px; ">
        <button >
            <a style="text-decoration: none; font-weight: bold; color: black; font-size: 16px;" href="admindonorHistory.php">
                Back
            </a>
        </button>
    </div>

    <br>

    <center>
    <div class="container">
        <div class="content">
        <form action="" name="regForm" method="POST" onsubmit="return formValidation()">
            <div class="user-details">

            <div class="input-box">
                <span class="details">Full Name</span>
                <input type="text" placeholder="Enter your name" id="Name" name="Name" 
                value=<?php echo $row['Name']?> maxlength = "40" required>
                <span style="color:red" id="rNameErr"></span>
            </div>

            <div class="input-box">
                <span class="details">Email</span>
                <input type="email" placeholder="Enter your email" id="Email" name="Email" 
                value=<?php echo $row['Email']?> >
                <span style="color:red" id="rEmailErr"></span>
            </div>

            <div class="input-box">
                <span class="details">Phone Number</span>
                <input type="text" placeholder="Enter your number" id="Contact" name="Contact" 
                value=<?php echo $row['Contact']?> >
                <span style="color:red" id="rContactErr"></span>
            </div>

            <div class="input-box">
                <span class="details">Age</span>
                <input type="text" placeholder="Enter your age" id="Age" name="Age" 
                value=<?php echo $row['Age']?> >
                <span style="color:red" id="rAgeErr"></span>
            </div>

            <div class="input-box">
                <span class="details">History</span>
                <input type="number" placeholder="Enter donor history" id="History" name="History" 
                value=<?php echo $row['History']?> >
                <span style="color:red" id="rHistoryErr"></span>
            </div>

            <div class="input-box">
                <span class="details">Adderss</span>
                <input type="text" placeholder="Enter your address" id="Address" name="Address" 
                value=<?php echo $row['Address']?> >
                <span style="color:red" id="rAddressErr"></span>
            </div>

            <div class="input-box">
                <span class="details">Choose Blood Group</span>

                <select id="BloodGroup" name="BloodGroup" 
                value=<?php echo $row['BloodGroup']?> >

                    <option value="A+ve"
                    <?php if($row['BloodGroup'] == 'A+ve'){ 
                        ?> selected <?php
                    } ?>
                    >A+ve</option>

                    <option value="A-ve"
                    <?php if($row['BloodGroup'] == 'A-ve'){ 
                        ?> selected <?php
                    } ?>
                    >A-ve</option>

                    <option value="B+ve"
                    <?php if($row['BloodGroup'] == 'B+ve'){ 
                        ?> selected <?php
                    } ?>
                    >B+ve</option>

                    <option value="B-ve"
                    <?php if($row['BloodGroup'] == 'B-ve'){ 
                        ?> selected <?php
                    } ?>
                    >B-ve</option>

                    <option value="AB+ve"
                    <?php if($row['BloodGroup'] == 'AB+ve'){ 
                        ?> selected <?php
                    } ?>
                    >AB+ve</option>

                    <option value="AB-ve"
                    <?php if($row['BloodGroup'] == 'AB-ve'){ 
                        ?> selected <?php
                    } ?>
                    >AB-ve</option>

                    <option value="O+ve"
                    <?php if($row['BloodGroup'] == 'O+ve'){ 
                        ?> selected <?php
                    } ?>
                    >O+ve</option>

                    <option value="O-ve"
                    <?php if($row['BloodGroup'] == 'O-ve'){ 
                        ?> selected <?php
                    } ?>
                    >O-ve</option>

                </select>
                <br>
                <span style="color:red" id="rBloodGroupErr"></span>
            </div>

            <div class="input-box">
                <span class="details">Gender</span>
                <select name="Gender" id="Gender" 
                value=<?php echo $row['Gender']?> >

                    <option value="Male"
                    <?php if($row['Gender'] == 'Male'){ 
                        ?> selected <?php
                    } ?>
                    >Male</option>

                    <option value="Female"
                    <?php if($row['Gender'] == 'Female'){ 
                        ?> selected <?php
                    } ?>
                    >Female</option>

                    <option value="Others"
                    <?php if($row['Gender'] == 'Others'){ 
                        ?> selected <?php
                    } ?>
                    >Others</option>

                </select>
                <br>
                <span style="color:red" id="rGenderErr"></span>
            </div>

            </div>

            <div class="button">
                <input type="submit" class="submit" value="Submit" name="submit">
            </div>

        </form>
        </div>
    </div>
    </center>

<script src="../js/addEditValidation.js"></script>

</body>
</html>