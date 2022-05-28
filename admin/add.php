<?php
    include "../connection/config.php";
    session_start();
    if(!isset($_SESSION['username']))
    {
        // not logged in
        header('Location: ../login.php');
        exit();
    }

    
?>

    <?php
        if(isset($_POST['submit'])) {
            $name = $_POST['Name'];
            $email = $_POST['Email'];
            $age = $_POST['Age'];
            $bloodGroup = $_POST['BloodGroup'];
            $gender = $_POST['Gender'];
            $history = $_POST['History'];
            $contact = $_POST['Contact'];
            $address = $_POST['Address'];

            $insert = "INSERT INTO donorhistory (Name,Email,BloodGroup,Gender,Contact,Age,Address,History) VALUES ('$name','$email','$bloodGroup','$gender','$contact','$age','$address','$history')";

            // echo $insert;

            if(mysqli_query($conn,$insert)){
                
                header("location: admindonorHistory.php");

                $_SESSION['success'] = "--- Donor Information added succedfully ---";

                // echo '<script>alert("Donor Info Added succesfully")</script>';
                
               
            } else {

                $_SESSION['success'] = "Unable to add data";
                
                // echo "unable to insert";
            }

            
        }
    ?> 

<?php include 'adminHeader.php'?>

    <head>
        <title>Add donor information</title>
    </head>

    <div class="title">
        <h1>Add Donor Information</h1>
    </div>

    <div style="float: left; margin-left: 70px; ">
        <button>
            <a style="text-decoration: none; font-weight: bold; color: black; font-size: 16px; "href="admindonorHistory.php">
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
                <input type="text" placeholder="Enter name" id="Name" name="Name">
                <span style="color:red" id="rNameErr"></span>
            </div>

            <div class="input-box">
                <span class="details">Email</span>
                <input type="email" placeholder="Enter email" id="Email" name="Email">
                <span style="color:red" id="rEmailErr"></span>
            </div>
            
            <div class="input-box">
                <span class="details">Phone Number</span>
                <input type="text" placeholder="Enter number" id="Contact" name="Contact">
                <span style="color:red" id="rContactErr"></span>
            </div>

            <div class="input-box">
                <span class="details">Age</span>
                <input type="text" placeholder="Enter your age" id="Age" name="Age">
                <span style="color:red" id="rAgeErr"></span>
            </div>

            <div class="input-box">
                <span class="details">History</span>
                <input type="text" placeholder="Enter donate times" id="History" name="History">
                <span style="color:red" id="rHistoryErr"></span>
            </div>

            <div class="input-box">
                <span class="details">Adderss</span>
                <input type="text" placeholder="Enter your address" id="Address" name="Address">
                <span style="color:red" id="rAddressErr"></span>
            </div>

            <div class="input-box">
                <span class="details">Choose Blood Group</span>
                <select id="BloodGroup" name="BloodGroup">
                    <option value="">None</option>
                    <option value="A+ve">A+ve</option>
                    <option value="A-ve">A-ve</option>
                    <option value="B+ve">B+ve</option>
                    <option value="B-ve">B-ve</option>
                    <option value="AB+ve">AB+ve</option>
                    <option value="AB-ve">AB-ve</option>
                    <option value="O+ve">O+ve</option>
                    <option value="O-ve">O-ve</option>
                    
                </select>
                <br>
                <span style="color:red" id="rBloodGroupErr"></span>
            </div>

            <div class="input-box">
                <span class="details">Gender</span>
                <select id="Gender" name="Gender">
                    <option value="">None</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Others">Others</option>
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