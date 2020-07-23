<?php
// $db['db_host']="localhost";
// $db['db_username']="root";
// $db['db_password']="";
// $db['db_database']="cms";

// foreach ($db as $key=> $value){
//     define(strtoupper($key),$value);
// }
 $conn= mysqli_connect("localhost","root","","cms");
 if($conn){
     echo "connection sucessful";
 }else{
     echo "connection failed";
 }
?>