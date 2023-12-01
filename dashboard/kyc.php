<?php
include('../sessionlogin.php');
include('../config.php');
if(empty($_SESSION['password'])){
    header("Location:../signin.php");
}
else{
    // echo $_SESSION['firstname'];
    // echo $_SESSION['lastname'];
    $email = $_SESSION['email'];
    // echo $_SESSION['password'];
};

$email = $_SESSION['email'];
$firstname = $_SESSION['firstname'];
$response = ' upload your kyc file for verification';
if($_SERVER['REQUEST_METHOD'] == 'POST'){

if(isset($_FILES['kyc']) AND isset($_POST['selectn'])){
      
    
        $filesext = ['JPG','PNG','JPEG'];
        $filename = $_FILES['kyc']['name'];
        $filename = time().$filename;
        $tempfolder = $_FILES['kyc']['tmp_name'];
        $error = $_FILES['kyc']['error'];
        $extension = pathinfo($filename,PATHINFO_EXTENSION);
        $destination = __DIR__."\kycimages\ $filename";

        if($error==4){
            $message = 'no file was uploded';
        }
        if($error == 0){
            if(in_array($extension,$filesext)){

                
                    move_uploaded_file($tempfolder,$destination);
                    $veritype = $_POST['selectn'];
                    $query = "UPDATE clients SET veripic = '$filename',veritype ='$veritype' WHERE email = '$email'";
                    $send = $conn->query($query);
                   
                    $_SESSION['profilepic'] = $filename;
                    $message ='uploaded';
                    $response ='your kyc file has been uploaded secsessfully';

                }
            
            else{
                $message ='image type not allowed';
            }
        }
    
    

    $veritype = $_POST['selectn'];
    $query = "UPDATE clients SET veritype = '$veritype' WHERE email = '$email'";
    $send = $conn->query($query);



}

}
else{
    $message = 'upload kyc';
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
       #submitkyc{
        background-color: blue;
        border: none;
        text-transform: capitalize;
        color: white;
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
            padding-top:2cm ;
            
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

    <div class=" col clpage col-md-8 " style="">
      <!-- welcome -->
      <div class="col-11 yourballance mx-auto">
        <h3>Hi <span class="firstname"><?=$firstname?></span><?=$response?></h3>
   </div>
   <!-- welcome end -->
        <!-- deposit -->
     <div class="col-12 col-md-6 depostebox ">
        <span class="ds"><?= $message?></span>
        <form action="kyc.php" method="POST" enctype="multipart/form-data">


        <div class="fbox">
            <select name="selectn" id="selectcurrency" class="">
              <option ></option>
              <option value="national_id">national id</option>
              <option value="passport">passport</option>
              <option value="driving_licence">driving licence</option>
            </select>
  
          </div>


          <div class="fbox">
          <input type="file" name="kyc" id="kyc" class="">
          </div>
         
          <div class="fbox sub">
              <input type="submit" name="file" id="submitkyc" >
              </div>
        </form>
       </div>
       <!-- deposit e-->
    </div>
</body>
</html>

