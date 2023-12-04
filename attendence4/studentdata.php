<link rel="stylesheet" type="text/css" href="style.css">
<nav>
            <a href="studentdata.html">home</a> 
            <a href="attendence.html">attendance</a> 
            <a method="post" href="http://localhost/attendence4/studentlist.php" >insert record</a> | 
            <a method="post" href="http://localhost/attendence4/studentdata1.php">upload new student list</a> 
            <a method="post" href="http://localhost/attendence4/studentdata2.php"name='deleting1'>delete list</a> 
            <a method="post" href="http://localhost/attendence4/studentdata3.php"name='deleterec1'>delete all records</a> 
            <a method="post" href="http://localhost/attendence4/studentdata4.php"name='modifys1'>modify content</a>
            <a method="post" href="http://localhost/attendence4/show.php">show details</a>
        </nav>
        <script type="text/javascript" src="studentdata.js"></script>
     <style>
            
            body {
    font-family: Arial, sans-serif;
    background-image: url(images/backgroundbody);
    background-repeat: no-repeat;
    background-size: cover;
}

nav {
    background-color: #333;
    overflow: hidden;
}

nav a {
    float: left;
    display: block;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

nav a:hover {
    background-color: rgb(255, 177, 61);
}
        </style>
<?php
$sn="localhost";
$un="system";
$p="system";
$db="myDB1";

$conn=mysqli_connect($sn,$un,$p,$db);
if(!$conn){
    die("connection failed:".mysqli_connect_error());
}
//$year=$branch="";
//$year=$_POST['yearr'];
//$branch=$_POST['branch'];
//echo $year;
//echo $branch;
if (array_key_exists('upload',$_POST)){
    creating();
}
function creating(){
    $sn="localhost";
$un="system";
$p="system";
$db="myDB1";
    $conn=mysqli_connect($sn,$un,$p,$db);
if(!$conn){
    die("connection failed:".mysqli_connect_error());
}
    $year=$_POST['yearr'];
$branch=$_POST['branch'];
  $name=$year.$branch;
  echo $name;
  $ab='absenties';
  $tot='totalabsenties';
  $a=$name.$ab;
  $b=$name.$tot;
$s="CREATE TABLE $name(id varchar(10) PRIMARY KEY,studentname varchar(30),phone_num BIGINT(20))";
$ss="CREATE TABLE $a(id varchar(10) ,studentname varchar(30),phone_num BIGINT(20) ,date_of_absent DATE)";
$sss="CREATE TABLE $b(id varchar(10) ,studentname varchar(30),phone_num BIGINT(20) ,date_of_absent DATE)";
$rs=mysqli_query($conn,$s);
$rss=mysqli_query($conn,$ss);
$rsss=mysqli_query($conn,$sss);
if($rs&$rss&$rsss){
    echo "new batch file created successfully...";
 }
//    $needs=mysqli_fetch_array(mysqli_query($conn,"SELECT yearr,branch FROM studentdetails"));
}

if (array_key_exists('delete',$_POST)){
    deleting();
}
function deleting(){
    $sn="localhost";
$un="system";
$p="system";
$db="myDB1";
    $conn=mysqli_connect($sn,$un,$p,$db);
if(!$conn){
    die("connection failed:".mysqli_connect_error());
}
    $year=$_POST['yearr'];
$branch=$_POST['branch'];
  $name=$year.$branch;
  echo $name;
$s="DROP TABLE $name";
$rs=mysqli_query($conn,$s);
if($rs){
    echo "selected batch file successfully deleted...";
 }
//    $needs=mysqli_fetch_array(mysqli_query($conn,"SELECT yearr,branch FROM studentdetails"));
}

if (array_key_exists('drops',$_POST)){
    drops();
}
function drops(){
    $sn="localhost";
$un="system";
$p="system";
$db="myDB1";
    $conn=mysqli_connect($sn,$un,$p,$db);
if(!$conn){
    die("connection failed:".mysqli_connect_error());
}
    $year=$_POST['yearr'];
$branch=$_POST['branch'];
  $name=$year.$branch;
  echo $name;
$s="DELETE FROM $name";
$rs=mysqli_query($conn,$s);
if($rs){
    echo "selected batch file records successfully deleted...";
 }
//    $needs=mysqli_fetch_array(mysqli_query($conn,"SELECT yearr,branch FROM studentdetails"));
}

if (array_key_exists('modify',$_POST)){
    modifing();
}

function modifing(){
    $sn="localhost";
$un="system";
$p="system";
$db="myDB1";
    $conn=mysqli_connect($sn,$un,$p,$db);
if(!$conn){
    die("connection failed:".mysqli_connect_error());
}
$year=$newphno=$namval=$id='';
    $year=$_POST['yearr'];
$branch=$_POST['branch'];
$id=$_POST['id'];
if($_POST['name']!=NULL){
$namval=$_POST['name'];}
$name=$year.$branch;
    $n=mysqli_fetch_array(mysqli_query($conn,"SELECT id,studentname,phone_num FROM $name WHERE id='$id'"));
    echo $n['id'];
    $needs=mysqli_query($conn,"UPDATE $name SET studentname = '$namval' WHERE id = '$id'");
    echo $namval;
//  $name=$year.$branch;
//  echo $name;
//$s="DROP TABLE $name";
//$rs=mysqli_query($conn,$s);
//if($rs){
//    echo "selected batch file successfully deleted...";
// }
   //$needs=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM $name WHERE id=$id"));
}

if (array_key_exists('modify1',$_POST)){
    modifing1();
}

function modifing1(){
    $sn="localhost";
$un="system";
$p="system";
$db="myDB1";
    $conn=mysqli_connect($sn,$un,$p,$db);
if(!$conn){
    die("connection failed:".mysqli_connect_error());
}
$year=$newphno=$namval=$id='';
    $year=$_POST['yearr'];
$branch=$_POST['branch'];
$id=$_POST['id'];
if($_POST['phnoo']!=NULL){
$namval=$_POST['phnoo'];}
$name=$year.$branch;
    echo $year.$branch;
        $needs=mysqli_query($conn,"UPDATE $name
        SET  phone_num= $newphno
        WHERE id = $id;");

//  $name=$year.$branch;
//  echo $name;
//$s="DROP TABLE $name";
//$rs=mysqli_query($conn,$s);
//if($rs){
//    echo "selected batch file successfully deleted...";
// }
   //$needs=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM $name WHERE id=$id"));
}


?>