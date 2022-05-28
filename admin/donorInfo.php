<?php

    session_start();
    if(!isset($_SESSION['username']))
    {
        // not logged in
        header('Location: ../login.php');
        exit();
    }
?>

<?php include ('adminHeader.php')?>

    <head>
        <title>Blood Donor Info</title>
    </head>

    <div class="title">
        <h1>Blood Donor Information</h1>
    </div>

    <div class="search" style="display: inline-block;float: right; margin-right: 100px;">
        <h4>Search through blood group</h4>
        
        <form action="donorInfo.php" method="get">
            <input type="hidden" name="pages" value="1"> 
                <select name="search" >
                    <option value="A+ve">A+ve</option>
                    <option value="A-ve">A-ve</option>
                    <option value="B+ve">B+ve</option>
                    <option value="B-ve">B-ve</option>
                    <option value="AB+ve">AB+ve</option>
                    <option value="AB-ve">AB-ve</option>
                    <option value="O+ve">O+ve</option>
                    <option value="O-ve">O-ve</option>
                    <option value="" selected>----</option>
                </select>
            <button type="submit">Submit</button>
        </form> 
    </div>

    <br><br>

    <center>
    <table class="content-table">
        <thead>
            <tr>
                <th>S.N</th>
                <th>Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>CitizenShip_No</th>
                <th>BloodGroup</th>
                <th>Gender</th>
                <th>Contact</th>
                <th>Address</th>
                <th>Status</th>
                <th>Message</th>
                <th>Action</th>
            </tr>
        </thead>
    </div>

    <?php
        include "../connection/config.php";
        
        $data_per_page= 10;

        if(isset($_GET['pages'])){
            $page  = $_GET["pages"];
        }
        else {
            $page = 1;
        }

        $start_from=($page-1)*$data_per_page;

        if(isset($_GET['search'])){
            $search = $_GET['search'];
        }else{
            $search="";
        }

        $sql = "select * from `donor` where  BloodGroup like '%$search%' limit $start_from,$data_per_page";

        $result = mysqli_query($conn, $sql);
        
        if(mysqli_num_rows($result)){
            // $id = 1;
            if(isset($_GET['pages'])){
            $i = (($_GET['pages']-1)*10)+1;
            }else{
                $i=1;
            }
            while($row = mysqli_fetch_assoc($result)){
            
    ?>

    <tbody>
    <tr>
        <td><?php echo $i;?></td>
        <!-- <td><?php echo $row ['Id'];?></td> -->
        <td><?php echo $row ['Name']?></td>
        <td><?php echo $row ['Email']?></td>
        <td><?php echo $row ['Age']?></td>
        <td><?php echo $row ['CitizenShip_No']?></td>
        <td><?php echo $row ['BloodGroup']?></td>
        <td><?php echo $row ['Gender']?></td>
        <td><?php echo $row ['Contact']?></td>
        <td><?php echo $row ['Address']?></td>
        <td>
            <?php
                if ($row['Status']==0){
                    echo
                    '<p>Pending...</p>';
                }else if ($row['Status']==1){
                    echo
                    '<p>Approved</p>';
                }else if($row['Status']==2){
                    echo
                    '<p>Rejected</p>';
                }
            ?>
        </td>
        <td><?php echo $row ['Message']?></td>
        <td>
        <?php
            if ($row['Status']==0){
        ?>
                <button class="approve" id="btn">
                    <a href="../approveReject/donorStatus.php?requestId=<?php echo $row ['Id'];?>&status=1" onclick = "sendMail('<?php echo $row['Email'];?>')">Approve</a>
                </button>
                <button class="reject" id="btn">
                    <a href="../approveReject/donorStatus.php?requestId=<?php echo $row ['Id'];?>&status=2" onclick = "sendMail('<?php echo $row['Email'];?>')">Reject</a>
                </button>
            <?php
                }
            ?>
           
        </td>
    </tr>
    <?php
        $i++;
        }

    }else{

    ?>
        <tr><td colspan="5">No Records found

        <?php }
        ?>

    </tbody>
    </table>

    <?php

        error_reporting(E_ERROR | E_PARSE);        

        $sql = "select * from `donor`";
        $result = mysqli_query($conn,$sql);
        $total_data = mysqli_num_rows($result);
        // echo $total_data;
        $total_pages = ceil($total_data/$data_per_page);
        // echo $total_pages;


        for($i=1;$i<=$total_pages;$i++){


            echo '<a style="font-size:12px;color:red;padding: 5px;bottom:0;" href="donorInfo.php?pages='.$i.'&search='.$_GET['search'].'   ">'.$i.'</a>';
        }
        
    ?>

    <script>
      function sendMail(m){
         parent.location = "mailto:"+m;
      }
    </script> 

</center>
</body>
</html>