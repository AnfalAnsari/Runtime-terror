<?php

//include auth_session.php file on all user panel pages
include("auth_session.php");
$servername="localhost";
$username="root";
$password="";
$name="users";
$conn=mysqli_connect($servername,$username,$password,$name);
$answer = $_POST['answer'];
$quid=$_POST['id'];
$sessionname =  $_SESSION["username"]; //"Anfal Ansari";
$query="INSERT INTO `answers` (`answer`, `qid`, `ansby`, `timestamp`, `upvotes`) VALUES
 ('$answer', '$quid', '$sessionname', current_timestamp(), '0');";

if(mysqli_query($conn,$query))
{
	echo "success";
	
}
else {
	
	echo "errro in submitting" ;
	
}
?>

<form action="question.php" method = "post" >
    <input name="id" value=<?php echo $_POST["id"];?>>
</form>

<script type="text/javascript">
document.getElementsByTagName('form')[0].submit()
</script>