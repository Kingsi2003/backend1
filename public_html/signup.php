<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exeption;

 require('vendor/autoload.php');
include('config.php');
include('sessionlogin.php');


function sendmail($messag,$receaver,$clifirstname,$clilastname){

    // $mail = new PHPMailer;
    // $mail->isSMTP();
    // $mail->SMTPAuth = true;
    // $mail->SMTPSecure ='ssl';
    // $mail->Host = 'smtp@gmail.com';
    // $mail->Port ='465';
    // $mail->isHTML();
    // $mail->Username='infoberkshiree@gmail.com';
    // $mail->Password ='maaueridutyeanvo';
    // $mail->SetFrom('infoberkshiree@gmail.com');
    // $mail->Subject='support';
    // $mail->Body ="$message";
    // $mail->AddAddress("$receaver");
    // $mail->Send();
    
    
    
    
    $year = date('Y');
    
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    
    try {
        //Server settings
                            //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'infoberkshiree@gmail.com';                     //SMTP username
        $mail->Password   = 'maaueridutyeanvo';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('infoberkshiree@gmail.com', 'support');
       //Add a recipient
        $mail->addAddress("$receaver");               //Name is optional
       
    
      
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Berkshire Exchange';
        $mail->Body    = "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Document</title>
            <style>
            .container{
                width:350px;
            
                margin: auto;
                text-align: center;
    
            }
            header{
                background-color:rgb(157, 157, 216);
                padding: .5cm;
                text-align: center;
    
                text-transform: capitalize;
            }
            section{
                background-color:rgb(212, 216, 203);
                padding: .5cm;
               text-align: center;
               
                text-transform: capitalize;
            }
            footer{
                background-color: gainsboro;
                padding: .5cm;
                text-align: center;
                text-transform: capitalize;
            }
            </style>
        </head>
        <body>
            <div class='container'>
                <header>
                    <h3>beckshire exchange</h3>
                    <p>beckshire exchange team</p>
                </header>
                <section>
                    <h4>dear <span>$clifirstname</span> <span>$clilastname</span></h4>
                    <p>$messag.</p>
                </section>
                <footer>
                    <p>N.B: do not disclose your password or account information to anyone &copy; $year courtesy: beckshire exchange investment limited team <br> for complaint and suggestion, kindly send an email to <a href='mailto:infoberkshiree@gmail.com'>infoberkshiree@gmail.com</a></p>
                </footer>
        
            </div>
        </body>
        </html>";
     
        $mail->send();
        echo '<script>alert("email sent")</script>';
    } catch (Exception $e) {
        echo '<script>alert("email not sent ")</script>';
    }
    
    
    
    
    }
    


$message = "";


if(isset($_GET['refer'])){
    $rfcode = $_GET['refer'];
    $query0 = "SELECT * FROM `clients` WHERE `referalcode`='$rfcode'";
    $result0 = mysqli_query($conn,$query0);
    $result0num = mysqli_num_rows($result0);
    $r0 = mysqli_fetch_assoc($result0);
    $_SESSION['refer'] = $_GET['refer'];

    if($result0num == 0){
        echo "<scritp>alart('invalid referal code')</script>";
    }
    else{
       $bonus = $r0['referalpoint'] + 10;
       $query01 = "UPDATE `clients` SET `referalpoint` = '$bonus' WHERE `referalcode` = '$rfcode'";
       $result01 = mysqli_query($conn,$query01);
    }


////

}



$firstname = filter_input(INPUT_POST,'firstname',FILTER_SANITIZE_SPECIAL_CHARS);
$lastname = filter_input(INPUT_POST,'lastname',FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST,'password',FILTER_SANITIZE_SPECIAL_CHARS);
$comfirmpassword = filter_input(INPUT_POST,'comfirmpassword',FILTER_SANITIZE_SPECIAL_CHARS);



