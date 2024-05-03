<?php
#####################################
#####################################
### Programador: Juan Arrebillaga.###
###  Diseñador: Juan Arrebillaga. ###
###  Colaborador: Daniel Márquez. ###
###    Metro UserSystem V 1.0     ###
#####################################
#####################################

require('./Init.php'); 

if(!isset($_SESSION['id']))
	header('Location: ./index.php');

require(Kernel.'/Tpl/Head.tpl');

?>
	<body>
		<?php require(Kernel.'/Tpl/Nav.tpl'); ?>
		<h2>Casilla de mensajes</h2><i style="color: #c3c3c3;">Al llegar a los 30 mensajes leidos tu casilla sera vaciada automaticamente</i></br>
<?php
	if(isset($_GET['id']))
	{
		$qM = mysqli_query(Site::$conn,"SELECT * FROM users_messages WHERE id = '". $_GET['id'] ."' AND form = '". U::Logged('id') ."'");
		if(mysqli_num_rows($qM))
		{
			$M = mysqli_fetch_assoc($qM);
			if($M['raed'] == 0)
				mysqli_query(Site::$conn,"UPDATE users_messages SET raed = '1' WHERE form = '". U::Logged('id') ."' AND id = '". $_GET['id'] ."'");

			$qUm = mysqli_query(Site::$conn,"SELECT * FROM users WHERE id = '". $M['toM'] ."'");
			$Um = mysqli_fetch_assoc($qUm);
		?>
			<u>Mensaje de <b><?=$Um['firstname'];?></b>:</u>
			<p style="width: 800px; margin: auto; margin-bottom: 10px;">
				<?=Site::Smiles($M['content']);?>
			</p>

			<button style="float: right;" class="blueButton" onclick="OpenAlert('SendMessage');">Responder Mensaje</button> <i style="float: right; margin-top: 8px">Enviado <?=Site::HoraU($M['time']);?></i>
		<?php
		}
		else
			echo 'Error el mensaje no existe';
	}
	else
	{
		$qMV = mysqli_query(Site::$conn,"SELECT * FROM users_messages WHERE form = '". U::Logged('id') ."' AND raed = '1'");
		if(mysqli_num_rows($qMV) >= 30)
		{
			mysqli_query(Site::$conn,"DELETE * FROM users_messages WHERE form = '". U::Logged('id') ."' AND raed = '1'");
			echo '<font color="green">La bandeja de mensaje efectuo el autoborrado exitosamente.</font>';
		}
?>
		<table width="900">
			<tr class="titleTr">
				<th>De</th>
				<th>Mensaje</hd>
				<th>Fecha</th>
				<th>Estado</th>
			</tr>

		<?php
		$qM = mysqli_query(Site::$conn,"SELECT * FROM users_messages WHERE form = '". U::Logged('id') ."' ORDER BY id ASC");
		if(mysqli_num_rows($qM))
		{
			while($M = mysqli_fetch_assoc($qM))
			{
				$qUm = mysqli_query(Site::$conn,"SELECT * FROM users WHERE id = '". $M['toM'] ."'");
				$Um = mysqli_fetch_assoc($qUm);
			?>
				<tr>
					<td><a href="./profile.php?user=<?=$Um['id'];?>"><?=$Um['firstname'];?> <?=$Um['lastname'];?></a></td>
					<td><a href="./messages.php?id=<?=$M['id'];?>"><?=substr($M['content'], 0, 50);?>...</a></td>
					<td><?=Site::HoraU($M['time']);?></td>
					<td>
						<?php
						switch($M['raed'])
						{
							case 0:
								echo 'No Leido';
								break;

							case 1:
								echo 'Leido';
								break;
						}
						?>
					</td>
				</tr>
			<?php
			}
		}
		else
			echo 'No tienes mensabes en la bandeja';
			?>
		</table>

		<button class="greenButton" onclick="OpenAlert('SendMessage');" style="float: right;">Redactar Mensaje</button>
<?php
}
?>
	</body>
</html>