<!DOCTYPE html>
<html>
    <head>
        <title>
            modifications
        </title>
        <script type="text/javascript" src="studentdata.js"></script>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
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
        <form>
            <label for='change' >choose which you want to change:</label>
            <br>
            <button onclick='newname()' >Name</button>
            <button onclick='newphno()'>Phone number</button>
        </form>
        <script>
            function newname(){
    document.write("<html><link rel='stylesheet' type='text/css' href='style.css'><button><a href='studentdata.html'>home</a></button><form method='post' action='http://localhost/attendence4/studentdata.php'id='mform'><label for='name'>Enter new name:</label><input type=text name='name' required placeholder='Enter new name'/><br><label for='yearr'>Enter year:</label><input type='text' name='yearr' placeholder='Enter year' required/><br><label for='branch'>Enter Branch:</label><input type='text' name='branch' placeholder='Enter branch' required/><br><label for='id'>enter regno:</label><input type='text' value='' name='id' placeholder='Enter register number' required /><input type='submit' name='modify' value='modify'></form></html>");
}
function newphno(){
        document.write("<html><link rel='stylesheet' type='text/css' href='style.css'><button><a href='studentdata.html'>home</a></button><form method='post' action='http://localhost/attendence4/studentdata.php'id='mform'><label for='phnoo'>Enter new number:</label><input type=text name='phnoo' required placeholder='Enter new number'/><br><label for='yearr'>Enter year:</label><input type='text' name='yearr' placeholder='Enter year' required/><br><label for='branch'>Enter Branch:</label><input type='text' name='branch' placeholder='Enter branch' required/><br><label for='id'>enter regno:</label><input type='text' value='' name='id' placeholder='Enter register number' required/><input type='submit' name='modify1' value='modify1'></form></html>");      
}
</script>
</body>
</html>