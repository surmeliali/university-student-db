<!doctype html>
<!-- Ali Surmeli -->
<html>
<head>
	<title>Insert Data Into a Database</title>
	<link rel="stylesheet" href="../../css/style.css" />
</head>
<body>

<?php
$servername ="localhost";
$dbname = "Student_Coop";
$username = "root";
$password = "";


try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname",$username, $password );
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
	echo "<p style='color:green'>Connection Was Successful</p>";
}
catch (PDOException $err) {
	echo "<p style='color:red'>Connection Failed: " . $err->getMessage() . "</p>\r\n";
}

try {
	$sql="INSERT INTO Professors VALUES (:profid, :profname, :dep, :colid);";  
	$stmnt = $conn->prepare($sql);   
	$stmnt->bindParam(':profid', $_POST['Prof_ID']);  
	$stmnt->bindParam(':profname', $_POST['Prof_Name']);  
	$stmnt->bindParam(':dep', $_POST['Departmant']);
	$stmnt->bindParam(':colid', $_POST['College_ID']);

	$stmnt->execute();

	echo "<p style='color:green'>Data Inserted Into Table Successfully</p>";
}
catch (PDOException $err ) {
	echo "<p style='color:red'>Data Insertion Failed: " . $err->getMessage() . "</p>\r\n";
}

unset($conn);

echo "<a href='../../html/html_Insert/insertData.html'>Return to Add Data Page</a> <br />";

echo "<a href='../../index.html'>Back to the Homepage</a>";

?>

</body>
</html>