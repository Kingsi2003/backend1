<?php
include('../sessionlogin.php');
include('../config.php');
// echo $_SERVER['REMOTE_ADDR'];
// echo $_SERVER['HTTP_USER_AGENT'];



if(empty($_SESSION['password'])){
    header("Location:../signin.php");
}
else{
    $tt = $_SESSION['regtime'];
    $email = $_SESSION['email'];
    $pers = 0;
  
    
    
}
   
    $query3 ="SELECT * FROM `clients` WHERE `email` = '$email' ";
    $r3 = mysqli_query($conn,$query3);
    $result = mysqli_fetch_assoc($r3);
    

        $password = $result['password'];
        $firstname = $result['firstname'];
        $latname  = $result['lastname'];
        $email  = $result['email'];

        $referalcode = $result['referalcode'];
        $referalpoint = $result['referalpoint'];
        $regdate = $result['regdate'];
        $depositeamount = $result['depositeamount'];
        $depositecurrency = $result['depositecurrency'];
        $depositedate = $result['depositedate'];
        $depositeinvoice = $result['depositeinvoice'];
        $depositestatus = $result['depositestatus'];
        $withdrowalamount = $result['withdrowalamount'];
        $withdrowaldate = $result['withdrowaldate'];
        $withdrowalstatus = $result['withdrowalstatus'];
        $withdrowalinvoice = $result['withdrowalinvoice'];
        $withdrowalcurrency = $result['withdrowalcurrency'];
        $ball = $result['ballance'];
        

        $investamount = $result['invamount'];
        $investplan= $result['invplan'];
        $invtime = $result['invtime'];
        $add = $result['add'];
        $minus = $result['minus'];
        $hr = $result['prim'];
        $ballance = $ball+$referalpoint;
        $_SESSION['ballance'] = $ballance;
        $di = $invtime+ $hr;
      
        if($add =='add'){
        
        if( $depositestatus == 'approved' OR $depositestatus == 'verified'){
            $query = "SELECT depositeamount FROM clients WHERE email = '$email'";
            $result = $conn->query($query);
            $r = mysqli_fetch_assoc($result);
            $depamount = $r['depositeamount'];


            $query = "SELECT ballance FROM clients WHERE email = '$email'";
            $result = $conn->query($query);
            $r = mysqli_fetch_assoc($result);
            $ballance = $r['ballance'];
    
            $newball = $depamount+$ballance;
    
            $query="UPDATE clients SET ballance = '$newball' WHERE email = '$email'";
            $result = $conn->query($query);
            $query="UPDATE clients SET `add` = null WHERE email = '$email'";
            $result = $conn->query($query);
        }
    }


    if($minus == 'minus'){
      
        if( $withdrowalstatus == 'approved' OR $withdrowalstatus == 'verified'){
            $query = "SELECT withdrowalamount FROM clients WHERE email = '$email'";
            $result = $conn->query($query);
            $r = mysqli_fetch_assoc($result);
            $withamount = $r['withdrowalamount'];


            $query = "SELECT ballance FROM clients WHERE email = '$email'";
            $result = $conn->query($query);
            $r = mysqli_fetch_assoc($result);
            $ballance = $r['ballance'];
    
            $newball = $ballance - $withamount;
    
            $query="UPDATE clients SET ballance = '$newball' WHERE email = '$email'";
            $result = $conn->query($query);
            $query="UPDATE clients SET minus = null WHERE email = '$email'";
            $result = $conn->query($query);
        }
    }

        if( $invtime>0 AND  $hr >0){
            $dif = $di - time();
    
            $d=  floor($dif/86400);
        
        

        
            $h=  floor($dif/3600);
            
            
    
            $m=  floor($dif/60);



            if( $d <= 0 AND $h <= 0 AND $m <= 0){
                $date = '00:00:00';
                $s = 00;

                if($d == 0 AND $h == 0 AND $m == 0){
                    $query = "SELECT pbal FROM clients WHERE email = '$email'";
                    $result = $conn->query($query);
                    $r = mysqli_fetch_assoc($result);
                    $pbal = $r['pbal'];
            
                    $query = "SELECT ballance FROM clients WHERE email = '$email'";
                    $result = $conn->query($query);
                    $r = mysqli_fetch_assoc($result);
                    $ballance = $r['ballance'];
            
                    $newball = $pbal+$ballance;
            
                    $query="UPDATE clients SET ballance = '$newball' WHERE email = '$email'";
                    $result = $conn->query($query);
                }
              
        
            }
            else{
                $s = 'Math.floor((dfif%(1000*60))/(1000))';
        
                $dat=  date('Y-m-d H:i:s',$di);
                $date = $d.':'. $h.':'. $m;
                
              echo"<script>
              let oldtime = new Date('$dat').getTime();
              
              setInterval(() => {
              
              let newtime = new Date().getTime();
              let dfif = oldtime - newtime;
             let d = $d;
              let h = $h;
              let m = $m;
              
              let s = $s;
              
              $('.s').html(s);
              
              
              
              
              }, 1000);
              
                  </script>
              ";
          
            }
        }else{
            $d =0;
            $h =0;
            $m =0;
            $date = $d.':'. $h.':'. $m;
        }
     
        
        

        
      
        
        if($investplan == 'starter plan'){
            $pers = 24;
            
        }
        if($investplan == 'century plan'){
            $pers = 48;
            
        }
        if($investplan == 'gold plan'){
            $pers = 72;
        
        }
   
      
   
    
        
      



       














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
    <title>Dashboard</title>