if($_SERVER['REQUEST_METHOD'] == 'POST'){
    


if(empty($_POST['firstname']) OR empty($_POST['lastname'] )OR empty($_POST['email'] )OR empty($_POST['password'] ) OR  empty($_POST['comfirmpassword']) OR $_POST['email'] == 'infoberkshiree@gmail.com' OR $_POST['password'] == 'Prince9437' ){
   $message = "values are empty or invalid inpute";
}
else{
  if(isset($email) AND $comfirmpassword == $password){
      $query1 ="SELECT * FROM `clients` WHERE email = '$email' ";
      $r = mysqli_query($conn,$query1); 
      $resultnum = mysqli_num_rows($r);
  }
      if($resultnum == 0){
          $verify = 'pending';
          $regdate = date('Y-m-d H:i:s');
          $regtime = date('H:i:s');
          $referalcode = strtoupper( bin2hex(random_bytes(4)) );
          $referalpoint = 0;
          
          $ballance = 0;
          $query2 = "INSERT INTO `clients` VALUES ('$firstname','$lastname','$email','$password', '$referalcode','$referalpoint','$regdate','$verify',null,null,null,null,null,null,null,null,null,'$regtime','$ballance',null,0,null,0,null,0,null,null,null,0,null,null)";
          $r2 = mysqli_query($conn,$query2);
         
          $query3 ="SELECT * FROM `clients` WHERE `email` = '$email' ";
          $r3 = mysqli_query($conn,$query3);
          $result = mysqli_fetch_assoc($r3);
          
              $_SESSION['password'] = $result['password'];
              $_SESSION['firstname'] = $result['firstname'];
              $_SESSION['lastname'] = $result['lastname'];
              $_SESSION['email'] = $result['email'];

              $_SESSION['referalcode'] = $result['referalcode'];
              $_SESSION['referalpoint'] = $result['referalpoint'];
              $_SESSION['regdate'] = $result['regdate'];
              $_SESSION['regtime'] = $result['regtime'];
              $_SESSION['verify'] = $result['verify'];
              $_SESSION['ballance'] = $result['ballance'];



              $referer =  $_SESSION['refer'];
              $clifirstname =  $_SESSION['firstname'];
              $clilastname =  $_SESSION['lastname'];
              $email =  $_SESSION['email'];
              $password =  $_SESSION['password'];
              $referalcode =  $_SESSION['referalcode'];


              $query="UPDATE `clients` SET `referer`='$referer' WHERE `email`='$email'";
              $result = mysqli_query($conn,$query);
               
              $messag =" <h4>welcome to beckshire exchange</h4>
              <ul>
 
                 <li>Email: $email <span></span></li>
                 <li>password:$password <span></span></li>
                 <li>referal code:$referalcode <span></span></li>
              </ul>
              <p>we are pleased to welcome you to beckshire exchange limited company</p>
              <small>steps to be a successful investor</small>
               <ol>
                 <li>fund your account (deposite)</li>
                 <li>select your investment plan and wait for your investment to mature</li>
                 <li>kindly withdraw your interest and share your testimonies</li>
 
               </ol>
 
 ";
             
        sendmail($messag,$email,$clifirstname,$clilastname);

          header("Location:dashboard/dashboard.php");
        }
        else if($resultnum > 0){
          $message = 'already registered please log in';
        

        }

      }  
      


};



////



   



//
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootsrap/css/filess/font-awesome.css">
        <link rel="icon" href="img/i1.png">
        <title>sign-up</title>
        <script defer src="jquery-3.3.1.min.js"></script>
        <script defer src="dashboard/main1.js"></script>
        <style>
            *{
                padding: 0;
                margin: 0;
                box-sizing: border-box;
            }
            .crecon{
                width: 350px;
    
                margin: auto;
                margin-top: 1cm;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content:center;
                gap: 1cm;
                margin-bottom: 1cm;
            }
            .crecon h1{
                text-transform: capitalize;
            }
            label{
                width: 100%;
                display: block;
                font-size: 1.2em;
                font-weight: 600;
                text-transform: capitalize;
                margin-bottom: 5px;
                
            }
            input{
                height: 1.2cm;
                width: 350px;
                display: block;
                margin-bottom: .5cm;
                padding-left: 10px;
                border: 3px solid gray;
                border-radius: 10px;
                outline: none;
            }
            button{
                width: 3cm;
                height: 1cm;
                text-transform: capitalize;
                background-color: #2962ff;
                color:white;
                border: 3px solid gray;
                border-radius: 10px 10px 10px 0;
            }
            button:active{
                background-color: black;
                color: white;
            }
            form div{
                position: relative;
            }
            form div .fa{
                position: absolute;
                right: 1cm;
                top: 1cm;
            }
            .smalla a{
                text-transform: capitalize;
                text-decoration: none;
                color:blue;
            }
        </style>
    </head>
