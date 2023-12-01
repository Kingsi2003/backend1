<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';




include('../sessionlogin.php');
include('../config.php');







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
















$dc = '';
$da = '';
$dd = '';
$di = '';
$ds = '';
$wc = '';
$wa = '';
$wd = '';
$wi = '';
$ws = '';
$we = '';
$wad = '';
$de = '';

$semail='';
$veri1='';
$message='';
$amount = '';
$status = '';
$firstname = '';
$lastname = '';
$email = '';
$referer = '';
$stat = '';
$lastwith = '';
$veripic = '';
$referalcode = '';
$veritype='';



if(isset($_POST['cdep'])  AND isset($_POST['userem']) ){

    $invoice = $_POST['userem'];
    
    $table = $_POST['cdep'];
    
    $query ="DELETE FROM $table WHERE depositeinvoice = '$invoice'";
    $send = mysqli_query($conn,$query);

   
}
if(isset($_POST['cwith'])  AND isset($_POST['userem']) ){

    $invoice = $_POST['userem'];
    $table = $_POST['cwith'];
    $query ="DELETE FROM $table WHERE  winvoice = '$invoice'";
    $send = mysqli_query($conn,$query);

   
}
if(isset($_POST['cmessage'])  AND isset($_POST['userem']) ){

    $sender = $_POST['userem'];
    $table = $_POST['cmessage'];
    $query ="DELETE FROM $table WHERE  sender = '$sender'";
    $send = mysqli_query($conn,$query);

   
}



if(isset($_POST['vmess'])  AND isset($_POST['vmesss']) ){

    $sender = $_POST['vmess'];
    $table = $_POST['vmesss'];
    $query ="DELETE FROM $table WHERE email = '$sender'";
    $send = mysqli_query($conn,$query);

   
}













