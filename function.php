<?php
$conn = mysqli_connect('localhost', 'root', '', 
'kelompok');

function setComments($conn){
	if(isset($_POST['commentSubmit'])){
		$uid = $_POST['uid'];
		$date = $_POST['date'];
		$message = $_POST['message'];
		
		$sql = "INSERT INTO comments(uid, date, 
		message) VALUES ('$uid', '$date', '$message')";
		$result = $conn->query($sql);
	}
}

function getComments($conn){
	$sql = "SELECT * FROM comments";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()) {
		echo "<div class=comment-box><p>";
			echo $row['uid']."<br>";
			echo $row['date']."<br>";
			echo nl2br($row['message']);
		echo "</p>
			<form class='delete-btn' method='POST' action'".deleteComments($conn)."'>
				<input type='hidden' name='cid' value='".$row['cid']."'>
				<button class='btn btn-sm bg-danger text-light pc_data' name='commentDelete'>Delete</button>
			</form>
		</div>";
	}


}


function deleteComments($conn){
	if(isset($_POST['commentDelete'])){		
		$cid = $_POST['cid'];
		$sql = "DELETE FROM comments WHERE cid='$cid'";
		$result = $conn->query($sql);
	}
}

?>