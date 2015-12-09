<html>
<head>
</head>
<body>
	
<?php

  	$conn = new mysqli("classroom.cs.unc.edu", "luiculau", "visionward12!", "luiculaudb");
	$conn->query("DROP TABLE IF EXISTS Users");
	$conn->query("DROP TABLE IF EXISTS Room");
	$conn->query("DROP TABLE IF EXISTS Posts");
	$conn->query("DROP TABLE IF EXISTS RoomUsers");
	$conn->query("DROP TABLE IF EXISTS Chapters");
	
	$conn->query("CREATE TABLE Users(
		nickname char(30),
		email char(30),
		password char(30),
		PRIMARY KEY (nickname))");
		
	$conn->query("CREATE TABLE Room(
		title char(30),
		nickname char(30) REFERENCES Users(nickname),
		roomkey char(30),
		inactime INT,
		PRIMARY KEY(title))");
		
	$conn->query("CREATE TABLE Chapters( 
					id INT,
					title char(30) REFERENCES Room(title))"); // This table doesnt have a primary key, but its ok, its a weak entity

	$conn->query("CREATE TABLE RoomUsers(
					nickname char(30) REFERENCES Users(nickname),
					title char(30) REFERENCES Room(title))");
					
	$conn->query("CREATE TABLE Posts(
					id INT,
					number INT,
					nickname char(30) REFERENCES Users(nickname),
					text char(200))"); // This table doesnt have a primary key, but its ok, its a weak entity
?>

</body>
</html>