if($_SERVER['REQUEST_METHOD']=='POST'){

    if(isset($_POST['vname']) AND isset($_POST['vemail'])){

       $name = $_POST['vname'];
       $email = $_POST['vemail'];
      $query ="INSERT INTO visitors VALUES ('$name','$email')";
      $send = mysqli_query($conn,$query);

    }



    if(isset($_POST['cname']) AND isset($_POST['cemail']) AND isset($_POST['csubject']) AND isset($_POST['cmessage'])){

      $name = $_POST['cname'];
     $email = $_POST['cemail'];
      $subject = $_POST['csubject'];
     $message = $_POST['cmessage'];
      $query ="INSERT INTO vcontact VALUES ('$name','$email','$subject','$message')";
      $send = mysqli_query($conn,$query);

    }

 
if(isset($_POST['type']) AND isset($_POST['emailt']) AND isset($_POST['search'])){
    
    if($_POST['type']=='user'){
    
    $veri ='';
    $pend ='';
    $semail = trim( $_POST['emailt']);
    $query="SELECT * FROM clients WHERE email = '$semail'";
    $send = mysqli_query($conn,$query);
    $result = mysqli_fetch_assoc($send);
    $resultn = mysqli_num_rows($send);

    if($resultn>0){
        $amount = $result['depositeamount'];
        $status = $result['depositestatus'];
        $firstname = $result['firstname'];
        $lastname = $result['lastname'];
        $email = $result['email'];
        $referer = $result['referer'];
        $stat = $result['verify'];
        $lastwith = $result['withdrowalstatus'];
        $veripic = $result['veripic'];
        $veritype = $result['veritype'];
        $referalcode = $result['referalcode'];
        
        if($stat=='pending'){
            $pend = 'btn-danger';
        }
        else if($stat == 'approved'){
            $veri = ' btn-success';    }
       
        else if($stat == 'verified'){
            $veri1 = ' btn-success';    }
       
        
        else{
    
            $veri = 'btn-light';
            $veri1 = 'btn-light';
            $pend = 'btn-light';
    
        }
       
    
    }
    else{
        $message ='no user with this email';
       }
  
}
  

   
}  








if(isset($_POST['type']) AND isset($_POST['emailt']) AND isset($_POST['search'])){
    
    if($_POST['type']=='referer'){
    
    $veri ='';
    $pend ='';
    $semail = trim( $_POST['emailt']);
    $query="SELECT * FROM clients WHERE referalcode = '$semail'";
    $send = mysqli_query($conn,$query);
    $result = mysqli_fetch_assoc($send);
    $resultn = mysqli_num_rows($send);

    if($resultn>0){
       
        $firstname = $result['firstname'];
        $lastname = $result['lastname'];
        $email = $result['email'];
        $referer = $result['referer'];
        $stat = $result['verify'];
        $veripic = $result['veripic'];
        $referalcode = $result['referalcode'];

       
    
            $veri = 'btn-light';
            $veri1 = 'btn-light';
            $pend = 'btn-light';
    
        
       
    
    }
    else{
        $message ='no user with this referal code';
       }
  
}
  

   
}  











if(isset($_POST['type']) AND isset($_POST['emailt']) AND isset($_POST['search'])){
    
    if($_POST['type']=='deposite'){
    
    $veri ='';
    $pend ='';
    $semail = trim( $_POST['emailt']);
    
    $query="SELECT * FROM depositet WHERE depositeinvoice = '$semail'";
    $send = mysqli_query($conn,$query);
    $result = mysqli_fetch_assoc($send);
    $resultn = mysqli_num_rows($send);
    
    
    if($resultn>0){
        $dc = $result['depositecurrency'];
        $da = $result['depositeamount'];
        $dd = $result['depositedate'];
        $di = $result['depositeinvoice'];
        $ds = $result['depositestatus'];
        $de = $result['email'];
        
        if($ds=='pending'){
            $pend = 'btn-danger';
        }
        else if($ds == 'approved'){
            $veri = ' btn-success';    }
       
        else if($ds == 'verified'){
            $veri1 = ' btn-success';    }
       
        
        else{
    
            $veri = 'btn-light';
            $veri1 = 'btn-light';
            $pend = 'btn-light';
    
        }
       
        
    }
    else{
        $message ='invalid deposite invoice';
       }
    

   

}
  
   
}  



if(isset($_POST['type']) AND isset($_POST['emailt']) AND isset($_POST['search'])){
    
    if($_POST['type']=='withdrawal'){
    
    $veri ='';
    $pend ='';
    $semail = trim( $_POST['emailt']);
    $query="SELECT * FROM withdrowt WHERE withdrowalinvoice = '$semail'";
    $send = mysqli_query($conn,$query);
    $result = mysqli_fetch_assoc($send);
    $resultn = mysqli_num_rows($send);

    if($resultn>0){
        $wc = $result['withdrowalcurrency'];
        $wa = $result['withdrowalamount'];
        $wd = $result['withdrowaldate'];
        $wi = $result['withdrowalinvoice'];
        $ws = $result['withdrowalstatus'];
        $we = $result['email'];
        $wad = $result['withadd'];
        if($ws=='pending'){
            $pend = 'btn-danger';
        }
        else if($ws == 'approved'){
            $veri = ' btn-success';    }
       
        else if($ws == 'verified'){
            $veri1 = ' btn-success';    }
       
        
        else{
    
            $veri = 'btn-light';
            $veri1 = 'btn-light';
            $pend = 'btn-light';
    
        }
    }
    else{
        $message ='invalid withdrawal invoice';
       }
  
   

}
  

   
}  






else if(isset($_POST['approve']) AND isset($_POST['emailt']) AND $_POST['type']=='deposite'){
    
    $verify = $_POST['approve'];
   $semail = trim( $_POST['emailt']);
  

   
   $query="SELECT * FROM depositet  WHERE depositeinvoice ='$semail'";
   $send = mysqli_query($conn,$query);
   $result = mysqli_fetch_assoc($send);
   $resultn = mysqli_num_rows($send);
       
       
       if($resultn>0){
           $query="UPDATE clients SET depositestatus = '$verify' WHERE depositeinvoice = '$semail'";
           $send = mysqli_query($conn,$query);

           $query="UPDATE clients SET `add` = 'add' WHERE depositeinvoice = '$semail'";
           $send = mysqli_query($conn,$query);
           
           $query="UPDATE depositet SET depositestatus = '$verify' WHERE depositeinvoice = '$semail'";
           $send = mysqli_query($conn,$query);


           
          
           
           
           $query="SELECT * FROM clients WHERE depositeinvoice = '$semail'";
           $send = mysqli_query($conn,$query);
           $result = mysqli_fetch_assoc($send);
           $resultn = mysqli_num_rows($send);
           
           
   
   
      if($resultn>0){
       $dc = $result['depositecurrency'];
       $da = $result['depositeamount'];
       $dd = $result['depositedate'];
       $di = $result['depositeinvoice'];
       $ds = $result['depositestatus'];
       $de = $result['email'];



       $messag = " your deposite of ($)$da with transaction reference $semail has been approved successfully. <br> kindly login to your account to check your ballance ";
   
           $query="SELECT firstname,lastname FROM clients WHERE email = '$de'";
           $send = mysqli_query($conn,$query);
           $result = mysqli_fetch_assoc($send);
           $resultn = mysqli_num_rows($send);
           if($resultn>0){
                   $firstname = $result['firstname'];
                   $lastname = $result['lastname'];
               $clifirstname = $firstname;
               $clilastname = $lastname;
          sendmail($messag,$de,$clifirstname,$clilastname);
           }




       
       if($ds=='pending'){
           $pend = 'btn-danger';
       }
       else if($ds == 'approved'){
           $veri = ' btn-success';    }
      
       else if($ds == 'verified'){
           $veri1 = ' btn-success';    }
      
       
       else{
   
           $veri = 'btn-light';
           $veri1 = 'btn-light';
           $pend = 'btn-light';
   
       }
      
       
   }
   else{
       $message ='invalid deposite invoice';
      }
         
          
       }
      
  

  }








else if(isset($_POST['approve']) AND isset($_POST['emailt']) AND $_POST['type']=='user'){
    
    $verify = $_POST['approve'];
   $semail = trim( $_POST['emailt']);
  

   
   $query="SELECT * FROM clients  WHERE email ='$semail'";
   $send = mysqli_query($conn,$query);
   $result = mysqli_fetch_assoc($send);
   $resultn = mysqli_num_rows($send);
       
       
       if($resultn>0){
           $query="UPDATE clients SET verify = '$verify' WHERE email = '$semail'";
           $send = mysqli_query($conn,$query);

          

           
          
           
           
           $query="SELECT * FROM clients WHERE email = '$semail'";
           $send = mysqli_query($conn,$query);
           $result = mysqli_fetch_assoc($send);
           $resultn = mysqli_num_rows($send);
           
           
   
   
      if($resultn>0){
       $dc = $result['depositecurrency'];
       $da = $result['depositeamount'];
       $dd = $result['depositedate'];
       $di = $result['depositeinvoice'];
       $ds = $result['depositestatus'];
       $de = $result['email'];



       $messag = " your account $de has been approved successfully. <br> kindly login to your account invest more and earn big";
   
           $query="SELECT firstname,lastname FROM clients WHERE email = '$de'";
           $send = mysqli_query($conn,$query);
           $result = mysqli_fetch_assoc($send);
          echo $resultn = mysqli_num_rows($send);
           if($resultn>0){
                   $firstname = $result['firstname'];
                   $lastname = $result['lastname'];
               $clifirstname = $firstname;
               $clilastname = $lastname;
          sendmail($messag,$de,$clifirstname,$clilastname);
           }




       
       if($ds=='pending'){
           $pend = 'btn-danger';
       }
       else if($ds == 'approved'){
           $veri = ' btn-success';    }
      
       else if($ds == 'verified'){
           $veri1 = ' btn-success';    }
      
       
       else{
   
           $veri = 'btn-light';
           $veri1 = 'btn-light';
           $pend = 'btn-light';
   
       }
      
       
   }
   else{
       $message ='invalid user email';
      }
         
          
       }
      
  

  }






  

else if(isset($_POST['verify']) AND isset($_POST['emailt']) AND $_POST['type']=='user'){


    $verify = $_POST['verify'];
   $semail = trim( $_POST['emailt']);
  

   
   $query="SELECT * FROM clients  WHERE email ='$semail'";
   $send = mysqli_query($conn,$query);
   $result = mysqli_fetch_assoc($send);
   $resultn = mysqli_num_rows($send);
       
       
       if($resultn>0){
           $query="UPDATE clients SET verify = '$verify' WHERE email = '$semail'";
           $send = mysqli_query($conn,$query);

          

           
          
           
           
           $query="SELECT * FROM clients WHERE email = '$semail'";
           $send = mysqli_query($conn,$query);
           $result = mysqli_fetch_assoc($send);
           $resultn = mysqli_num_rows($send);
           
           
   
   
      if($resultn>0){
       $dc = $result['depositecurrency'];
       $da = $result['depositeamount'];
       $dd = $result['depositedate'];
       $di = $result['depositeinvoice'];
       $ds = $result['depositestatus'];
       $de = $result['email'];



       $messag = " your account $de has been verified successfully. <br> kindly login to your account invest more and earn big";
   
           $query="SELECT firstname,lastname FROM clients WHERE email = '$de'";
           $send = mysqli_query($conn,$query);
           $result = mysqli_fetch_assoc($send);
           $resultn = mysqli_num_rows($send);
           if($resultn>0){
                   $firstname = $result['firstname'];
                   $lastname = $result['lastname'];
               $clifirstname = $firstname;
               $clilastname = $lastname;
          sendmail($messag,$de,$clifirstname,$clilastname);
           }




       
       if($ds=='pending'){
           $pend = 'btn-danger';
       }
       else if($ds == 'approved'){
           $veri = ' btn-success';    }
      
       else if($ds == 'verified'){
           $veri1 = ' btn-success';    }
      
       
       else{
   
           $veri = 'btn-light';
           $veri1 = 'btn-light';
           $pend = 'btn-light';
   
       }
      
       
   }
   else{
       $message ='invalid user email';
      }
         
          
       }
      
  

  }







else if(isset($_POST['verify']) AND isset($_POST['emailt']) AND $_POST['type']=='deposite'){
    
     $verify = $_POST['verify'];
     $semail = trim( $_POST['emailt']);
     $query="SELECT * FROM depositet WHERE depositeinvoice = '$semail'";
    $send = mysqli_query($conn,$query);
    $result = mysqli_fetch_assoc($send);
    $resultn = mysqli_num_rows($send);
    

        if($resultn>0){
            $query="UPDATE clients SET depositestatus = '$verify' WHERE depositeinvoice = '$semail'";
            $send = mysqli_query($conn,$query);

            $query="UPDATE clients SET `add` = 'add' WHERE depositeinvoice = '$semail'";
            $send = mysqli_query($conn,$query);
            
            $query="UPDATE depositet SET depositestatus = '$verify' WHERE depositeinvoice = '$semail'";
            $send = mysqli_query($conn,$query);
            
            
            $query="SELECT * FROM depositet WHERE depositeinvoice = '$semail'";
            $send = mysqli_query($conn,$query);
            $result = mysqli_fetch_assoc($send);
            $resultn = mysqli_num_rows($send);
            
    
    
       if($resultn>0){
        $dc = $result['depositecurrency'];
        $da = $result['depositeamount'];
        $dd = $result['depositedate'];
        $di = $result['depositeinvoice'];
        $ds = $result['depositestatus'];
        $de = $result['email'];



        $messag = " your deposite of ($)$da with transaction reference $semail has been verified successfully. <br> kindly login to your account to check your ballance ";
   
        $query="SELECT firstname,lastname FROM clients WHERE email = '$de'";
        $send = mysqli_query($conn,$query);
        $result = mysqli_fetch_assoc($send);
        $resultn = mysqli_num_rows($send);
        if($resultn>0){
                $firstname = $result['firstname'];
                $lastname = $result['lastname'];
            $clifirstname = $firstname;
            $clilastname = $lastname;
       sendmail($messag,$de,$clifirstname,$clilastname);
        }




        
        if($ds=='pending'){
            $pend = 'btn-danger';
        }
        else if($ds == 'approved'){
            $veri = ' btn-success';    }
       
        else if($ds == 'verified'){
            $veri1 = ' btn-success';    }
       
        
        else{
    
            $veri = 'btn-light';
            $veri1 = 'btn-light';
            $pend = 'btn-light';
    
        }
       
        
    }
    else{
        $message ='invalid deposite invoice';
       }
          
           
        }
       
   

   }









else if(isset($_POST['pending']) AND isset($_POST['emailt']) AND $_POST['type']=='deposite'){
    $verify = $_POST['pending'];
    $semail = trim( $_POST['emailt']);
    $query="SELECT * FROM depositet WHERE depositeinvoice = '$semail'";
    $send = mysqli_query($conn,$query);
    $result = mysqli_fetch_assoc($send);
    $resultn = mysqli_num_rows($send);
    

        if($resultn>0){
            $query="UPDATE clients SET depositestatus = '$verify' WHERE depositeinvoice = '$semail'";
            $send = mysqli_query($conn,$query);

            $query="UPDATE clients SET `add` = null WHERE depositeinvoice = '$semail'";
            $send = mysqli_query($conn,$query);
            
            $query="UPDATE depositet SET depositestatus = '$verify' WHERE depositeinvoice = '$semail'";
            $send = mysqli_query($conn,$query);
            
            
            $query="SELECT * FROM depositet WHERE depositeinvoice = '$semail'";
            $send = mysqli_query($conn,$query);
            $result = mysqli_fetch_assoc($send);
            $resultn = mysqli_num_rows($send);
            
    
    
       if($resultn>0){
        $dc = $result['depositecurrency'];
        $da = $result['depositeamount'];
        $dd = $result['depositedate'];
        $di = $result['depositeinvoice'];
        $ds = $result['depositestatus'];
        $de = $result['email'];
        
        if($ds=='pending'){
            $pend = 'btn-danger';
        }
        else if($ds == 'approved'){
            $veri = ' btn-success';    }
       
        else if($ds == 'verified'){
            $veri1 = ' btn-success';    }
       
        
        else{
    
            $veri = 'btn-light';
            $veri1 = 'btn-light';
            $pend = 'btn-light';
    
        }
       
        
    }
    else{
        $message ='invalid deposite invoice';
       }
      
      
    }
   

   }
   

























else if(isset($_POST['approve']) AND isset($_POST['emailt']) AND $_POST['type']=='withdrawal'){
   
     $approve = $_POST['approve'];
     $semail = trim( $_POST['emailt']);

    $query="SELECT * FROM clients WHERE withdrowalinvoice = '$semail'";
    $send = mysqli_query($conn,$query);
    $result = mysqli_fetch_assoc($send);
    $resultn = mysqli_num_rows($send);
        if($resultn>0){

            $query="UPDATE clients SET withdrowalstatus = '$approve' WHERE withdrowalinvoice = '$semail'";
            $send = mysqli_query($conn,$query);
            
            $query="UPDATE clients SET minus = 'minus' WHERE withdrowalinvoice = '$semail'";
            $send = mysqli_query($conn,$query);
            
            $query="UPDATE withdrowt SET withdrowalstatus = '$approve' WHERE withdrowalinvoice = '$semail'";
            $send = mysqli_query($conn,$query);
            
            $query="SELECT * FROM clients WHERE withdrowalinvoice = '$semail'";
            $send = mysqli_query($conn,$query);
            $result = mysqli_fetch_assoc($send);
            $resultn = mysqli_num_rows($send);
           
           
            if($resultn>0){
                $amount = $result['withdrowalamount'];
            $status = $result['depositestatus'];
            $firstname = $result['firstname'];
            $lastname = $result['lastname'];
            $email = $result['email'];
            $referer = $result['referer'];
            $stat = $result['verify'];
            $lastwith = $result['withdrowalstatus'];



            $messag = " your withdrawal of ($)$amount with transaction reference $semail has been approved successfully. <br> kindly login to your account to check your ballance ";
   
           $query="SELECT firstname,lastname FROM clients WHERE email = '$email'";
           $send = mysqli_query($conn,$query);
           $result = mysqli_fetch_assoc($send);
           $resultn = mysqli_num_rows($send);
           if($resultn>0){
                   $firstname = $result['firstname'];
                   $lastname = $result['lastname'];
               $clifirstname = $firstname;
               $clilastname = $lastname;
          sendmail($messag,$email,$clifirstname,$clilastname);
           }





            if($lastwith=='pending'){
                $pend = 'btn-danger';
            }
            
           
            else if( $lastwith =='approved'){
                $veri = ' btn-success';
            }
            else if( $lastwith =='verified'){
                $veri = ' btn-success';
            }
            else{
                $veri = 'btn-light';
                
            }
        
            
            }
            else{
                $message ='invalid deposite invoice';
               }
      
          
             
        }
       
   }




else if(isset($_POST['verify']) AND isset($_POST['emailt']) AND $_POST['type'] =='withdrawal'){
    
     $verify = $_POST['verify'];
     $semail = trim( $_POST['emailt']);
     $query="SELECT * FROM clients WHERE withdrowalinvoice = '$semail'";
    $send = mysqli_query($conn,$query);
    $result = mysqli_fetch_assoc($send);
    $resultn = mysqli_num_rows($send);
        if($resultn>0){
           
            $query="UPDATE clients SET withdrowalstatus = '$verify' WHERE withdrowalinvoice = '$semail'";
            $send = mysqli_query($conn,$query);


            $query="UPDATE clients SET minus = 'minus' WHERE withdrowalinvoice = '$semail'";
            $send = mysqli_query($conn,$query);
            
            $query="UPDATE withdrowt SET withdrowalstatus = '$verify' WHERE withdrowalinvoice = '$semail'";
            $send = mysqli_query($conn,$query);
            
            
            
            $query="SELECT * FROM clients WHERE withdrowalinvoice = '$semail'";
            $send = mysqli_query($conn,$query);
            $result = mysqli_fetch_assoc($send);
            $resultn = mysqli_num_rows($send);
            if($resultn>0){
                $amount = $result['withdrowalamount'];
                $status = $result['depositestatus'];
                $firstname = $result['firstname'];
                $lastname = $result['lastname'];
                $email = $result['email'];
                $referer = $result['referer'];
                $stat = $result['verify'];
                $lastwith = $result['withdrowalstatus'];



                $messag = " your withdrawal of ($)$amount with transaction reference $semail has been approved successfully. <br> kindly login to your account to check your ballance ";
   
                $query="SELECT firstname,lastname FROM clients WHERE email = '$email'";
                $send = mysqli_query($conn,$query);
                $result = mysqli_fetch_assoc($send);
                $resultn = mysqli_num_rows($send);
                if($resultn>0){
                        $firstname = $result['firstname'];
                        $lastname = $result['lastname'];
                    $clifirstname = $firstname;
                    $clilastname = $lastname;
               sendmail($messag,$email,$clifirstname,$clilastname);
                }
     
     



                     
            if($lastwith=='pending'){
                $pend = 'btn-danger';
            }
            
           
            else if( $lastwith =='verified'){
                $veri1 = '  btn-success';
            }
            else if( $lastwith =='approved'){
                $veri1 = '  btn-success';
            }
            else{
                $veri1 = 'btn-light';
            }
            }
            else{
                $message ='invalid deposite invoice';
               }
       
     

        }
       

   }









else if(isset($_POST['pending']) AND isset($_POST['emailt']) AND $_POST['type'] == 'withdrawal'){
    
    $pend = $_POST['pending'];
    $semail = trim( $_POST['emailt']);
    $query="SELECT * FROM clients WHERE withdrowalinvoice = '$semail'";
    $send = mysqli_query($conn,$query);
    $result = mysqli_fetch_assoc($send);
    $resultn = mysqli_num_rows($send);
    if($resultn>0){
        $query="UPDATE clients SET withdrowalstatus = '$pend' WHERE withdrowalinvoice = '$semail'";
        $send = mysqli_query($conn,$query);
        
        $query="UPDATE withdrowt SET withdrowalstatus = '$pend' WHERE withdrowalinvoice = '$semail'";
        $send = mysqli_query($conn,$query);
        
     
        
        
        $query="SELECT * FROM clients WHERE withdrowalinvoice = '$semail'";
        $send = mysqli_query($conn,$query);
        $result = mysqli_fetch_assoc($send);
        $resultn = mysqli_num_rows($send);
        if($resultn>0){
            $amount = $result['withdrowalamount'];
                $status = $result['depositestatus'];
                $firstname = $result['firstname'];
                $lastname = $result['lastname'];
                $email = $result['email'];
                $referer = $result['referer'];
                $stat = $result['verify'];
                $lastwith = $result['withdrowalstatus'];
                if($status=='pending'){
                    $pend = 'btn-danger';
                }
                
               
                else if( $lastwith =='verified'){
                    $veri1 = '  btn-success';
                }
                else if( $lastwith =='approved'){
                    $veri1 = '  btn-success';
                }
                else{
                    $veri1 = 'btn-light';
                }
        }
        else{
            $message ='invalid deposite invoice';
           }
      
       
    }
   

   }
   






   
else if(isset($_POST['sendto']) AND isset($_POST['sendm']) AND  isset($_POST['mbody'])){
    if($_POST['sendto'] == 'support'){
    $messag = $_POST['mbody'];
    $semail = $_POST['to'];
   
        $query="INSERT INTO `chat`( `message`, `receaver`,`sender`) VALUES ('$messag','$semail','admin')";
        $send = mysqli_query($conn,$query);
    
    
       
    }
    if($_POST['sendto'] == 'email'){
        $semail = $_POST['to'];
        $messag = $_POST['mbody'];

        $query="SELECT firstname,lastname FROM clients WHERE email = '$semail'";
        $send = mysqli_query($conn,$query);
        $result = mysqli_fetch_assoc($send);
        $resultn = mysqli_num_rows($send);
        if($resultn>0){
                $firstname = $result['firstname'];
                $lastname = $result['lastname'];
            $clifirstname = $firstname;
            $clilastname = $lastname;
       sendmail($messag,$semail,$clifirstname,$clilastname);
        }
    //    $message,$receaver,$clifirstname,$clilastname;
    }
    }


   }
   
   