</head>
<body style="">

<div class="pagel " style="width:100vw;height:100vh;position:fixed; background-color:black;z-index:10000;display:flex;align-items:center;justify-content:center">
<img src="img2/loading_.gif" alt="" style="width:30vw;">
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
    
 



    
    <div class=" col clpage col-md-8 " style=" height: 100vh; position: fixed;top: 0;right:  0;">
        <div class="col-12 d-flex justify-content-around align-item-center" style="margin-top: .5cm; flex-flow: row wrap; gap: 20px;">
            <!-- box b -->
            <div class="col-3 d-flex " style=" height: 280px; min-width: 300px; flex-direction: column;align-items: center;justify-content: center;padding: 20px;gap: 10px; box-shadow: 0 0 5px 1px white; position: relative;border-radius: 20px 20px 20px 0;">
              <small class="col-12" style="text-transform: capitalize;">transaction board</small>
              <h4 class="d-flex justify-content-between col-12" style="text-transform: capitalize;gap: .5cm;"><span>status</span> <span>referal code</span></h4>
              <h6 class="d-flex justify-content-between col-12" style="text-transform: capitalize;gap: .5cm;"><span class="status">pending</span> <span class="referalcode"><?=$referalcode?></span></h6>
              <div class="d-flex justify-content-between" style="gap: .5cm;">
                <div class="icon" style="min-width: 1.5cm; height: 1.5cm;">
                    <i class="fa fa-envelope" style="color:gray;font-size:1.5cm;"></i>
                </div>
                <div class="refer" style=" width: 4cm; text-align: start;word-wrap: break-word; height: 1.5cm;line-height:1;">
                    <span style="text-transform: capitalize;">referal link</span>
                    <p style="margin-top: 10px;" class="reflink">https://berkshirexchange.com/signup.php?refer=<?=$referalcode?></p>
                    <button class="copy creferald " style="border: none;text-transform: capitalize;border-radius:10px 10px 10px 0;font-weight: 600;position: absolute; left: 0;bottom: 0;height: 1cm;background-color: blue;">copy</button>
                </div>
              </div>
            </div>
            <!-- box e -->
 <!-- box b -->
 <div class="col-3 d-flex " style=" height: 280px; min-width: 300px; flex-direction: column;align-items: center;justify-content: center;padding: 20px;gap: 10px; box-shadow: 0 0 5px 1px white;border-radius: 20px 20px 20px 0;">
    <small class="col-12" style="text-transform: capitalize;">total earning</small>
    <h4 class="d-flex justify-content-between col-12" style="text-transform: capitalize;gap: .5cm;"><span>referals</span> <span>investment</span></h4>
    <h6 class="d-flex justify-content-between col-12" style="text-transform: capitalize;gap: .5cm;"><span class="referearn">$<?=$referalpoint?></span> <span class="minearn">0</span></h6>
    <div class="d-flex justify-content-between" style="gap: .5cm;">
      <div class="icon" style="min-width: 1.5cm; height: 1.5cm;">
          <i class="fa fa-dollar" style="color:gray;font-size:1.5cm;"></i>
      </div>
      <div class="refer" style=" width: 4cm; text-align: start;word-wrap: break-word; height: 1.5cm;line-height:1;">
      <small>Total</small>
          <h1><big class="balance"><?=$ballance?></big></h1>
        </div>
    </div>
  </div>
  <!-- box e -->  
 <!-- box b -->
 <div class="col-3 d-flex " style=" height: 280px; min-width: 300px; flex-direction: column;align-items: center;justify-content: center;padding: 20px;gap: 10px; box-shadow: 0 0 5px 1px white; position: relative;border-radius: 20px 20px 20px 0;">
    <small class="col-12" style="text-transform: capitalize;">mining...... <span><?=$depositecurrency?></span></small>
    <h4 class="d-flex justify-content-between col-12" style="text-transform: capitalize;gap: .5cm;"><span>plan</span> <span>percentage</span></h4>
    <h6 class="d-flex justify-content-between col-12" style="text-transform: capitalize;gap: .5cm;"><span class="miningplan"><?=$investplan?></span> <span class="planpercent"><span class="percentplan"><?=$pers?></span><span>hr</span></span></h6>
    <div class="d-flex justify-content-between" style="gap: .5cm;">
      <div class="icon" style="min-width: 1.5cm; height: 1.5cm;">
          <!-- <i class="fa fa-dollar" style="color:gray;font-size:1.5cm;"></i> -->
      </div>
      <div class="refer" style=" width: 4cm; text-align: start;word-wrap: break-word; height: 1.5cm;line-height:1;">
      <h1 style="font-size:.4cm"><big class="totalearn"><span class="h"><?=$date?></span>:<span class="s">0</span></big></h1>
        
   
    </div>
    </div>
  </div>
  <!-- box e -->            
        </div>
        <!-- kyc -->
        <div class="col-3 d-flex justify-content-center mx-auto" style="height: 2cm;margin-top: .5cm;align-items: center;min-width: 300px;background:linear-gradient(to left, black,blue);font-weight: 600;">
         <small class="kycmessage" style="text-transform: capitalize;">you have not uploaded your kyc</small>
        </div>
        <!-- kyce -->
        <!-- acount status -->
