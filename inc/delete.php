<?php
include('connection.php');  

$id = $_GET['userid'];

$deletequery = " delete from contactus where id=$id ";

$query = mysqli_query($conn, $deletequery);

header('location:formtable.php');

if($query) {

	?>
		<script>
			alert("Data Deleted Successfully");
		</script>
	<?php

} else {

	?>
		<script>
			alert("Data Not Deleted");
		</script>
	<?php
}
?>
