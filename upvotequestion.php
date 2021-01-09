<?php
   
$servername="localhost";
$username="root";
$password="";
$name="users";
$id=$_POST['id'];
$conn=mysqli_connect($servername,$username,$password,$name);

$query = "UPDATE `questions` SET `upvotes` = `upvotes` + 1 WHERE `questions`.`id` =$id ";
if ($result = mysqli_query($conn,$query))
{
 		echo "success".$id;
}
else {
	    echo "fai".$id;
    }

	
						
?>
<form action="question.php" method = "post" >
    <input name="id" value=<?php echo $_POST["id"];?>>
</form>

<script type="text/javascript">
document.getElementsByTagName('form')[0].submit()
</script>


