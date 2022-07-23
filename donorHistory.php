
<?php include ('header.php')?>
<head>
    <title>Donor History </title>
    <link rel="stylesheet" href="css/table.css">
</head>

   
    <div style="padding-top: 120px; text-align: center;">
        <h1>Donor History</h1>
    </div>
    <div class="search">
        <h4>Search <i class="fa-solid fa-magnifying-glass"></i> </h4>
        
        <form action="donorHistory.php" method="get">
            <input type="hidden" name="pages" value="1"> 
            <input type="text" name="search" value="" placeholder="Search through name">
            <button type="submit">Search</button>
        </form> 
    </div>

    <br>
    <center>
    <table class="content-table">
        <thead>
            <tr>
                <th>S.N</th>
                <th>Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Donated times</th>
                <th>Address</th>
            </tr>
        </thead>
    

    <?php

    include "connection/config.php";

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

             $sql = "select * from `donorhistory` where  name like '%$search%' limit $start_from,$data_per_page";

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
        <td><?php echo $row ['Name']?></td>
        <td><?php echo $row ['Email']?></td>
        <td><?php echo $row ['Age']?></td>
        <td><?php echo $row ['Gender']?></td>
        <td><?php echo $row ['History']?></td>
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

    <?php

        error_reporting(E_ERROR | E_PARSE);        

        $sql = "select * from `donorhistory`";
        $result = mysqli_query($conn,$sql);
        $total_data = mysqli_num_rows($result);
        // echo $total_data;
        $total_pages = ceil($total_data/$data_per_page);
        // echo $total_pages;


        for($i=1;$i<=$total_pages;$i++){


            echo '<a style="font-size:12px;color:red;padding: 5px;bottom:0;" href="donorHistory.php?pages='.$i.'&search='.$_GET['search'].'   ">'.$i.'</a>';
        }
        
    ?>
    </center>
</body>
</html>