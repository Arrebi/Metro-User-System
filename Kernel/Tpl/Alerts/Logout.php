<?php require('../../../Init.php'); ?>
<div class="alert">
	<div class="topAlert">¿Seguro deceas cerrar sesión?</div>
	<div class="midAlert">
		<p>Hola <b><?=U::Logged('firstname');?></b>, ¿Estas seguro que deceas cerrar la cuenta?</p>

		<a href="./logout.php"><button class="greenButton">Aceptar</button></a>
		<button class="redButton" onclick="CloseAlert();">Cancelar</button>
	</div>
</div>