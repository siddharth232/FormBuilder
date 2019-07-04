<?php
 $sql="SELECT * FROM tobedelete";
 $result=$conn->query($sql);
 if ($result) {
 	while($row=$result->fetch_assoc()){
 		$username=$row['username'];
 		$dt=$row['dt'];
 		$title=$row['title'];
 		if ($dt>date("Y-m-d")) {
 			$tablename=$title.$username;
 			$sql="DROP $tablename";
 			$conn->query($sql);
 			$sql="DELETE FROM forminfo WHERE title='$title' AND username='$username'";
 			$conn->query($sql);
 			$sql="DELETE FROM images WHERE title='$title' AND username='$username'";
 			$conn->query($sql);
 			$sql="DELETE FROM files WHERE title='$title' AND username='$username'";
 			$conn->query($sql);
 			$sql="DELETE FROM question WHERE title='$title' AND uername='$username'";
 			$conn->query($sql);
 			$sql="DELETE FROM message WHERE title='$title' AND username='$username'";
 			$conn->query($sql);
 			$sql="DELETE FROM tobedelete WHERE title='$title' AND username='$username'";
 			$conn->query($sql);
 		}
 	}
 }