<html>
    <head>
        <title>
            inserting data
</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php
$sn="localhost";
$un="system";
$p="system";
$db="myDB1";

$conn=mysqli_connect($sn,$un,$p,$db);
if(!$conn){
    die("connection failed:".mysqli_connect_error());
}
$sq="SHOW TABLES FROM $db";
$rr=mysqli_query($conn,$sq);
?>
<script type="text/javascript" src="studentdata.js"></script>
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
<form method="post" action="http://localhost/attendence4/studentlist.php">
<?php 
echo "<select onchange='func()' id='insert' >";
while($table=mysqli_fetch_array($rr)){
 echo ("<option name=$table[0] value=$table[0]>$table[0]</option>");
}

echo "</select>";


if (array_key_exists('insert',$_POST)){
    insert();
}


function insert(){
    $sn="localhost";
$un="system";
$p="system";
$db="myDB1";

$conn=mysqli_connect($sn,$un,$p,$db);
if(!$conn){
    die("connection failed:".mysqli_connect_error());
}

//define variables
$sname=$id=$phno=$table="";

$table=$_POST['table'];
$sname=$_POST['sname'];
$id=$_POST['id'];
$phno=$_POST['phno'];

$sq="INSERT INTO $table  values 
('$id','$sname','$phno')";
//insert in database
$rs=mysqli_query($conn,$sq);
if($rs){
    echo "details record inserted";
}
else{
    echo "error:".$sq."<br>".mysqli_error($conn);
}
echo "<h3>$sname</h3>";
mysqli_close($conn);
}
//$rrr=mysqli_fetch_all($rr);
//for ($i=0;$i<count($rrr);$i++){
//    echo $r[$i];
//}
////////$r=mysqli_fetch_all($rr);
////////echo count($r);
////////for ($i=0;$i<count($r);$i++){
////////    echo $i;
////////    echo $r[$i];
////////}
////////$n=$r[0];
////////echo $n;
////////foreach($r as $f){
////////    echo $r[0];
////////}
//while($n){
//    echo($r[0]." ");
//    $n-1;
//}
//for($i=0;$i<$n;$i++){
//    echo $i;
//    echo $r[$i];
//}
////define variables
//$sname=$id=$phno="";
//
//$sname=$_POST['sname'];
//$id=$_POST['id'];
//$phno=$_POST['phno'];
//
//$sq="INSERT INTO studentdetails  values 
//('$id','$sname','$phno')";
////insert in database
//$rs=mysqli_query($conn,$sq);
//if($rs){
//    echo "details record inserted";
//}
//else{
//    echo "error:".$sq."<br>".mysqli_error($conn);
//}
//echo "<h3>"+$sname+"</h3>";
//mysqli_close($conn);
?>
    <script>
        function func(){
            ele=document.getElementById('insert')
        val=ele.value
        document.getElementById('table').value=val
        }
    </script>
           <link rel="stylesheet" type="text/css" href="style.css">

    <body>

<br>
        <label for='table'>'table name:'</label>
        <input type='text' value=''name='table' id='table' required/><br>
            <label for="id">Enter Student ID:</label>
            <input type="text" name="id" required/>
            <br>
            <label for="sname">Enter Student Name:</label>
            <input type="text" name="sname" required/>
            <br>
            <label for="phno">Enter parent phone number:</label>
            <input type="text" name="phno" required/>
            <br>
            <input type="submit" value="submit" name='insert' >
        </form>

</body>
</html>