<?php
	$q = mysqli_query(Site::$conn, "SELECT * FROM users_messages WHERE form = '". U::Logged('id') ."' AND raed = '0'");
	$MessageCount = mysqli_num_rows($q);
?>
<div class="nav">
	<a href="./index.php">Inicio</a>
	<a href="./profile.php?user=<?=U::Logged('id');?>">Perfil</a>
	<a href="./editprofile.php">Editar Datos</a>
	<a href="./messages.php">Mensajes (<?=$MessageCount;?>)</a>
	<a href="javascript:void(0)" onclick="OpenAlert('Logout');">Salir</a>
</div>