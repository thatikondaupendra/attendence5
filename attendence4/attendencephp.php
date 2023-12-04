<html>
<link rel="stylesheet" type="text/css" href="style.css">
<style>
    

form {
    text-align: center;
    width: 50%;
    height: auto;
    color:rgb(7, 246, 234);
    background-color: rgba(2, 6, 14, 0.495);
    box-shadow: 15px 10px 18px rgba(6, 98, 237, 0.844);
    padding: 2%;
    margin: 5% auto;
    margin-bottom: auto;
    border-radius: 10px;
    border: 0.4px solid rgb(52, 52, 59);
}

#tform{
    width:90%;
    align-items: right;
    margin:10% auto;
    text-align: right;
    background-color: rgba(2, 6, 14, 0.495);
}
#ttform{
    width:90%;
    align-items: left;
    margin:5%;
    text-align: left;
    background-color: rgba(2, 6, 14, 0.495);
}
#tableform{
    width:90%;
    align-items: center;
    margin:5%;
    text-align: center;
    background-color: rgba(2, 6, 14, 0.495);
}
input[type="text"],
input[type="password"] {
    width: 60%;
    padding: 10px;
    margin: 5px 0 15px;
    border: none;
    background: #f1f1f17e;
}

input[type="submit"] {
    background-color: rgb(199, 215, 245);
    box-shadow: 15px 10px 18px rgba(6, 98, 237, 0.395);
    color: rgba(227, 25, 25, 0.764);
    padding: 10px 20px;
    font-size: large;
    font-style: oblique;
    text-decoration: underline;
    border: none;
    cursor: pointer;
    width: 50%;
    margin-top: 10px;
    border-radius: 5px;
}
button {
    background-color: rgb(199, 215, 245);
    box-shadow: 15px 10px 18px rgba(6, 98, 237, 0.395);
    color: rgba(227, 25, 25, 0.764);
    padding: 10px 20px;
    font-size: large;
    font-style: oblique;
    text-decoration: underline;
    border: none;
    cursor: pointer;
    margin:2%;
    width: 25%;
    margin-top: 10px;
    border-radius: 5px;
}
button:hover{
    color:whitesmoke;
    background-color: blue;
}
input[type="submit"]:hover {
    background-color: darkblue;
    color:aquamarine;
}

.message {
    color: red;
    font-size: 12px;
    margin-top: 10px;
}
label{
    color:rgb(255, 255, 36);
}
body {
    font-family: Arial, sans-serif;
    background-image: url(images/backgroundbody);
    background-repeat: no-repeat;
    background-attachment: fixed;
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
    background-color: rgb(244, 161, 38);
}
nav a::selection{
    background-color: skyblue;
    color:whitesmoke;
}
select{
    text-align: left;
    font-size:150%;
    width:auto;
    height:5%;
    background-color:rgb(31, 33, 35);
    color:rgb(242, 183, 64);
    border-radius: 4%;
}
table{
    width:100%;
}
thead{
    font-size:150%;
    background-color:lightgreen;
}
</style>
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
$sn="localhost";
$un="system";
$p="system";
$db="myDB1";

$conn=mysqli_connect($sn,$un,$p,$db);
if(!$conn){
    die("connection failed:".mysqli_connect_error());
}

//define variables
$name=$regno=$pa=$stu=$year=$branch="";
//$name=$_POST['sname'];
//$regno=array($_POST['list']);
//foreach($regno as $regno){
//echo $regno;
//}
?>
<body style="display:'None'">
<form method="post" action="http://localhost/attendence4/attendencephp1.php">
<?php
$sq="SHOW TABLES FROM $db";
$rr=mysqli_query($conn,$sq);

echo "<select onchange='func()' id='insert' >";
while($table=mysqli_fetch_array($rr)){
    if(strlen($table[0])==7){
 echo ("<option name=$table[0] value=$table[0] selected>$table[0]</option>");
}
}

echo "</select>";

if (array_key_exists('final',$_POST)){
    finall();
}


function finall(){
    $sn="localhost";
$un="system";
$p="system";
$db="myDB1";
echo 'hello world';
$conn=mysqli_connect($sn,$un,$p,$db);
if(!$conn){
    die("connection failed:".mysqli_connect_error());
}
$s=" DELETE FROM todayabs";
$rs=mysqli_query($conn,$s);
$table=$_POST['table'];
echo $table;
$needs=mysqli_query($conn,"SELECT id FROM $table");
while($ta=mysqli_fetch_array($needs)){
    $reg=$ta[0];
    //echo $regn;
$pa=$_POST[$reg];
//echo $pa;
$needs=mysqli_fetch_array(mysqli_query($conn,"SELECT studentname,phone_num FROM $table WHERE id='$reg'"));
if($needs){
$sname=$needs['studentname'];
$phno=$needs['phone_num'];
if ($pa=="0"){
$sq="INSERT INTO todayabs  values ('$reg','$sname','$phno')";
$ss="INSERT INTO totalabs  values ('$reg','$sname','$phno')";
$rss=mysqli_query($conn,$ss);
//insert in database
$rs=mysqli_query($conn,$sq);
}

//echo $reg,"<p>Variable x inside function is: $i</p>";
}
}
if($rs&&$rss){
    echo "Attendence record inserted";
 }
}
//else{
//    echo "error:".$sq."<br>".mysqli_error($conn);
//}
//}
//else{
//    $i=0;
//    $sq="INSERT INTO about5  values 
//    ('$regno','$name','$pa')";
//    //insert in database
//    $rs=mysqli_query($conn,$sq);
//    if(mysqli_query($conn,$sq)){
//        echo "details record inserted";
//        $i=$i+1;
//    }
//    else{
//        echo "error:".$sq."<br>".mysqli_error($conn);
//    }
//}
//echo $name;
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
$table=$_POST['table'];
    $needs=mysqli_query($conn,"SELECT id FROM $table");
    echo "<thead>Attendence sheet</thead><tr><th>regno</th><th>present</th><th>absent</th></tr>";
while($ta=mysqli_fetch_array($needs)){
 echo ("<tr><td><input type='text' value=$ta[0] oninput='msg()' name='reg'/></td><td><inputt type='radio' name=$ta[0] value='1'class='present' checked/></td><td><input type='radio' name=$ta[0] value='0' class='present'/></td></tr>");
}


//  $name=$year.$branch;
//  echo $name;
//$s="DROP TABLE $name";
//$rs=mysqli_query($conn,$s);
//if($rs){
//    echo "selected batch file successfully deleted...";
// }
   //$needs=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM $name WHERE id=$id"));
}

mysqli_close($conn);
?>
    <script>
        function func(){
            ele=document.getElementById('insert')
        val=ele.value
        document.getElementById('table').value=val
        }
    </script>

 
        <table id="stable">
        <label for='table' style="{font-style:bold}">'batch name:'</label>
        <input type='text' value=''name='table' id='table' required/>
          
        <input type="submit" value="get attendence" name='atten' value='atten' >
    </table>
        </form>
</body>

<?php
echo $table;
?>
</html>