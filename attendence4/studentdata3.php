<!DOCTYPE html>
<html>
    <head>
        <title>
            delete records
        </title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script type="text/javascript" src="studentdata.js"></script>
    </head>
        <title>
            studentdata
        </title>
        <link rel="stylesheet" type="text/css" href="studentdata.css">
        <script type="text/javascript" src="studentdata.js"></script>
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
        <form method='post' action='http://localhost/attendence4/studentdata.php'><label for='yearr'>Enter year:</label><input type='text' name='yearr'/><br><label for='branch'>Enter Branch:</label><input type='text' name='branch'/><input type='submit' name='drops' value='delete all records'></form>