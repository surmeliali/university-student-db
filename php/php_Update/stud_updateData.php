<!doctype html>
<!-- Ali Surmeli -->
<html>
<head>
    <title>Update a record of a table</title>
    <link rel="stylesheet" href="../../css/style.css" />
</head>

<body>

    <?php
    $servername = "localhost";
    $dbname = "Student_Coop_DB";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "<p style='color:green'>Connection Was Successful</p>";
    } catch (PDOException $err) {
        echo "<p style='color:red'> Connection Failed: " . $err->getMessage() . "</p>\r\n";
    }

    try {
        $sql = "UPDATE $dbname.Student SET Student_Name = :studname WHERE Student_ID = :studid";
        $stmnt = $conn->prepare($sql);        
        $stmnt->bindParam(':studid', $_POST['Student_ID']);
        $stmnt->bindParam(':studname', $_POST['Student_Name']);

        $stmnt->execute();
        echo "<p style='color:green'>Record Updated Successfully</p>";
    } catch (PDOException $err) {
        echo "<p style='color:red'>Record Update Failed: " . $err->getMessage() . "</p>\r\n";
    }

    unset($conn);

    echo "<a href='../../index.html'>Back to the Homepage</a>";

    ?>
</body>

</html>