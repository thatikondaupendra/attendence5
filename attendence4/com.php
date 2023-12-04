<html>
<link rel="stylesheet" type="text/css" href="style.css">
<script>
        function func(){

            ele2=document.getElementById('insert2')
        val2=ele2.value
        document.getElementById('table2').value=val2
        alert(val2);
        }
    </script>
<form  method='post' action='http://localhost/attendence4/com.php' id='ttform'>
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
echo "<select onchange='func()' id='insert2' >";
while($table=mysqli_fetch_array($rr)){
 echo ("<option name=$table[0] value=$table[0] selected>$table[0]</option>");
$s=$table[0];
}

echo "</select><br>";
//echo "<select onchange='fun()'><option>hello</option><option>hello2</option></select>";

?>
<br>

        <label for='table'>Batch name:</label>
        <input type='text' placeholder='select from above list:(total absent list)'name='tabl' id='table2' required/>
        <br>
        <label for='table'>'Enter dates(yyyy/mm/dd):'</label>
        <input type='text' placeholder='Enter date:' name='d1' id='table' required/>
        <input type='text' placeholder='Enter date:' name='d2' id='table' required/>
        <input type='submit' name='table2' value='search'/><br>
   
      </form>
  <?php
      if (array_key_exists('table2',$_POST)){
        creating2();
    }
if (array_key_exists('table2',$_POST)){
    create2();
}
function creating2(){

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

function create2(){
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