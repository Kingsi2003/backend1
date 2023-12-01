$(()=>{
 
    


    let navlink = document.querySelectorAll('.nava');
    let path = window.location.pathname;
    
    for( var nav of navlink){
      let nava = nav.getAttribute('href');
      
    if(path.includes(nava)){
        nav.classList.add('activenav');
    }
}
    //nav
    
    $('.tog').on('click',()=>{
       
        if($('.height1').length == 0){
        
            $('.na').addClass("height1");
        
        }
       
        else if($('.height1').length > 0){
            $('.na').toggleClass("height1");
        

        }
       
    });
    //


 let headings = ['what is easymining','our company provides best financial solution','a secure and easy way to invest'];
 let writes =['EasyMining is the original concept of mining. You validate blocks of cryptocurrency transactions with your own computing power and get a reward for your work. But mining has evolved so much that now very large ‘pools’ (groups of computing power) make it much harder for an easy miner to find a block on their own, since you are competing against much larger operations, and they split the rewards among all their miners','a profitable platform for high-margin investment','we guide you on how to trade smartly from  beginers level to  professional  ']


function increase(){
    let i = 0;


    setInterval(() => {
    
           
        if(i < headings.length){
           
            

            $('.caption').html(headings[i])
            $('.slp').html(writes[i])
            i++

            
        }
        else {
            i = 0;
            
            $('.caption').html(headings[i])
            $('.slp').html(writes[i])
            
            i++

        }
           
           
    

},3000);

    navigator.clipboard.writeText
  
}


window.onload = increase()



   //content
$('.conti').on('click',()=>{
    let mch1 = document.querySelector('.mchild:nth-child(1)');
    if(mch1.classList.value.includes("height2") == !!0){
        $('.mchild:nth-child(1)').addClass('height2');
        $('.iro').css("transform","rotate(180deg)")
    }
    else{
        $('.mchild:nth-child(1)').removeClass('height2');
        $('.iro').css("transform","rotate(0deg)")

    }

})
//
//scroll
$(window).scroll(()=>{
if($(window).scrollTop()>500){
    $('.backtotop').css("display","flex")
}
else if($(window).scrollTop()<500){
    $('.backtotop').css("display","none")
}
if($(window).scrollTop()>500){
    $('.mchild:nth-child(2)').addClass('overf')
}
else if($(window).scrollTop()<550){
    $('.mchild:nth-child(2)').removeClass('overf')
}
})
//
//password verification
 $("#firstname").on('input',()=>{
    let name = document.querySelector("#firstname");
    if(name.value.replace(/[^a-z,A-Z]/g,"").length >2){
        $('#firstname').css("border","3px solid green");
    }
    else if(name.value.replace(/[^a-z,A-Z]/g,"").length <2){
        $('#firstname').css("border","3px solid red");
    }
    
 })
 $("#lastname").on('input',()=>{
    let name = document.querySelector("#lastname");
    if(name.value.replace(/[^a-z,A-Z]/g,"").length >2){
        $('#lastname').css("border","3px solid green");
    }
    else if(name.value.replace(/[^a-z,A-Z]/g,"").length <2){
        $('#lastname').css("border","3px solid red");
    }
    
 })
 
 $("#email").on('input',()=>{

    let email = document.querySelector("#email");
    if(email.value.replace(/[^@]/g,"").length >0){
        $('#email').css("border","3px solid green");
    }
    else if(email.value.replace(/[^@]/g,"").length <1){
        $('#email').css("border","3px solid red");
    };
 });
 $("#password").on('input',()=>{

    let password = document.querySelector("#password");
    if(password.value.length >=5){
        $('#password').css("border","3px solid green");
    }
    else if(email.value.length <5){
        $('#password').css("border","3px solid red");
    };
 });
 $("#comfirmpassword").on('input',()=>{

    let password = document.querySelector("#password");
    let cpassword = document.querySelector("#comfirmpassword");
    if(cpassword.value !== password.value ){
        $('#comfirmpassword').css("border","3px solid red");
    }
    else{
        $('#comfirmpassword').css("border","3px solid green");
    };
 });

////
//dashboard
/* startmine */




  ////
 
 //dashtog

 $('.dt').on('click',()=>{
    $('.smd').fadeToggle();
$('.smd').toggleClass('d-none');
    // $('.clpage').toggleClass('col-12');
    
   
  
 });
 
  
 


 
 

 ////

 $('.subt1').on('click',(e)=>{
    
    let selectc = document.querySelector('#selectcurrency');
    if(selectc.value == 'btc'){
        document.querySelector('.y').innerText='bc1qatxdc9varynze9lq4hf9mumla73ydwhjzkf927';

    }
    else if(selectc.value == 'usdt'){
        document.querySelector('.y').innerText='0x972F075c15A07104B6c5bFE8c3CE5133F442a421';
        document.querySelector('.z').innerText='trc20';

    }
  
    
     let ff = document.getElementById('depform')
     
     let xml = new XMLHttpRequest;
     xml.open("POST","deposite.php");
     xml.onreadystatechange = ()=>{
        if(xml.readyState==4 && xml.status==200){
            
            $('.bobox1').addClass('d-none');
            $('.bobox2').removeClass('d-none');
           

        }
     };
  
   xml.send(new FormData(ff));
   
 });

 //
 ////
 let witham = document.getElementById('wanttowithdraw');
 
 $('.subt2').on('click',(e)=>{
   let ballance = $('#bal');

    if(Number( ballance.val()) > Number(witham.value) ){
     let ww = document.getElementById('withd');
     


     let xml = new XMLHttpRequest;
     xml.open("POST","withdraw.php");
    
     
      xml.send(new FormData(ww));
      $('#wanttowithdraw').val('');
      $('#selectcurrency').val('');

      $('.ds').text('withdrawal submitted');
      let i = 0;

      setInterval(()=>{
          if(i < 6){
              i ++
              
              if(i == 5){
                  $('.ds').text('withdraw funds');
                  $('.crypt').val('');
              }
          
          }
      },1000)
      clearInterval()
    }
    else{
        alert('insufifient ballance')
    }
 })

 ///
     $('.copydep').on('click',()=>{
        let bkey = $('.y').text();
        navigator.clipboard.writeText(bkey);
        $('.copydep').text('copied');
        let i = 0;

        setInterval(()=>{
            if(i < 6){
                i ++
                if(i == 5){
                    $('.copydep').text('copy');
                }
            
            }
        },1000)
        clearInterval()

     })


 ///
 ///
     $('.copy').on('click',()=>{
        
        let bkey = $('.reflink').text();
        navigator.clipboard.writeText(bkey);
        $('.copy').text('copied');
        let i = 0;

        setInterval(()=>{
            if(i < 6){
                i ++
                if(i == 5){
                    $('.copy').text('copy');
                }
            
            }
        },1000)
        clearInterval()

     })


 ///

 //
$('.creferald').on('click',()=>{
    i = 0;
    let reflink = $('.reflink').text();
    navigator.clipboard.writeText(reflink)
    $('.creferald').html('copied')
    setInterval(()=>{
        if(i < 6){
            i ++
            if(i == 5){
                $('.creferald').html('copy')
            }
        
        }
    },1000)
    clearInterval()
   
})
////

if($('.statusvirify').html()=='verified'){
    $('.statusvirify').css('color','green');
}
else if($('.statusvirify').html()=='approved'){
    $('.statusvirify').css('color','green');
}
else if($('.statusvirify').html()=='pending'){
    $('.statusvirify').css('color','red');
}
if($('.statusdeposite').html()=='verified'){
    $('.statusdeposite').css('color','green');
}
else if($('.statusdeposite').html()=='approved'){
    $('.statusdeposite').css('color','green');
}
else if($('.statusdeposite').html()=='pending'){
    $('.statusdeposite').css('color','red');
}
if($('.statuswithdraw').html()=='verified'){
    $('.statuswithdraw').css('color','green');
}
else if($('.statuswithdraw').html()=='approved'){
    $('.statuswithdraw').css('color','green');
}
else if($('.statuswithdraw').html()=='pending'){
    $('.statuswithdraw').css('color','red');
}
 


let invest = document.querySelectorAll('.invest');
for(investment of invest){
    
    let investamount = $('.invamount');
    let accountballance = $('.balance');
             
           
            investment.addEventListener('click',(e)=>{
        
             $('.cpop').removeClass('dis');
            let plant = e.target.parentElement;
            let tit = plant.querySelector('.roww h4')
             document.querySelector('.plan').innerHTML=tit.innerHTML;
             let hid = document.querySelector('.hidd');
             hid.value = tit.innerHTML;
            
          
            });
             
                
         $('.stin').on('click',()=>{

           $('.cpop').addClass('dis');
                
              
        });
       
         



         
                    
        
               
    
            
            
            

};


$('.subn').on('click',(e)=>{
    
    let data = document.getElementById('visit');
    
    let xml = new XMLHttpRequest
    xml.open('POST','dashboard/admin.php')
    xml.onreadystatechange =()=>{
        if(xml.readyState ==4 && xml.status == 200){
            console.log(xml.responseText);
        }
    }
    xml.send(new FormData(data))
   
    $('.ininput').val('');


})



$('.ms').on('click',(e)=>{

    let data = document.getElementById('contactu');
    
    let xml = new XMLHttpRequest
    xml.open('POST','dashboard/admin.php')
    xml.onreadystatechange =()=>{
        if(xml.readyState ==4 && xml.status == 200){
            console.log(xml.responseText);
        }
    }
    xml.send(new FormData(data))
    $('.contactm').val('');

   e.preventDefault()
    

})


 




$('.backtotop').on('click',()=>{
    window.scrollTo({
       top:0,
       behavior:"smooth" ,
    })
})


i = 0;
setInterval(() => {
    i++
    if(i==1){
        $('.pagel').addClass('d-none')
    }
}, 2000);


}) 
 

