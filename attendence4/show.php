<html>
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
    text-align: right;
    width: 44%;
    height: auto;
    color:rgb(7, 246, 234);
    background-color: rgba(2, 6, 14, 0.495);
    box-shadow: 15px 10px 18px rgba(6, 98, 237, 0.844);
    padding: 2%;
    margin: 5% 1%;
    margin-bottom: auto;
    border-radius: 10px;
    border: 0.4px solid rgb(52, 52, 59);
}
#ttform{
    text-align: left;
    width: 44%;
    height: auto;
    color:rgb(7, 246, 234);
    background-color: rgba(2, 6, 14, 0.495);
    box-shadow: 15px 10px 18px rgba(6, 98, 237, 0.844);
    padding: 2%;
    margin: -24% 50%;
    margin-bottom: auto;
    border-radius: 10px;
    border: 0.4px solid rgb(52, 52, 59);
}
#tableform{
    width:90%;
    align-items: center;
    margin:5%;
    text-align: center;
    background-color: rgba(2, 6, 14, 0.495);
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
    font-size:200%;
    width:auto;
    height:5%;
    background-color:rgb(31, 33, 35);
    color:rgb(242, 183, 64);
}
table{
    width:100%;
}
thead{
    font-size:250%;
    background-color:lightgreen;
}
th{
    font-size:220%;
    color :black;
}
td{
    font-size:180%;
    color:white;
}
input[type="text"],
input[type="password"] {
    width: 60%;
    padding: 10px;
    margin: 5px 0 15px;
    border: none;
    background: #f1f1f17e;
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
$sq="SHOW TABLES FROM $db";
$rr=mysqli_query($conn,$sq);
?>
    <form  method='post' action='http://localhost/attendence4/show.php'>
        <h1>Search Here for total list</h1>
        <?php
echo "<select onchange='fun()' id='insert' >";
while($table=mysqli_fetch_array($rr)){
 echo ("<option name=$table[0] value=$table[0] selected>$table[0]</option>");
$s=$table[0];
}

echo "</select><br>";
//echo "<select onchange='fun()'><option>hello</option><option>hello2</option></select>";

?>

    <script>
        function fun(){
            
            ele=document.getElementById('insert')
            ele1=document.getElementById('insert1')
            ele2=document.getElementById('insert2')
        val=ele.value
        val1=ele1.value
        val2=ele2.value
        document.getElementById('table').value=val
        document.getElementById('table1').value=val1
        document.getElementById('table2').value=val2
        }
    </script>

        <label for='table'>'Batch name:'</label><br>
        <input type='text' placeholder='select from above list:'name='tabl' id='table' required/>
        <input type='submit' name='table' value='show list'/><br>
    </form>

    <form  method='post' action='http://localhost/attendence4/show.php' id='tform'>
        <h1>Search Here with name or register number</h1>
        <?php
        $sq="SHOW TABLES FROM $db";
        $rr=mysqli_query($conn,$sq);
echo "<select onchange='fun()' id='insert1' >";
while($table=mysqli_fetch_array($rr)){
 echo ("<option name=$table[0] value=$table[0] selected>$table[0]</option>");
$s=$table[0];
}

echo "</select><br>";
//echo "<select onchange='fun()'><option>hello</option><option>hello2</option></select>";

?><br>
         <label for='table'>'Batch name:'</label>
        <input type='text' placeholder='select from above list:'name='tabl' id='table1' required/><br>
        <label for='table'>'Enter name or reg:'</label>
        <input type='text' placeholder='Enter name or register_num:' name='nr' id='table' required/>
        <input type='submit' name='table1' value='search'/><br>
</form>

<form  method='post' action='http://localhost/attendence4/show.php' id='ttform'>
    <h1>Search Here with date</h1>
        <?php
        $sq="SHOW TABLES FROM $db";
        $rr=mysqli_query($conn,$sq);
echo "<select onchange='fun()' id='insert2' >";
while($table=mysqli_fetch_array($rr)){
    if(strlen($table[0])>7){
 echo ("<option name=$table[0] value=$table[0] selected>$table[0]</option>");
$s=$table[0];
    }
}

echo "</select><br>";
//echo "<select onchange='fun()'><option>hello</option><option>hello2</option></select>";

?>
<br>
        <label for='table'>'Batch name:'</label>
        <input type='text' placeholder='select from above list:(total absent list)'name='tabl' id='table2' required/>
        <br>
        <label for='table'>'Enter date(yyyy/mm/dd):'</label>
        <input type='text' placeholder='Enter date:' name='d' id='table' required/>
        <input type='submit' name='table2' value='search'/><br>
   
      </form>
    





<!-- ----------------- cummulative ------------------>
<script>
        function func(){

            ele2=document.getElementById('inserts')
        val2=ele2.value
        document.getElementById('tables').value=val2
        }
    </script>
<form  method='post' action='http://localhost/attendence4/show.php' id='tttform'>
    <h1>Search Here with date</h1>
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
echo "<select onchange='func()' id='inserts' >";
while($table=mysqli_fetch_array($rr)){
    if(strlen($table[0])>7){
        echo ("<option name=$table[0] value=$table[0] selected>$table[0]</option>");
       $s=$table[0];
           }
}

echo "</select><br>";
//echo "<select onchange='fun()'><option>hello</option><option>hello2</option></select>";

?>
<br>

        <label for='table'>Batch name:</label>
        <input type='text' placeholder='select from above list:(total absent list)'name='tabl' id='tables' required/>
        <br>
        <label for='table'>'Enter dates(yyyy/mm/dd):'</label>
        <input type='text' placeholder='Enter first date:' name='d1' id='table' required/>
        <input type='text' placeholder='Enter second date:' name='d2' id='table' required/>
        <input type='submit' name='tables' value='search'/><br>
   
      </form>
  <?php
      if (array_key_exists('tables',$_POST)){
        creatings();
    }
if (array_key_exists('tables',$_POST)){
    creates();
}
function creatings(){

    ?>
<?php
// Declare two dates 
$Date1 = $_POST['d1']; 
$Date2 = $_POST['d2']; 
  
// Declare an empty array 
$array = array(); 
  
// Use strtotime function 
$Variable1 = strtotime($Date1); 
$Variable2 = strtotime($Date2); 
  
// Use for loop to store dates into array 
// 86400 sec = 24 hrs = 60*60*24 = 1 day 
for ($currentDate = $Variable1; $currentDate <= $Variable2;  
                                $currentDate += (86400)) { 
                                      
$Store = date('Y-m-d', $currentDate); 

$array[] = $Store; 
} 
  
// Display the dates in array format 
//print_r($array); 
?> 

<?php
        $sn="localhost";
    $un="system";
    $p="system";
    $db="myDB1";
        $conn=mysqli_connect($sn,$un,$p,$db);
    if(!$conn){
        die("connection failed:".mysqli_connect_error());
    }
    $tab=$_POST['tabl'];
    if (empty($tab)){
        echo "Please Enter Batch Name first";
    }
    
    else{
    $tab=$_POST['tabl'];
    //$input=$_POST['d'];  
    for ($i=0;$i<sizeof($array);$i++){
        $input=$array[$i];
    $df='n';
    $ddd=mysqli_query($conn,"SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='$tab'");
    while($dd=mysqli_fetch_array($ddd)){
    if($dd[0]=='date_of_absent'){
        $df='s';
    }
    else{
        continue;
    }
}
    if($df=='s'){
    $count=mysqli_fetch_array ( mysqli_query($conn,"SELECT count(id) FROM $tab WHERE date_of_absent='$input'"));
    ?>
     <form  method='post' action='http://localhost/attendence4/show.php' id='tableform' style='display:content;'>
    
    <h4>COUNT::<?php echo $count[0];?></h4>
   <table border='1' style='border-collapse:collapse; color:white;border-color:pink'>
    <thead><h2> Student details</h2></thead><tr><th>Register number</th><th>Name</th><th>Phone number</th><th>Date</th></tr>
   
    <?php
    if(strlen($tab)!=7){
    //$ll=array(); 
    $needs=mysqli_query($conn,"SELECT id,studentname,phone_num,date_of_absent FROM $tab WHERE date_of_absent='$input'");
    ?>
<?php
while($ta=mysqli_fetch_array($needs)){
    $id=$ta['id'];
    $name=$ta['studentname'];
    $phno=$ta['phone_num'];
    $dt=$ta['date_of_absent'];
    //array_push($ll,array($id,$name,$phno));
    ?>
<tr>
    <td>
        <?php echo $id;?>
</td>
<td>
        <?php echo $name;?>
</td>
<td>
        <?php echo $phno;?>
</td>
<td>
        <?php echo $dt; ?>
</td>
</tr>

<?php
 

//---------------------------------------------------

?>
<?php
//echo sizeof($ll);
 //echo ("<tr><td><input type='text' value=$id oninput='msg()' name='reg'/></td><td><input type='text' value=$name  name='reg'/></td><td><input type='text' value=$phno name='reg'/></td></tr>");
    }
   echo"</table>";
}
}
else{
    echo"please select proper batch list...(must be TOTAL ABSENT LIST)";
  }
    }
}
}

function creates(){
    // Declare two dates 
$Date1 = $_POST['d1']; 
$Date2 = $_POST['d2']; 
  
// Declare an empty array 
$array = array(); 
  
// Use strtotime function 
$Variable1 = strtotime($Date1); 
$Variable2 = strtotime($Date2); 
  
// Use for loop to store dates into array 
// 86400 sec = 24 hrs = 60*60*24 = 1 day 
for ($currentDate = $Variable1; $currentDate <= $Variable2;  
                                $currentDate += (86400)) { 
                                      
$Store = date('Y-m-d', $currentDate); 
$array[] = $Store; 
} 
    $sn="localhost";
    $un="system";
    $p="system";
    $db="myDB1";
        $conn=mysqli_connect($sn,$un,$p,$db);
    if(!$conn){
        die("connection failed:".mysqli_connect_error());
    }
    $tab=$_POST['tabl'];
    if (empty($tab)){
        echo "";
    }
    
    else{
    $tab=$_POST['tabl'];
    //$d=$_POST['d'];

    $df='n';
    $ddd=mysqli_query($conn,"SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='$tab'");
while($dd=mysqli_fetch_array($ddd)){
        if($dd[0]=='date_of_absent'){
            $df='s';
        }
    }
    if($df=='s'){
    $sq="SHOW TABLES FROM $db";
    $rr=mysqli_query($conn,$sq);
                $tab=$_POST['tabl'];
                $drop="DROP TABLE down";
                while($table=mysqli_fetch_array($rr)){
                    if('down'==$table[0]){
                        $sql=mysqli_query($conn,$drop);
                    }
                   }
    $s="CREATE TABLE down AS SELECT * FROM $tab";
    $ss=mysqli_query($conn,$s);
    $del="DELETE FROM  down";
    $ss=mysqli_query($conn,$del);
    //$df="SELECT * FROM $tab  WHERE date_of_absent=$d";
    for ($i=0;$i<sizeof($array);$i++){
        $d=$array[$i];
        $d=strval($d);
    $dd="INSERT INTO down SELECT * FROM $tab  WHERE date_of_absent='$d'";
    $ddd=mysqli_query($conn,$dd);
    ?>
    </form>

    <?php
                    }
                    ?>
                        <form  method='post' action='http://localhost/attendence4/test.php'> 
    <input type='submit' name='down' value='download'/>
    </form>
    <?php


}
else{
    echo"";
  }
}
}
?>







    <?php
          if (array_key_exists('table',$_POST)){
            create();
        }
        function create(){
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
$tab=$_POST['tabl'];
if (empty($tab)){
    echo "";
}

else{
            $tab=$_POST['tabl'];
            $drop="DROP TABLE down";
            while($table=mysqli_fetch_array($rr)){
                if('down'==$table[0]){
                    $sql=mysqli_query($conn,$drop);
                }
               }
            
            $s="CREATE TABLE down AS SELECT * FROM $tab";
            $ss=mysqli_query($conn,$s);
            //$ss=mysqli_query($conn,$d);
           ?> <form  method='post' action='http://localhost/attendence4/test.php'> 
            <input type='submit' name='down' value='download'/>
            </form>
            <?php
}
        }
        if (array_key_exists('table2',$_POST)){
            create2();
        }
        function create2(){
            $sn="localhost";
            $un="system";
            $p="system";
            $db="myDB1";
                $conn=mysqli_connect($sn,$un,$p,$db);
            if(!$conn){
                die("connection failed:".mysqli_connect_error());
            }
            $tab=$_POST['tabl'];
            if (empty($tab)){
                echo "";
            }
            
            else{
            $tab=$_POST['tabl'];
            $d=$_POST['d'];
            $df='n';
            $ddd=mysqli_query($conn,"SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='$tab'");
        while($dd=mysqli_fetch_array($ddd)){
                if($dd[0]=='date_of_absent'){
                    $df='s';
                }
            }
            if($df=='s'){
            $d=strval($d);
            $sq="SHOW TABLES FROM $db";
            $rr=mysqli_query($conn,$sq);
                        $tab=$_POST['tabl'];
                        $drop="DROP TABLE down";
                        while($table=mysqli_fetch_array($rr)){
                            if('down'==$table[0]){
                                $sql=mysqli_query($conn,$drop);
                            }
                           }
            $s="CREATE TABLE down AS SELECT * FROM $tab";
            $ss=mysqli_query($conn,$s);
            $del="DELETE FROM  down";
            $ss=mysqli_query($conn,$del);
            //$df="SELECT * FROM $tab  WHERE date_of_absent=$d";
            $dd="INSERT INTO down SELECT * FROM $tab  WHERE date_of_absent='$d'";
            $ddd=mysqli_query($conn,$dd);
            ?>
            </form>
            <form  method='post' action='http://localhost/attendence4/test.php'> 
            <input type='submit' name='down' value='download'/>
            </form>
            <?php
                            }
                            else{
                              echo"";
                            }

        }
    }
        if (array_key_exists('table1',$_POST)){
            create1();
        }
        function create1(){
            $sn="localhost";
            $un="system";
            $p="system";
            $db="myDB1";
                $conn=mysqli_connect($sn,$un,$p,$db);
            if(!$conn){
                die("connection failed:".mysqli_connect_error());
            }
            $tab=$_POST['tabl'];
            if (empty($tab)){
                echo "";
            }
            
            else{
            $tab=$_POST['tabl'];
            $nr=$_POST['nr'];
            $sq="SHOW TABLES FROM $db";
            $rr=mysqli_query($conn,$sq);
                        $tab=$_POST['tabl'];
                        $drop="DROP TABLE down";
                        while($table=mysqli_fetch_array($rr)){
                            if('down'==$table[0]){
                                $sql=mysqli_query($conn,$drop);
                            }
                           }
            $s="CREATE TABLE down AS SELECT * FROM $tab";
            $ss=mysqli_query($conn,$s);
            $d="DELETE FROM  down";
            $ss=mysqli_query($conn,$d);
            $dd="SELECT * FROM $tab  WHERE id=$nr or studentname=$nr";
            $dd="INSERT INTO down SELECT * FROM $tab  WHERE id='$nr' or studentname='$nr'";
            $ddd=mysqli_query($conn,$dd);
            ?> <form  method='post' action='http://localhost/attendence4/test.php'> 
                <input type='submit' name='down' value='download'/>
            </form>
            <?php
            }
        }
    ?>
    
<form  method='post' action='http://localhost/attendence4/show.php' id='tableform' style='display:content;'>
        <table border='1' style='border-collapse:collapse; color:white;border-color:pink'>
        <?php
      if (array_key_exists('table',$_POST)){
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
    $tab=$_POST['tabl'];
    if (empty($tab)){
        echo "Please Enter Batch Name first";
    }
    
    else{
    $tab=$_POST['tabl'];   
    if(strlen($tab)!=7){
    //$ll=array(); 
    $needs=mysqli_query($conn,"SELECT * FROM $tab");
    ?><thead><h2> Student details</h2></thead><tr><th>Register number</th><th>Name</th><th>Phone number</th><th>Date</th></tr>
    <?php
while($ta=mysqli_fetch_array($needs)){
    $id=$ta['id'];
    $name=$ta['studentname'];
    $phno=$ta['phone_num'];
    $dt=$ta['date_of_absent'];
    //array_push($ll,array($id,$name,$phno));
    ?>
<tr>
    <td>
        <?php echo $id;?>
</td>
<td>
        <?php echo $name;?>
</td>
<td>
        <?php echo $phno;?>
</td>
<td>
        <?php echo $dt;?>
</td>
</tr>
<?php
 
}
?>
<?php
//echo sizeof($ll);
 //echo ("<tr><td><input type='text' value=$id oninput='msg()' name='reg'/></td><td><input type='text' value=$name  name='reg'/></td><td><input type='text' value=$phno name='reg'/></td></tr>");
    }
    else{
        $needs=mysqli_query($conn,"SELECT * FROM $tab");
    ?>
    <thead><h2> Student details</h2></thead><tr><th>Register number</th><th>Name</th><th>Phone number</th></tr>
    <?php
while($ta=mysqli_fetch_array($needs)){
    $id=$ta['id'];
    $name=$ta['studentname'];
    $phno=$ta['phone_num'];
    //array_push($ll,array($id,$name,$phno));
    ?>
<tr>
    <td>
        <?php echo $id;?>
</td>
<td>
        <?php echo $name;?>
</td>
<td>
        <?php echo $phno;?>
</td>
</tr>
<?php
 
}
    }
}
    }
?>

        <?php
      if (array_key_exists('table1',$_POST)){
        creating1();
    }
    function creating1(){
        $sn="localhost";
    $un="system";
    $p="system";
    $db="myDB1";
        $conn=mysqli_connect($sn,$un,$p,$db);
    if(!$conn){
        die("connection failed:".mysqli_connect_error());
    }
    $tab=$_POST['tabl'];
    if (empty($tab)){
        echo "Please Enter Batch Name first";
    }
    
    else{
    $tab=$_POST['tabl'];
    $input=$_POST['nr'];  
    if(strlen($tab)!=7){
    //$ll=array(); 
 
    $count=mysqli_fetch_array ( mysqli_query($conn,"SELECT count(id) FROM $tab WHERE id='$input' or studentname='$input'"));
    ?>
    <h4>COUNT::<?php echo $count[0];?></h4>
    <?php
  
    $count=0;
    $needs=mysqli_query($conn,"SELECT id,studentname,phone_num,date_of_absent FROM $tab WHERE id='$input' or studentname='$input'");
    ?>
    <thead><h2> Student details</h2></thead><tr><th>Register number</th><th>Name</th><th>Phone number</th><th>Date</th></tr>
    <?php
while($ta=mysqli_fetch_array($needs)){
    $id=$ta['id'];
    $name=$ta['studentname'];
    $phno=$ta['phone_num'];
    $dt=$ta['date_of_absent'];
    //array_push($ll,array($id,$name,$phno));
    ?>
<tr>
    <td>
        <?php echo $id;?>
</td>
<td>
        <?php echo $name;?>
</td>
<td>
        <?php echo $phno;?>
</td>
<td>
        <?php echo $dt; ?>
</td>
</tr>
<?php
 
}
?>
<?php
//echo sizeof($ll);
 //echo ("<tr><td><input type='text' value=$id oninput='msg()' name='reg'/></td><td><input type='text' value=$name  name='reg'/></td><td><input type='text' value=$phno name='reg'/></td></tr>");
    }
    else{
        $needs=mysqli_query($conn,"SELECT * FROM $tab WHERE id='$input' or studentname='$input'");
    ?>
    <thead><h2> student details</h2></thead><tr><th>register number</th><th>name</th><th>Phone number</th></tr>
    <?php
while($ta=mysqli_fetch_array($needs)){
    $id=$ta['id'];
    $name=$ta['studentname'];
    $phno=$ta['phone_num'];
    //array_push($ll,array($id,$name,$phno));
    ?>
<tr>
    <td>
        <?php echo $id;?>
</td>
<td>
        <?php echo $name;?>
</td>
<td>
        <?php echo $phno;?>
</td>
</tr>
<?php
 
}
    }
}
}
?>
        <?php
      if (array_key_exists('table2',$_POST)){
        creating2();
    }
    function creating2(){
        $sn="localhost";
    $un="system";
    $p="system";
    $db="myDB1";
        $conn=mysqli_connect($sn,$un,$p,$db);
    if(!$conn){
        die("connection failed:".mysqli_connect_error());
    }
    $tab=$_POST['tabl'];
    if (empty($tab)){
        echo "Please Enter Batch Name first";
    }
    
    else{
    $tab=$_POST['tabl'];
    $input=$_POST['d'];  
    $df='n';
    $ddd=mysqli_query($conn,"SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='$tab'");
    while($dd=mysqli_fetch_array($ddd)){
    if($dd[0]=='date_of_absent'){
        $df='s';
    }
    else{
        continue;
    }
}
    if($df=='s'){
    $count=mysqli_fetch_array ( mysqli_query($conn,"SELECT count(id) FROM $tab WHERE date_of_absent='$input'"));
    ?>
    <h4>COUNT::<?php echo $count[0];?></h4>
    <?php
    if(strlen($tab)!=7){
    //$ll=array(); 
    $needs=mysqli_query($conn,"SELECT id,studentname,phone_num,date_of_absent FROM $tab WHERE date_of_absent='$input'");
    ?>
    <thead><?php echo $input ?><h2> Student details</h2></thead><tr><th>Register number</th><th>Name</th><th>Phone number</th><th>Date</th></tr>
    <?php
while($ta=mysqli_fetch_array($needs)){
    $id=$ta['id'];
    $name=$ta['studentname'];
    $phno=$ta['phone_num'];
    $dt=$ta['date_of_absent'];
    //array_push($ll,array($id,$name,$phno));
    ?>
<tr>
    <td>
        <?php echo $id;?>
</td>
<td>
        <?php echo $name;?>
</td>
<td>
        <?php echo $phno;?>
</td>
<td>
        <?php echo $dt; ?>
</td>
</tr>
<?php
 

//---------------------------------------------------

?>
<?php
//echo sizeof($ll);
 //echo ("<tr><td><input type='text' value=$id oninput='msg()' name='reg'/></td><td><input type='text' value=$name  name='reg'/></td><td><input type='text' value=$phno name='reg'/></td></tr>");
    }
}
}
else{
    echo"please select proper batch list...(must be TOTAL ABSENT LIST)";
  }

}
}
    
?>
</table>
</form>

</body>
</html>
<?php
//-------------------------for attendence------------------------------------------
      if (array_key_exists('att',$_POST)){
        attshow();
    }
    function attshow(){
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
        <form  method='post' action='http://localhost/attendence4/show.php'>
            <?php
    echo "<select onchange='fun()' id='insert'>";
    while($table=mysqli_fetch_array($rr)){
     echo ("<option name=$table[0] value=$table[0] selected>$table[0]</option>");
    $s=$table[0];
    }
    
    echo "</select>";
    //echo "<select onchange='fun()'><option>hello</option><option>hello2</option></select>";
    
    ?>
    
        <script>
            function fun(){
                ele=document.getElementById('insert')
            val=ele.value
            document.getElementById('table').value=val
            }
        </script>
    
            <table id="stable">
            <label for='table'>'batch name:'</label>
            <input type='text' placeholder='select from above list:'name='tabl' id='table'/>
            <input type='submit' name='table' value='show list'/>
            <label for='table'>'Enter name or reg:'</label>
            <input type='text' placeholder='Enter name or register_num:' name='nr' id='table'/>
            <input type='submit' name='table1' value='table1'/>
            <label for='table'>'Enter date:'</label>
            <input type='text' placeholder='Enter date:' name='d' id='table'/>
            <input type='submit' name='table2' value='table1'/>
        </form>
        <?php
              if (array_key_exists('table',$_POST)){
                create();
            }
            function create(){
                $sn="localhost";
                $un="system";
                $p="system";
                $db="myDB1";
                    $conn=mysqli_connect($sn,$un,$p,$db);
                if(!$conn){
                    die("connection failed:".mysqli_connect_error());
                }
                $tab=$_POST['tabl'];
    if (empty($tab)){
        echo "";
    }
    
    else{
                $tab=$_POST['tabl'];
                $drop="DROP TABLE down";
    $sql=mysqli_query($conn,$drop);
                $s="CREATE TABLE down AS SELECT * FROM $tab";
                $ss=mysqli_query($conn,$s);
                //$ss=mysqli_query($conn,$d);
               ?> <form  method='post' action='http://localhost/attendence4/test.php'> 
                    <input type='text' placeholder='select from above list:'name='tabll' id='table2'/>
                    <input type='submit' name='down' value='download'/>
                </form>
                <?php
    
            }
        }
            if (array_key_exists('table2',$_POST)){
                create2();
            }
            function create2(){
                $sn="localhost";
                $un="system";
                $p="system";
                $db="myDB1";
                    $conn=mysqli_connect($sn,$un,$p,$db);
                if(!$conn){
                    die("connection failed:".mysqli_connect_error());
                }
                $tab=$_POST['tabl'];
    if (empty($tab)){
        echo "";
    }
    
    else{
                $tab=$_POST['tabl'];
                $d=$_POST['d'];
                $d=strval($d);
                echo $d;
                $drop="DROP TABLE down";
    $sql=mysqli_query($conn,$drop);
                $s="CREATE TABLE down AS SELECT * FROM $tab";
                $ss=mysqli_query($conn,$s);
                $del="DELETE FROM  down";
                $ss=mysqli_query($conn,$del);
                //$df="SELECT * FROM $tab  WHERE date_of_absent=$d";
                $dd="INSERT INTO down SELECT * FROM $tab  WHERE date_of_absent='$d'";
                $ddd=mysqli_query($conn,$dd);
                ?> <form  method='post' action='http://localhost/attendence4/test.php'> 
                    <input type='text' placeholder='select from above list:'name='tabll' id='table2'/>
                    <input type='submit' name='down' value='download'/>
                </form>
                <?php
            }
        }
            if (array_key_exists('table1',$_POST)){
                create1();
            }
            function create1(){
                $sn="localhost";
                $un="system";
                $p="system";
                $db="myDB1";
                    $conn=mysqli_connect($sn,$un,$p,$db);
                if(!$conn){
                    die("connection failed:".mysqli_connect_error());
                }
                $tab=$_POST['tabl'];
    if (empty($tab)){
        echo "";
    }
    
    else{
                $tab=$_POST['tabl'];
                $nr=$_POST['nr'];
                $drop="DROP TABLE down";
    $sql=mysqli_query($conn,$drop);
                $s="CREATE TABLE down AS SELECT * FROM $tab";
                $ss=mysqli_query($conn,$s);
                $d="DELETE FROM  down";
                $ss=mysqli_query($conn,$d);
                $dd="SELECT * FROM $tab  WHERE id=$nr or studentname=$nr";
                $dd="INSERT INTO down SELECT * FROM $tab  WHERE id='$nr' or studentname='$nr'";
                $ddd=mysqli_query($conn,$dd);
                ?> <form  method='post' action='http://localhost/attendence4/test.php'> 
                    <input type='text' placeholder='select from above list:'name='tabll' id='table2'/>
                    <input type='submit' name='down' value='download'/>
                </form>
                <?php
    }
            }
        ?>
        
    <form  method='post' action='http://localhost/attendence4/show.php'>
            <table border='1' style='border-collapse:collapse; color:white;border-color:pink'>
            <?php
          if (array_key_exists('table',$_POST)){
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
        $tab=$_POST['tabl'];
    if (empty($tab)){
        echo "Please Enter Batch Name first";
    }
    
    else{
        $tab=$_POST['tabl'];   
        if(strlen($tab)!=7){
        //$ll=array(); 
        $needs=mysqli_query($conn,"SELECT * FROM $tab");
        ?><thead><h2> Student details</h2></thead><tr><th>Register number</th><th>Name</th><th>Phone number</th><th>Date</th></tr>
        <?php
    while($ta=mysqli_fetch_array($needs)){
        $id=$ta['id'];
        $name=$ta['studentname'];
        $phno=$ta['phone_num'];
        $dt=$ta['date_of_absent'];
        //array_push($ll,array($id,$name,$phno));
        ?>
    <tr>
        <td>
            <?php echo $id;?>
    </td>
    <td>
            <?php echo $name;?>
    </td>
    <td>
            <?php echo $phno;?>
    </td>
    <td>
            <?php echo $dt;?>
    </td>
    </tr>
    <?php
     
    }
    ?>
    <?php
    //echo sizeof($ll);
     //echo ("<tr><td><input type='text' value=$id oninput='msg()' name='reg'/></td><td><input type='text' value=$name  name='reg'/></td><td><input type='text' value=$phno name='reg'/></td></tr>");
        }
        else{
            $needs=mysqli_query($conn,"SELECT * FROM $tab");
        ?>
        <thead><h2> Student details</h2></thead><tr><th>Register number</th><th>Name</th><th>Phone number</th></tr>
        <?php
    while($ta=mysqli_fetch_array($needs)){
        $id=$ta['id'];
        $name=$ta['studentname'];
        $phno=$ta['phone_num'];
        //array_push($ll,array($id,$name,$phno));
        ?>
    <tr>
        <td>
            <?php echo $id;?>
    </td>
    <td>
            <?php echo $name;?>
    </td>
    <td>
            <?php echo $phno;?>
    </td>
    </tr>
    <?php
     
    }
        }
    }}
    ?>
    
            <?php
          if (array_key_exists('table1',$_POST)){
            creating1();
        }
        function creating1(){
            $sn="localhost";
        $un="system";
        $p="system";
        $db="myDB1";
            $conn=mysqli_connect($sn,$un,$p,$db);
        if(!$conn){
            die("connection failed:".mysqli_connect_error());
        }
        $tab=$_POST['tabl'];
    if (empty($tab)){
        echo "Please Enter Batch Name first";
    }
    
    else{
        $tab=$_POST['tabl'];
        $input=$_POST['nr'];  
        if(strlen($tab)!=7){
        //$ll=array(); 
     
        $count=mysqli_fetch_array ( mysqli_query($conn,"SELECT count(id) FROM $tab WHERE id='$input' or studentname='$input'"));
        ?>
        <h4>COUNT::<?php echo $count[0];?></h4>
        <?php
      
        $count=0;
        $needs=mysqli_query($conn,"SELECT id,studentname,phone_num,date_of_absent FROM $tab WHERE id='$input' or studentname='$input'");
        ?>
        <thead>Student details</thead><tr><th>Register number</th><th>Name</th><th>Phone number</th><th>Date</th></tr>
        <?php
    while($ta=mysqli_fetch_array($needs)){
        $id=$ta['id'];
        $name=$ta['studentname'];
        $phno=$ta['phone_num'];
        $dt=$ta['date_of_absent'];
        //array_push($ll,array($id,$name,$phno));
        ?>
    <tr>
        <td>
            <?php echo $id;?>
    </td>
    <td>
            <?php echo $name;?>
    </td>
    <td>
            <?php echo $phno;?>
    </td>
    <td>
            <?php echo $dt; ?>
    </td>
    </tr>
    <?php
     
    }
    ?>
    <?php
    //echo sizeof($ll);
     //echo ("<tr><td><input type='text' value=$id oninput='msg()' name='reg'/></td><td><input type='text' value=$name  name='reg'/></td><td><input type='text' value=$phno name='reg'/></td></tr>");
        }
        else{
            $needs=mysqli_query($conn,"SELECT * FROM $tab WHERE id='$input' or studentname='$input'");
        ?>
        <thead>Student details</thead><tr><th>Register number</th><th>Name</th><th>Phone number</th></tr>
        <?php
    while($ta=mysqli_fetch_array($needs)){
        $id=$ta['id'];
        $name=$ta['studentname'];
        $phno=$ta['phone_num'];
        //array_push($ll,array($id,$name,$phno));
        ?>
    <tr>
        <td>
            <?php echo $id;?>
    </td>
    <td>
            <?php echo $name;?>
    </td>
    <td>
            <?php echo $phno;?>
    </td>
    </tr>
    <?php
     
    }
}
        }
    }
    ?>
            <?php
          if (array_key_exists('table2',$_POST)){
            creating2();
        }
        function creating2(){
            $sn="localhost";
        $un="system";
        $p="system";
        $db="myDB1";
            $conn=mysqli_connect($sn,$un,$p,$db);
        if(!$conn){
            die("connection failed:".mysqli_connect_error());
        }
        $tab=$_POST['tabl'];
    if (empty($tab)){
        echo "Please Enter Batch Name first";
    }
    
    else{
        $tab=$_POST['tabl'];
        $input=$_POST['d'];  
        $count=mysqli_fetch_array ( mysqli_query($conn,"SELECT count(id) FROM $tab WHERE date_of_absent='$input'"));
        ?>
        <h4>COUNT::<?php echo $count[0];?></h4>
        <?php
        if(strlen($tab)!=7){
        //$ll=array(); 
        echo $input;
        echo $tab;
        $needs=mysqli_query($conn,"SELECT id,studentname,phone_num,date_of_absent FROM $tab WHERE date_of_absent='$input'");
        ?>
        <thead><h2> Student details</h2></thead><tr><th>Register number</th><th>Name</th><th>Phone number</th><th>Date</th></tr>
        <?php
    while($ta=mysqli_fetch_array($needs)){
        $id=$ta['id'];
        $name=$ta['studentname'];
        $phno=$ta['phone_num'];
        $dt=$ta['date_of_absent'];
        //array_push($ll,array($id,$name,$phno));
        ?>
    <tr>
        <td>
            <?php echo $id;?>
    </td>
    <td>
            <?php echo $name;?>
    </td>
    <td>
            <?php echo $phno;?>
    </td>
    <td>
            <?php echo $dt; ?>
    </td>
    </tr>
    <?php
     
    }
    //---------------------------------------------------
    
    ?>
    <?php
    //echo sizeof($ll);
     //echo ("<tr><td><input type='text' value=$id oninput='msg()' name='reg'/></td><td><input type='text' value=$name  name='reg'/></td><td><input type='text' value=$phno name='reg'/></td></tr>");
        }
    }
    }}
    ?>
    </table>
    </form>
    
    </body>
    </html>
