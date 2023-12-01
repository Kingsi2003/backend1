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
    

    if(isset($_POST['message'])) {
        if($_POST['message']==''){

        }
        else{
            $receaver = 'admin';
            $message = filter_input(INPUT_POST,'message',FILTER_SANITIZE_SPECIAL_CHARS);
            $query = "INSERT INTO chat VALUES ('$email','$message','$receaver')";
            $send = mysqli_query($conn,$query);
     
            $receaver = 'admin';
            $message = filter_input(INPUT_POST,'message',FILTER_SANITIZE_SPECIAL_CHARS);
            $query = "INSERT INTO adminchat VALUES ('$email','$message','$receaver')";
            $send = mysqli_query($conn,$query);
     
        }
      
     }  

     //
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
        .chartf{
        
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            height: 80%;
            gap: .5cm;
        }
        .chartf input{
            width: 350px;
            height: 1.2cm;
            text-transform: capitalize;
            font-weight: 600;
            background: linear-gradient(to right,black,blue);
            border: none;
            color: white;
        }
        .chartf textarea{
            width: 350px;
            height: 1.3cm;
            padding: 10px;
            resize: none;
            outline: none;
            line-height: 1.2;

        }
        .yourballance{
            height: 2cm;
            background: linear-gradient(to left,black,blue);
            border-radius: 10px 0 0 10px;
            display: flex;
            align-items: center;
            padding-left: .5cm;
            margin-top: .5cm;
        }
        .screen{
            height:700px ;
           min-width:350px;
            background-color:gray;
            overflow-y:scroll;
        }
        .clpage{
            margin-top:2cm ;
        }
        .sender{
    
         display:flex;
        align-items:flex-end;
        margin: 5px;
         flex-direction:column;
}
        .receaver{
    
            display:flex;
            align-items:flex-start;
            margin: 5px;
            flex-direction:column;
        }
        #receaver {
            max-width: 70% !important;
            display:block;
            
            background-color:rgb(3, 3, 41);
            line-break: anywhere;
            border-radius:10px;
            
            margin-bottom:5px ;


        
            }
            #sender   {
            max-width: 70% !important;
            display:block;
            
            background-color: blue;
            line-break: anywhere;
            border-radius:10px;
            
            margin-top:5px ;


        
            }
            .text{
                margin: 10px;
            }
           #submitchat{
            height:1.2cm;
            
           }
        @media (max-width:720px) {
            .screen{
            height:700px ;
           width:100%;
            background-color:gray;
            overflow-y:scroll;
        }

            .chartf{
                
                height:100%;
                width:100%;
            }
          
        .clpage{
            padding-bottom:3cm ;
            
            display:flex;
            align-items:start;
            justify-content: center;
            
            
            
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

    <div class=" col clpage col-md-8 " style=" height: 100vh; position: fixed;top: 0;right:  0;">
    <!-- welcome -->
    <!-- <div class="col-11 yourballance mx-auto">
        <h3>Hi <span class="firstname">kingsley</span> <span class="reply">how are you doing today</span></h3>
   </div> -->
   <!-- welcome end -->
    <div class="chartf" >
        <div class="screen">

       

<?php

  $class ='';
  $id = '';
  $query = "SELECT * FROM `chat` WHERE sender ='$email' || receaver ='$email'";
  $send = mysqli_query($conn,$query);
  $resultnum = mysqli_num_rows($send);
  
  for($i=0;$i<$resultnum;$i++){
    


    $result = mysqli_fetch_assoc($send);
    
    $message = $result['message'];
    $sender = $result['sender'];
    
    $receaver = $result['receaver'];
    
   

    if(isset($message)){
        
        
        $class ='text';
        if($sender == $email){
            $id = 'sender';
        
            
         ?>         

            <div class="sender">
             <span id="<?=$id ?>"><p class='<?=$class?>'><?=$message?></p></span>
            </div>
                <?php
         }


        else{
            $id = 'receaver';
             
            




        ?>         

            <div class="<?=$id?>">
             <span id="<?=$id?>"><p class='<?=$class?>'><?=$message?></p></span>
            </div>
         <?php

        }
      
       


 
    }
    else{
        echo"no message";
    }
  }
?>  
           

           
       

        </div>
        <form action="support.php" id="smess" style ="display:flex;justify-content: center; flex-direction:column;" method="POST">
        <textarea name="message" id="mes" cols="30" rows="10" placeholder="write your message"></textarea>
        <input type="submit" value="send" id="submitchat" style="height:1.5cm">

        </form>



</div>

    </div>
    </div>
   
</body>
</html>

