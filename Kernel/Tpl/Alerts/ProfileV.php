<?php 
require('../../../Init.php');

$q = mysqli_query(Site::$conn,"SELECT * FROM users WHERE id = '". $_GET['id'] ."'");
if(mysqli_num_rows($q))
{
	$up = mysqli_fetch_assoc($q);
	?>
	<center>
		<img src="./upload_images/<?=$up['profile_image'];?>" style="max-width: 1000px; max-height: 645px; margin-top: 20px;" /></br>
		<button class="redButton" onclick="CloseAlert();">Cerrar</button>
	</center>
	<?php
}
else
	echo 'Error de busqueda';
?>