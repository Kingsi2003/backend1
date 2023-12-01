<?php
$server = '127.0.0.1:3306';
$user = 'u529223399_skc2003';
$pass = 'samy2003@SKC';
$name = 'u529223399_bitcoin';
$conn ='';
try{
    $conn = mysqli_connect($server,$user,$pass,$name);
//   echo'hi';    
}
catch(mysqli_sql_exception){

};


?>