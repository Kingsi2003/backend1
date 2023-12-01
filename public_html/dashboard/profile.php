<?php
include('../sessionlogin.php');
if(empty($_SESSION['password'])){
    header("Location:../signin.php");
}
else{
    $email = $_SESSION['email'];

    $query="SELECT * FROM clients WHERE email = '$email'";
    $send = mysqli_query($conn,$query);
    $result = mysqli_fetch_assoc($send);
    $resultn = mysqli_num_rows($send);
    
    


    if($resultn>0){
    
        $firstname = $result['firstname'];
        $lastname = $result['lastname'];
        $email = $result['email'];
        $password = $result['password'];
        $referalcode = $result['referalcode'];
        $referalpoint =  $result['referalpoint'];
        $regdate =  $result['regdate'];
        $verify = $result['verify'];
        
        $api='';
        $country='';
        $api='';
    
    
     
     
       function ip(){
        if(isset( $_SERVER["REMOTE_ADDR"])){
            return $_SERVER["REMOTE_ADDR"];
        }
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else if(isset($_SERVER['HTTP_CLIENT_IP'])){
            return $_SERVER['HTTP_CLIENT_IP'];
        }
       }
        
    
        $api = file_get_contents("https:/ip api.com/json/".ip());
        $country = $api->Country;
    
    
    
      
            
     
}




      
      
      
      if($_SERVER['REQUEST_METHOD'] == 'POST'){

        if(isset($_FILES['profile'])){
              
            
                $filesext = ['JPG','PNG','JPEG'];
             $filename = $_FILES['profile']['name'];
             $filename = time().$filename;

                $tempfolder = $_FILES['profile']['tmp_name'];
                $error = $_FILES['profile']['error'];
                $extension = pathinfo($filename,PATHINFO_EXTENSION);
                $destination = __DIR__."\profileimg\ $filename";
        
                if($error==4){
                    $message = 'no file was uploded';
                }
                if($error == 0){
                    if(in_array($extension,$filesext)){
        
                       
                            move_uploaded_file($tempfolder,$destination);
                            $query = "UPDATE clients SET  profileimg = '$filename' WHERE email = '$email'";
                            $send = $conn->query($query);
                            $profilepic = $filename;
                        
                        
                    }
                    else{
                        $message ='image type not allowed';
                    }
                }
            
            
        
          
        
        
        
        }
        
        }
        else{
            $message = 'upload kyc';
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
        .profilebox1{
            height: 300px;
            background-color: blueviolet;
            position: relative;
        }
        .profilebox1 img{
            width: 100%;
            height: 100%;
            display: block;
            
        }
        .profilepicsbox{
            width: 200px;
            height: 200px;
            background-color: blue;
            border-radius: 50%;
            position: absolute;
            left: 10%;
            bottom: -3cm;
            
        }
        .profilepicsbox input{
           display: none;
        }
        .profilepicsbox label{
        position: absolute;
        bottom: 0;
        font-size: 2em;
        
        }
        .profilepicsbox2{
            width: 100px;
            height: 100px;
            background-color: blue;
            border-radius: 50%;
            position: absolute;
            left:3.5cm;
            top: 10px;
        }
        .profilepicsbox img{
            width: 100%;
            height: 100%;
            display: block;
            border-radius: 50%;
        }
        .profilepicsbox2 img{
            width: 100%;
            height: 100%;
            display: block;
            border-radius: 50%;
        }
        #profilename{
            transform: translate(6cm,-2cm);
            text-transform: capitalize;
            font-size: 1.4em;
        
        }
        .yourballance{
            height: 2cm;
            background: linear-gradient(to left,black,blue);
            border-radius: 10px 0 0 10px;
            display: flex;
            align-items: center;
            padding-left: .5cm;
            margin-top: 4cm;
        }
        .referallink{
            height: 2cm;
          border: 3px solid white;
            display: flex;
            align-items: center;
            padding-left: .5cm;
            position: relative;
            margin-top: 1cm;
        }
        .referallink small{
            position: absolute;
            top: -17px;
            background-color: black;
            text-transform: capitalize;
        }
        .referallink .copy{
            border: none;
            position: absolute;
            right: 0cm;
            text-transform: capitalize;
            bottom: 0;
        
        }
        .referallink .copy:active{
            background-color: black;
            color: white;
        }
        .allprofile{
            width: 370px;
            margin: auto;
            height: 600px;
            background-color:gray;
            position: relative;
            margin-top: 1cm;
            margin-bottom: 1cm;
        }
        .allpbox{
            width: 100%;
            height: 470px;
            position: absolute;
            bottom: 0;
        }
        .alllbpox{
        
            height:1.5cm;
            margin-bottom: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 1cm;
            text-transform: capitalize;
            color: #000;
            font-size: .4cm;
        }
        .alllbpox .changepassword{
            padding: 10px;
            background-color: blue;
            text-transform: capitalize;
            border-radius: 0 10px 10px 0;
            color: white;
            
        }
        @media(max-width:720px){
            .referallink .copy{
                right: 0;
                font-size: small;
            }
            #profilename{
            transform: translate(20px,0cm);
            text-transform: capitalize;
            font-size: 1.4em;
        
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
        <div class="col-12 profilebox1">
            <img src="img2/240_F_186133910_NfSjXHdDDQ0zMLuHikKUqXUkgkS8aWrn.jpg" alt="">
          <figure class="profilepicsbox">
            <img src="profileimg/ <?= $profilepic?>" alt="" id="profilepicture">
            <figcaption id="profilename"><span><?=$firstname?></span><span><?=$lastname?></span></figcaption>
          </figure>
        </div>
      <!-- welcome -->
      <div class="col-11 yourballance mx-auto">
        <h3>Hi <span><?=$firstname?></span> <span class="reply">welcome to your profile</span></h3>
   </div>
   <!-- welcome end -->
      <!-- referallink -->
      <div class="col-11 referallinkbox mx-auto">
        
        <h3 class="referallink"><p style="margin-top: 10px; font-size:.5cm; " class="reflink">http://localhost/websites/signup.php?refer=<?=$referalcode?></p><small>referal link</small> <button class="copy">copy</button></h3>
      
   </div>
   <!-- referal link end -->
   <!-- allprofile -->
   <div class="allprofile">
      <figure class="profilepicsbox2">
        
        <img src="profileimg/ <?= $profilepic?>" alt="" id="profilepicture">
      </figure>
      
    <div class="allpbox">
      <div class="alllbpox"><span class="changepassword"><form action="profile.php" method="POST" enctype="multipart/form-data"><label for ="profile"><i class="fa fa-file" style="font-size:1cm;"></i></label><input type="file" name="profile" id ="profile" class="d-none"><button class="btn btn-primary">upload profile</button></form></div>
      <div class="alllbpox"><span>firstname :</span><span class="firstname"><?=$firstname?></span></div>
      <div class="alllbpox"><span>lastname :</span><span class="firstname"><?=$lastname?></span></div>
      <div class="alllbpox"><span>email :</span><small class="email" style="text-transform: lowercase; width:150px;word-break: break-all;"><?=$email?></small></div>
      <div class="alllbpox"><span>date registered :</span><small class="joindate"><?=$regdate?></small></div>
      <div class="alllbpox"><span>country :</span><span class="country"><?=$country?></span></div>
      <div class="alllbpox"><span>status :</span><span class="statusvirify" style=""><?=$verify?></span></div>
    </div>
   </div>
   <!-- allprofile end -->
    </div>

    <script>
        
    </script>
</body>
</html>

