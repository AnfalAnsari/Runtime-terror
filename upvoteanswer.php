<?php
   
$servername="localhost";
$username="root";
$password="";
$name="users";
$id=$_POST['Aid'];
$conn=mysqli_connect($servername,$username,$password,$name);

$query = "UPDATE `answers` SET `upvotes` = `upvotes` + 1 WHERE `answers`.`id` =$id ";
if ($result = mysqli_query($conn,$query))
{
 		
}
else {
	    
    }

	
?>

<form action="question.php" method = "post" >
    <input name="id" value=<?php echo $_POST["id"];?>>
</form>

<script type="text/javascript">
document.getElementsByTagName('form')[0].submit()
</script>

