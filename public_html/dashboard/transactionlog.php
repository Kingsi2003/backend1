<?php
include('../sessionlogin.php');
include('../config.php');
if(empty($_SESSION['password'])){
    header("Location:../signin.php");
}
else{
    $firstname = $_SESSION['firstname'];
    $lastname = $_SESSION['lastname'];
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];



/////d
  
    ////
    ////w
    $query1 ="SELECT * FROM withdrowt WHERE email ='$email' ";
    $r = mysqli_query($conn,$query1); 
    // $r  = $conn->query($query1);
    $resultnum = mysqli_num_rows($r);
    // $result = mysqli_fetch_assoc($r);
   
    

};

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootsrap/css/mdb.dark.min.css">
    <link rel="stylesheet" href="stylec.css">
    <link rel="stylesheet" href="bootsrap5/fontawesome/css/font-awesome.min.css">
    <script defer src="jquery-3.3.1.min.js"></script>
    <script defer src="main1.js"></script>
    <title>Document</title>
    <style>
        /* .tab1{
            width: 900px;
            box-shadow: 0 0 10px 1px rgb(129, 129, 137);

        } */
        .headingg{
            font-size: 1.5em;
        }
        .tab1 tr{
            text-transform: capitalize;
            height: 1.5cm;
            
        }
        .fle{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 2cm;
            height: 100%;
            overflow-x: scroll;
        }
        .status{
            color: red;
        }
        @media(max-width:940px){
            .tt{
                transform: translateX(200px);
            }
        }
    </style>
</head>
<body style="">
<i class="fa fa-bars position-absolute d-inline-block d-md-none dt" style=" top:.5cm;z-index:100;font-size:1cm;left:10px;"></i>

<div class=" smd smd col-11 col-md-4 d-md-flex d-none" style="background-color:rgb(3, 3, 41); position:fixed;top:0;height:100vh;z-index:10;">
     <ul class="col-12 d-flex align-items-start smdul" style=" height: 100%; flex-direction: column; justify-content: space-around;">
        <h3 style="text-transform: capitalize;font-size: .6cm;margin-top:1.5cm;white-space: nowrap;">beckshire-exchange</h3>
        <li>
            <a href="dashboard.php"><i class="fa  fa-tasks"></i></a>
            <a href="dashboard.php">dashboard</a>
        </li>
        <li>
            <a href="withdraw.php"><i class="fa fa-credit-card-alt"></i></a>
            <a href="withdraw.php">withdraw</a>
        </li>
        <li>
            <a href="deposite.php"><i class="fa fa-credit-card"></i></a>
            <a href="deposite.php">deposite</a>
        </li>
        <li>
            <a href="mining2.php"><i class="fa fa-dollar"></i></a>
            <a href="mining2.php">investment</a>
        </li>
        <li>
            <a href="transactionlog.php"><i class="fa fa-database"></i></a>
            <a href="transactionlog.php">transaction log</a>
        </li>
        <li>
            <a href="profile.php"><i class="fa fa-user"></i></a>
            <a href="profile.php">profile</a>
        </li>
        <li>
            <a href="support.php"><i class="fa fa-comment"></i></a>
            <a href="support.php">suport</a>
        </li>
        <li>
            <a href="kyc.php"><i class="fa  fa-upload"></i></a>
            <a href="kyc.php">kyc</a>
        </li>
        <li>
            <a href="#"><i class="fa fa-arrow-circle-o-left"></i></a>
            <a href="../signin.php">logout</a>
        </li>

     </ul>
    </div>

    <div class=" col clpage col-md-8 " style=" height: 100vh; position: fixed;top: 0;right:  0;">
   <div class="fle col-12 m-auto "">
   <div class="table-responsive tt">
        <table border="1" class="table " >
        <tr><th class="headingg  text-dark text-capitalize">deposite</th></tr>
        <tr >
            <th>invoice id</th>
            <th>amount</th>
            <th>date</th>
            <th>status</th>
            <th>crypto</th>
        
        </tr>
        <?php  
         $query ="SELECT * FROM `depositet` WHERE `email`='$email' ";
         $rr = mysqli_query($conn,$query); 
         $resultnu = mysqli_num_rows($rr);


        for($i=0;$i<$resultnu;$i++){
           
         $resul = mysqli_fetch_assoc($rr);
        $curency  = $resul['depositecurrency'];
        $amt      = $resul['depositeamount'];
        $w_dt     = $resul['depositedate'];
        $inv      = $resul['depositeinvoice'];
        $stat     = $resul['depositestatus'];
        $email    = $resul['email'];  ?>


       <tr>
            <td><?=$inv?></td>
            <td><?=$amt?></td>
            <td><?=$w_dt?></td>
            <td class="status statusvirify"><?=$stat?></td>
            <td><?=$curency?></td>
        </tr>


        <?php

        }
        
        
        
        
        ?>
       
      
    </table>
        <table border="1" class="table " >
        <tr><th class="headingg text-dark text-capitalize">withdrawal</th></tr>
        <tr >
        
            <th>invoice id</th>
            <th>amount</th>
            <th>date</th>
            <th>status</th>
            <th>crypto</th>
        
        
        
        </tr>
        <?php
        //  while($row = mysqli_fetch_assoc($r)){
            // $i++;
            for($i=0; $i < $resultnum; $i++){
         $row       = mysqli_fetch_assoc($r);
          $curency  = $row['withdrowalcurrency'];
          $amt      = $row['withdrowalamount'];
          $w_dt     = $row['withdrowaldate'];
          $inv      = $row['withdrowalinvoice'];
          $stat     = $row['withdrowalstatus'];
          $email    = $row['email'];
       
        ?>
        <tr>
            <td><?= $inv ?></td>
            <td><?= $amt ?></td>
            <td><?= $w_dt ?></td>
            <td class="status statusvirify"><?=$stat ?></td>
            <td><?=$curency ?></td>
        </tr>
      <?php   } ?>

    </table>
    </div>
</div>
    </div>
</body>
</html>

