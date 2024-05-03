<?php
#####################################
#####################################
### Programador: Juan Arrebillaga.###
###  Diseñador: Juan Arrebillaga. ###
###  Colaborador: Daniel Márquez. ###
###    Metro UserSystem V 1.0     ###
#####################################
#####################################

require('../../Init.php');

class Send
{
	public static function Load()
	{
		$qSt = mysqli_query(Site::$conn, "SELECT * FROM users_status ORDER BY id DESC LIMIT 30");
		if(mysqli_num_rows($qSt))
		{
			while($St = mysqli_fetch_assoc($qSt))
			{
				$qUs = mysqli_query(Site::$conn, "SELECT * FROM users WHERE id = '". $St['autor'] ."'");
				$Us = mysqli_fetch_assoc($qUs);
			?>
				<div class="dialog<?=$St['colour'];?>">
					<a href="./profile.php?user=<?=$Us['id'];?>"><b><?=$Us['firstname'];?> <?=$Us['lastname'];?></b></a>
					<p>
						<?=Site::Smiles($St['text']);?>
					</p>
					<i style="float: right;">
						<?=Site::HoraU($St['time']);?>
					</i>
				</div>
			<?php
			}
		}
		else
			echo 'No hay estados actualmente';
	}
}

new Send;

Send::Load();

?>