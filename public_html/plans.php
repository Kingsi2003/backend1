
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootsrap/css/filess/font-awesome.css">
    <script defer src="jquery-3.3.1.min.js"></script>
    <script defer src="dashboard/main1.js"></script>
    <link rel="icon" href="img/i1.png">
    <title>plans</title>
 
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
            background-color:white;
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
            background-color: #2962ff;
            color:white;
            font-weight: 600;
            border-radius: 10px;
        }
    </style>
 
</head>
<body>
    <a href="" class="backtotopl"><div class="backtotop"><i class="fa fa-arrow-up"></i></div>
    </a>
    <header>
        <!-- nav -->
        <label for="checkbox" class="tog"><i class="fa fa-bars"></i></label>

        <div class="na">
            <nav style="">
                <ul>
                    <li><a href="index.php" class="nava">blog</a></li>
                    <li><a href="transactions.php" class="nava">transactions</a></li>
                    <li><a href="plans.php" class="nava">plans</a></li>
                    <li><a href="faq.php" class="nava">FAQS</a></li>
                </ul>
                <div class="buth">
                    <a href="signin.php"><button class="signin">sign in</button></a>
                    <a href="signup.php"><button class="signup">sign up</button></a>
                    
                </div>
            </nav>
            <div class="name"><h3>berkshire-exchange</h3></div>
        </div>
       
        <!-- nav -->
        <!-- background -->
        <div class="backgroundphp">
            <img src="img/g2.gif" alt="" class="imgre phpf">
            <div class="slidet">
                <div class="slideetbox">
                    <h1 class="caption">What is EasyMining</h1>
                <p class="slp">EasyMining is the ‘original’ concept of mining. You validate blocks of cryptocurrency transactions with your own computing power and get a reward for your ‘work’. But mining has evolved so much that now very large ‘pools’ (groups of computing power) make it much harder for an easy miner to find a block on their own, since you are competing against much larger operations, and they split the rewards among all their miners</p>
                </div>
                <div class="slidetimg">
                    <img src="img/slidet1.png" alt="" class="sldti">
                </div>
            </div>
        </div>
        <!-- background e -->
    </header>
    <div class="container">
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