<?php include 'header.php'?>

    <head>
        <link rel="stylesheet" href="css/table.css">
        <title>Donor History </title>
    </head>

    <div style="padding-top: 120px; text-align: center;">
        <h1>Donor History</h1>
    </div>
    
    <center>
        <table class="content-table">
            <thead>
                <tr>
                    <th>S.N</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Address</th>
                </tr>
            </thead>

        <?php
        
            include "connection/config.php";

            error_reporting(E_ERROR | E_PARSE);    

            $selectQuery = "SELECT * FROM `donorHistory`";

            $result = mysqli_query($conn, $selectQuery);  //

            if(mysqli_num_rows($result)){
                $i = 1;
                while($row = mysqli_fetch_assoc($result)){    

        ?>

        <tbody>
        <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $row ['Name']?></td>
            <td><?php echo $row ['Email']?></td>
            <td><?php echo $row ['Age']?></td>
            <td><?php echo $row ['Gender']?></td>
            <td><?php echo $row ['Address']?></td>
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
    </center> 

</body>
</html>