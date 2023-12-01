<?php
include('../sessionlogin.php');
include('../config.php');

$_SESSION['invres']='';
$_SESSION['invam']='';
$_SESSION['invpl']='';
$email = $_SESSION['email'];

if(isset($_POST['plan'])){
    $hrs = 0;
    $inva = filter_input(INPUT_POST,'investamount',FILTER_SANITIZE_SPECIAL_CHARS);
 
    if($inva > $_SESSION['ballance'] ==1){
        
        $_SESSION['invres']='insuficient account';
    }
    else if($inva < $_SESSION['ballance'] ==1){
        $_SESSION['invres'] = 'investment sucsessfull';
        $query = "SELECT ballance FROM clients WHERE email = '$email'";
        $result = $conn->query($query);
        $r = mysqli_fetch_assoc($result);
        $ballance = $r['ballance'];

        $newball = $ballance - $inva;
        
        $query="UPDATE clients SET ballance = '$newball' WHERE email = '$email'";
        $result = $conn->query($query);
        
        $_SESSION['invam'] = filter_input(INPUT_POST,'investamount',FILTER_SANITIZE_SPECIAL_CHARS);
        $_SESSION['invpl'] = filter_input(INPUT_POST,'plan',FILTER_SANITIZE_SPECIAL_CHARS);
        $investamount =   $_SESSION['invam'];
        $investplan=      $_SESSION['invpl'];
        if($investplan == 'starter plan'){
            $hrs = 86400;
            
            $invb = 7/100*$inva;
            $inva = $invb+$inva;
        }
        if($investplan == 'century plan'){

            $hrs = 86400*2;
            $invb = 15/100*$inva;
            $inva = $invb+$inva;
        }
        if($investplan == 'gold plan'){
            
            $hrs = 86400*3;
            $invb = 20/100*$inva;
            $inva = $invb+$inva;
        }
        $invtime = time();
        $query="UPDATE  clients SET invamount = '$investamount',invplan='$investplan',invtime='$invtime', prim='$hrs' ,pbal='$inva' WHERE email = '$email'";

        $result = mysqli_query($conn,$query);
           
    }

}

   $v = $_SESSION['invres'];
   
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
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .container{
        
            display: flex;
            flex-flow: row wrap;
            gap: 1cm;
            align-items: center;
            justify-content: center;
            padding: 1cm;
        }
        .copl{
            width: 350px;
            height: 400px;
            
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 5px;
            box-shadow: 0 0 10px 5px black;
        }
        .roww{
            width: 80%;
            height: 1.3cm;
            display: flex;
            align-items: center;
            justify-content: space-around;
            border-bottom: 2px solid gray;
        
        }
        .roww h4{
            display: flex;
            align-items: center;
            justify-content: center;
            text-transform: capitalize;
            color: blue;
            font-size: 1.5em;
        }
        .roww span{
            font-size: 1.2em;
        }
        .invest{
            width: 3cm;
            height: 1.2cm;
            text-transform: capitalize;
            border: none;
            margin-top: 10px;
            background-color:black;
            border: 3px solid white;
            color: white;
            font-weight: 600;
            border-radius: 10px;
        }
        .cpop{
            right:22Vw;
            top:25vh;
            width: 300px;
            min-height:200px;
            z-index:10;
            
        }
        
        .dis{
            display:none;
        }
        @media(max-width:540px) {
            .cpop{
                right:10vw;
            }
        }
        
    </style>
</head>
<body>
    <div class="card cpop position-fixed bg-light text-dark dis">
        <div class="card-body " id="cc">
        <form action="<?=$_SERVER['PHP_SELF']?>" id="investmentamount" method="POST">
            <label for="investamount" class="form-label text-dark">Enter amount</label>
            <input type="text" class="form-control text-dark invamount" name="investamount" style="font-weight:600;">
            <input type="hidden" class="form-control text-dark invamount hidd" name="plan" style="font-weight:600;" value="">

            <h3 class="plan text-capitalize" style="font-weight:600;">steater plan</h3>

            <div class="card-footer">
            <button class="btn btn-primary stin">start invest</button>
           </div>
        </form>
        
        </div>
      
    </div>



   
<i class="fa fa-bars position-absolute d-inline-block d-md-none dt" style=" top:.5cm;z-index:100;font-size:1cm;left:10px;"></i>
    <div class=" smd col-11 col-md-4 d-md-flex d-none" style="background-color:rgb(3, 3, 41); position:fixed;top:0;height:100vh;z-index:10;">
     <ul class="col-12 d-flex align-items-start smdul " style=" height: 100%; flex-direction: column; justify-content: space-around; min-width:200px;">
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
    
 






    <div class=" col-12 col-md-9 clpage" style=" height: 100vh; position: fixed;top: 0;right:  0;">
        <body>
            <div class="container position-relative ">
                <div class="cop" style="position:fixed;right:10px;top:1cm;">
                <h5 class="vres text-capitalize text-primary"style="position-absolute; top 0cm; ;"><?=$v?></h5>

                </div>
                <div class="copl">
                    <div class="roww"><h4>starter plan</h4></div>
                    <div class="roww"><span>minimum:</span><span>$50</span></div>
                    <div class="roww"><span>maximum:</span><span>$2100</span></div>
                    <div class="roww"><span>profit:</span><span>7%</span></div>
                    <div class="roww"><span>running time 24hrs</span></div>
                    <button class="invest">invest</button>
                    
                </div>
                <div class="copl">
                    <div class="roww"><h4>century plan</h4></div>
                    <div class="roww"><span>minimum:</span><span>$2200</span></div>
                    <div class="roww"><span>maximum:</span><span>$9,999</span></div>
                    <div class="roww"><span>profit:</span><span>15%</span></div>
                    <div class="roww"><span>running time 48hrs</span></div>
                    <button class="invest">invest</button>
                    
                </div>
                <div class="copl">
                    <div class="roww"><h4>gold plan</h4></div>
                    <div class="roww"><span>minimum:</span><span>$3000</span></div>
                    <div class="roww"><span>maximum:</span><span>$20,000</span></div>
                    <div class="roww"><span>profit:</span><span>20%</span></div>
                    <div class="roww"><span>running time 72hrs</span></div>
                    <button class="invest">invest</button>
                    
                </div>
                
            </div>
        </body>
    </div>
   
</body>
</html>