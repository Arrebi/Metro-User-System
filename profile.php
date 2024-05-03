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
		<?php
		require(Kernel.'/Tpl/Nav.tpl');

		if(isset($_GET['user']))
		{
			$qProExist = mysqli_query(Site::$conn,"SELECT * FROM users WHERE id = '". $_GET['user'] ."'");
			if(mysqli_num_rows($qProExist))
			{
			$UserP = mysqli_fetch_assoc($qProExist);

			$qStP = mysqli_query(Site::$conn,"SELECT * FROM users_status WHERE autor = '". $UserP['id'] ."'");
			$statuspublicate = mysqli_num_rows($qStP);
			?>
				<p>
					<h2 style="float: left;"><?=utf8_decode($UserP['firstname']);?> <?=utf8_decode($UserP['lastname']);?></h2> <span style="float: left; margin-top: 8px; margin-left: 5px; color: #c3c3c3;"><i>Se unio a la web hace <?=Site::HoraU($UserP['registerdate']);?></i></span>
				</p>

				<div class="menu_profile">
					<div class="menu_profile">
					<div class="shourtcut" onclick="OpenAlert('ProfileV','<?=$UserP['id'];?>')">
						<img src="./upload_images/<?=$UserP['profile_image'];?>" style="width: 125px; height: 93px;" />
					</div>
					
					<div class="shourtcut">
						<div class="top">
						<?php
						switch($UserP['rank'])
						{
							case '0':
								echo 'Usuario';
							break;

							case '1':
								echo 'Moderador';
							break;

							case '2':
								echo 'Administrador';
							break;
						}
						?>
						</div>
						<span style="position: relative; top: 74px; padding: 8px 1px;">Rango</span>
					</div>

					<div class="shourtcut">
						<div class="top"><?=Site::HoraU($UserP['lastacces']);?></div>
						<span style="position: relative; top: 74px; padding: 8px 1px;">Ultima Conecci&oacute;n</span>
					</div>

					<div class="shourtcut">
						<div class="top"><?=date('d/m/Y H:i', $UserP['registerdate']);?></div>
						<span style="position: relative; top: 74px; padding: 8px 1px;">Fecha de Registro</span>
					</div>

					<div class="shourtcut">
						<div class="top"><?=$statuspublicate;?></div>
						<span style="position: relative; top: 74px; padding: 8px 1px;">Estados Publicados</span>
					</div>

					<?php
					if($UserP['id'] != U::Logged('id'))
					{
					?>
						<button class="blueButton" onclick="OpenAlert('SendMessage');" style="float: left; margin-top: 62px; margin-left: 4px;">Enviar Mensaje</button>';
					<?php
					}
					?>
				</div>

				<u>Ultimos estados de <?=utf8_decode($UserP['firstname']);?>:</u>
				<div class="statusProfile">
				<?php
				$qSt = mysqli_query(Site::$conn,"SELECT * FROM users_status WHERE autor = '". $UserP['id'] ."' ORDER BY id DESC LIMIT 30");
				if(mysqli_num_rows($qSt))
				{
					while($St = mysqli_fetch_array($qSt))
					{
						$qUs = mysqli_query(Site::$conn,"SELECT * FROM users WHERE id = '". $St['autor'] ."'");
						$Us = mysqli_fetch_assoc($qUs);
					?>
						<div class="dialog<?=$St['colour'];?>">
							<a href="./profile.php?user=<?=$Us['id'];?>"><b><?=utf8_decode($Us['firstname']);?> <?=utf8_decode($Us['lastname']);?></b></a>
							<p>
								<?=Site::Smiles(utf8_decode($St['text']));?>
							</p>
							<i style="float: right;">
								<?=Site::HoraU($St['time']);?>
							</i>
						</div>
					<?php
					}
				}
				else
					echo ''. utf8_decode($UserP['firstname']) .' No tiene estados';
				?>
				</div>
			<?php
			}
			else
				echo 'El perfil no existe.';
		}
		else
			echo '<meta http-equiv="refresh" content="0;url= ./profile.php?user='. $_SESSION['id'] .'" />';

		?>
	</body>
</html>