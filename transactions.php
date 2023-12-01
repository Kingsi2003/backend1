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
    <title>transactions</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        table{
            border-style: solid;
            margin: auto;
            margin-top: 1cm;
            margin-bottom: 1cm;
            max-width: 100vw;
            
        }
        tr{
            display: flex;
            width: 95%;
            flex-flow: row wrap;
            border: 2px solid black;
            gap: 10px;
            padding: 10px;
            max-width: 100vw;
        }
        th{
            height: 1cm;
            text-transform: capitalize;
            background-color: rgb(176, 176, 189);
            

        }
        td{
            height: 1cm;
            text-transform: capitalize;
            padding: 10px;
            max-width: 95vw;
            font-size: small;
            
        
            

        }
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        .container{
            padding: .5cm;
            display: flex;
            flex-flow: row wrap;
            gap: 1cm;
            align-items: center;
            justify-content: center;
        }
        .box{
            width: 300px;
            height: 200px;
            display: flex;
            flex-direction: column;
            align-items:center;
            box-shadow: 0 0 10px 2px black;
            
        }
        .rnh{
            text-transform: capitalize;
            margin-bottom: .5cm;
        }
        .revtext{
            width: 80%;
            text-align: center;
            text-transform: capitalize;
        }
        .profile{
            display: flex;
            justify-content:flex-start;
            align-items: center;
            width: 100%;
            padding-left: 10px;
        }
        .imgpo{
            width: 1.5cm;
            height: 1.5cm;
            border-radius: 50%;
        }
        .imgpo img{
            width: 100%;
            height: 100%;
            display: block;
            border-radius: 50%;
        }
        .rb img{
            width: 100%;
            height: 90%;
            display: block;
            background-color:rgb(11, 175, 11);
        }
        .ratebox{
            width: 4cm;
            height: .8cm;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 2px;
            
        }
        .rb{
            width: .5cm;
            height: .5cm;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .btct,.address,.txidt{
            word-wrap: break-word;
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
            <nav >
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
   


    <table border="2">
        
        <tr class="thbody">
            <td class="datet"><?=date('Y-m-d')?></td>
            <td class="btct">0.00178434</td>
            <td class="address">Bc1qtct027t9x3x70m0qj2x2dwekdsy7ckgfed7y6e</td>
            <td class="txidt">1da22625f9cd00079781e0c7a549dd4885742cb1d71a418186d6b4990d1911df...
            </td>
        </tr>
        <tr class="thbody">
            <td class="datet"><?=date('Y-m-d')?></td>
            <td class="btct">0.00178434</td>
            <td class="address">Bc1qtct027t9x3x70m0qj2x2dwekdsy7ckgfed7y6e</td>
            <td class="txidt">1da22625f9cd00079781e0c7a549dd4885742cb1d71a418186d6b4990d1911df...
            </td>
        </tr>
        <tr class="thbody">
            <td class="datet"><?=date('Y-m-d')?></td>
            <td class="btct">0.00178434</td>
            <td class="address">Bc1qtct027t9x3x70m0qj2x2dwekdsy7ckgfed7y6e</td>
            <td class="txidt">1da22625f9cd00079781e0c7a549dd4885742cb1d71a418186d6b4990d1911df...
            </td>
        </tr>
        <tr class="thbody">
            <td class="datet"><?=date('Y-m-d')?></td>
            <td class="btct">0.00178434</td>
            <td class="address">Bc1qtct027t9x3x70m0qj2x2dwekdsy7ckgfed7y6e</td>
            <td class="txidt">1da22625f9cd00079781e0c7a549dd4885742cb1d71a418186d6b4990d1911df...
            </td>
        </tr>
        <tr class="thbody">
            <td class="datet"><?=date('Y-m-d')?></td>
            <td class="btct">0.00178434</td>
            <td class="address">Bc1qtct027t9x3x70m0qj2x2dwekdsy7ckgfed7y6e</td>
            <td class="txidt">1da22625f9cd00079781e0c7a549dd4885742cb1d71a418186d6b4990d1911df...
            </td>
        </tr>
        <tr class="thbody">
            <td class="datet"><?=date('Y-m-d')?></td>
            <td class="btct">0.00178434</td>
            <td class="address">Bc1qtct027t9x3x70m0qj2x2dwekdsy7ckgfed7y6e</td>
            <td class="txidt">1da22625f9cd00079781e0c7a549dd4885742cb1d71a418186d6b4990d1911df...
            </td>
        </tr>
        <tr class="thbody">
            <td class="datet"><?=date('Y-m-d')?></td>
            <td class="btct">0.00178434</td>
            <td class="address">Bc1qtct027t9x3x70m0qj2x2dwekdsy7ckgfed7y6e</td>
            <td class="txidt">1da22625f9cd00079781e0c7a549dd4885742cb1d71a418186d6b4990d1911df...
            </td>
        </tr>
        <tr class="thbody">
            <td class="datet"><?=date('Y-m-d')?></td>
            <td class="btct">0.00178434</td>
            <td class="address">Bc1qtct027t9x3x70m0qj2x2dwekdsy7ckgfed7y6e</td>
            <td class="txidt">1da22625f9cd00079781e0c7a549dd4885742cb1d71a418186d6b4990d1911df...
            </td>
        </tr>
        <tr class="thbody">
            <td class="datet"><?=date('Y-m-d')?></td>
            <td class="btct">0.00178434</td>
            <td class="address">Bc1qtct027t9x3x70m0qj2x2dwekdsy7ckgfed7y6e</td>
            <td class="txidt">1da22625f9cd00079781e0c7a549dd4885742cb1d71a418186d6b4990d1911df...
            </td>
        </tr>
        <tr class="thbody">
            <td class="datet"><?=date('Y-m-d')?></td>
            <td class="btct">0.00178434</td>
            <td class="address">Bc1qtct027t9x3x70m0qj2x2dwekdsy7ckgfed7y6e</td>
            <td class="txidt">1da22625f9cd00079781e0c7a549dd4885742cb1d71a418186d6b4990d1911df...
            </td>
        </tr>
        <tr class="thbody">
            <td class="datet"><?=date('Y-m-d')?></td>
            <td class="btct">0.00178434</td>
            <td class="address">Bc1qtct027t9x3x70m0qj2x2dwekdsy7ckgfed7y6e</td>
            <td class="txidt">1da22625f9cd00079781e0c7a549dd4885742cb1d71a418186d6b4990d1911df...
            </td>
        </tr>
        <tr class="thbody">
            <td class="datet"><?=date('Y-m-d')?></td>
            <td class="btct">0.00178434</td>
            <td class="address">Bc1qtct027t9x3x70m0qj2x2dwekdsy7ckgfed7y6e</td>
            <td class="txidt">1da22625f9cd00079781e0c7a549dd4885742cb1d71a418186d6b4990d1911df...
            </td>
        </tr>
        <tr class="thbody">
            <td class="datet"><?=date('Y-m-d')?></td>
            <td class="btct">0.00178434</td>
            <td class="address">Bc1qtct027t9x3x70m0qj2x2dwekdsy7ckgfed7y6e</td>
            <td class="txidt">1da22625f9cd00079781e0c7a549dd4885742cb1d71a418186d6b4990d1911df...
            </td>
        </tr>
        <tr class="thbody">
            <td class="datet"><?=date('Y-m-d')?></td>
            <td class="btct">0.00178434</td>
            <td class="address">Bc1qtct027t9x3x70m0qj2x2dwekdsy7ckgfed7y6e</td>
            <td class="txidt">1da22625f9cd00079781e0c7a549dd4885742cb1d71a418186d6b4990d1911df...
            </td>
        </tr>
        <tr class="thbody">
            <td class="datet"><?=date('Y-m-d')?></td>
            <td class="btct">0.00178434</td>
            <td class="address">Bc1qtct027t9x3x70m0qj2x2dwekdsy7ckgfed7y6e</td>
            <td class="txidt">1da22625f9cd00079781e0c7a549dd4885742cb1d71a418186d6b4990d1911df...
            </td>
        </tr>
        <tr class="thbody">
            <td class="datet"><?=date('Y-m-d')?></td>
            <td class="btct">0.00178434</td>
            <td class="address">Bc1qtct027t9x3x70m0qj2x2dwekdsy7ckgfed7y6e</td>
            <td class="txidt">1da22625f9cd00079781e0c7a549dd4885742cb1d71a418186d6b4990d1911df...
            </td>
        </tr>
        <tr class="thbody">
            <td class="datet"><?=date('Y-m-d')?></td>
            <td class="btct">0.00178434</td>
            <td class="address">Bc1qtct027t9x3x70m0qj2x2dwekdsy7ckgfed7y6e</td>
            <td class="txidt">1da22625f9cd00079781e0c7a549dd4885742cb1d71a418186d6b4990d1911df...
            </td>
        </tr>
        <tr class="thbody">
            <td class="datet"><?=date('Y-m-d')?></td>
            <td class="btct">0.00178434</td>
            <td class="address">Bc1qtct027t9x3x70m0qj2x2dwekdsy7ckgfed7y6e</td>
            <td class="txidt">1da22625f9cd00079781e0c7a549dd4885742cb1d71a418186d6b4990d1911df...
            </td>
        </tr>
        <tr class="thbody">
            <td class="datet"><?=date('Y-m-d')?></td>
            <td class="btct">0.00178434</td>
            <td class="address">Bc1qtct027t9x3x70m0qj2x2dwekdsy7ckgfed7y6e</td>
            <td class="txidt">1da22625f9cd00079781e0c7a549dd4885742cb1d71a418186d6b4990d1911df...
            </td>
        </tr>
        <tr class="thbody">
            <td class="datet"><?=date('Y-m-d')?></td>
            <td class="btct">0.00178434</td>
            <td class="address">Bc1qtct027t9x3x70m0qj2x2dwekdsy7ckgfed7y6e</td>
            <td class="txidt">1da22625f9cd00079781e0c7a549dd4885742cb1d71a418186d6b4990d1911df...
            </td>
        </tr>
        <tr class="thbody">
            <td class="datet"><?=date('Y-m-d')?></td>
            <td class="btct">0.00178434</td>
            <td class="address">Bc1qtct027t9x3x70m0qj2x2dwekdsy7ckgfed7y6e</td>
            <td class="txidt">1da22625f9cd00079781e0c7a549dd4885742cb1d71a418186d6b4990d1911df...
            </td>
        </tr>
        <tr class="thbody">
            <td class="datet"><?=date('Y-m-d')?></td>
            <td class="btct">0.00178434</td>
            <td class="address">Bc1qtct027t9x3x70m0qj2x2dwekdsy7ckgfed7y6e</td>
            <td class="txidt">1da22625f9cd00079781e0c7a549dd4885742cb1d71a418186d6b4990d1911df...
            </td>
        </tr>
        <tr class="thbody">
            <td class="datet"><?=date('Y-m-d')?></td>
            <td class="btct">0.00178434</td>
            <td class="address">Bc1qtct027t9x3x70m0qj2x2dwekdsy7ckgfed7y6e</td>
            <td class="txidt">1da22625f9cd00079781e0c7a549dd4885742cb1d71a418186d6b4990d1911df...
            </td>
        </tr>
        <tr class="thbody">
            <td class="datet"><?=date('Y-m-d')?></td>
            <td class="btct">0.00178434</td>
            <td class="address">Bc1qtct027t9x3x70m0qj2x2dwekdsy7ckgfed7y6e</td>
            <td class="txidt">1da22625f9cd00079781e0c7a549dd4885742cb1d71a418186d6b4990d1911df...
            </td>
        </tr>
    </table>


    <div class="container">
        <!-- boxbegin -->
      <div class="box">
      <div class="profile">
        <div class="imgpo">
<img src="img/t1.jpg" alt="">
        </div>
        <div class="ratebox">
            <div class="rb"><img src="img/rate.png" alt=""></div>
            <div class="rb"><img src="img/rate.png" alt=""></div>
            <div class="rb"><img src="img/rate.png" alt=""></div>
            <div class="rb"><img src="img/rate.png" alt=""></div>
            <div class="rb"><img src="img/rate.png" alt=""></div>
            
        </div>
      </div>
      <p>
        <h4 class="rnh">emmanuel israel monese</h4>
      </p>
      <p class="revtext">great service from start to finish.a very good follow up from support</p>
      </div>
      <!-- box ens -->
        <!-- boxbegin -->
      <div class="box">
      <div class="profile">
        <div class="imgpo">
<img src="img/t2.jpg" alt="">
        </div>
        <div class="ratebox">
            <div class="rb"><img src="img/rate.png" alt=""></div>
            <div class="rb"><img src="img/rate.png" alt=""></div>
            <div class="rb"><img src="img/rate.png" alt=""></div>
            <div class="rb"><img src="img/rate.png" alt=""></div>
            <div class="rb"><img src="img/rate.png" alt=""></div>
            
        </div>
      </div>
      <p>
        <h4 class="rnh">alexis marsh</h4>
      </p>
      <p class="revtext">i am very happy to be in this platform keep up the good work</p>
      </div>
      <!-- box ens -->
        <!-- boxbegin -->
      <div class="box">
      <div class="profile">
        <div class="imgpo">
<img src="img/t3.jpg" alt="">
        </div>
        <div class="ratebox">
            <div class="rb"><img src="img/rate.png" alt=""></div>
            <div class="rb"><img src="img/rate.png" alt=""></div>
            <div class="rb"><img src="img/rate.png" alt=""></div>
            <div class="rb"><img src="img/rate.png" alt=""></div>
            <div class="rb"><img src="img/rate.png" alt=""></div>
            
        </div>
      </div>
      <p>
        <h4 class="rnh">christy teal</h4>
      </p>
      <p class="revtext">i have been in this platform for three years.i really appreciate the good work</p>
      </div>
      <!-- box ens -->
        <!-- boxbegin -->
      <div class="box">
      <div class="profile">
        <div class="imgpo">
<img src="img/t4.jpg" alt="">
        </div>
        <div class="ratebox">
            <div class="rb"><img src="img/rate.png" alt=""></div>
            <div class="rb"><img src="img/rate.png" alt=""></div>
            <div class="rb"><img src="img/rate.png" alt=""></div>
            <div class="rb"><img src="img/rate.png" alt=""></div>
            <div class="rb"><img src="img/rate.png" alt=""></div>
            
        </div>
      </div>
      <p>
        <h4 class="rnh">rilay crash</h4>
      </p>
      <p class="revtext">just receaved my first earning today . this great and reliable</p>
      </div>
      <!-- box ens -->
        <!-- boxbegin -->
      <div class="box">
      <div class="profile">
        <div class="imgpo">
<img src="img/t5.jpg" alt="">
        </div>
        <div class="ratebox">
            <div class="rb"><img src="img/rate.png" alt=""></div>
            <div class="rb"><img src="img/rate.png" alt=""></div>
            <div class="rb"><img src="img/rate.png" alt=""></div>
            <div class="rb"><img src="img/rate.png" alt=""></div>
            <div class="rb"><img src="img/rate.png" alt=""></div>
            
        </div>
      </div>
      <p>
        <h4 class="rnh">sandy smith</h4>
      </p>
      <p class="revtext">great support</p>
      </div>
      <!-- box ens -->
        <!-- boxbegin -->
      <div class="box">
      <div class="profile">
        <div class="imgpo">
<img src="img/t6.jpg" alt="">
        </div>
        <div class="ratebox">
            <div class="rb"><img src="img/rate.png" alt=""></div>
            <div class="rb"><img src="img/rate.png" alt=""></div>
            <div class="rb"><img src="img/rate.png" alt=""></div>
            <div class="rb"><img src="img/rate.png" alt=""></div>
            <div class="rb"><img src="img/rate.png" alt=""></div>
            
        </div>
      </div>
      <p>
        <h4 class="rnh">george math</h4>
      </p>
      <p class="revtext">i really appriciate. this platform is really helping me manage my bills</p>
      </div>
      <!-- box ens -->
        <!-- boxbegin -->
      <div class="box">
      <div class="profile">
        <div class="imgpo">
<img src="img/t7.jpg" alt="">
        </div>
        <div class="ratebox">
            <div class="rb"><img src="img/rate.png" alt=""></div>
            <div class="rb"><img src="img/rate.png" alt=""></div>
            <div class="rb"><img src="img/rate.png" alt=""></div>
            <div class="rb"><img src="img/rate.png" alt=""></div>
            <div class="rb"><img src="img/rate.png" alt=""></div>
            
        </div>
      </div>
      <p>
        <h4 class="rnh">emmanuel casmire</h4>
      </p>
      <p class="revtext">i recomend this platform to everyone.they are really nice</p>
      </div>
      <!-- box ens -->
        <!-- boxbegin -->
      <div class="box">
      <div class="profile">
        <div class="imgpo">
<img src="img/t8.jpg" alt="">
        </div>
        <div class="ratebox">
            <div class="rb"><img src="img/rate.png" alt=""></div>
            <div class="rb"><img src="img/rate.png" alt=""></div>
            <div class="rb"><img src="img/rate.png" alt=""></div>
            <div class="rb"><img src="img/rate.png" alt=""></div>
            <div class="rb"><img src="img/rate.png" alt=""></div>
            
        </div>
      </div>
      <p>
        <h4 class="rnh">serrano gregory</h4>
      </p>
      <p class="revtext">very fast</p>
      </div>
      <!-- box ens -->
        <!-- boxbegin -->
      <div class="box">
      <div class="profile">
        <div class="imgpo">
<img src="img/t9.jpg" alt="">
        </div>
        <div class="ratebox">
            <div class="rb"><img src="img/rate.png" alt=""></div>
            <div class="rb"><img src="img/rate.png" alt=""></div>
            <div class="rb"><img src="img/rate.png" alt=""></div>
            <div class="rb"><img src="img/rate.png" alt=""></div>
            <div class="rb"><img src="img/rate.png" alt=""></div>
            
        </div>
      </div>
      <p>
        <h4 class="rnh">bernadette curley</h4>
      </p>
      <p class="revtext">this has realy helped me alot </p>
      </div>
      <!-- box ens -->
        <!-- boxbegin -->
      <div class="box">
      <div class="profile">
        <div class="imgpo">
<img src="img/cryptocurrency-exchange-mobile-app-development.png" alt="">
        </div>
        <div class="ratebox">
            <div class="rb"><img src="img/rate.png" alt=""></div>
            <div class="rb"><img src="img/rate.png" alt=""></div>
            <div class="rb"><img src="img/rate.png" alt=""></div>
            <div class="rb"><img src="img/rate.png" alt=""></div>
            <div class="rb"><img src="img/rate.png" alt=""></div>
            
        </div>
      </div>
      <p>
        <h4 class="rnh"> monse mose</h4>
      </p>
      <p class="revtext">this platform is moving to the apex</p>
      </div>
      <!-- box ens -->
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