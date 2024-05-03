<?php require('../../../Init.php'); ?>
<script>
$('form[name="sendmessage"]').submit(function(l)
{
	l.preventDefault();

	$.ajax({
		beforeSend: function(){
			$('.resultSend').html('<center><img src="./img/load.gif" /></center>');
		},
		type: 'post',
		url: './Kernel/Functions/SendMessages.php',
		data: $(this).serialize(),
		success: function(r){
			$('.resultSend').html(r);
		},
	});
});
</script>
<div class="alert">
	<div class="topAlert">Enviar Mensaje:</div>
	<div class="midAlert">
		<form action="" method="post" name="sendmessage">
			<i style="color: #c3c3c3;">Escribe el nombre y en la lista de abajo lo clickeas</i></br>
			Para:</br>
			<input type="text" name="form" onkeyup="Search();" /></br>
			<div class="resultSearch" style="display: none;">

			</div>
			Mensaje:</br>
			<textarea type="text" name="content"></textarea></br>
		<div style="width: 125px; margin: auto;">
			<input type="submit" value="Enviar" style="float: left; margin-top: 2px;" />
		</form>
			<button class="redButton" style="float: right;" onclick="CloseAlert();">Cancelar</button>
		</div>
		<div class="resultSend" style="color: #C85305;"></div>
	</div>
</div>