?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootsrap5/bootstrap-5.0.2/dist/css/bootstrap.css">
        <link rel="stylesheet" href="stylec.css">
        <link rel="stylesheet" href="bootsrap/css/filess/font-awesome.css">
        <script defer src="jquery-3.3.1.min.js"></script>
        <script defer src="main1.js"></script>
        <title>Document</title>
        <style>
            .kyci{
                width:200px;
                height:150px;
                
                

            }
            .kyci img{
                width:100%;
                height:100%;
                display:block;
                

            }
        </style>
    </head>
<body>

<div style="width: 1.5cm; height: 1cm; position: fixed; top: 10px;left: 10px; display: flex; justify-content: center;align-items: center;font-size:1cm;">

<a href="../signin.php"><i class="fa fa-arrow-circle-o-left text-light"></i></a>
</div>

    <div class="container-fluid " style="">
        <div class="row justify-content-center bg-dark flex-column align-items-center">
            <!--  -->
            <div class="c bg-dark col-12 col-lg-4 p-0 mb-5  border border-3 border-warning" style="height: 90vh;margin-top:2cm">
                <form action="<?=$_SERVER['PHP_SELF']?>" class=" col-12 "style="" method="POST">
                    <div class="f1">
                    <div class="form-group bg-dark p-4">
                        <label for="usersn" class="form-label text-capitalize text-light" style="font-weight: 600;">search users</label>
                        <div class="input-group"> 
                         <input type="text" class="form-control" name="emailt">
                        <select name="type" id="" class="border border-2 border-secondary">
                            <option value=""></option>
                            <option value="user">kyc</option>
                            <option value="deposite">deposite</option>
                            <option value="withdrawal">withdrawal</option>
                            <option value="referer">referer</option>
                        </select>
                        <input type="submit" value="search" class="btn btn-primary " name="search">
                       </div>
                       <div class="row  bg-secondary mt-2">
                        <div class="btn btn-group">
                            <button class="btn  text-dark border border-1 border-dark <?=$veri?> " name="approve" value="approved">appr</button>
                            <button class="btn  text-dark  border border-1 border-dark <?=$pend?>" name="pending" value="pending" >pend</button>
                            <button class="btn  text-dark  border border-1 border-dark  <?=$veri1?>" name="verify" value="verified">veri</button>
                         </div>
                       </div>
                    
        
                    </div>
                </div>  
        
                 
        
                <div class="">
                    <input type="text" class = "form-control" value="<?=$semail?>    <?=$message?>" name ="to">
                   <textarea name="mbody" id="" cols="30" rows="10" class="form-control " style="resize: none; width: 100%;height: 300px;margin: auto;"></textarea>
                    <div class="input-group d-flex justify-content-center mt-1">
                        <button class="btn btn-primary" name="sendm" value="message">send message</button>
                        <select name="sendto" id="">
                            <option value="support">support</option>
                            <option value="email">email</option>
                        </select>
                    </div>
                   
                 
                </div>  
                        
                   </form>
            </div>


            <!--  -->

            <div class="col-12 col-md-4 bg-dark  border border-3 border-warning" style="">
                               <ul  class="text-light">
                               <h5 class='text-primary'>user</h5>

                                 <li class="m-2" style="font-weight: 600;">fristname: <span> <?=$firstname?> </span></li>
                                 <li class="m-2" style="font-weight: 600;">lastname: <span><?=$lastname?></span></li>
                                 <li class="m-2" style="font-weight: 600;">email: <span><?=$email?></span></li>
                                 <li class="m-2" style="font-weight: 600;">referal code: <span><?=$referalcode?></span></li>
                                 <li class="m-2" style="font-weight: 600;">referer: <span><?=$referer?></span></li>
                                 <li class="m-2" style="font-weight: 600;">kyc: <span><?=$stat?></span></li>
                                 <li class="m-2" style="font-weight: 600;">kyc type: <span><?=$veritype?></span></li>
                                 <li class="m-2" style="font-weight: 600;"><a href="kycimages/ <?= $veripic?>" download ="<?=$referalcode?>" class='kyci'><div class='kyci'><img src="kycimages/ <?= $veripic?>" alt=""></div></a><div class='kyc'></div></li>
                                  <h5 class='text-primary'>withdrawal</h5>
                                 <small> <li class="m-2" style="font-weight: 600;">user email: <span><?=$we?></span></li></small>
                                  <li class="m-2" style="font-weight: 600;">withdrawal currency: <span><?=$wc?></span></li>
                                 <li class="m-2" style="font-weight: 600;">withdrawal amount: <span><?=$wa?></span></li>
                                 <li class="m-2" style="font-weight: 600;">withdrawal date: <span><?=$wd?></span></li>
                                 <li class="m-2" style="font-weight: 600;">withdrawal invoice: <span><?=$wi?></span></li>
                                 <li class="m-2" style="font-weight: 600;">withdrawal status: <span><?=$ws?></span></li>
                                 <li class="m-2" style="font-weight: 600;">withdrawal <?=$wc?> address: <span><?=$wad?></span></li>
                                 <h5 class='text-primary'>Deposite</h5>

                               <small>  <li class="m-2" style="font-weight: 600;">user email: <span><?=$de?></span></li></small>

                                 <li class="m-2" style="font-weight: 600;">deposite currency: <span><?=$dc?></span></li>
                                 <li class="m-2" style="font-weight: 600;">deposite amount: <span><?=$da?></span></li>
                                 <li class="m-2" style="font-weight: 600;">deposite date: <span><?=$dd?></span></li>
                                 <li class="m-2" style="font-weight: 600;">deposite invoice: <span><?=$di?></span></li>
                                 <li class="m-2" style="font-weight: 600;">deposite status: <span><?=$ds?></span></li>
                                
                              </ul>
                    </div>
            <!--  -->
            <div class="c  col-12 col-lg-4 p-0 bg-info" style="max-height:100vh;">
            
                <div class="screen  h-100 col-12 " style="">
                    <div class="col-12 bg-secondary  border border-3 border-warning  " style="overflow-y: scroll; height:100vh" >
                    <ol style="overflow-y: scroll;height: 100%;">

                    <?php
                    
                    
                    
                      $query = "SELECT * FROM `admindep`";
                      $send=mysqli_query($conn,$query);
                      $resultn = mysqli_num_rows($send);
                      if($resultn>0){

                        for($i=0;$i<$resultn;$i++){
                            $result = mysqli_fetch_assoc($send);

                          
                            $damount = $result['depositeamount'];
                            $dstatus = $result['depositestatus'];
                            $dstatu = $result['status'];
                            $dcurrency = $result['depositecurrency'];
                            $ddate = $result['depositedate'];
                            $dinvoice = $result['depositeinvoice'];
                            $duseremail = $result['email'];


                            // $wamount = $result['$wamount'];
                            // $wstatus = $result['$wstatus'];
                            // $wstatu = $result['$wstatus'];
                            // $wcurrency = $result['$wcurrency'];
                            // $wdate = $result['$wdate'];
                            // $winvoice = $result['$winvoice'];
                            // $wuseremail = $result['email'];

                            
                            ?>

                            <small style="font-weight:600;">
                            <li class="m-2 bg-light p-2 op position-relative" style="font-weight: 600;line-break: anywhere; ">
                            <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
                            <button  name="cdep" value="admindep"   class="bg-danger position-absolute d-flex justify-content-center align-items-center cls border-0" style="width:1cm;height:1cm;top:0;right:0;color:white;">X</button>
                            <input type="hidden"  name="userem"  value="<?=$dinvoice?>">

                            </form>

                               <p>Email: <span><?=$duseremail?></span></p>
                               <p>heading: <span><?=$dstatu?></span></p>
                               <p>currency: <span><?=$dcurrency?></span></p>
                               <p>amount: <span><?=$damount?></span></p>
                               <p>invoice: <span><?=$dinvoice?></span></p>
                               <p>date: <span><?=$ddate?></span></p>
                            </li>
                        </small>
                            <!-- <small style="font-weight:600;"><li class="m-2 bg-light p-2" style="font-weight: 600; "><span><?=$wuseremail?></span>><span><?=$wstatu?></span>><span><?=$wamount?></span></li></small> -->
                             
                            <?php


                        }
                      
                           
                      }




                      $query = "SELECT * FROM `withadmin`";
                      $send=mysqli_query($conn,$query);
                      $resultn = mysqli_num_rows($send);
                      if($resultn>0){

                        for($i=0;$i<$resultn;$i++){
                            $result = mysqli_fetch_assoc($send);

                          
                            // $damount = $result['depositeamount'];
                            // $dstatus = $result['depositestatus'];
                            // $dstatu = $result['status'];
                            // $dcurrency = $result['depositecurrency'];
                            // $ddate = $result['depositedate'];
                            // $dinvoice = $result['depositeinvoice'];
                            // $duseremail = $result['email'];

                           $wamount = $result['wamount'];
                           $wstatus = $result['wstatus'];
                            $wstatu = $result['status'];
                            $wcurrency = $result['wcurrency'];
                           $wdate = $result['wdate'];
                           $winvoice = $result['winvoice'];
                           $wuseremail = $result['email'];


                            ?>

                            <!-- <small style="font-weight:600;"><li class="m-2 bg-light p-2" style="font-weight: 600; "><span><?=$duseremail?></span>><span><?=$dstatu?></span>><span><?=$damount?></span></li></small> -->
                            <li class="m-2 bg-light p-2 op position-relative" style="font-weight: 600;line-break: anywhere; ">
                            <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
                            <button  name="cwith" value="withadmin"  class="bg-danger position-absolute d-flex justify-content-center align-items-center cls border-0" style="width:1cm;height:1cm;top:0;right:0;color:white;">X</button>
                            <input type="hidden"  name="userem"  value="<?=$winvoice?>">

                            </form>
                               <p>Email: <span><?=$wuseremail?></span></p>
                               <p>heading: <span><?=$wstatu?></span></p>
                               <p>currency: <span><?=$wcurrency?></span></p>
                               <p>amount: <span><?=$wamount?></span></p>
                               <p>invoice: <span><?=$winvoice?></span></p>
                               <p>date: <span><?=$wdate?></span></p>
                            </li>                             
                            <?php


                        }
                      
                           
                      }






                       $query = "SELECT * FROM `adminchat` WHERE receaver ='admin'";
                      $send=mysqli_query($conn,$query);
                      $resultn = mysqli_num_rows($send);
                      if($resultn>0){

                        for($i=0;$i<$resultn;$i++){
                            $result = mysqli_fetch_assoc($send);

                          
                            // $damount = $result['depositeamount'];
                            // $dstatus = $result['depositestatus'];
                            // $dstatu = $result['status'];
                            // $dcurrency = $result['depositecurrency'];
                            // $ddate = $result['depositedate'];
                            // $dinvoice = $result['depositeinvoice'];
                            // $duseremail = $result['email'];

                           $sender = $result['sender'];
                           $message = $result['message'];
                            
                         

                            ?>

                            <!-- <small style="font-weight:600;"><li class="m-2 bg-light p-2" style="font-weight: 600; "><span><?=$duseremail?></span>><span><?=$dstatu?></span>><span><?=$damount?></span></li></small> -->
                            <li class="m-2 bg-light p-2 op position-relative" style="font-weight: 600;line-break: anywhere; ">
                            <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
                            <button name="cmessage" value="adminchat" class="bg-danger position-absolute d-flex justify-content-center align-items-center cls border-0" style="width:1cm;height:1cm;top:0;right:0;color:white;">X</button>
                             <input type="hidden"  name="userem"  value="<?=$sender?>">
                            </form>                              <div class="col-12  d-flex justify-content-center align-items-center flex-column" style="max-height:250px;overflow-y: scroll; ">
                                       <h4>message</h4>
                                       <p><?=$sender?></p>
                                       <p><?=$message?></p>
                            </div>
                            </li>                             
                            <?php


                        }
                      
                           
                      }
                    
                    
                
                       $query = "SELECT * FROM `vcontact` ";
                      $send=mysqli_query($conn,$query);
                      $resultn = mysqli_num_rows($send);
                      if($resultn>0){

                        for($i=0;$i<$resultn;$i++){
                            $result = mysqli_fetch_assoc($send);

                          
                            // $damount = $result['depositeamount'];
                            // $dstatus = $result['depositestatus'];
                            // $dstatu = $result['status'];
                            // $dcurrency = $result['depositecurrency'];
                            // $ddate = $result['depositedate'];
                            // $dinvoice = $result['depositeinvoice'];
                            // $duseremail = $result['email'];

                           $name = $result['name'];
                           $message = $result['message'];
                           $email = $result['email'];
                           $subject = $result['subject'];
                            
                         

                            ?>

                            <!-- <small style="font-weight:600;"><li class="m-2 bg-light p-2" style="font-weight: 600; "><span><?=$email?></span>><span><?=$dstatu?></span>><span><?=$damount?></span></li></small> -->
                            <li class="m-2 bg-light p-2 op position-relative" style="font-weight: 600;line-break: anywhere; ">
                            <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
                            <button name="vmesss" value="vcontact" class="bg-danger position-absolute d-flex justify-content-center align-items-center cls border-0" style="width:1cm;height:1cm;top:0;right:0;color:white;">X</button>
                             <input type="hidden"  name="vmess"  value="<?=$email?>">
                            </form>                              <div class="col-12  d-flex justify-content-center align-items-center flex-column" style="max-height:250px;overflow-y: scroll; ">
                                       <h4>visitors message</h4>
                                       <p>name:<?=$name?></p>
                                       <p>Email:<?=$email?></p>
                                       <p>Subject:<?=$subject?></p>
                                       <p><?=$message?></p>
                            </div>
                            </li>                             
                            <?php


                        }
                      
                           
                      }
                    
                    
                    ?>
                    
                  
                    </ol>
                    </div>
                  
 
                  </div>
                  
             </div>
            
            
            <!--  -->
            <div class="c  col-12 col-lg-4 p-2 border border-3 border-warning" style="max-height: 80vh;">
            <h3 class="text-center text-light text-capitalize">members</h3>
            
                <ol style="overflow-y: scroll;" class="h-100 bg-secondary">

                <?php
                $query="SELECT email, referer FROM clients ";
                $send = mysqli_query($conn,$query);
                $resultnum = mysqli_num_rows($send);

               
            
                  for($i=0;$i<$resultnum;$i++){
                    $referer ='';
                    $result = mysqli_fetch_assoc($send);
                    $email=$result['email'];
                    $referer=$result['referer'];

                    ?>
                   <small> <li class="m-2 " style="font-weight: 600;"><span><?=$email?></span>  <span class="text-light"> referer: </span><span><?=$referer?></span></li></small>

                   <?php
                  }
                   ?>

                  
              </ol>
            
            </div>




            <div class="c  col-12 col-lg-4 p-2 border border-3 border-warning" style="max-height: 80vh;">
            <h3 class="text-center text-light text-capitalize">visitors</h3>
            
                <ol style="overflow-y: scroll;" class="h-100 bg-secondary">

                <?php
                $query="SELECT `name`, email FROM visitors ";
                $send = mysqli_query($conn,$query);
                $resultnum = mysqli_num_rows($send);

               
            
                  for($i=0;$i<$resultnum;$i++){
                    $referer ='';
                    $result = mysqli_fetch_assoc($send);
                    $email=$result['email'];
                    $name =$result['name'];

                    ?>
                   <small> <li class="m-2 " style="font-weight: 600;"><span><?=$email?></span> <br> <span><?=$name?></span> </li></small>

                   <?php
                  }
                   ?>

                  
              </ol>
            
            </div>

        </div>
    
    </div>
    <!-- <form action="" id="hidden2">
        <input type="text" name="start" value="start">
    </form> -->
</body>
</html>