<!doctype html>
<!-- Ali Surmeli -->
<html>
<head>
	<title>Create a Table</title>
	<link rel="stylesheet" href="../../css/style.css" />
</head>

<body>

	<?php

	$servername = "localhost";
	$dbname = "Student_Coop_DB";
	$username = "root";
	$password = "";


	try {
        $conn = new PDO("mysql:host=$GLOBALS[servername];dbname=$GLOBALS[dbname]", $GLOBALS['username'], $GLOBALS['password']);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
		echo "<p style='color:green'>Connection Was Successful</p>";
	} catch (PDOException $err) {
		echo "<p style='color:red'>Connection Failed: " . $err->getMessage() . "</p>\r\n";
	}

	$sql = "CREATE TABLE College(
		College_ID INT,
		College_Name VARCHAR(20) NOT NULL,
		College_Location VARCHAR(30),
		PRIMARY KEY(College_ID)
		) ENGINE = InnoDB;
		
		CREATE TABLE Professors(
		Prof_ID INT,
		Prof_Name VARCHAR(20) NOT NULL,
		Departmant VARCHAR(30) NOT NULL,
		College_ID INT, 
		PRIMARY KEY(Prof_ID),
		FOREIGN KEY(College_ID) REFERENCES College(College_ID)
		ON DELETE CASCADE
		) ENGINE = InnoDB;
		
		CREATE TABLE Student(
		College_ID INT,
		Student_ID INT,
		Student_Name VARCHAR(20) NOT NULL,
		DateofBirth DATE NOT NULL,
		ProgramofStudy VARCHAR(30) NOT NULL,
		PRIMARY KEY(Student_ID), 
		FOREIGN KEY (College_ID) REFERENCES College(College_ID)
		) ENGINE = InnoDB;
		
		CREATE TABLE Coop(
		Coop_ID INT,
		Student_ID INT,
		Job_Position VARCHAR(20),
		Start_Date DATE NOT NULL,
		End_Date DATE,
		PRIMARY KEY(Coop_ID),
		FOREIGN KEY(Student_ID) REFERENCES Student(Student_ID)
		) ENGINE = InnoDB;
		
		CREATE TABLE Result(
		Coop_ID INT,
		Student_ID INT,
		Result VARCHAR(30),
		PRIMARY KEY(Student_ID, Coop_ID),
		FOREIGN KEY(Coop_ID) REFERENCES Coop(Coop_ID) ON DELETE CASCADE,
		FOREIGN KEY(Student_ID) REFERENCES Student(Student_ID) ON DELETE CASCADE)
		ENGINE = InnoDB;
		
		CREATE TABLE Company(
		Company_ID INT,
		Company_Name VARCHAR(20) NOT NULL,
		Location VARCHAR(30) NOT NULL,
		PRIMARY KEY(Company_ID))
		Engine=InnoDB;
		
		
		CREATE TABLE Employees(
		Emp_ID INT,
		Emp_Name VARCHAR(20) NOT NULL,
		Emp_Role VARCHAR(30) NOT NULL,
		Company_ID INT,
		PRIMARY KEY(Emp_ID),
		FOREIGN KEY(Company_ID) REFERENCES Company(Company_ID)
		ON DELETE CASCADE
		) ENGINE = InnoDB;
		
		CREATE TABLE Contract(
		Contract_ID INT,
		Start_Date DATE,
		End_Date DATE,
		Student_ID INT,
		Coop_ID INT,
		Emp_ID INT,
		Message VARCHAR(50),
		PRIMARY KEY(Contract_ID),
		FOREIGN KEY (Student_ID) REFERENCES Student(Student_ID)
		ON DELETE CASCADE,
		FOREIGN KEY (Coop_ID) REFERENCES Coop(Coop_ID),
		FOREIGN KEY (Emp_ID) REFERENCES Employees(Emp_ID)
		ON DELETE CASCADE
		) ENGINE = InnoDB;
		
		CREATE TABLE Report(
		
		Contract_ID INT,
		Report_ID INT,
		Prof_ID INT,
		Remarks VARCHAR(50),
		Report_Date DATE,
		PRIMARY KEY(Report_ID, Contract_ID),
		FOREIGN KEY(Contract_ID) REFERENCES Contract(Contract_ID),
		FOREIGN KEY(Prof_ID) REFERENCES Professors(Prof_ID)
		) ENGINE = InnoDB;
		
		
		
		CREATE TABLE Company_Provide_Coop(
		Coop_ID INT,
		Company_ID INT,
		FOREIGN KEY(Coop_ID) REFERENCES Coop(Coop_ID) ON DELETE CASCADE,
		FOREIGN KEY(Company_ID) REFERENCES Company(Company_ID) ON DELETE CASCADE)
		ENGINE = InnoDB;";

	try {
		$conn->exec($sql);
		echo "<p style='color:green'>Table Created Successfully</p>";
	} catch (PDOException $err) {
		echo "<p style='color:red'>Table Creation Failed: " . $err->getMessage() . "</p>\r\n";
	}

	unset($conn);

	echo "<a href='../../index.html'>Back to the Homepage</a>";

	?>

</body>

</html>