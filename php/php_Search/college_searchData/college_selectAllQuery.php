<!doctype html>
<!-- Ali Surmeli-->
<html>
<head>
    <title>Display Records of a table</title>
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
        $sql = "SELECT  College_ID,College_Name, College_Location FROM College";
        $stmnt = $conn->prepare($sql);  

        $stmnt->execute();

        $row = $stmnt->fetch();  
        if ($row) {     
            echo '<table>';
            echo '<tr> <th>College ID</th> <th>College Name</th><th>College Location</th></tr>';
            do {
                echo "<tr><td>$row[College_ID]</td><td>$row[College_Name]</td><td>$row[College_Location]</td><</tr>";
            } while ($row = $stmnt->fetch());  
            echo '</table>';
        } else {
            echo "<p> No Record Found!</p>";
        }
    } catch (PDOException $err) {
        echo "<p style='color:red'>Record Retrieval Failed: " . $err->getMessage() . "</p>\r\n";
    }

    unset($conn);

    echo "<a href='../../index.html'>Back to the Homepage</a>";

    ?>
</body>

</html>