<body>
     <!-- nav -->
     <label for="checkbox" class="tog"><i class="fa fa-bars"></i></label>

     <div class="na">
         <nav>
             <ul>
                 <li><a href="index.php">blog</a></li>
                 <li><a href="transactions.php">transactions</a></li>
                 <li><a href="plans.php">plans</a></li>
                 <li><a href="faq.php">FAQS</a></li>
             </ul>
             <div class="buth">
                <a href="signin.php"><button class="signin">sign in</button></a>
                <a href="signup.php"><button class="signup">sign up</button></a>
                
             </div>
         </nav>

          <div class="name"><h3>berkshire-exchange</h3></div>
     </div>
    
     <!-- nav -->
     <div class="crecon">
        <h1>sign up</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" id="createffaccount" method="POST">
        <div class="formbox">
            <label for="firstname">firstname</label>
            <input type="text" name="firstname" id="firstname" placeholder="robert" class="inputtext">
            <i class="fa fa-user "></i>

        </div>
        <div class="formbox">
            <label for="lastname">lastname</label>
            <input type="text" name="lastname" id="lastname" placeholder=" auston" class="inputtext">
            <i class="fa fa-user "></i>

        </div>
       <div class="formbox">
        <label for="email">email</label>
        <input type="email" name="email" id="email" placeholder="you@gmail.com"class="inputtext" >
          <i class="fa fa-envelope "></i>
       </div>
       <div class="formbox">
        <label for="password">password</label>
        <input type="password" name="password" id="password" placeholder="enter your password"class="inputtext" >
         <i class="fa fa-eye " style="margin-top: 3px;"></i>

    </div>
       <div class="formbox">
        <label for="comfirmpassword">password</label>
        <input type="password" name="comfirmpassword" id="comfirmpassword"  placeholder="comfirm your password" title="not less than five characters"class="inputtext" >
         <i class="fa fa-eye " style="margin-top: 3px;"></i>

    </div>
    <div class="formbox">
        <small class="smalla"><span style="text-transform: capitalize;">already have an acount? </span><a href="signin.php">log in</a></small>
       </div>
       <div class="formbox">
        <small class="smalla errormessagecreat"><?=$message?></small>
       </div>
       <div class="formbox" style="margin-top: 10px;">

        <button class="submit  signup" name="submit">submit</button>

       </div>
      
        

      
    </form>

     </div>


     <!-- divfooter begin -->
     <div class="footer">
        <div class="fbo">
            <h1>categories</h1>
            
               <div class="lib"><li><a href="">buy bitcoin</a></li></div> 
               <div class="lib"><li><a href="">mine bitcoin</a></li></div> 
               <div class="lib"><li><a href="">brocker platforms</a></li></div> 
               <div class="lib"><li><a href="">bitcoin wallet</a></li></div> 
                
        
        </div>
        <div class="fbo">
            <h1>recent post's</h1>
            
               <div class="lib"><li><a href="">decoding the intricies of a bitcoin mining calculator--<?=date('Y')?> update</a></li></div> 
               <div class="lib"><li><a href="">the down of a new era: blackrock's bitcoin etf and its implications</a></li></div> 
               <div class="lib"><li><a href="">bitcoins new guide <?=date('Y')?></a></li></div> 
               <div class="lib"><li><a href="">how to buy bitcoin best <?=date('Y')?></a></li></div> 
                
        
        </div>
        <div class="fbo">
            <h1>delelopers</h1>
            
               <div class="lib"><li><a href="">pool operators</a></li></div> 
               <div class="lib"><li><a href="">software developers</a></li></div> 
               <div class="lib"><li><a href="">bug bounty program</a></li></div> 
               <div class="lib"><li><a href="">business development</a></li></div> 
                
        
        </div>

    </div>
    <!-- divfooter end -->
    <!-- footer -->
    <footer>
        <h1>berkshire-exchange-earn bitcoin</h1>
        <p>berkshire-exchange <?=date('Y')?>. all rights reserverd.</p>
        <p>
            <span>
                <a href="">privacy</a>
            </span>
            <span>
                <a href="">terms and condition</a>
            </span>
            <span>
                <a href="">cookie policy</a>
            </span>
        </p>
    </footer>
    <!-- footer end -->
</body>
</html>

