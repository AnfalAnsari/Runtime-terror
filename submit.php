<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 

include("auth_session.php");
$servername="localhost";
$username="root";
$password="";
$name="users";
$conn=mysqli_connect($servername,$username,$password,$name);
$tags = $_POST['tags'];
$title=$_POST['title'];
$description=$_POST['description'];
$sessionname = $_SESSION["username"];

$query="INSERT INTO `questions` (`title`, `description`,  `upvotes`, `timestamp`, `askedby`, `tag1`, `tag2`, `tag3`) 
VALUES ('$title', '$description', '0', current_timestamp(), '$sessionname' ,'$tags', 'No tags' ,'No tags');";

if(mysqli_query($conn,$query))
{
	echo "success";
	
   header("Location: index.php");
}
else {
	echo "errro in submitting" ;
	
}



?>

</body>
</html>