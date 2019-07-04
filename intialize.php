<?php 
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
$sql="CREATE DATABASE formbuilder";
$conn->query($sql);
$sql="CREATE TABLE accinfo (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30),
email VARCHAR(30),
password VARCHAR(50)

)";
$conn->query($sql);
$sql="CREATE TABLE files (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fileurl VARCHAR(30),
title VARCHAR(30),
username VARCHAR(50),
description VARCHAR(100),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
$conn->query($sql);
$sql="CREATE TABLE forminfo (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
noq INT(10),
title VARCHAR(30),
username VARCHAR(50),
description VARCHAR(100),
dandt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
$conn->query($sql);
$sql="CREATE TABLE images (
id INT(6) ,
imageurl VARCHAR(30),
title VARCHAR(30),
username VARCHAR(50),
description VARCHAR(100),
dandt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
$conn->query($sql);
$sql="CREATE TABLE message (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
message VARCHAR(300),
title VARCHAR(30),
username VARCHAR(50),

dandt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
$conn->query($sql);
$sql="CREATE TABLE question(
id INT(6) ,
questions VARCHAR(300),
title VARCHAR(30),
uername VARCHAR(50),
description VARCHAR(100),
dandt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
$conn->query($sql);
$sql="CREATE TABLE tobedelete (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY ,
questions VARCHAR(300),
title VARCHAR(30),
uername VARCHAR(50),
description VARCHAR(100),
dandt DATE 
)";
$conn->query($sql);
?>