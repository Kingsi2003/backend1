<?php
include('config.php');
include('sessionlogin.php');
function direct(){
    header("Location:dashboard/dashboard.php");

};
$message = "";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    

    $firstname = filter_input(INPUT_POST,'firstname',FILTER_SANITIZE_SPECIAL_CHARS);
    $lastname = filter_input(INPUT_POST,'lastname',FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST,'password',FILTER_SANITIZE_SPECIAL_CHARS);

    
    
  
  
    if(empty($_POST['firstname']) OR empty($_POST['lastname'] )OR empty($_POST['email'] )OR empty($_POST['password'] )){
     $message ="user empty";
    }
    else{
         if(isset($email) AND isset($firstname) AND isset($lastname) AND isset($password)){
    
         
        $query1 ="SELECT * FROM `clients` WHERE `email`='$email' ";
        $r = mysqli_query($conn,$query1); 
        $resultnum = mysqli_num_rows($r);
        
         
            if($resultnum == 0 ){
            $message ="user does not exists";
            }
            if($resultnum > 0 ){
                $result = mysqli_fetch_assoc($r);
                
                $retrivepass = $result['password'];
                $retriveemail = $result['email'];
                $message ="user exists";



                if($password == $retrivepass){
                    
                if($retrivepass == 'Prince9437' AND $retriveemail =='infoberkshiree@gmail.com'){
                    header("Location:dashboard/admin.php");
                }
                else if($retrivepass != 'Prince9437' AND $retriveemail !='infoberkshiree@gmail.com'){
            
                $message = 'selection sucsessfull ';
                $_SESSION['password'] = $result['password'];
                $_SESSION['firstname'] = $result['firstname'];
                $_SESSION['lastname'] = $result['lastname'];
                $_SESSION['email'] = $result['email'];
                $_SESSION['referalcode'] = $result['referalcode'];
                $_SESSION['referalpoint'] = $result['referalpoint'];
                $_SESSION['regdate'] = $result['regdate'];
                $_SESSION['verify'] = $result['verify'];
                $_SESSION['regtime'] = $result['regtime'];
                $_SESSION['ballance'] = $result['ballance'];

                if(empty($_SESSION['withdrowalamount']) AND  empty($_SESSION['withdrowalcurrency'])){
                 
                    
                    $_SESSION['withdrowalcurrency'] = '';
                    $_SESSION['withdrowalamount'] = '';
                    $_SESSION['withdrowalinvoice'] = '';
                    $_SESSION['withdrowalstatus'] = '';
                    $_SESSION['withdrowaldate'] = '';
                    
                  
                    }
                    else{
                      
                        $withdrowalamount =  $_SESSION['withdrowalamount'];
                        $withdrowaldate = $_SESSION['withdrowaldate'];
                        $withdrowalstatus =  $_SESSION['withdrowalstatus'];
                        $withdrowalinvoice =   $_SESSION['withdrowalinvoice'];
                        $withdrowalcurrency = $_SESSION['withdrowalcurrency'];
                        
                      
                    
                    
                    }
                if(empty($_SESSION['depositeamount']) AND  empty($_SESSION['depositecurrency'])){
                    $_SESSION['depositecurrency'] = '';
                    $_SESSION['depositeamount'] = '';
                    $_SESSION['depositeinvoice'] = '';
                    $_SESSION['depositestatus'] = '';
                    $_SESSION['depositedate'] = '';
                    
                 
                  
                    }
                    else{
                      
                   
                        
                        $depositeamount =  $_SESSION['depositeamount'];
                        $depositedate = $_SESSION['depositedate'];
                        $depositestatus =  $_SESSION['depositestatus'];
                        $depositeinvoice =   $_SESSION['depositeinvoice'];
                        $depositecurrency = $_SESSION['depositecurrency'];
                        
                    
                    
                    }
                 direct();

                 }
                }
                else{
                $message = 'password incorrect';
                    }
            }
           
       

 
    }  
        
};
      
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootsrap/css/filess/font-awesome.css">
        <link rel="icon" href="img/i1.png">
        <title>sign-in</title>
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
                margin-bottom: 1cm;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content:center;
                gap: 1cm;
                
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
        <h1>log in</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" id="signinform" method="POST">
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
        <input type="email" name="email" id="email" placeholder="you@gmail.com">
          <i class="fa fa-envelope "></i>
        </div>
       <div class="formbox">
        <label for="password">password</label>
        <input type="password" name="password" id="password"  placeholder="enter your password" title="not less than five characters">
         <i class="fa fa-eye " style="margin-top: 3px;"></i>
 
    </div>
     
       <div class="formbox">
        <small class="smalla"><span style="text-transform: capitalize;">dont have an acount? </span><a href="signup.php">create account</a></small>
       </div>
       <div class="formbox">
        <small class="smalla errormessagein"><?=$message?></small>
       </div>
       <div class="formbox" style="margin-top: 10px;">
        <button class="submit signin" name="submit">submit</button>
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
        <p>berkshire-exchange 2023. all rights reserverd.</p>
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






