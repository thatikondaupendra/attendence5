<html>
    <head>
        <title>
            attendence
</title>
</head>

<link rel="stylesheet" type="text/css" href="style.css">
    <body>

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


<?php
$table=$_POST['table'];



function finall(){
    $sn="localhost";
$un="system";
$p="system";
$db="myDB1";
$conn=mysqli_connect($sn,$un,$p,$db);
if(!$conn){
    die("connection failed:".mysqli_connect_error());
}
global $table;
$currentDate = date('Y-m-d');
$tablea=$table.'absenties';
$tableb=$table.'totalabsenties';
$s=" DELETE FROM $tablea";
$rs=mysqli_query($conn,$s);
$ta=$_POST['table'];

$needs=mysqli_query($conn,"SELECT id FROM $table");
$need=mysqli_query($conn,"SELECT id FROM $table");
while($ta=mysqli_fetch_array($need)){
    $reg=$ta[0];
   // echo $reg."<br>";
    //echo $regn;
if($_POST[$ta[0]]==""){
    $pa=1;
}
else{
$pa=$_POST[$ta[0]];}
$needs=mysqli_fetch_array(mysqli_query($conn,"SELECT studentname,phone_num FROM $table WHERE id='$reg'"));
if($needs){
$sname=$needs['studentname'];
$phno=$needs['phone_num'];
if ($pa=="0"){
$sq="INSERT INTO $tablea  values ('$reg','$sname','$phno','$currentDate')";
$ss="INSERT INTO $tableb  values ('$reg','$sname','$phno','$currentDate')";
//insert in database
$rs=mysqli_query($conn,$sq);
$rss=mysqli_query($conn,$ss);
}

//echo $reg,"<p>Variable x inside function is: $i</p>";
}
}
if($rs&$rss){
    echo "Attendence record inserted";
 }
 else{
    echo "Today All are present";
 }
}

?>
    <form method="post" action="http://localhost/attendence4/attendencephp1.php" id='mform'>
        <input type='text' value=<?= $table?> name=table>
        <?php
if (array_key_exists('atten',$_POST)){
    attendence();
}
function attendence(){
    $sn="localhost";
$un="system";
$p="system";
$db="myDB1";
    $conn=mysqli_connect($sn,$un,$p,$db);
if(!$conn){
    die("connection failed:".mysqli_connect_error());
}
$year=$newphno=$namval=$id='';
global $table;
$p=1;
$a=0;
$currentDate = date('Y-m-d');
    $needs=mysqli_query($conn,"SELECT id FROM $table");
    echo "<table  border='1' style='border-collapse:collapse; color:white;border-color:pink''><thead>Attendence sheet</thead><tr><th>regno</th><th>present</th><th>absent</th><th>($currentDate)</th></tr>";
while($ta=mysqli_fetch_array($needs)){
 echo ("<tr><td><input type='text' value=$ta[0] oninput='msg()' id=reg23/></td><td><input type='radio' name=$ta[0] value= $p class='present' checked/></td><td><input type='radio' name=$ta[0] value= $a class='present'/></td></tr>");
}
echo "</table> ";
echo "<input type='submit' value='post attendence' name='final' >";
}

if (array_key_exists('final',$_POST)){
    finall();
}?>
    </form>

</body>
</html>