<!doctype html>
<!-- Ali Surmeli -->
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
        $sql = "SELECT  Prof_ID,Prof_Name,Departmant,College_ID FROM Professors WHERE Departmant = '$_POST[dep]'";

        $stmnt = $conn->prepare($sql);

        $stmnt->execute();

        $row = $stmnt->fetch();
        if ($row) {
            echo '<table>';
            echo '<tr> <th>Professor ID</th> <th>Professor Name</th> <th>Departmant</th> <th>College ID</th> </tr>';
            do {
                echo "<tr><td>$row[Prof_ID]</td><td>$row[Prof_Name]</td><td>$row[Departmant]</td><td>$row[College_ID]</td></tr>";
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