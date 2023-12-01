<?php
include('../sessionlogin.php');
include('../config.php');

if(empty($_SESSION['password'])){
    header("Location:../signin.php");
}
else{
    
    $email = $_SESSION['email'];
    $firstname = $_SESSION['firstname'];
    $ballance = $_SESSION['ballance'];

    

if($_SERVER['REQUEST_METHOD']=="POST"){

    if(isset($_POST['selectcurrency']) AND isset( $_POST['wanttodeposit'])){

    echo $_POST['selectcurrency'];
       
        $depositecurrency = filter_input(INPUT_POST,'selectcurrency',FILTER_SANITIZE_SPECIAL_CHARS);
        $depositeamount = filter_input(INPUT_POST,'wanttodeposit',FILTER_VALIDATE_INT);
        $depositdate = date('Y-m-d H:i:s');
        $depositestatus = 'pending';
        $depositeinvoice = strtoupper(bin2hex(random_bytes(4)));
        $query = "UPDATE `clients` SET `depositecurrency`=' $depositecurrency',`depositeamount`='$depositeamount',`depositedate`='$depositdate',`depositeinvoice`='$depositeinvoice',`depositestatus`='$depositestatus' WHERE `email`='$email'";
        $result = mysqli_query($conn,$query);



        $query2 = "INSERT INTO `depositet`(`depositecurrency`, `depositeamount`, `depositedate`, `depositeinvoice`, `depositestatus`,`email`) VALUES ('$depositecurrency','$depositeamount','$depositdate','$depositeinvoice','$depositestatus','$email')";
        $result2 = mysqli_query($conn,$query2);

        $query2 = "INSERT INTO `admindep`(`depositecurrency`, `depositeamount`, `depositedate`, `depositeinvoice`, `depositestatus`,`email`,`status`) VALUES ('$depositecurrency','$depositeamount','$depositdate','$depositeinvoice','$depositestatus','$email','deposite')";
        $result2 = mysqli_query($conn,$query2);
    
        
    }
}
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
        .yourballance{
            height: 2cm;
            background: linear-gradient(to left,black,blue);
            border-radius: 10px 0 0 10px;
            display: flex;
            align-items: center;
            padding-left: .5cm;
            margin-top: .5cm;
        }
        .depostebox{
            height: 400px;
            margin: auto;
            margin-top: 1.5cm;
            padding: 10px;
            
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: .5cm;
            width: 360px;
        }
        .ds{
            text-transform: capitalize;
        }
        form{
            width: 95%;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 1cm;
            background-color: white;
            padding: 40px;
        }
        .fbox{
        
            width: 100%;
            margin-bottom: 10px;
        }
        .fbox input{
            width: 100%;
            height: 1.2cm;
            padding-left: 10px;
            outline: none;
            border:3px solid black;
    
        }
        .fbox select{
            width: 100%;
            height: 1.2cm;
            padding: 0 10px;
            outline: none;
            border:3px solid black;
        }
        
        .fbox select option{
            text-transform: capitalize;
        }
       #submitdeposite{
        background-color: blue;
        border: none;
        text-transform: capitalize;
        color: white;
       }
       .qrcodeimgbob{
        width: 150px;
        height: 200px;
        border: 2px solid red;
       }
       .qrcodeimgbob img{
        width: 100%;
        height: 100%;
        display: block;
       }
       .walet{
        width: 100%;
        height: 2cm;

        display: flex;
        justify-content: center;
        align-items: center;
        
        
       }
       .walet mark{
        line-break: anywhere;
        padding: 10px;
        background-color: white;
        font-size: small;
       }
       .buttonbox button{
        width: 4cm;
        height: 1.2cm;
        border: 3px solid gray;
        background-color:black;
        text-transform: capitalize;
        color: white;
        border-radius: 20px;
       }
       .buttonbox button:active{
        background-color: white;
        color: #000;
       }
       .keyh1{
        text-transform: capitalize;
        font-size: 1.4em;
       }
       .clpage{
        height: 100vh; 
        position: fixed;
        top: 0;
        right:  1vw;

       }
       @media (max-width:720px) {
       
          
        .clpage{
            padding-bottom:3cm ;
            padding-top:1cm ;
            
            display:flex;
            align-items:start;
            justify-content: center;
            flex-direction:column;
            
            right:0;
            width:100vw;
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

  <!-- container -->
  <div class=" col clpage col-md-8" style="">
    <!-- welcome -->
        <div class="col-11 yourballance mx-auto"style="margin-top:10vh;">
          <h3>Hi <span class="firstname"><?=$firstname?></span> your balance is <span class="ballance"><?=$ballance?></span><span>$</span></h3>
     </div>
     <!-- welcome end -->
     <!-- deposit -->
     <div class="col-12 col-md-6 depostebox bobox1  ">
      <span class="ds">deposite funds</span>
      <form action="" method="" id="depform" class="fr">
        <div class="fbox">
        <input type="text" name="wanttodeposit" id="wanttodeposite" placeholder="Amount" class="form-control bg-light text-dark" style="font-weight:600;">
        </div>
        <div class="fbox">
          <select name="selectcurrency" id="selectcurrency" class="form-select">
            <option value="" selected>select cryptocurrency</option>
            <option value="btc">Btc</option>
            <option value="usdt">Usdt</option>
          </select>

        </div>
        <div class="fbox sub">
            </div>

      </form>
      <button class="btn btn-primary subt1 " >proceed</button>

     </div>
     <!-- deposit e-->
     <!-- deposit 2 begin -->
     <div class="col-12 col-md-6 depostebox bobox2 d-none">
      <span class="ds">deposite funds</span>
       <div class="qrcodeimgbob">

       </div>
       <h1 class="keyh1">bitcoin key</h1>
       <div class="walet">
       <mark class="y" style="font-size:1em; width:250px;"></mark>
       <mark class="z"></mark>
       </div>
       <div class="buttonbox">
        <button class="copydep">copy</button>
       </div>
       </div>
      

     </div>
     <!-- deposit 2 e-->
    </div>
    <!-- container end -->
    <script>
       
    </script>
</body>
</html>