<div class="col-12 " style=" margin-top: 20px;">
     <div class="row col-12" style="padding-left: 5px;">
<div class="col-11 mx-auto d-flex" style="min-height: 2cm;flex-direction: column;gap: 10px;border: 3px solid white;padding: 10px;">
        <h3 class="text-center" style="text-transform: capitalize;">account status</h3>
         <div class="statb col-12 d-flex justify-content-between">
            <!-- deposite accountstatus -->
       <div class="stat col-12 d-flex justify-content-center" style="min-height: 2cm;flex-flow: row wrap;">
         <div class="dep d-flex justify-content-center" style="width: 4cm;height: 2cm;flex-direction: column;align-items: center;">
            <h5 style="text-transform: capitalize;color: gray;">deposite</h5>
            <span class="lastdeposite"><?=$depositeamount?></span>
        </div>
         <div class="dep d-flex justify-content-center" style="width: 4cm;height:2cm;flex-direction: column;align-items: center;">
            <h5 style="text-transform: capitalize;color: gray;">invoice</h5>
            <span class="lastinvoice"><?=$depositeinvoice?></span>
        </div>
         <div class="dep d-flex justify-content-center" style="width: 4cm;height:2cm;flex-direction: column;align-items: center;">
            <h5 style="text-transform: capitalize;color: gray;">date</h5>
            <span class="lastdepositedate"><?=$depositedate?></span>
        </div>
         <div class="dep d-flex justify-content-center" style="width: 4cm;height:2cm;flex-direction: column;align-items: center;">
            <h5 style="text-transform: capitalize;color: gray;">type</h5>
            <span class="currencytypedepsite"><?=$depositecurrency?></span>
        </div>
         <div class="dep d-flex justify-content-center" style="width: 4cm;height:2cm;flex-direction: column;align-items: center;">
            <h5 style="text-transform: capitalize;color: gray;">status</h5>
            <span class="statusdeposite" style="text-transform: capitalize;"><?=$depositestatus?></span>
        </div>
            
       </div>
</div>
<!-- deposite account status end -->

<!-- withrawal account status -->
<div class="stat col-12 d-flex justify-content-center" style="min-height: 2cm;flex-flow: row wrap;box-shadow: 0 0 10px 1px white; margin-top: 10px; margin-bottom: .5cm;">
    <div class="dep d-flex justify-content-center" style="width: 4cm;height: 2cm;flex-direction: column;align-items: center;">
       <h5 style="text-transform: capitalize;color: gray;">withdraw</h5>
       <span class="lastdeposite"><?=$withdrowalamount?></span>
   </div>
    <div class="dep d-flex justify-content-center" style="width: 4cm;height:2cm;flex-direction: column;align-items: center;">
       <h5 style="text-transform: capitalize;color: gray;">invoice</h5>
       <span class="lastinvoice"><?=$withdrowalinvoice?></span>
   </div>
    <div class="dep d-flex justify-content-center" style="width: 4cm;height:2cm;flex-direction: column;align-items: center;">
       <h5 style="text-transform: capitalize;color: gray;">date</h5>
       <span class="lastdepositedate"><?=$withdrowaldate?></span>
   </div>
    <div class="dep d-flex justify-content-center" style="width: 4cm;height:2cm;flex-direction: column;align-items: center;">
       <h5 style="text-transform: capitalize;color: gray;">type</h5>
       <span class="currencytypedepsite"><?=$withdrowalcurrency?></span>
   </div>
    <div class="dep d-flex justify-content-center" style="width: 4cm;height:2cm;flex-direction: column;align-items: center;">
       <h5 style="text-transform: capitalize;color: gray;">status</h5>
       <span class="statuswithdraw " style="text-transform: capitalize;"><?=$withdrowalstatus?></span>
   </div>
       
</div>
<!-- withrawal account status end -->
</div>
    </div>
    </div>
        <!-- acountee -->
    </div>
    <form action="" id="pr">
        <input type="hidden" name="addp" value='1' class='addp'>
    </form>
    
    
   
</body>
</html>


